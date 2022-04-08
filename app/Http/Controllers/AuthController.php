<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function Login(Request $request){

    	try{

    		if (Auth::attempt($request->only('email','password'))) {
    			$user = Auth::user();
    			$token = $user->createToken('app')->accessToken;

    			return response([
    				'message' => "Successfully Login",
    				'token' => $token,
    				'user' => $user
    			],200); // States Code
    		}

    	}catch(Exception $exception){
    		return response([
    			'message' => $exception->getMessage()
    		],400);
    	}
    	return response([
    		'message' => 'Invalid Email Or Password'
    	],401);

    } // end method



    public function Register(Request $request){

        $this->validate($request,[
            'name' => 'required|max:55',
            'email' => 'required|unique:users|min:5|max:60',
            'password' => 'required|min:6|confirmed'
        ]);

    	try{

    		$user = User::create([
    			'name' => $request->name,
    			'email' => $request->email,
    			'password' => Hash::make($request->password)
    		]);
    		$token = $user->createToken('app')->accessToken;

    		return response([
    			'message' => "Registration Successfull",
    			'token' => $token,
    			'user' => $user
    		],200);

	    	}catch(Exception $exception){
	    		return response([
	    			'message' => $exception->getMessage()
	    		],400);
	    	}

    } // end mehtod
}
