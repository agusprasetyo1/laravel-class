<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
// use Mail;

class EmailController extends Controller
{
    public function mail(){
        $name = "Agus PRasetyo";
        Mail::to("agusprasetyo1889@gmail.com")->send(new SendMailable($name));

        return "email was sent";

        // try {
    	// 	$data = [
    	// 		"foo" => "bar"
    	// 	];
    	// 	Mail::send('mail', $data, function($message) use($request) {
		//          $message->to($request["to"], 'Laravel Class Malang')->subject('Laravel Basic Testing Mail');
		//          $message->from("no-reply@laravelclass.com",'Laravel Class');
		//     });
		//     echo "Mail sent!";
    	// } catch (\Exception $exception) {
    	// 	return redirect()->back();
    	// }
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('email.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
