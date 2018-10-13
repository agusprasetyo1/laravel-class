<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
      //Cara 1
      // $cari = User::query();
      // if (isset($request->name) and $request->name != "") {
         // $cari->where('name', 'LIKE', '%'. $request->name . '%');
         // $cari->where('name', 'LIKE', '%' . $request->name . '%');
         // $cari = User::where('name', 'LIKE', '%' .$value. '%')->get();
      // }
      $pagination = 5;
      // Cara 2
      $data['users'] = User::when($request->keyword, function ($query) use ($request){
         $query->where('name', 'like', "%{$request->keyword}%" )
               ->orWhere('email', 'like', "%{$request->keyword}%");
      })->paginate($pagination);

      //Append adalah sebuah method yang berfungsi untuk memastikan bahwa query string yang boleh ditambahkan hanya yang diinisialisasi
      $data['users']->appends($request->only('keyword'));
      
      $number = 1;
      if (request()->has('page') && request()->get('page') > 1) {
        $number += (request()->get('page') - 1) * $pagination;
      }
      // $data['users'] = $cari->paginate(5);
      // $data['users'] = User::all();
      // 
      return view("users.index", compact('data', 'number'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Cara 1
        // User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => $request->password
        // ]);
        // Cara 2
        $request->validate([
            'name'     => 'required|string|max:50',
            'email'    => 'required|email',
            'password' => 'required' 
        ]);

        User::create($request->only('name', 'email', 'password'));

        return redirect()->route('users.index');
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
        $data['users'] = User::find($id);

        return view('users.edit', compact('data'));
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
        // User::where('id', '=', $id)->update($request->only('name', 'email'));
        User::find($id)->update($request->all());
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // User::where('id', '=', $id)->delete();
        User::find($id)->delete();
        return redirect()->route('users.index');

    }
}
