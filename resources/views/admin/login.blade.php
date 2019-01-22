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
			background: black;
		}
		
		.valign{
			position: absolute;
			top: 50%;
			transform: translate(-50%, -50%);
			left: 50%;
		}
	</style>
	<title>Look at me Login</title>
	<link href="{{ asset('assets/bootstrap/bootstrap.min.css') }}" rel="stylesheet">

</head>

<body>
	<div class="container">
		<div class="row justify-content-center valign">
			<div class="bg-light p-4">
				<form method="POST" class="form-group login" action="{{ route("admin.login") }}">
					{{ csrf_field() }}
					<h1>Login</h1>
					<input type="email" class="form-control mb-2" name="email" placeholder="Email" required>
					<input type="password" class="form-control mb-2" name="password" placeholder="Password" required>
					<button type="submit" class="btn btn-primary ">Login</button>
					<a class="btn btn-warning" href="{{route('dashboard.index')}}">Kembali</a>
				</form>
			</div>
		</div>
	</div>
</body>

</html>