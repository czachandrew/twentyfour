<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Goal;

class HomeController extends Controller
{
    public function index(){
    	//return main view where you design and track your goals
    	return view('home');
    }

    public function createGoal(){
    	//create a new goal
    }

    public function updateProgress(Goal $goal){
    	//update the progress of a goal
    }
}
