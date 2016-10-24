<!DOCTYPE html>
<html ng-app="store">
	<head>
		<meta charset="UTF-8">
		<title>The Pirate Store</title>
		<link rel="stylesheet" href="http://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" href='<?= asset("css/bootstrap.min.css") ?>'>
		<link rel="stylesheet" href='<?= asset("css/navbar.css") ?>'>
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
						<a class="[ navbar-brand ][ animate ]" href="#">THE PIRATE STORE</a>
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
								<li><a href="#" class="[ animate ]">Blog <span class="[ pull-right glyphicon glyphicon-pencil ]"></span></a></li>
								<li><a href="#" class="[ animate ]">List of resources <span class="[ pull-right glyphicon glyphicon-align-justify ]"></span></a></li>
								<li><a href="#" class="[ animate ]">Download Bootstrap <span class="[ pull-right glyphicon glyphicon-cloud-download ]"></span></a></li>
								<li class="[ dropdown-header ]">Bootstrap Templates</li>
								<li><a href="#" class="[ animate ]">Browse Templates <span class="[ pull-right glyphicon glyphicon-shopping-cart ]"></span></a></li>
								<li class="[ dropdown-header ]">Builders</li>
								<li><a href="#" class="[ animate ]">Form Builder <span class="[ pull-right glyphicon glyphicon-tasks ]"></span></a></li>
								<li><a href="#" class="[ animate ]">Button Builder <span class="[ pull-right glyphicon glyphicon-edit ]"></span></a></li>
								<li role="separator" class="divider"></li>
								<li><a href='<?= url("/categorias") ?>' class="[ animate ]">Ver todo <span class="[ pull-right glyphicon glyphicon-edit ]"></span></a></li>
							</ul>
						</li>
						<li><a class="animate" href="#register">REGISTRO</a></li>
						<li><a class="animate" href="#login">LOGIN</a></li>
						
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
		@yield('content')
		<script src='<?= asset("js/jquery.min.js") ?>'></script>
		<script src='<?= asset("js/bootstrap.min.js") ?>'></script>
		<script src='<?= asset("js/angular.min.js") ?>'></script>
		<script src='<?= asset("js/navbar.js") ?>'></script>
		<script src='<?= asset("js/app.js") ?>'></script>
		@yield('scripts')
	</body>
</html>