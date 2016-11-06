@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href='<?= asset("css/store.css") ?>'>
@stop

@section('categorias')
	@foreach($categorias as $c)
	<li><a href="{{$c->nombre}}" class="[ animate ]">{{$c->nombre}}</a></li>
	@endforeach
@stop

@section('content')
<div class="container">
	<div class="row">
		@foreach($articulo as $a)
		<!-- Formato sacado de Amazon, ver ejemplo:
				https://www.amazon.com.mx/Kindle-Paperwhite-pantalla-resoluci%C3%B3n-integrada/dp/B00QJDONQY/ref=lp_9482558011_1_2?s=electronics&ie=UTF8&qid=1478449611&sr=1-2
		-->
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-2">
					Sección de thumbnails
				</div>
				<div class="col-md-10">
					Sección de imagen
				</div>
			</div>
		</div>
		<div class="col-md-5">
			<h1>{{$a->nombre}}</h1>
			<div class="ratings">
				<p class="pull-right">15 reviews</p>
				<p>
					<span class="glyphicon glyphicon-star"></span>
					<span class="glyphicon glyphicon-star"></span>
					<span class="glyphicon glyphicon-star"></span>
					<span class="glyphicon glyphicon-star"></span>
					<span class="glyphicon glyphicon-star-empty"></span>
				</p>
			</div>
			<p>Precio: ${{$a->precio}}</p>
			<p>Descripción: {{$a->descripcion}}</p>
		</div>
		<div class="col-md-3">
			<form role="form" class="form-horizontal" method="post" action="">
				<input type="hidden" name="_token" value="{{csrf_token() }}">
				<div class="form-group">
					<label class="col-xs-10 col-sm-2 col-md-4 control-label" for="cantidad">Cantidad:</label>
					<div class="col-xs-10 col-sm-8 col-md-8" id="filtro">
						<select class="form-control" name="section_id">
							@for($i = 1; $i <= $a->cantidad; $i++)
							<option value="{{$i}}">{{$i}}</option>
							@endfor
						</select>
					</div>
				</div>
				<button class="btn btn-primary pull-right" value="comprar" name="comprar" type="submit">Comprar</button>
			</form>
		</div>
		@endforeach
	</div>
	<hr>
	<div class="row">
		<!-- Esto sólo debe de ser visible si estás conectado y si has comprado el artículo
			 Para que aparezca cuando estás conectado, usar Auth::check() 
		-->
		<div class="col-md-5">
			<form role="form" class="form-horizontal" method="post" action="">
				<input type="hidden" name="_token" value="{{csrf_token() }}">
				<div class="form-group">
					<input type="text" name="titulo" placeholder="Título" class="form-control input-lg" required />
					<br>
					<textarea name="comentario"  placeholder="Comentario" class="form-control input-lg" required></textarea>
				</div>
				<button class="btn btn-primary pull-right" value="comentar" name="comentar" type="submit">Comentar</button>
			</form>
		</div>	
	</div>
	<hr>
	<div class="row">
		<blockquote>
			<h2>Comentario #1</h2>
			<div class="ratings">
				<p>
					<span class="glyphicon glyphicon-star"></span>
					<span class="glyphicon glyphicon-star"></span>
					<span class="glyphicon glyphicon-star"></span>
					<span class="glyphicon glyphicon-star-empty"></span>
					<span class="glyphicon glyphicon-star-empty"></span>
				</p>
			</div>
			<p>Este es un ejemplo de comentario, recibe 3 de 5 estrellas</p>
			<p>— Autor</p>
		</blockquote>
		<blockquote>
			<h2>Comentario #2</h2>
			<div class="ratings">
				<p>
					<span class="glyphicon glyphicon-star"></span>
					<span class="glyphicon glyphicon-star"></span>
					<span class="glyphicon glyphicon-star"></span>
					<span class="glyphicon glyphicon-star"></span>
					<span class="glyphicon glyphicon-star"></span>
				</p>
			</div>
			<p>Este es un ejemplo de comentario, recibe 5 de 5 estrellas</p>
			<p>— Autor</p>
		</blockquote>
	</div>
</div>
@stop