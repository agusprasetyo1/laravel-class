@extends('layouts.app')

@section('page-title')
<h1>
    <i class="fa fa-user"></i> Users
</h1>
@endsection

@section('breadcrumb')
<li><a href="#">Dashboard</a></li>
<li><a href="{{ route('products.index') }}">Users</a></li>
<li class="active">Add New</li>
@endsection

@section('content')
 <div class="row">
    <div class="col-md-8 col-sm-8 col-xs-8">
        <div class="box box-primary">
            <div class="x_panel">
                <div class="x_content">
                    <div class="box-body">
                      <div class='form-group row'>
                          <label class='col-md-3 control-label'>Name</label>
                          <div class='col-md-7'>
                              <font class="control-label">{{$user->name}}</font>
                          </div>
                      </div>
                      <div class='form-group row'>
                          <label class='col-md-3 control-label'>Email</label>
                          <div class='col-md-7'>
                              <font class="control-label">{{$user->email}}</font>
                          </div>
                      </div>
                     <div class="x_content">
                        <div class="table-responsive">
                           <table class="table table-striped jambo_table bulk_action table-hover">
                              <thead>
                                 <th>Name</th>
                                 <th>Category</th>
                                 <th>Price</th>
                              </thead>
                              <tbody>
                                 @if(count($user->products) == 0)
                                 <tr>
                                    <td colspan="3" class="text-center">Nothing data avaliable</td>
                                 </tr>
                                 @else
                                    @foreach($user->products as $item)
                                       <tr>
                                          <td>{{$item->name}}</td>
                                          <td>{{$item->category->name}}</td>
                                          <td>Rp. {{$item->price}}</td>
                                       </tr>
                                    @endforeach
                                 @endif
                                 {{-- Cara di module --}}

                                 {{-- @forelse($user->products as $item)
                                 <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->category->name}}</td>
                                    <td>{{$item->price}}</td>
                                 </tr>
                                 @empty
                                 <tr>
                                    <td colspan="3" class="text-center">Tidak ada data</td>
                                 </tr>                 --}}                    
                                    {{-- <td>{{$user->products->name}}</td> --}}
                                 {{-- @endforelse --}}
                              </tbody>
                           </table>
                        </div>
                     </div>
                      <div class="form-group row text-center">
                          <div class="col-sm-offset-3 col-sm-5">
                              <a href="{{ route('users.index') }}" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> Back</a>
                          </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
