<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Category;

class ProductsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(request $request)
	{
        // $data['products'] = Products::all();
        // $data['products'] = Category::where("name", "like", "%$request->name%")->get();
        // $data['products'] = Category::paginate(5);
			//   dd($request->query('category'));
		$product = Products::whereHas('category')->get();
			// dd($product);
		$pagination = 5;

		if ($request->query('category') != null) {
			$data['products'] = Products::whereHas('category', function ($query) use ($request) { //menggunakan nama category
				$query->where('name', 'like', "%{$request->category}%");
			})->paginate($pagination);
		} else {
			$data['products'] = Products::when($request->name, function ($query) use ($request) { //mengunakan nama product
				$query->where('name', 'like', "%{$request->name}%");
			})->paginate($pagination);
		}


		$data['products']->appends($request->only('name'));

		$number = numberPagination($pagination);

		return view('products.index', compact('data', 'number'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$data['category'] = Category::all();
		return view('products.create', compact('data'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$request->validate([
			'name' => 'required',
			'stock' => 'required',
			'price' => 'required'
		]);

		Products::create($request->all());

		return redirect()->route('products.index');
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

		$data['product'] = Products::find($id);
		$data['category'] = Category::all();

		return view('products.edit', compact('data'));
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
		Products::find($id)->update($request->all());
		return redirect()->route('products.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		Products::find($id)->delete();
		return redirect()->route('products.index');
	}
}
