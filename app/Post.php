<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['content', 'user_id'];

    public function user()
    {   
        
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function replies()
    {
    	return $this->hasMany('App\Posts_replies', 'posts_id', 'id');
    }
    
}
