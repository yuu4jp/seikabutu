<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Requests\PostRequest;
use Cloudinary;
use Illuminate\Support\Facades\Storage;

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
    
    public function create(Request $request,User $user) 
    {
        
        /*$input = $request['user'];
        $user->fill($input)->save();*/
        $validated = $request->validate([
            'name'=>'required|string',
            'email'=>'required',
            'password'=>'required',
            'sex'=>'required|string',
            'age'=>'required|integer',
            'departure'=>'required',
            'master'=>'required',
        ]);
        if($request->file('image')==null){
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'sex' => $request->sex,
                'age' => $request ->age,
                'departure' => $request->departure,
                //'image_url'=> $image_url,
                'master'=>$request->master,
                'training'=>$request->training,
            ]);
        }else{
            $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        //$input += ['image_url' => $image_url];
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'sex' => $request->sex,
                'age' => $request ->age,
                'departure' => $request->departure,
                'image_url'=> $image_url,
                'master'=>$request->master,
                'training'=>$request->training,
            ]);
        }
        return redirect('/master');
        //↑
    }   //２つのやり方があるっぽい
        //↓
    public function task_create(Request $request,Task $task)
    {
        $input = $request['task'];
        $input_id = Auth::id();
        $task->fill($input)->save();  
        //attachメソッドを使って中間テーブルにデータを保存
        $task->users()->attach($input_id);
        return redirect('/staff');
    }
    
    public function task_store(Request $request,Task $task)
    {
        $input = $request['task'];
        $input_id = $request['user_id'];
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
    
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'user.name'=>'required|string',
            'user.sex'=>'required|string',
            'user.age'=>'required|integer',
            'user.departure'=>'required',
        ]);
        $input_user = $request['user'];
        //dd($request->file('image'));
        if($request->file('image')==null){
            $user->fill($input_user)->save();
        }else{
            $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            $input_user += ['image_url' => $image_url];
            $user->fill($input_user)->save();
        }
        
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
    
    public function task_add(Request $request,Task $task)
    {
        $input_task=$request['task'];
        if($request->file('pdf')==null) {
            $task->fill($input_task)->save();
        }
        else {
            $target=$request->file('pdf')->getClientOriginalName();
            //$path=Storage::disk('s3')->put('/',$target,'public');
            $request->file('pdf')->storeAs('public',$target,'s3');
            $path=Storage::disk('s3')->get_public_url(bucket, target_object_path);
            $input_task += ['pdf' => $path];
            $task->fill($input_task)->save();
        }
        return redirect('/staff')->with(['user'=>Auth::user()]);
    }
    
}
