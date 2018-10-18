<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Admin;

class AdminController extends Controller
{
    public function showLogin(){
    	return view("admin.login");
    }


    public function doLogin(Request $request)
    {
    	$dataUser = array(
    		'email' => $request->email,
    		'password' => $request->password
    	);
    	try {
    		// dd(Hash::check('agus', '$2y$10$Ete5yAEaQyRceFiImU6GWOKAxLnmUMjNvmli17cocY1kcek1wVqOG'));
    		// dd(\Auth::attempt($dataUser));
    		
    		if (\Auth::attempt($dataUser)) {
    			return response()->json(\Auth::user()); //Autern
    			// return response()->json('Login berhasil');
    		}else{
    			return response()->json('Login failed');
    		}
    	} catch (Exception $e) {
    		dd($e);
    	}

    }
}
