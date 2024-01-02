<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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
    
    public function task_create(Request $request,Task $task)
    {
        $input = $request['task'];
        $task->fill($input)->save();   //2つのやり方が
        /*User::create([　　　　　　　 //あるっぽい
            'task' => $request->name,
            'comment' => $request->comment,
            'pdf' => $request->pdf,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);*/
        return redirect('/staff');
    }
    
    public function staff(User $user) 
    {
        return view('users.staff')->with(['user'=>Auth::user()]);
    }
    
    public function management(User $user)
    {
        return view('users.management')->with(['users'=>$user->get()]);
    }
    
    public function customize(User $user,Task $task)
    {
        return view('users.customize')->with(['user' => $user,'task'=>$task]);
     //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
    }
    
    public function edit(User $user)
    {
        return view('users.edit')->with(['user'=>$user]);
    }
    
    public function update(Request $request, User $user)
    {
        $input_user = $request['user'];
        $user->fill($input_user)->save();
    
        return redirect('/users/' . $user->id);
    }
    
    public function employee(User $user)
    {
        return view('users.employee')->with(['user'=>$user]);
    }
}
