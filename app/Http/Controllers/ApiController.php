<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Section;
use App\Question;

class ApiController extends Controller
{

    public function index(Section $section, Question $question) {
        $sections = $section->get();
        $questions = $question->load('section')->with('option')->get();
        $api = [
            "sections" => $sections,
            "questions" => $questions,
        ];
        return $api;
    }

}
