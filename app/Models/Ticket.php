<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
   
    protected $table = 'tickets';
    protected $primarykey='id';
    protected $fillable=[
        'name','problem','phone_no','email','reference_no','status','reply'
    ];
    
}