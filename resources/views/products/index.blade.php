@extends('layouts.app')

@section('page-title')
<h1>
    <i class="fa fa-tachometer"></i> Products
</h1>
@endsection

@section('breadcrumb')
<li><a href="#">Dashboard</a></li>
<li class="active">Products</li>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="x_panel">
                        <div class="x_title">
                            <h3>Cari</h3>
                        </div>
                        <div class="x_content">
                            <form class="form-inline" action="{{ route('products.index') }}" method="get">
                                <div class="form-group">
                                    <input type="text" name="name" placeholder="Product name" value="{{ Request::get('name') }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="category" placeholder="Category name" value="{{ Request::get('category') }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-search"><i class="fa fa-search"></i> </button>
                                </div>
                                <a href="{{ route('products.index') }}" class="btn btn-info btn-search pull-right"><i class="fa fa-database"></i> Tampilkan Semua</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="x_panel">
                        <div class="x_title">
                            <h3>List Products
                            <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add New
                            </a>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="table-responsive">
                                <table class="table table-striped jambo_table bulk_action table-hover" style="text-align: center">
                                    <thead>
                                    <tr>
                                        <th style="text-align: center;">#</th>
                                        <th style="text-align: center;">Name</th>
                                        <th style="text-align: center;">Category</th>
                                        <th style="text-align: center;">Stock</th>
                                        <th style="text-align: center;">Price</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data['products'] as $product)
                                        <tr>
                                            <td>{{ $number++ }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->category->name }}</td>
                                            <td>{{ $product->stock }}</td>
                                            <td>{{ toRupiah($product->price) }}</td> <!--MEnggunakan helper untuk konversi-->
                                            <td class="text-center">
                                                <a href="{{ route('products.edit', ['id' => $product->id]) }}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
                                                <a onclick="return confirm('Delete this data ?')" href="{{ route('products.delete', ['id' => $product->id]) }}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="clearfix"></div>
                                <div class="text-center">
                                    {{$data['products']->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
