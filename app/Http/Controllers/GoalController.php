<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gaol;
use App\GoalTask;

class GoalController extends Controller
{
    public function createGoal(){
    	// create the goal
    	$goal = new Goal; 
    	
    	// create the goal tasks
    	// see if we're starting today
    	// if we are cancel out the portions of the day that have already passed 
    	// adjust the numbers
    	// save in the database
    	// other wise create them for tomorrow
    }

    public function missedGoal(){
    	//check and see if confirmation has been sent
    	//if yes and there is still no response see how much time is left
    	//if less than 5 min update the quantities for everything
    	//update the database 
    	//notify the user
    }

    public function updateGoal(){
    	//update goal
    	//notify the app that the update was succesful
    }

    public function updateGoalTasks(){
    	//update the goal tasks with some new information or recording stats
    	//update with the total number completed so far
    	//update the remaining tasks as required
    }
}
