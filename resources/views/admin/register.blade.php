<!doctype html>
<html>

<head>
	<style>
		.login{
			width: 400px;
			text-align: center;
			border-radius: 0;
		}
		
		.login input[type=text]{
			/* background: black; */
		}
		
		.valign{
			position: absolute;
			top: 50%;
			transform: translate(-50%, -50%);
			left: 50%;
		}
	</style>
	<title>Register</title>
	<link href="{{ asset('assets/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body>
	<div class="container">
		<div class="row justify-content-center valign">
			<div class="bg-light p-4">
				<form method="POST" class="form-group login" action="{{route('admin.register')}}">
					{{ csrf_field() }}

					<h1>Register Admin</h1>
               <div class="mt-3">
						<input type="text" class="form-control mb-2" name="name" placeholder="Name" required autofocus value={{ old('name') }}>
						<input type="text" class="form-control mb-2" name="username" placeholder="Username" required autofocus value={{ old('username') }}>
                  <input type="email" class="form-control mb-2" name="email" placeholder="Email" required autofocus value={{ old('email') }}>
                  <input type="password" class="form-control mb-2" name="password" placeholder="Password" required autofocus>
                  <input type="password" class="form-control mb-2" name="password_confirmation" placeholder="Confirm password" required autofocus>
						@if ($errors->all())
						<div class='alert alert-danger'>
							Data tidak bisa ditambah
						</div>
						@endif
						<div class="mt-3">
                     <button type="submit" class="btn btn-primary ">Register</button>
                     <a class="btn btn-warning" href="{{route('dashboard.index')}}">Kembali</a>
                  </div>
               </div>
				</form>
			</div>
		</div>
	</div>
	<script src="{{ asset('assets/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
</body>

</html>