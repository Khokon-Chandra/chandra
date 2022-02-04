<?php

namespace app\Models;

use core\Model;

class User extends Model
{
    
    protected function tablename():string
    {
        return 'users';
    }

    protected $table = 'users';
}