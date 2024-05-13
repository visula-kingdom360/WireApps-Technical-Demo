<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $loginValidation = [
        'username' => [
            'required',
            'min:3',
            'max:25',
            'string'
        ],
        'password' => [
            'required',
            'min:3',
            'max:25',
            'string'
        ]
    ];

    protected $loginErrorResponse = [
        'username.required' => 'Username cannot be empty',
        'username.min' => 'Give atleast 3 charatcters',
        'username.max' => 'Give less than 25 characters',
        'password.required' => 'Password cannot be empty',
        'password.min' => 'Give atleast 8 charatcters',
        'password.max' => 'Give less than 25 characters'
    ];

    public function login()
    {
        return view('user.login');

    }

    public function register()
    {
        // $customers = Customer::get();
        // return $customers;
        return view('user.register');

    }
    public function verification(Request $request)
    {
        $request->validate($this->loginValidation, $this->loginErrorResponse);

        $userInfo = User::where(['username' => $request->username, 'password' => $request->password])->get();

        if(count($userInfo) == 0){
            return redirect('login')->with('status', 'Username or Password is incorrect');
        }
        // if($request->password != $userInfo->password){
        //     return redirect('login')->with('status', 'Password is incorrect');
        // }
        
        return redirect('user/home')->with('status', 'Logged in successful');;
    }

    public function home(){
        return view('user.home');
    }
}
