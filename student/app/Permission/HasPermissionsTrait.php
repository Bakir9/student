<?php

namespace App\Permission;

use App\Permission;
use App\Role; 

trait HasPermissionsTrait {
    
    public function permissions()
    {
        return $this->belongsToMany('App\Permission', 'users_permissions');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Roles', 'users_roles');
    }

    protected function getAllPermissions(array $permission)
    {
        return Permission::whereIn('name', $permission)->get();
    }

    public function hasAnyRole($roles) 
    {
        if($this->roles()->whereIn('name', $roles)->first()) {
            return true;
        }
        
        return false;
    }

    public function hasRole($role) 
    {
        if($this->roles()->where('name', $role)->first()) {
            return true;
        }
        
        return false;
    }

    public function hasPermissionTo($permission) 
    {
        if($this->permissions()->where('name',$permission)->get()) {
            return true;
        }
        return false;
    }
}
