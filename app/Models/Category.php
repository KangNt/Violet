<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table ='categories';
    protected $fillable = [
        'cate_name',
        'description',
        
    ];

}
