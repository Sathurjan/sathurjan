<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
   
    protected $table = 'agents';
    protected $primarykey='id';
    protected $fillable=[
        'name','email','password','confirm_password'
    ];
    
}

