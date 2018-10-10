@extends('layouts.app')

@section('page-title')
<h1>
    <i class="fa fa-user"></i> Users
</h1>
@endsection

@section('breadcrumb')
    <li><a href="#">Dashboard</a></li>
    <li><a href="{{ route('users.index') }}">Users</a></li>
    <li class="active">Edit Data</li>
@endsection

@section('content')
 <div class="row">
    <div class="col-md-8 col-sm-8 col-xs-8 ">
        <div class="box box-primary">
            <div class="x_panel">
                <div class="x_content">
                    <div class="box-body">
                        <form action="{{ route('users.update', ['id' => $data['users']->id]) }}" method="post">
                            {{ csrf_field() }}      
                            <input type="hidden" name="_method" value="PUT">                      
                            <div class='form-group row'>
                                <label class='col-md-3 control-label'>Name</label>
                                <div class='col-md-7'>
                                    <input type='text' class='form-control' name='name' placeholder="Product Name" required value="{{ $data['users']->name }}">
                                </div>
                            </div>
                            <div class='form-group row'>
                                <label class='col-md-3 control-label'>Email</label>
                                <div class='col-md-7'>
                                    <input type='email' class='form-control' name='email' placeholder="Email" required value="{{ $data['users']->email }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-offset-3 col-sm-5">
                                    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Save</button>
                                    <a href="{{ route('users.index') }}" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> Back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
