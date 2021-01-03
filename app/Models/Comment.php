<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';
    protected $fillable = ['post_id', 'user_id', 'body'];

    public function commentBy(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    public function commentOn(){
        return $this->belongsTo('App\Models\Post', 'post_id');
    }
}
