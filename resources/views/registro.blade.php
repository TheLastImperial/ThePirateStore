<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>The Pirate Store</title>
		<link rel="stylesheet" href='<?= asset("css/bootstrap.min.css") ?>'>
		<link rel="stylesheet" href='<?= asset("css/login.css") ?>'>
		<style>
			body {
				background: -webkit-linear-gradient(90deg, #16222A 10%, #3A6073 90%); /* Chrome 10+, Saf5.1+ */
				background:    -moz-linear-gradient(90deg, #16222A 10%, #3A6073 90%); /* FF3.6+ */
				background:     -ms-linear-gradient(90deg, #16222A 10%, #3A6073 90%); /* IE10 */
				background:      -o-linear-gradient(90deg, #16222A 10%, #3A6073 90%); /* Opera 11.10+ */
				background:         linear-gradient(90deg, #16222A 10%, #3A6073 90%); /* W3C */
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="row" id="pwd-container">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<section class="login-form">
						<form method="post" action="<?= url('registro/registrar') ?>" role="registrar">
							<input type="hidden" name="_token" value="{{csrf_token() }}">
							<img src="http://i.imgur.com/RcmcLv4.png" class="img-responsive" alt="" />
							<input type="text" id="nombre" name="nombre" placeholder="Nombre de usuario" required class="form-control input-lg" />
							<input type="email" name="email" placeholder="tucorreo@ejemplo.com" required class="form-control input-lg" />
							<input type="email" name="email_verificacion" placeholder="tucorreo@ejemplo.com" required class="form-control input-lg" />
							<input type="password" class="form-control input-lg" id="password" placeholder="Contraseña" required />
							<div class="pwstrength_viewport_progress"></div>
							<button type="submit" name="go" class="btn btn-lg btn-primary btn-block">Crear cuenta</button>
						</form>
					</section>	
				</div>
				<div class="col-md-4"></div>
			</div>
		</div>
		<script src='<?= asset("js/jquery.min.js") ?>'></script>
		<script src='<?= asset("js/bootstrap.min.js") ?>'></script>
		<script src='<?= asset("js/login.js") ?>'></script>
	</body>
</html>