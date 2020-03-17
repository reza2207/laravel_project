<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts_replies extends Model
{
    //
    protected $table = 'posts_replies';

    protected $fillable = ['content','user_id','posts_id'];

    public function user()
    {
    	return $this->hasOne('App\User', 'id', 'user_id');
    }
}
