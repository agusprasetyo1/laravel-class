@extends('layouts.app')

@section('page-title')
<h1>
    <i class="fa fa-dollar"></i> Orders
</h1>
@endsection

@section('breadcrumb')
   <li><a href="#">Dashboard</a></li>
   <li class="active">Orders</li>
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
                            <form class="form-inline" action="{{ route('orders.indexuser') }}" method="get">
                                <div class="form-group">
                                    <input type="text" name="keyword" placeholder="Nama / E-mail" value="{{ Request::get('keyword') }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-search"><i class="fa fa-search"></i> </button>
                                </div>
                                <a href="{{ route('orders.indexuser') }}" class="btn btn-info btn-search pull-right"><i class="fa fa-database"></i> Tampilkan Semua</a>
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
                           
                            {{-- <a href="{{ route('orders.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add New --}}
                            </a>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">
                            <div class="table-responsive">
                                <table class="table table-striped jambo_table bulk_action table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="text-center">User's name</th>
                                        <th class="text-center">User's Products</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data['orders'] as $key => $ord)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td class="text-center">{{ $ord->dataUser->name }}</td>
                                            <td class="text-center">{{ $ord->dataProducts->name }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('orders.userProducts', ['id' => $ord->id]) }}" class="btn btn-xs btn-success"><i class="fa fa-search"></i></a>
                                                {{-- <a href="{{ route('orders.edit', ['id' => $order->id]) }}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a> --}}
                                                {{-- <a onclick="return confirm('Delete this data ?')" href="{{ route('orders.delete', ['id' => $order->id]) }}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="clearfix"></div>
                                <div class="text-center">
                                    {{-- {{$data['users']->links()}} --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
