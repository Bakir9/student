<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


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
        ]);
        
        $user = User::find($user_id);

        if($validateName) {
            $role = Role::create([
                'name' => request('name'),
                'description' => request('description')
            ]);

            toast('Role created', 'success');
        } else {
            toast('Something wrong !', 'warning');
        }

        $roleId = Role::all()->last();
        $user->roles()->attach($roleId);
       
        return redirect('/roles');
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

    public function showRolePermissions($id)
    {   
       /* $permissions = Permission::all();
        $role = Role::find($id);
        $roles_permissions = $role->permissions;*/
        
        dd( Permission::whereHas('roles.users',function ($query) {
            $query->where('id',$this->id);
        })->get());
        

        //return view('user-managment.roles.add-permission', compact('permissions', 'role','roles_permissions'));
    }

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
        $role_id = request()->role_id;
        $validatePermissions = request()->validate([
            'permission' => 'required'
        ]);
        $role = Role::find($role_id);
        $permissions = request()->permission;
        $addRole = $role->permissions()->attach($permissions);
        if($addRole){
            toast('Saved', 'success');
        } else {
            toast('Error','warning');
        }
        

        return redirect()->back();
        //return redirect('/roles');
    }
}
