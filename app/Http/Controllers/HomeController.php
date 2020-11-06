<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
// tipe 2 required
use Validator;
// tipe 3 required
use App\Http\Requests\CreateUserRequest;

class HomeController extends Controller
{
    public function create()
    {
        return view('create_user');
    }

    public function store1(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'password'  => 'required|min:5',
            'email'     => 'required|email|unique:users'
        ]);

        $user           = new User;
        $user->name     = $request->name;
        $user->password = bcrypt($request->password);
        $user->email    = $request->email;
        $user->save();
      
        return back()->with('success', 'User created successfully.');
    }

    public function store2(Request $request)
    {
        $rules = [
            'name'          => 'required',
            'password'      => 'required|min:5',
            'email'         => 'required|email|unique:users'
        ];

        $messages = [
            'name.required'          => 'Nama wajib diisi.',
            'password.required'      => 'Password wajib diisi.',
            'password.min'           => 'Password minimal diisi dengan 5 karakter.',
            'email.required'         => 'Email wajib diisi.',
            'email.email'            => 'Email tidak valid.',
            'email.unique'           => 'Email sudah terdaftar.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $user           = new User;
        $user->name     = $request->name;
        $user->password = bcrypt($request->password);
        $user->email    = $request->email;
        $user->save();
      
        return back()->with('success', 'User created successfully.');
    }

    public function store3(CreateUserRequest $request)
    {
        $user           = new User;
        $user->name     = $request->name;
        $user->password = bcrypt($request->password);
        $user->email    = $request->email;
        $user->save();
      
        return back()->with('success', 'User created successfully.');
    }
}
