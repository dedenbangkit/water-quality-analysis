<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public function question() {
        return $this->belongsTo("App\Ansswer");
    }

    public function visitor() {
        return $this->belongsTo("App\Visitor");
    }
}
