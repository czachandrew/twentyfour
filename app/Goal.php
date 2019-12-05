 cdssds<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    protected $fillable = ['title', 'description', 'numerical_unit','quantity', 'user_id','public_challenge_id']; 

    public function tags(){
    	return $this->morphToMany('App/Tag');
    }

    public function user(){
    	return $this->belongsTo('App/User');

    }

    public function challenge(){
    	return $this->belongsTo('App/Challenge');
    }

    public function tasks(){
    	return $this->hasMany('App\Task');
    }
}
