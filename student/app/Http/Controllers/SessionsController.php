<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Session;

class SessionsController extends Controller
{
    public function checkActiveUsers()
    {
        $active = Session::all();
    }
    public function destroy()
    {
        auth()->logout();
        return redirect()->to('/loginProba')->with('Uspjesna odjava');
    }
}
