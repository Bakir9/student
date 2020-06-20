<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = [
        'name','slug', 'default'
    ];

    public function blogs()
    {
        return $this->hasMany('App\Blog','category_id');
    }
}
