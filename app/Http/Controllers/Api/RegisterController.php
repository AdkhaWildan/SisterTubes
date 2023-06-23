<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use GuzzleHttp\Client;

class RegisterController extends Controller
{
    public function index(){
        return view('register', [
            'title' => 'Register',
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:8|confirmed'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        return redirect('/login')->with('success', 'Registration Successfull!! Please Login');
    }
}