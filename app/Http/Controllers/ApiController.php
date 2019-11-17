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
                "page" => (int) $i + 1,
                "section_id" => (int) $x
            );
        });
        $sections = $section->whereIn('id', $random_sections)->get();
        $sections = collect($sections)->map(function($x, $i){
            $x['page'] = (int) $i + 1;
            $x['complete'] = false;
            return $x;
        })->toArray();
        $questions = $question->load('section')->with('option')->whereIn('section_id', $random_sections)->get();
        $questions = collect($questions)->map(function($x, $i) use ($pages){
            forEach($pages as $p) {
                if ((int) $p["section_id"] === (int) $x["section_id"]) {
                    $x["page"] = (int) $p["page"];
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

    public function data(Request $request, Visitor $visitors, Section $sections) {
        $visitors = $visitors->with('answer.question.section')->get();
        $visitors = collect($visitors)->map(function($visitor, $key) use ($sections) {
            $visitor["id"] = (int) $key + 1;
            foreach($visitor["answer"] as $answer) {
                if ((int) $answer["question"]["section_id"] === 1){
                    $question = $answer["question"]["id"];
                }
                $visitor[$question] = $answer["value"];
                if ((int) $answer["question"]["section_id"] !== 1) {
                    $defaults = $sections->with('question')->find((int) $answer["question"]["section_id"]);
                    if (in_array( (int) $answer["question"]["section_id"], [2,3,4,5]) ){
                        $section = $answer["question"]["section"]["text"];
                        $visitor["Q1_Chart"] = $section;
                        foreach($defaults["question"] as $default) {
                            $default = "Q1_".$default["id"];
                            $visitor[$default] = "Empty";
                        }
                    }
                    if (in_array( (int) $answer["question"]["section_id"], [6,7,8,9]) ){
                        $section = $answer["question"]["section"]["text"];
                        $visitor["Q2_Chart"] = $section;
                        foreach($defaults["question"] as $default) {
                            $default = "Q2_".$default["id"];
                            $visitor[$default] = "Empty";
                        }
                    }
                }
            }
            foreach($visitor["answer"] as $answer) {
                if (in_array( (int) $answer["question"]["section_id"], [2,3,4,5]) ){
                    $question = "Q1_".$answer["question"]["id"];
                    $section = $answer["question"]["section"]["text"];
                    $visitor["Q1_Chart"] = $section;
                }
                if (in_array( (int) $answer["question"]["section_id"], [6,7,8,9]) ){
                    $question = "Q2_".$answer["question"]["id"];
                    $section = $answer["question"]["section"]["text"];
                }
                $visitor[$question] = $answer["value"];
                if ($visitor[$question] === "0" || $visitor[$question] === 0) {
                    $visitor[$question] = "Empty";
                }
            }
            return collect($visitor)->forget(["answer", "updated_at"])->flatten();
        })->toArray();
        $data = array("data" => $visitors);
        // $json = json_encode($data, JSON_NUMERIC_CHECK);
        // file_put_contents(base_path('public/json/data.json'), stripslashes($json));
        return response()->json($data, 200, [], JSON_BIGINT_AS_STRING);
    }

	public function analysis(Request $request, Answer $answer) {
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
        return response()->json(array("data" =>$results), 200, [], JSON_NUMERIC_CHECK);
	}

    public function charts(Request $request, Question $questions) {
        $data = $questions->whereIn("type", ["slider","option"])
                          ->with('section')
                          ->with('answer')
                          ->with('option')->get();
        $data = collect($data)->map(function($arr) {
            $arr["chart"] = $arr["section"]["text"];
            $arr["options"] = collect($arr["option"])->groupBy("text");
            foreach ($arr["options"] as $key => $value) {
                $arr["options"][$key] = 0;
            }
            $arr["answers"] = collect($arr["answer"])->groupBy("value");
            foreach ($arr["answers"] as $key => $value) {
                $arr["answers"][$key] = collect($value)->count();
            }
            $arr["value"] = collect($arr["options"])->merge($arr["answers"]);
            if($arr["type"] === "slider") {
                $arr["value"] = $arr["answers"];
            }
            $forgotten = ["answer","section", "before", "mandatory", "type", "section_id", "options", "option","answers"];
            return collect($arr)->forget($forgotten);
        })->toArray();
        return collect($data)->groupBy("chart");
    }

}
