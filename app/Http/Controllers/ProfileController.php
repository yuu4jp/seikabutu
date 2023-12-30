<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Sistem;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    /*public function create(User $user): View
    {
        if ($user->master=0) {
            return view('user.master');
        } elseif ($user->master=1) {
            return view('user.management');
        } else {
            return view('user.profile');
        }
    }*/
    public function profile(User $user,Training $training,Task $task)
    {   
        if ($user->master=0) {
            return view('user/master')->with(['users'=>$user->get()]);
        } elseif ($user->master=1) {
            return view('user/management')->with(['users'=>$user->get()]);
        } else {
        //DBから情報を引っ張ってきてprofile.blade.phpに{{$user->name}}ってできるようにしてる
        return view('users/profile')->with(['users'=>$user->get(), 'trainings'=>$training->get(), 'tasks'=>$task->get()]);
        }
    }
    
    public function create(Request $request,User $user)
    {
        $input = $request['user'];
        $user->fill($input)->save();
        return redirect('/user/master');
    }
    
    public function add()
    {
        return view('users/add');
    }
    
    public function master()
    {
        return view('users/master');
    }
    
    public function edition(User $user)
    {
        return view('users/edit')->with (['user'=>$user]);
    }
    
    public function updated(PostRequest $request, Post $post)
    {
        $input_user = $request['user'];
        $user->fill($input_user)->save();
    
        return redirect('users/master' . $user->id);
    }
    
    public function customize(User $user)
    {
        return view('users/customize')->with(['user'=>$user]);
    }
    
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }
    
    public function pdf(Request $request, Task $task)
    {//profile.blade.phpのモーダルからの情報を保存
        $input = $request['task'];
        $task->fill($input)->save();
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
