<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = ["text", "type"];
    protected $hidden = ["created_at", "updated_at"];

    public function question() {
        $this->belongsTo("App\Question");
    }
    //
}
