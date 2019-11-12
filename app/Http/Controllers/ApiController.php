<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Section;
use App\Question;
use App\Queue;
use App\Visitor;
use App\Answer;
use UserAgentParser\Exception\NoResultFoundException;
use UserAgentParser\Provider\WhichBrowser;

class ApiController extends Controller
{

    public function index(Section $section, Question $question, Queue $queue) {
        $firstgroup = $queue->group([2,3,4,5])->first()->section_id;
        $secondgroup = $queue->group([6,7,8,9])->first()->section_id;
        $random_sections = [1, $firstgroup, $secondgroup];
        $pages = collect($random_sections)->map(function($x, $i){
            return array(
                "page" => $i + 1,
                "section_id" => $x
            );
        });
        $sections = $section->whereIn('id', $random_sections)->get();
        $sections = collect($sections)->map(function($x, $i){
            $x['page'] = $i + 1;
            $x['complete'] = false;
            return $x;
        })->toArray();
        $questions = $question->load('section')->with('option')->whereIn('section_id', $random_sections)->get();
        $questions = collect($questions)->map(function($x, $i) use ($pages){
            forEach($pages as $p) {
                if ($p["section_id"] === $x["section_id"]) {
                    $x["page"] = $p["page"];
                }
            }
            return $x;
        })->toArray();
        $api = [
            "sections" => $sections,
            "questions" => $questions,
        ];
        return response()->json($api, 200, [], JSON_NUMERIC_CHECK);
    }

	public function data(Request $request, Answer $answer) {
		$results = $answer->whereNotIn('question_id',[1,2,3,4])->with('question.section')->with('visitor.demography.question')->get();
        $string = new \Illuminate\Support\Str();
        $results = collect($results)->map(function($x, $key) use ($string){
            $b = collect($x);
            forEach($x->visitor->demography as $g) {
                $qname = $string->lower($g["question"]["question"]);
                $qname = $string->after($qname, "what is your general knowledge level of ");
                $qname = $string->replaceLast('?','',$qname);
                $qname = $string->snake($qname);
                $b[$qname] = $g["value"];
            }
            $b["chart"] = $b["question"]["section"]["text"];
            $b["os"] = $b["visitor"]["os"];
            $b["device"] = $b["visitor"]["device"];
            $b["browser"] = $b["visitor"]["browser"];
            $b["question"] = $b["question"]["question"];
            $b["date"] = $b["visitor"]["created_at"];
            $b = $b->forget(["id","visitor", "section_id","question_id","visitor_id"]);
            $b["id"] = $key + 1;
            return $b->reverse()->flatten(0);
        });
        return array("data" => $results);
	}

    public function submit(Request $request, Queue $queue, Visitor $visitor, WhichBrowser $provider) {
		$user_agent = $request->header();
		$user_agent = $user_agent["user-agent"][0];
        try {
            $uag = $provider->parse($user_agent);
            $browser = $uag->getBrowser()->getName();
            $device = $uag->getDevice()->getBrand();
            $device = $device.' - '.$uag->getDevice()->getModel(); 
            $os = $uag->getOperatingSystem()->getVersion()->getComplete();
        } catch (NoResultFoundException $ex){
            $browser = "Not Detected";
            $device = "Not Detected";
            $os = "Not Detected";
        }
        $request = $request['data'];
		$collections = collect($request)->map(function($x){
			return array(
				"question_id" => $x["id"],
				"section_id" => $x["section_id"],
				"value" => $x["answer"],
			);
		});
        $store = $collections->reject(function ($x) {
            return $x["value"] === null;
        })->toArray();
        $visitor = $visitor->create([
            "device" => $device,
            "os" => $os,
            "browser" => $browser,
        ]);
        $visitor->answer()->createMany($store);
		$sections = collect($request)->groupBy('section_id');
		$sections = $sections->keys()->take(-2);
		forEach($sections as $section) {
			$sec = $queue->where('section_id', $section)->select('counts')->first();
			$queue->where('section_id', $section)->update(['counts' => ($sec->counts + 1)]);
		}
		return $request;
    }

}
