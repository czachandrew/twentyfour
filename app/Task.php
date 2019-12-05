<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function goal(){
    	return $this->gelongsTo('App\Goal');
    }
}
