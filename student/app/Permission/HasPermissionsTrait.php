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

    protected function getAllPermissions(array $permissions) {}
    
    protected function hasPermission($permission){}
    
		public function hasRole(... $roles){}
			
		public function hasPermissionThroughRole($permission){}
		
		public function hasPermissionTo($permission){}
	
		public function refreshPermissions(... $permission){}

		public function withdrawPermissionsTo(... $permission){}
		
		public function givePermissionsTo(... $permission){}
}
