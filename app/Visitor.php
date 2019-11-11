<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = ["user_agent"];

    public function answer() {
        return $this->hasMany("App\Answer");
    }
}
