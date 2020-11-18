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

    public function hasAnyRoles($roles) 
    {
        if($this->roles()->whereIn('type', $roles)->first()) {
            return true;
        }
        
        return false;
    }

    public function hasRole(... $roles) 
    {  
        foreach($roles as $role) {
            if($this->roles->contains('type', $role)) {
                return true;
        }
    }
        return false;
    }

    protected function hasPermission($permission) {

        return (bool) $this->permissions->where('slug', $permission->slug)->count();
      }

    public function hasPermissionTo($permission) 
    {   
        return $this->hasPermission($permission);
    }
}
