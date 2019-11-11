<?php

use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $section = new App\Section();

        $s1 = $section->create([
            "text" => "Demographics",
            "icon" => "user-friends",
            "visual" => null 
        ]);

        $q1 =  new App\Question([
                "question"=>"Age group",
                "type"=>"option",
                "mandatory"=>true,
        ]);
        $q2 =  new App\Question([
                "question"=>"Edicational Level",
                "type"=>"option",
                "mandatory"=>true,
        ]);
        $q3 =  new App\Question([
                "question"=>"What is your general knowledge level of digital communication tools ?",
                "type"=>"option",
                "mandatory"=>true,
        ]);

        $q4 =  new App\Question([
                "question"=>"What is your general knowledge level of water quality?",
                "type"=>"option",
                "mandatory"=>true,
        ]);

        $s1->question()->saveMany([ $q1, $q2, $q3, $q4]);

        App\Question::find(1)->option()->saveMany([
            new App\Option(["text"=>"<18"]),
            new App\Option(["text"=>"18-30"]),
            new App\Option(["text"=>"30-50"]),
            new App\Option(["text"=>">50"])
        ]);

        App\Question::find(2)->option()->saveMany([
            new App\Option(["text"=>"No education"]),
            new App\Option(["text"=>"Primary education"]),
            new App\Option(["text"=>"Lower secondary education"]),
            new App\Option(["text"=>"Upper secondary education"]),
            new App\Option(["text"=>"Post secondary education"]),
            new App\Option(["text"=>"Bachelor or equivalent level"]),
            new App\Option(["text"=>"Master level or higher"]),
        ]);

        App\Question::find(3)->option()->saveMany([
            new App\Option(["text"=>"No knowledge"]),
            new App\Option(["text"=>"Basic"]),
            new App\Option(["text"=>"Intermediate"]),
            new App\Option(["text"=>"Advanced"]),
        ]);

        App\Question::find(4)->option()->saveMany([
            new App\Option(["text"=>"No knowledge"]),
            new App\Option(["text"=>"Basic"]),
            new App\Option(["text"=>"Intermediate"]),
            new App\Option(["text"=>"Advanced"]),
        ]);


        $this->chartSectionOne(
            "https://public.tableau.com/views/Waterqualitydatavisualisations/Verticalbarchart?:display_count=y&:origin=viz_share_link",
            "Vertical Bar Chart",
            6,
        );

        $this->chartSectionOne(
            "https://public.tableau.com/views/Waterqualitydatavisualisations/Horizontalbarchart?:display_count=y&:origin=viz_share_link",
            "Horizontal Bar Chart",
            17,
        );

        $this->chartSectionOne(
            "https://public.tableau.com/views/Waterqualitydatavisualisations/Verticaldotplot?:display_count=y&:origin=viz_share_link",
            "Vertical Dot Plot",
            28,
        );

        $this->chartSectionOne(
            "https://public.tableau.com/views/Waterqualitydatavisualisations/Horizontaldotplot?:display_count=y&:origin=viz_share_link",
            "Horizontal Dot Plot",
            39,
        );

        $this->chartSectionTwo(
            "https://public.tableau.com/views/Waterqualitydatavisualisations/Matrixtable?:display_count=y&:origin=viz_share_link",
            "Matrix Table",
            50,
        );

        $this->chartSectionTwo(
            "https://public.tableau.com/views/Waterqualitydatavisualisations/BoxPlot?:display_count=y&:origin=viz_share_link",
            "Box Plot",
            61,
        );

        $this->chartSectionTwo(
            "https://public.tableau.com/views/Waterqualitydatavisualisations/LineChart?:display_count=y&:origin=viz_share_link",
            "Line Chart",
            72,
        );

        $this->chartSectionTwo(
            "https://public.tableau.com/views/Waterqualitydatavisualisations/Smallmultiples_1?:display_count=y&:origin=viz_share_link",
            "Small Multiples",
            83,
        );
    }

    public function chartSectionOne($url, $text, $index) {

        $section = new App\Section();

        $s2 = $section->create([
            "text" => $text,
            "icon" => "chart-bar",
            "visual" => $url 
        ]);

        $q1 =  new App\Question([
                "question"=>"At what sample point is the water quality rating the lowest",
                "before"=>"Activity Based Question | Please have a look at the data visualisation above and answer the following attributes;",
                "type"=>"text",
                "mandatory"=>true,
        ]);
        $q2 =  new App\Question([
                "question"=>"How difficult was it to find the answer to this question?",
                "type"=>"option",
                "mandatory"=>true,
        ]);
        $q3 =  new App\Question([
                "question"=>"What is the water quality value of the Dodgeburg sample point in the region of Rocester?",
                "type"=>"text",
                "mandatory"=>true,
        ]);
        $q4 =  new App\Question([
                "question"=>"How difficult was it to find the answer to this question?",
                "type"=>"option",
                "mandatory"=>true,
        ]);
        $q5 =  new App\Question([
                "question"=>"Obstructive Supportive",
                "before"=>"Likert Scale Questions | Please assess the visualisation and indicate how you find regarding",
                "type"=>"slider",
                "mandatory"=>true,
        ]);
        $q6 =  new App\Question([
                "question"=>"Complicated Easy",
                "type"=>"slider",
                "mandatory"=>true,
        ]);
        $q7 =  new App\Question([
                "question"=>"Inefficient Efficient",
                "type"=>"slider",
                "mandatory"=>true,
        ]);
        $q8 =  new App\Question([
                "question"=>"Confusing Clear",
                "type"=>"slider",
                "mandatory"=>true,
        ]);
        $q9 =  new App\Question([
                "question"=>"Boring Exciting",
                "type"=>"slider",
                "mandatory"=>true,
        ]);
        $q10 =  new App\Question([
                "question"=>"Conventional Inventive",
                "type"=>"slider",
                "mandatory"=>true,
        ]);
        $q11 =  new App\Question([
                "question"=>"Comments",
                "type"=>"textarea",
                "mandatory"=>false,
        ]);

        $s2->question()->saveMany([$q1, $q2, $q3, $q4, $q5, $q6, $q7, $q8, $q9, $q10, $q11]);

        App\Question::find($index)->option()->saveMany([
            new App\Option(["text"=>"Easy to find"]),
            new App\Option(["text"=>"Not easy, not hard to find"]),
            new App\Option(["text"=>"Hard to find"]),
        ]);

        App\Question::find(($index + 2))->option()->saveMany([
            new App\Option(["text"=>"Easy to find"]),
            new App\Option(["text"=>"Not easy, not hard to find"]),
            new App\Option(["text"=>"Hard to find"]),
        ]);

        return true;
    }

    public function chartSectionTwo($url, $text, $index) {

        $section = new App\Section();

        $s2 = $section->create([
            "text" => $text,
            "icon" => "chart-bar",
            "visual" => $url 
        ]);

        $q1 =  new App\Question([
                "question"=>"What is the lowest value measured in this overview?",
                "before"=>"Activity Based Question | Please have a look at the data visualisation above and answer the following attributes;",
                "type"=>"text",
                "mandatory"=>true,
        ]);
        $q2 =  new App\Question([
                "question"=>"How difficult was it to find the answer to this question?",
                "type"=>"option",
                "mandatory"=>true,
        ]);
        $q3 =  new App\Question([
                "question"=>"Where is the water quality overall the best ?",
                "type"=>"text",
                "mandatory"=>true,
        ]);
        $q4 =  new App\Question([
                "question"=>"How difficult was it to find the answer to this question?",
                "type"=>"option",
                "mandatory"=>true,
        ]);
        $q5 =  new App\Question([
                "question"=>"Obstructive Supportive",
                "before"=>"Likert Scale Questions | Please assess the visualisation and indicate how you find regarding",
                "type"=>"slider",
                "mandatory"=>true,
        ]);
        $q6 =  new App\Question([
                "question"=>"Complicated Easy",
                "type"=>"slider",
                "mandatory"=>true,
        ]);
        $q7 =  new App\Question([
                "question"=>"Inefficient Efficient",
                "type"=>"slider",
                "mandatory"=>true,
        ]);
        $q8 =  new App\Question([
                "question"=>"Confusing Clear",
                "type"=>"slider",
                "mandatory"=>true,
        ]);
        $q9 =  new App\Question([
                "question"=>"Boring Exciting",
                "type"=>"slider",
                "mandatory"=>true,
        ]);
        $q10 =  new App\Question([
                "question"=>"Conventional Inventive",
                "type"=>"slider",
                "mandatory"=>true,
        ]);
        $q11 =  new App\Question([
                "question"=>"Comments",
                "type"=>"textarea",
                "mandatory"=>false,
        ]);

        $s2->question()->saveMany([$q1, $q2, $q3, $q4, $q5, $q6, $q7, $q8, $q9, $q10, $q11]);

        App\Question::find($index)->option()->saveMany([
            new App\Option(["text"=>"Easy to find"]),
            new App\Option(["text"=>"Not easy, not hard to find"]),
            new App\Option(["text"=>"Hard to find"]),
        ]);

        App\Question::find(($index + 2))->option()->saveMany([
            new App\Option(["text"=>"Easy to find"]),
            new App\Option(["text"=>"Not easy, not hard to find"]),
            new App\Option(["text"=>"Hard to find"]),
        ]);
        return true;
    }
}
