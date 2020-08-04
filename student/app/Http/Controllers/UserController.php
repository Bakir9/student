<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\User;
use App\Blog;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Foundation\Validation\ValidatesRequests;

use RealRashid\SweetAlert\Facades\Alert;


class UserController extends Controller
{   
    public function userLogin(Request $request)
    {   
        $messages = [
            'username.required' => 'Username cannot be empty',
            'password.required' => 'Password cannot be empty'
        ];
        
        $request->validate ([
            'username' => 'required',
            'password' => 'required'
           
        ], $messages );
     
        $userCredentials = $request->only('username', 'password');
       
       if(Auth::attempt($userCredentials))
        {   
            return view('index');
        } else {
            return back()->withErrors([
                'message' => 'Incorrect username or password'
            ]);
      }
    }

    public function store()
    {
        $messages = [
            'first_name.required' => 'First name cannot be empty',
            'last_name.required' => 'Last name cannot be empty',
            'e_mail.required' => 'E-mail cannot be empty',
            'phone.required' => 'Password cannot be empty',
            'username.required' => 'Username cannot be empty',
            'password.required' => 'Password cannot be empty',
            'type.required' => 'Must select group'
        ];

        $validatedUser = $this->validateUser();
        
        if($validatedUser) {
            User::create([
                'first_name' => request('first_name'),
                'last_name' => request('last_name'),
                'e_mail' => request('e_mail'),
                'phone' => request('phone'),
                'username' => request('username'),
                'password' => Hash::make(request('password')),
                'type' => request('type')            
                ]);
                
                toast('User created !', 'success');
            
        } else {
            toast('Validation failed !', 'error');
        }
        return redirect('/users');
    }

    /**Count users, active and disabled */
   public function count_user(Request $request)
    {
        $users = User::all(); 
        $all_users = $users->count();
        $active_user = User::where('active', 1)->count();
        
        return view('dashboard.user-dashboard.all_users', [
            'users' => $users,
            'active_user' => $active_user,
            'all_users' => $all_users
        ]);
    }

    /**Delete user */
    public function deleteUser($id){
       
       $delete = User::where('id', $id)->delete();

       if($delete)
       {
        toast('Successfully deleted !', 'success');
       } 
       else 
       {
        toast('Not deleted!', 'error');
       }
        
        return redirect('/users');
    }

    public function editUser(User $user){
        
        return view ('dashboard.user-dashboard.edit_profile', compact('user'));
    }

    /**update users data */
    public function update(User $user)
    {
       $updateUser =  $user->update(request()->validate([
            'e_mail' => 'required',
            'phone' => 'required',
            'username' => 'required'  
        ]));

        if($updateUser) {
            toast('Data updated !', 'success');
        } else {
            toast('Something wrong !', 'error');
        }

        return redirect('/user/' .$user->id. '/edit');
    }

    /**Change status from user active <-> disabled */
    public function statusChange($user)
    {
        $user_status = User::find($user);

        if($user_status->active == '0'){
            $user_status->active = '1';
            $user_status->save();

                if($user_status)
                {
                    toast('Status changed !', 'success');

                    return redirect ('/users');
                }
                else {
                    toast('Something wrong !', 'error');
                }
        } else if ($user_status->active == '1'){
            $user_status->active = '0';
            $user_status->save();

                if($user_status)
                {
                    toast('Status changed !', 'success');

                    return redirect ('/users');
                }
                else {
                    toast('Something wrong !', 'error');
                }
        } else {
            toast('Something wrong !', 'error');
        }
        return redirect ('/users');
    }

    /**metoda za validaciju requesta koji kupi informacije o useru, ista validacija se koristi na vise mjesta */
    public function validateUser()
    {
        return request()->validate([

            'first_name' => 'required',
            'last_name' => 'required',
            'e_mail' => 'required',
            'phone' => 'required',
            'username' => 'required',
            'password' => 'required',
            'type' => 'required'
        ]);
    }

    public function updatePassword()
    {
        request()->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'confirm_password' => ['same:new_password']
        ]);

        $password_updated = User::find(auth()->user()->id)->update(['password' => Hash::make(request()->new_password)]);

        if($password_updated)
        {
           toast('Password updated !', 'success');
            
            return redirect('/users');
        } 
        else {
            toast('Something wrong !', 'error');
        }
    }

    public function showRole()
    {
        
    }
}
