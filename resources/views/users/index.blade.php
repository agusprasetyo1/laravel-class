@extends('layouts.app')

@section('page-title')
<h1>
    <i class="fa fa-tachometer"></i> Products
</h1>
@endsection

@section('breadcrumb')
   <li><a href="#">Dashboard</a></li>
   <li class="active">Users</li>
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
                            <form class="form-inline" action="{{ route('users.index') }}" method="get">
                                <div class="form-group">
                                    <input type="text" name="keyword" placeholder="Nama / E-mail" value="{{ Request::get('keyword') }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-search"><i class="fa fa-search"></i> </button>
                                </div>
                                <a href="{{ route('users.index') }}" class="btn btn-info btn-search pull-right"><i class="fa fa-database"></i> Tampilkan Semua</a>
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
                            <h3>List Users
                            <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add New </a>
									<div class="btn-group" style="float: right;">
										<a href="#" class="btn btn-info" title="Print PDF"><i class="fa fa-print"></i> Print PDF</a>
										<a href="{{ route('users2.download') }}" class="btn btn-warning" title="Menggunakan box/spout"><i class="fa fa-print"></i> Print XLS/excel</a>
										<a href="{{route('users1.download')}}" class="btn btn-primary" title="Menggunakan Maatwebsite"><i class="fa fa-print"></i> Print XLS/excel</a>
									</div>
										  <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="table-responsive">
                                <table class="table table-striped jambo_table bulk_action table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
													<?php $nomer = 1 ?>
													@foreach($data['users'] as $key => $user)
                                        <tr>
                                            <td>{{ $number++ }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('users.show', ['id' => $user->id]) }}" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>
                                                <a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
                                                <a onclick="return confirm('Delete this data ?')" href="{{ route('users.delete', ['id' => $user->id]) }}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="clearfix"></div>
                                <div class="text-center">
                                    {{$data['users']->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
