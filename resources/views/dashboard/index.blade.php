@extends('layouts.app') 
@section('page-title')
<h1>
   <i class="fa fa-home"></i> Dashboard
</h1>
@endsection
 
@section('breadcrumb')
<li><a href="#" class="active">Dashboard</a></li>
@endsection
 
@section('content')

<div class="row">
   <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="box box-primary">
         <div class="box-body">
            <div class="x_panel">
               <div class="x_content">
                  <div class="col-md-4">
                     <div class="panel panel-primary text-center">
                        <div class="panel-heading">
                           <i class="fa fa-user fa-2x"></i>
                           <div style="font-size: 25px">User</div>
                        </div>
                        <div class="panel-body">
                           <h2>{{$data['users']}}</h2>
                           <p>Data</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="panel panel-primary text-center">
                        <div class="panel-heading">
                           <i class="fa fa-list fa-2x"></i>
                           <div style="font-size: 25px">Category</div>
                        </div>
                        <div class="panel-body">
                           <h2>{{$data['category']}}</h2>
                           <p>Data</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="panel panel-primary text-center">
                        <div class="panel-heading">
                           <i class="fa fa-tachometer fa-2x"></i>
                           <div style="font-size: 25px">Products</div>
                        </div>
                        <div class="panel-body">
                           <h2>{{$data['products']}}</h2>
                           <p>Data</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="panel panel-primary text-center">
                        <div class="panel-heading">
                           <i class="fa fa-dollar fa-2x"></i>
                           <div style="font-size: 25px">Orders</div>
                        </div>
                        <div class="panel-body">
                           <h2>{{$data['order']}}</h2>
                           <p>Data</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection