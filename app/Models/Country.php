<?php

namespace app\Models;

use core\Database\Model;

class Country extends Model
{

    protected $table = 'countries';


    public function clients()
    {
        return $this->hasMany(Client::class,'country_id','id');
    }

    
}
