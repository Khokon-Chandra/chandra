<?php

namespace App\Models;

use khokonc\mvc\Database\Model;

class Country extends Model
{

    protected $table = 'countries';


    public function clients()
    {
        return $this->hasMany(Client::class,'country_id','id');
    }

    
}
