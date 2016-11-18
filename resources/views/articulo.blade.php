@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href='<?= asset("css/store.css") ?>'>
@stop

@section('categorias')
	@foreach($categorias as $c)
	<li><a href="../categorias/{{$c->nombre}}" class="[ animate ]">{{$c->nombre}}</a></li>
	@endforeach
@stop

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-4">

			<div class="row">
				@if( sizeof($articulo->imagen) >1 )
					<div class="col-md-2">

						@for($i = 1; $i<sizeof($articulo->imagen);$i++)
							<div class="row">
								<a href="#" id="z{{$i}}" class="thumbnail">
		    					<img src="{{asset('imagenes/articulos')}}/{{$articulo->imagen[$i]->imagen}}" alt="{{$articulo->nombre}}">
		    				</a>
							</div>
						@endfor

					</div>
				@endif

				@if(sizeof($articulo->imagen) >0)
					<div class="col-md-10">
						<div class="row">
							<img id="img" src="{{asset('imagenes/articulos')}}/{{$articulo->imagen[0]->imagen}}" alt="{{$articulo->nombre}}" style="width:332px;height:332px;">
						</div>
					</div>
				@else
					<div class="col-md-10">
						<div class="row">
							<img id="img" src="{{asset('img/default-image.jpg')}}" alt="{{$articulo->nombre}}" style="width:332px;height:332px;">
						</div>
					</div>
				@endif
			</div>

		</div>
		<div class="col-md-5">
			<h1>{{$articulo->nombre}}</h1>
			<div class="ratings">
				<p class="pull-right">{{sizeof($articulo->comentarios)}} comentarios</p>
				<p>
					@for($i=0; $i<$articulo->calificacion;$i++)
						<span class="glyphicon glyphicon-star"></span>
					@endfor
					@for($i=$articulo->calificacion; $i<5;$i++)
						<span class="glyphicon glyphicon-star-empty"></span>
					@endfor
				</p>
			</div>
			<p>Precio: ${{formato($articulo->precio)}}</p>
			<p>Descripción: {{$articulo->descripcion}}</p>
		</div>
		<div class="col-md-3">
			<form role="form" class="form-horizontal" method="post" action='{{url("articulocarrito/agregar")}}'>
				<input type="hidden" name="_token" value="{{csrf_token() }}">
				<input type="hidden" name="articulo_id" value="{{$articulo->id}}">
				<div class="form-group">
					@if($articulo->cantidad > 0)
					<label class="col-xs-10 col-sm-2 col-md-4 control-label" for="cantidad">Cantidad:</label>
					<div class="col-xs-10 col-sm-8 col-md-8" id="filtro">
						<select class="form-control" name="cantidad">
							@for($i = 1; $i <= $articulo->cantidad; $i++)
							<option value="{{$i}}">{{$i}}</option>
							@endfor
						</select>
					</div>
					@else
					<p class="agotado">Este producto se ha agotado</p>
					@endif
				</div>
				@if(Auth::check() && $articulo->cantidad > 0)
				<button class="btn btn-primary pull-right" value="comprar" name="comprar" type="submit">Agregar al carrito</button>
				@else
				<button class="btn btn-primary pull-right" value="comprar" name="comprar" type="submit" disabled>Agregar al carrito</button>
				@endif
			</form>
		</div>
	</div>
	<hr>
	<div class="row">
		@if($comprado)
		<div class="col-md-5">
			<form role="form" class="form-horizontal" method="post" action="{{url("/comentario")}}">
				<input type="hidden" name="_token" value="{{csrf_token() }}">
				<div class="form-group">
					<textarea name="comentario"  placeholder="Comentario" class="form-control input-lg" required></textarea>
					<select class="form-control" name="calificacion">
						<option value="1">Uno</option>
						<option value="2">Dos</option>
						<option value="3">Tres</option>
						<option value="4">Cuatro</option>
						<option value="5">Cinco</option>
					</select>
				</div>
				<input type="hidden" name="articulo_id" value="{{ $articulo->id }}">
				<button class="btn btn-primary pull-right" value="comentar" name="comentar" type="submit">Comentar</button>
			</form>
		</div>
		@endif
	</div>
	<hr>
	<div class="row">
		@foreach($articulo->comentarios as $c)
		<blockquote>
			<p>{{ $c->comentario }}</p>
			<p>— {{$c->usuario->nombre}}</p>
			<p>{{$c->calificacion}}</p>
			<div class="ratings">
				<p>
					@for($i=0; $i<$c->calificacion;$i++)
						<span class="glyphicon glyphicon-star"></span>
					@endfor
					@for($i=$c->calificacion; $i<5;$i++)
						<span class="glyphicon glyphicon-star-empty"></span>
					@endfor
				</p>
			</div>
		</blockquote>
		@endforeach
	</div>
</div>
@stop

@section('scripts')
<script src='{{asset("js/thumbnails.js")}}'></script>
@stop
