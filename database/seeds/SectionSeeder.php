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
                "question"=>"What is your age group ?",
                "type"=>"option"
        ]);
        $q2 =  new App\Question([
                "question"=>"What is your highest level of education ?",
                "type"=>"option"
        ]);
        $q3 =  new App\Question([
                "question"=>"What is your general knowledge level of digital communication tools?",
                "type"=>"option"
        ]);

        $s1->question()->saveMany([ $q1, $q2, $q3 ]);

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

        $this->chartSection(
            "https://public.tableau.com/views/Waterqualitydatavisualisations/Verticalbarchart?:display_count=y&:origin=viz_share_link",
            "Vertical Bar Chart",
            5,
        );

        $this->chartSection(
            "https://public.tableau.com/views/Waterqualitydatavisualisations/Horizontalbarchart?:display_count=y&:origin=viz_share_link",
            "Horizontal Bar Chart",
            15,
        );

        $this->chartSection(
            "https://public.tableau.com/views/Waterqualitydatavisualisations/Verticaldotplot?:display_count=y&:origin=viz_share_link",
            "Vertical Dot Plot",
            25,
        );

        $this->chartSection(
            "https://public.tableau.com/views/Waterqualitydatavisualisations/Horizontaldotplot?:display_count=y&:origin=viz_share_link",
            "Horizontal Dot Plot",
            35,
        );

        $this->chartSection(
            "https://public.tableau.com/views/Waterqualitydatavisualisations/Matrixtable?:display_count=y&:origin=viz_share_link",
            "Matrix Table",
            45,
        );

        $this->chartSection(
            "https://public.tableau.com/views/Waterqualitydatavisualisations/BoxPlot?:display_count=y&:origin=viz_share_link",
            "Box Plot",
            55,
        );

        $this->chartSection(
            "https://public.tableau.com/views/Waterqualitydatavisualisations/LineChart?:display_count=y&:origin=viz_share_link",
            "Line Chart",
            65,
        );

        $this->chartSection(
            "https://public.tableau.com/views/Waterqualitydatavisualisations/Smallmultiples_1?:display_count=y&:origin=viz_share_link",
            "Small Multiples",
            75,
        );
    }

    public function chartSection($url, $text, $index) {

        $section = new App\Section();

        $s2 = $section->create([
            "text" => $text,
            "icon" => "chart-bar",
            "visual" => $url 
        ]);

        $q1 =  new App\Question([
                "question"=>"Where is the water quality risk the highest?",
                "before"=>"Activity Based Question",
                "type"=>"text"
        ]);
        $q2 =  new App\Question([
                "question"=>"How difficult was it to find the answer to this question?",
                "type"=>"option"
        ]);
        $q3 =  new App\Question([
                "question"=>"What is the value at point X within water quality standards?",
                "type"=>"text"
        ]);
        $q4 =  new App\Question([
                "question"=>"Obstructive Supportive",
                "before"=>"Please assess the visualisation and indicate how you find regarding",
                "type"=>"slider"
        ]);
        $q5 =  new App\Question([
                "question"=>"Complicated Easy",
                "type"=>"slider"
        ]);
        $q6 =  new App\Question([
                "question"=>"Inefficient Efficient",
                "type"=>"slider"
        ]);
        $q7 =  new App\Question([
                "question"=>"Confusing Clear",
                "type"=>"slider"
        ]);
        $q8 =  new App\Question([
                "question"=>"Boring Exciting",
                "type"=>"slider"
        ]);
        $q9 =  new App\Question([
                "question"=>"Conventional Inventive",
                "type"=>"slider"
        ]);
        $q10 =  new App\Question([
                "question"=>"Please write below if you have any other comments concerning the visualisation shown",
                "type"=>"textarea"
        ]);

        $s2->question()->saveMany([$q1, $q2, $q3, $q4, $q5, $q6, $q7, $q8, $q9, $q10]);

        App\Question::find($index)->option()->saveMany([
            new App\Option(["text"=>"Easy to find"]),
            new App\Option(["text"=>"Not easy, not hard to find"]),
            new App\Option(["text"=>"Hard to find"]),
        ]);
        return true;
    }
}
