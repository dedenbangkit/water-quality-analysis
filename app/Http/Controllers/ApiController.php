<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Section;
use App\Question;
use App\Queue;
use App\Visitor;
use App\Answer;

class ApiController extends Controller
{

    public function index(Section $section, Question $question, Queue $queue) {
        $firstgroup = $queue->group([2,3,4,5])->first()->section_id;
        return $firstgroup;
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
        return $api;
    }

	public function data(Request $request, Answer $answer) {
		$results = $answer->with('question')->with('visitor')->get();
		$results = collect($results)->map(function($x) {
			$results["id"] = $x["id"];
			$results["value"] = $x["value"];
			$results["user"] = $x["visitor"]["user_agent"];
			$results["user_id"] = $x["visitor"]["id"];
			$results["question"] = $x["question"]["question"];
			$results["type"] = $x["question"]["type"];
			if ( $results["type"] == "slider"){
				$value = explode(" ", $results["question"]);
				if ((int) $results["value"] < 50) {
					$value = $results["value"].' '.$value[0];
				}
				if ((int) $results["value"] > 50) {
					$value = $results["value"].' '.$value[1];
				}
				if ((int) $results["value"] === 50) {
					$value = 'Neutral '.$value[1];
				}
				$results["value"] = $value;
			};
			return $results; 
		});
		return $results;
	}

    public function submit(Request $request, Queue $queue, Visitor $visitor) {
		$user_agent = $request->header();
		$user_agent = $user_agent["user-agent"][0];

        $request = $request['data'];
		$store = collect($request)->map(function($x){
			return array(
				"question_id" => $x["id"],
				"value" => $x["answer"],
			);
		})->toArray();
		$visitor = $visitor->create(["user_agent" => $user_agent]);
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
