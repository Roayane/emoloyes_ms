<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomAuthController extends Controller
{

    public function customRegistration(Request $request){
        $request -> validate([
            'name'=> 'required',
            'lastname'=> 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6'
        ]);
        $data =$request->all();
        $check = $this ->create($data);
        return redirect("/")->withSuccess('you have signed in');
    }
    public function create(array $data){
        return User::create([
            'name'=> $data['name'],
            'lastname'=> $data['lastname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    public function customLogin(Request $request){
        $request -> validate([

            'email' => 'required',
            'password' => 'required'
        ]);
        $credentials =$request->only('email','password');
        if(Auth::attempt($credentials)){



                    return view('home');


        }
        return redirect("login")->withErrors('email or password not valide');
    }
    public function accessHome(){
        if(Auth::check()){
            return view('admin.dashboard');
        }
        return redirect("login")->withErrors('you are not allowed to access');
    }
    public function logout(){
        session()->flush();
        Auth::logout();

        return redirect('/');
    }
}
