<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name','description','type'
    ];
    public $timestamps = false;

    public function users()
    {
        return $this->belongsToMany('App\User','users_roles');
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Permission','roles_permissions');
    }
}
