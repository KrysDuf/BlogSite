<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    protected $table = 'users';
    protected $fillable = ['name', 'email', 'password'];

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
}
