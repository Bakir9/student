<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'name','description','type'
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }
    public $timestamps = false;
}
