<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();

        return view('user-managment.permissions.index', compact('permissions'));
    }
    
    public function create() 
    {
        $validateName = request()->validate([
            'name' =>  'required',
            'description' => 'required',
            'type' => 'required'
        ]);

        if($validateName) {
            $permission = Permission::create([
                'name' => request('name'),
                'description' => request('description'),
                'slug'=> Str::slug(request('name'), '-'),
                'type' => request('type')
            ]);

            toast('Permission created', 'success');
        } else {
            toast('Something wrong !', 'warning');
        }

        return redirect('/permissions');
    }

    public function delete($id)
    {
        $delete = Permission::where('id', $id)->delete();

        if($delete) {
            toast('Successfully deleted !', 'success');
        } else {
            toast('Something wrong !', 'errror');
        }

        return redirect('/permissions');
    }

    public function edit($id)
    {
        $permission = Permission::find($id);

        return response()->json($permission);
    }

    /*public function update($id)
    {   
      $permission = Permission::where('id',$id)->firstOrFail();

       $validate = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'type' => 'required',
        ]);

        if($validate) {
            $permission->name = request()->name;
            $permission->description = request()->description;
            $permission->slug = Str::slug(request()->name);
            $permission->type = request()->type;
        }

        if($permission->save()) {
            toast('Data saved', 'success');
        } else {
            toast('Something wrong !', 'warning');
        }
        return redirect('/permissions');
    }*/
}
