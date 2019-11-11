<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ["value", "question_id"];
    protected $hidden = ["created_at", "updated_at"];

    public function question() {
        return $this->belongsTo("App\Question");
    }

    public function visitor() {
        return $this->belongsTo("App\Visitor");
    }
}
