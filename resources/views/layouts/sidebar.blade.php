 <ul class="sidebar-menu">
	<li class="{{Request::is('/') ? 'active' : '' }}">
		<a href="{{ route('dashboard.index') }}"><i class="fa fa-home"></i> <span>Dashboard</span></a>
	</li>
	<li class="{{Request::is('users') ? 'active' : '' }}">
		<a href="{{ route('users.index') }}"><i class="fa fa-user"></i> <span>User</span></a>
	</li>
	<li class="{{Request::is('category') ? 'active' : '' }}">
	   <a href="{{ route('category.index') }}"><i class="fa fa-list"></i> <span>Category</span></a>	
	</li>
	<li class="{{Request::is('products') ? 'active' : '' }}">
	   <a href="{{ route('products.index') }}"><i class="fa fa-tachometer"></i> <span>Products</span></a>	
	</li>
	<li class="{{Request::is('orders') ? 'active' : '' }}">
	   <a href="{{ route('orders.index') }}"><i class="fa fa-dollar"></i> <span>Orders</span></a>	
	</li>
</ul>