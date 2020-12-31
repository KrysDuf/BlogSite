<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public function posts(){
        return $this->hasMany('App\Models\Post');
    }
    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }
    public function roles(){
        return $this->belongsToMany('App\Models\Role');
    }
    public function login(){
        return $this->belongsTo('App\Models\Login');
    }
}
