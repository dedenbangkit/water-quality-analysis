<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    protected $hidden = ["created_at", "updated_at", "counts"];
	protected $fillable = ["counts"];

    public function group($arr) {
        return $this->whereIn('section_id',$arr)->orderby('counts', 'asc')->select('section_id');
    }
}
