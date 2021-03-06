<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $guarded=[];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class)->orderBy('created_at','DESC');
    }
    public function getDiffDateAttribute(){
        return $this->created_at->diffForHumans();
    }
    public function likedusers(){
        return $this->belongsToMany(User::class,'likes');
    }
}
