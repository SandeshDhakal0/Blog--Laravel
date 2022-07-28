<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    function comment(){
        return $this->hasMany('App\Models\Comment')->orderBy('id','desc');
    }
}
