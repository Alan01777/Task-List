<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function redirectIndex()
    {
        if (Auth::check()) {
            return redirect()->route('tasks.index');
        }

        return redirect()->route('user.login');
    }

    public function userLogin()
    {
        if (Auth::check()) {
            return redirect()->route('tasks.index');
        }
        return view('user.login');
    }

    public function userCreate()
    {
        return view('user.create');
    }

    public function userAuth(UserRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/tasks');
        }
        return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function userStore(UserRequest $request)
    {
        $user = User::create($request->validated());
        return redirect()->route('user.login')->with('status', 'User created!');
    }

    public function userShow(User $user)
    {
        return view('user.show', ['user' => $user]);
    }

    public function userLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect()->route('user.login');
    }

    public function userEdit(User $user)
    {
        return view('user.edit', ['user' => $user]);
    }

   public function userUpdate(User $user, UserRequest $request)
   {
       $user->update($request->validated());
       return redirect()->route('user.show', ['user' => $user->id])->with('status', 'User Updated!');
   }

   public function userDestroy(User $user)
   {
       $user->delete();
       return redirect()->route('user.login')->with('status', 'User Deleted!');
   }
}
