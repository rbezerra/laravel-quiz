<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{

	protected $fillable = ['title'];

    public function pollOptions(){
    	return $this->hasMany('App\PollOptions');
    }
}
