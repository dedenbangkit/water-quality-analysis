<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ["text", "type", "before", "mandatory"];
    protected $hidden = ["created_at", "updated_at"];

    public function section() {
        return $this->belongsTo("App\Section");
    }

    public function answer() {
        return $this->hasMany("App\Answer");
    }

    public function option() {
        return $this->hasMany("App\Option");
    }
}
