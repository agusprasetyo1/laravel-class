<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport; //Untuk memanggil export data untuk export data 
use App\Imports\UsersImport; //UNtuk import data
use Maatwebsite\Excel\Facades\Excel; // Menggunakan Maatwebsite
use Illuminate\Support\Facades\Cache; // digunakan untuk menginisialisasi cache

use Box\Spout\Reader\ReaderFactory; //Untuk membaca file excel yang di upload/import pada box/spout
use Box\Spout\Writer\WriterFactory; //Membuat file excel yang diexports di pada database
use Box\Spout\Common\Type; //Menginisialisasi tipe yang digunakan untuk import ataupun export

use App\User;


class UsersController extends Controller
{
	public $i = 1;

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
		$data['users'] = User::when($request->keyword, function ($query) use ($request) {
			$query->where('name', 'like', "%{$request->keyword}%")
				->orWhere('email', 'like', "%{$request->keyword}%");
		})->orderBy('id', 'asc')->paginate($pagination);

      //Append adalah sebuah method yang berfungsi untuk memastikan bahwa query string yang boleh ditambahkan hanya yang diinisialisasi, biasannya untuk pencarian
		$data['users']->appends($request->only('keyword'));

		$number = numberPagination($pagination);
      // $data['users'] = $cari->paginate(5);
      // $data['users'] = User::all();

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
			'name' => 'required|string|max:50',
			'email' => 'required|email',
			'password' => 'required'
		]);
			// $password = bcrypt($request->password);

		// User::create($request->only('name', 'email', 'password'));
		User::create([
			'name' 	  => $request->name,
			'email'    => $request->email,
			'password' => Bcrypt($request->password)
		]);
		return redirect()->route('users.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Request $request, $id)
	{
		$user = User::find($id);
		$total = 0;
		foreach ($user->products as $data) {
			$total += $data->price;
		}
		return view("users.show", compact('user', 'total'));
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

	public function export_excel1() //export data menggunakan Maatwebsite
	{
		return Excel::download(new UsersExport, 'users.xlsx');
		return redirect()->route('users.index');
	}

	public function import_excel1() //import data menggunakan Maatwebsite
	{
		Excel::import(new UsersImport, 'users.xlsx');

		return redirect('/')->with('success', 'All good!');
	}

	public function export_excel2() //export data menggunakan box/spout
	{
		$title = ['no' ,'name', 'email'];
		$filename = 'Export excel.xlsx';
		$writer = WriterFactory::create(Type::XLSX); //untuk type XLSX
		$users = User::select('*'); //mendapatkan seluruh data pada database [ menggunakan select('*') tidak eloquent]

		$writer->openToBrowser($filename); //stream data directly to the browser [menampilkan data/melakukan eksekusi langsung]
		$writer->addRow($title);
		$users->chunk(500, function($datas) use ($writer){
			foreach ($datas as $data) {
				$writer->addRow([
					$this->i++,
					$data->name,
					$data->email
				]); //Menambahkan data perbaris
			}
		});

		$writer->close();
		exit();
	}

	public function testCache() //Test menggunakan cache
	{
		$value = Cache::remember('Users', 2, function () {
			return User::first(); //mengambil data paling atas
		});

		dd($value);
	}

}
