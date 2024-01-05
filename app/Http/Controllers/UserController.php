<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Requests\PostRequest;

class UserController extends Controller
{
    use SoftDeletes;
    
    public function master(User $user)
    {
        return view('users.master')->with(['users'=>$user->get()]);
    }
    
    public function add(User $user) 
    {
        return view('users.add')->with(['user'=>$user]);
    }
    
    public function create(PostRequest $request,User $user) 
    {
        $input = $request['user'];
        $user->fill($input)->save();
        
        /*User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'sex' => $request->sex,
            'age' => $request ->age,
            'departure' => $request->departure,
            'image'=> $request->image,
            'master'=>$request->master,
            'training'=>$request->training,
        ]);*/
        return redirect('/master');
        //↑
    }   //２つのやり方があるっぽい
        //↓
    public function task_create(Request $request,Task $task)
    {
        $input = $request['task'];
        $input_id =Auth::id();
        $task->fill($input)->save();  
        //attachメソッドを使って中間テーブルにデータを保存
        $task->users()->attach($input_id);
        return redirect('/staff');
    }
    
    public function task_store(Request $request,Task $task)
    {
        $input = $request['task'];
        //for ($i=0;$i==100;$i++) {
        $input_id = $request->users_array;
       // };
        $task->fill($input)->save();
        $task->users()->attach($input_id);
        return redirect('/management');
    }
    
    public function staff(User $user,Task $task) 
    {
        return view('users.staff')->with(['user'=>Auth::user(),'tasks'=>$task->get()]);
    }
    
    public function management(User $user)
    {
        return view('users.management')->with(['users'=>$user->get()]);
    }
    
    public function customize(User $user,Task $task)
    {
        return view('users.customize')->with(['user' => $user,'tasks'=>$task->get()]);
     //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
    }
    
    public function edit(User $user)
    {
        return view('users.edit')->with(['user'=>$user]);
    }
    
    public function update(PostRequest $request, User $user)
    {
        $input_user = $request['user'];
        $user->fill($input_user)->save();
    
        return redirect('/users/' . $user->id);
    }
    
    public function employee(User $user,Task $task)
    {
        return view('users.employee')->with(['user'=>$user,'tasks'=>$task->get()]);
    }
    
    public function task_delete(Task $task,User $user)
    {
        $task->delete();
        return redirect('/staff')->with(['user'=>Auth::user()]);
    }
    
    public function user_delete(User $user)
    {
        $user->delete();
        return redirect('/master')->with(['users'=>$user->get()]);
    }
    
    public function back(User $user)
    {
        return view('users.master')->with(['users'=>$user->get()]);
    }
}
