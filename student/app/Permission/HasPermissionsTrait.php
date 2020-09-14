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

    public function getAllPermissions() 
    {
        $permissions = Permission::where('user_id', auth()->user())->get();
        dd($permissions);
    }
    /*protected function getAllPermissions(array $permissions) {}
    
    protected function hasPermission($permission){}
    
		public function hasRole(... $roles){}
			
		public function hasPermissionThroughRole($permission){}
		
		public function hasPermissionTo($permission){}
	
		public function refreshPermissions(... $permission){}

		public function withdrawPermissionsTo(... $permission){}
		
		public function givePermissionsTo(... $permission){}*/
}
