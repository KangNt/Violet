<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        
        'fullname',
        'title',
        'content',
        'status',
        'email',
        'phone_number',
        'address',

    ];
    public $timestamps =false;

}
