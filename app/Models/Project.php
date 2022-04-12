<?php

namespace App\Models;

use khokonc\mvc\Database\Model;

class Project extends Model
{

    protected $table = 'projects';


    public function user(): array
    {
        return $this->belongsTo(User::class,'created_by','id');
    }

    
}
