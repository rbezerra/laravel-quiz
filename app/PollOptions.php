<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PollOptions extends Model
{
    protected $table = 'polloptions';
    protected $fillable = ['title', 'poll_id', 'vote'];
}
