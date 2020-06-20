<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    protected $fillable = [
        'category_id','post_id'
    ];

    public function blog()
    {
        return $this->belongsTo('App\Blog');
    }
}
