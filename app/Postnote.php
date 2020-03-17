<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postnote extends Model
{
    protected $table = "postnotes";
 
    protected $fillable = ['title', 'content', 'username'];

    public function user()
    {   
        
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
