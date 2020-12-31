<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function postBy(){
        return $this->belongsTo('App\Models\User');
    }
    public function commentTo(){
        return $this->belongsTo('App\Models\Post');
    }
    public function commentTo(){
        return $this->belongsTo('App\Models\Post');
    }
    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }
}
