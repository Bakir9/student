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
        return $this->belongsToMany('App\User','users_permissions');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role','roles_permissions');
    }

    public $timestamps = false;
}
