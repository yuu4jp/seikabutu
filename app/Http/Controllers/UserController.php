<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function master(User $user)
    {
        return view('users.master')->with(['users'=>$user->get()]);
    }
    
    public function add() 
    {
        return view('users.add');
    }
    
    public function create(Request $request) 
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'sex' => $request->sex,
            'age' => $request ->age,
            'departure' => $request->departure,
            'image'=> $request->image,
            'master'=>$request->master,
        ]);
        return redirect('/master');
        
    }
}
