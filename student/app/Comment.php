<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'post_id','username','content'
    ];

    public function blog()
    {
        return $this->belongsTo('App\Blog');
    }
}
