<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name','slug'
    ];

    public function blogs()
    {
        return $this->belongsToMany('App\Blog','blog_tag','tag_id','post_id');
    }
}
