<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Admin;
// use Illuminate\Support\Facades\Auth;

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
				return redirect()->route('dashboard.index'); 
    			return response()->json(\Auth::user()); //Autern
    			// return response()->json('Login berhasil');
    		}else{
				return redirect()->route('admin.show_login');
    			// return response()->json('Login failed') => untuk merespon ketika dijalankan;
    		}
    	} catch (Exception $e) {
    		dd($e);
    	}

	 }
	 
	 public function logoutData(){
		 \Auth::logout();
		 return redirect()->route('admin.show_login');
	 }

	 public function formRegister(){
		return view('admin.register');
	 }

	 public function register(Request $request){
		$request->validate([
			'name' 	  => 'required|string|max:50',
			'username' => 'required|string|max:50',
			'email'    => 'required|email',
			'password' => 'required|min:6|confirmed' 
		]);
			
		// Admin::create($request->only('name', 'email', 'password'));
		Admin::create([
			'name'     => $request->name,
			'username' => $request->username,
			'email' 	  => $request->email,
			'password' => Bcrypt($request->password)
		]);
		
		return redirect()->route('admin.show_login');
		 
	 }
}
