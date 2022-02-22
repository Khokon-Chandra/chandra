<?php

namespace app\Models;

use core\Model;

class Post extends Model
{
    
    protected $table = 'posts';

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

   
}