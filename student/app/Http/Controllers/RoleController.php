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
        
        $user = User::find($user_id);

        $validateName = request()->validate([
            'name' =>  'required',
            'description' => 'required'
            
        ]);

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

    public function showPermission($id)
    {   
        $permissions = Permission::all();
        $role = Role::find($id);

        return view('user-managment.roles.add-permission', compact('permissions', 'role'));
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
        return $user_id;
    }
}
