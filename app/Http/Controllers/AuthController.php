<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function create(){
        return view('auth.register');
    }
    public function store(){
        $formData=request()->validate([
            'name'=>['required','min:3','max:255'],
            'username'=>['required','min:3','max:255',Rule::unique('users','username')],
            'email'=>['required','email',Rule::unique('users','email')],
            'password'=>['required','min:8']
        ]);
        $user=User::create($formData);
        auth()->login($user);
        return redirect('/')->with('success','Welcome Mr.'.$user->name);
    }

    public function logout(){
        auth()->logout();
        return redirect('/')->with('success','Good bye (Post malone)');
    }

    public function login(){
       return view('auth.login');
    }

    public function post_login(){
       $formData=request()->validate([
           'email'=>['required','min:3','max:255',Rule::exists('users','email')],
           'password'=>['required','min:8']
       ],[
           'email.required'=>'Your email is empty',
           'password.min'=>'Your password should be more than 8 characters'
       ]);
       if(auth()->attempt($formData)){
           return redirect('/')->with('success','Login success');
       }else{
           return redirect()->back()->withErrors([
               'email'=>'Your consitution failed'
           ]);
       }
    }
}
