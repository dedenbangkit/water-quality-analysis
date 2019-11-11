<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = ["browser","device","os"];

    public function answer() {
        return $this->hasMany("App\Answer");
    }

    public function demography() {
        return $this->hasMany("App\Answer")->where('answers.section_id', 1);
    }
}
