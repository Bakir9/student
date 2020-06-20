<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'user_id','title','subtitle','post_slug','published','body','image','like','dislike'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag','blog_tag','post_id','tag_id')->withTimestamps();
    }

    public function getRouteKeyName()
    {
        return 'post_slug';
    }
}
