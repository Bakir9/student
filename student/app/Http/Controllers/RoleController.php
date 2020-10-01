<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Exception;


use App\Role;
use App\Permission;
use App\User;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        
        return view('user-managment.roles.index', compact('roles'));
    }
    
    public function create() 
    {
        $user_id = $this->getUserId();
        
        $validateName = request()->validate([
            'name' =>  'required',
            'description' => 'required',
            'type' => 'required'
        ]);
        
        $user = User::find($user_id);

        if($validateName) {
            $role = Role::create([
                'name' => request('name'),
                'description' => request('description'),
                'type' => request('type'),
            ]);

            toast('Role created', 'success');
        } else {
            toast('Something wrong !', 'warning');
        }

        $roleId = Role::all()->last();
        $user->roles()->attach($roleId);
        return redirect()->back();
        //return redirect('/roles');
    }

    public function deleteRole($id)
    {
        $deleteRole = Role::where('id', $id)->delete();

        if($deleteRole) {
            toast('Role successfully deleted !', 'success');
        } else {
            toast('Something wrong !','warning');
        }

        return redirect('/roles');
    }

   /* public function showRolePermissions($id)
    {   
        $permissions = Permission::all();
        $role = Role::find($id);
        $roles_permissions = $role->permissions;
        
        dd( Permission::whereHas('roles.users',function ($query) {
            $query->where('id',$this->id);
        })->get());
        

        //return view('user-managment.roles.add-permission', compact('permissions', 'role','roles_permissions'));
    }*/

    public function getUserId()
    {
        $segment = explode('/',url()->previous());
            $findUser= array_values($segment);
                foreach($findUser as $key=>$value){
                    if($key == 4){
                        $user_id =  $findUser[$key];
                    }
                }
                
        if($user_id != null) {
            return $user_id;
        } else {
            return null;
        }
        
    }

    public function savePermissionsForRole($role_id)
    {   
        $validatePermissions = request()->validate([
            'permission' => 'required'
        ]);
        
        $role = Role::find($role_id);
        $permissions = request()->permission;
        
        try{
            $role->permissions()->attach($permissions);
            toast('Saved', 'success');
        } catch(Exception $e) {
            echo $e->getMessage();
            toast('Error','warning');
        }
        $user_id = $this->getUserId();
        $user = User::find($user_id);

        $permissions_for_user = $user->permissions()->attach($permissions);

        return redirect()->back();
    }
    
    public function editRoleForUser($user_id, $role_id)
    {
        $user = User::find($user_id);
        $role = Role::find($role_id);
        $permissions = Permission::all();
        $permission_throught_role = Permission::whereHas('users.roles',function ($query) use ($user_id, $role_id) {
            $query->where('user_id',$user_id)
                  ->where('id',$role_id);
        })->get();
        return view ('user-managment.roles.edit-role',compact('permission_throught_role','role', 'permissions','user'));
    }

    public function deleteRoleForUser($user_id, $role_id)
    {   
        $user = User::find($user_id);
        $role = Role::find($role_id);
        
        $permission_throught_role = Permission::whereHas('roles.users',function ($query) use ($user_id, $role_id) {
            $query->where('user_id',$user_id)
                  ->where('role_id',$role_id);
        })->pluck('id')->toArray();
        
        //delete permissions under users_permissions
        $user_permissions = $user->permissions()->detach($permission_throught_role);

        //delete permissions under roles_permissions
        $role_per = $role->permissions()->detach($permission_throught_role);

        //delete roles under users_roles
        $user_role = $user->roles()->detach($role_id);
        
        $role->delete();
       if($user_permissions && $role_per && $user_role && $role) {
           toast('Success','success');
       } else {
           toast('Ooops ! Something wrong !', 'error');
       }
       return redirect('/user/'. $user_id. '/edit'); 
    }

    public function updateUserPermissions($user_id, $role_id)
    {
        $user = User::find($user_id);
        $role  = Role::find($role_id);
        $permissions = request()->permission;
        //dd($permissions);
        $role_update = $role->permissions()->sync($permissions);
        $user_permission = $user->permissions()->sync($permissions);
        
        if($role_update && $user_permission) {
            toast('Data saved','success');
        } else {
            toast('Ooops! Somethin wrong !','error');
        }
        return redirect('/user/' .$user_id. '/edit');
    }
}

