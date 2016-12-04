<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>The Pirate Store</title>
		<link rel="stylesheet" href='{{ asset("css/bootstrap.min.css") }}'>
		<link rel="stylesheet" href='{{ asset("css/login.css") }}'>
		<link rel="stylesheet" href='{{ asset("css/registro.css") }}'>
	</head>
	<body>
		<div class="container">
			<div class="row" id="pwd-container">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<section class="login-form">
						<form method="post" action="{{ url('ingresar') }}" role="login">
								<input type="hidden" name="_token" value="{{csrf_token() }}">
								<img src='{{ asset("img/logo.png") }}' alt="The Pirate Store" class="img-responsive">
								<input type="email" name="email" placeholder="tucorreo@ejemplo.com" required class="form-control input-lg" />
								<input type="password" class="form-control input-lg" id="password" placeholder="Contraseña" required="" />
								<button type="submit" name="go" class="btn btn-lg btn-primary btn-block">Iniciar sesión</button>
								<div><a href="{{ url('registro') }}">Crear cuenta</a> o <a href="#">recuperar contraseña</a></div>			
							</form>
					</section>	
				</div>
				<div class="col-md-4"></div>
			</div>
		</div>
		<script src='{{ asset("js/jquery.min.js") }}'></script>
		<script src='{{ asset("js/bootstrap.min.js") }}'></script>
	</body>
</html>