<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ["text", "visual", "icon"];
    protected $hidden = ["created_at", "updated_at"];

    public function question() {
        return $this->hasMany("App\Question");
    }

    public function answer() {
        return $this->hasMany("App\Answer");
    }
}
