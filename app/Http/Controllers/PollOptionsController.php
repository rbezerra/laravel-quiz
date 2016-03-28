<?php

namespace App\Http\Controllers;

use Request;
use App\PollOptions;
use App\Http\Requests;

class PollOptionsController extends Controller
{
    public function index(){
    	return PollOptions::all();
    }

    public function store(){
    	$polloptions = new PollOptions(Request::all());
    	$polloptions->save();
    	return $polloptions;
    }

    public function show($id){
    	return PollOptions::find($id);
    }

    public function addVote($id){
    	$polloptions = PollOptions::find($id);
    	$polloptions->vote++;
    	$polloptions->save();

    	return $polloptions;
    }

    public function destroy($id){
    	$polloptions = PollOptions::find($id);
    	$polloptions->delete();
    }
}
