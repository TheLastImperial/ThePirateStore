<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>The Pirate Store</title>
		<link rel="stylesheet" href="http://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" href='<?= asset("css/bootstrap.min.css") ?>'>
		<link rel="stylesheet" href='<?= asset("css/navbar.css") ?>'>
		<link rel="stylesheet" href='<?= asset("css/login.css") ?>'>
		@yield('styles')
	</head>
	<body>
		<nav class="[ navbar navbar-fixed-top ][ navbar-bootsnipp animate ]" role="navigation">
				<div class="[ container ]">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="[ navbar-header ]">
					<button type="button" class="[ navbar-toggle ]" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="[ sr-only ]">Toggle navigation</span>
						<span class="[ icon-bar ]"></span>
						<span class="[ icon-bar ]"></span>
						<span class="[ icon-bar ]"></span>
					</button>
					<div class="[ animbrand ]">
						<a class="[ navbar-brand ][ animate ]" href="#"><img src='<?= asset("img/logo.png") ?>' alt="The Pirate Store" class="responsive"></a>
					</div>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="[ collapse navbar-collapse ]" id="bs-example-navbar-collapse-1">
					<ul class="[ nav navbar-nav navbar-right ]">
						<li class="[ visible-xs ]">
							<form action="http://bootsnipp.com/search" method="GET" role="search">
								<div class="[ input-group ]">
									<input type="text" class="[ form-control ]" name="q" placeholder="Search for snippets">
									<span class="[ input-group-btn ]">
										<button class="[ btn btn-primary ]" type="submit"><span class="[ glyphicon glyphicon-search ]"></span></button>
										<button class="[ btn btn-danger ]" type="reset"><span class="[ glyphicon glyphicon-remove ]"></span></button>
									</span>
								</div>
							</form>
						</li>
						<li class="[ hidden-xs ]"><a href="#toggle-search" class="[ animate ]"><span class="[ glyphicon glyphicon-search ]"></span></a></li>
						<li>
							<a href="#" class="[ dropdown-toggle ][ animate ]" data-toggle="dropdown">CATEGORÍAS <span class="[ caret ]"></span></a>
							<ul class="[ dropdown-menu ]" role="menu">
								@yield('categorias')
								<li role="separator" class="divider"></li>
								<li><a href='<?= url("/categorias") ?>' class="[ animate ]">Ver todo <span class="[ pull-right glyphicon glyphicon-align-justify ]"></span></a></li>
							</ul>
						</li>
						@if(!Auth::check())
						<li><a class="animate" href="<?= url('registro') ?>">REGISTRO</a></li>
						<li><a class="animate" href="#" data-toggle="modal" data-target="#login">LOGIN</a></li>
						@else
						<li><a class="animate" href="<?= url('salir') ?>">CERRAR SESIÓN</a></li>
						@endif
					</ul>
				</div>
			</div>
			<div class="[ bootsnipp-search animate ]">
				<div class="[ container ]">
					<form action="http://bootsnipp.com/search" method="GET" role="search">
						<div class="[ input-group ]">
							<input type="text" class="[ form-control ]" name="q" placeholder="Busca artículos por palabras clave, modelo, etc ...">
							<span class="[ input-group-btn ]">
								<button class="[ btn btn-danger ]" type="reset"><span class="[ glyphicon glyphicon-remove ]"></span></button>
							</span>
						</div>
					</form>
				</div>
			</div>
		</nav>
		<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
			<div class="container">
				<div class="row" id="pwd-container">
					<div class="col-md-4"></div>
					<div class="col-md-4">
						<section class="login-form">
							<form method="post" action="<?= url('login') ?>" role="login">
								<input type="hidden" name="_token" value="{{csrf_token() }}">
								<img src='<?= asset("img/logo.png") ?>' alt="The Pirate Store" class="img-responsive">
								<input type="email" name="email" placeholder="tucorreo@ejemplo.com" required class="form-control input-lg" />
								<input type="password" class="form-control input-lg" id="password" placeholder="Contraseña" required="" />
								<button type="submit" name="go" class="btn btn-lg btn-primary btn-block">Iniciar sesión</button>
								<div><a href="<?= url('registro') ?>">Crear cuenta</a> o <a href="#">recuperar contraseña</a></div>			
							</form>
						</section>	
					</div>
					<div class="col-md-4"></div>
				</div>
			</div>
		</div>
		@yield('content')
		<script src='<?= asset("js/jquery.min.js") ?>'></script>
		<script src='<?= asset("js/bootstrap.min.js") ?>'></script>
		<!--<script src='<?= asset("js/angular.min.js") ?>'></script>-->
		<script src='<?= asset("js/navbar.js") ?>'></script>
		<!--<script src='<?= asset("js/app.js") ?>'></script>-->
		@yield('scripts')
	</body>
</html>