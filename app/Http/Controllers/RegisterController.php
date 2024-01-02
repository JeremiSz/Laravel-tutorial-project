<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function register(){
        return view('users.register');
    }
    public function store(){
        $attributes = request()->validate([
            'name' => ['required','unique:users,name'],
            'email' => ['required','email'],
            'password' => ['required','min:8'],
        ]);
        $user = User::create([
            'name' => $attributes['name'],
            'email' => $attributes['email'],
            'password' => bcrypt($attributes['password']),
        ]);
        auth()->login($user);
        return redirect('/')->with('success','Your account has been created.');
    }
    public function logout(){
        auth()->logout();
        return redirect('/')->with('success','You have been logged out.');
    }
    public function login(){
        return view('users.login');
    }
    public function start(){
        $attributes = request()->validate([
            'email' => ['required','email'],
            'password' => ['required','min:8'],
        ]);
        if(auth()->attempt($attributes)){
            session()->regenerate();
            return redirect('/')->with('success','You have been logged in.');
        }
        throw \Illuminate\Validation\ValidationException::withMessages(['email' => 'Your provided credentials could not be verified.']);
    }
}