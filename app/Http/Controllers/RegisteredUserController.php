<?php

namespace App\Http\Controllers;


use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegisteredUserController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function store()
    {

        //validate
        $validatedAttributes = request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required','email','max:254'], //email_confirmation
            'password' => ['required',Password::min(6), 'confirmed'], // password_confirmation
        ]);

        //create user
        $user = User::create($validatedAttributes);

        //login
        Auth::login($user);
        //redirect somewhere
        return redirect('/tasks');

    }
}
