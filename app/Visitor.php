<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = ["title", "first_name", "last_name", "occupation"];

    public function answer() {
        return $this->hasMany("App\Answer");
    }
}
