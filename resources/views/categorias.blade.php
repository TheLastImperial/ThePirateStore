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
			<div class="col-md-3">
				<div id="search_block" class="panel-body">
					<form role="form" class="form-horizontal" method="post" action="">
						<input type="hidden" name="_token" value="{{csrf_token() }}">
						<div class="form-group">
							<label class="col-xs-10 col-sm-2 col-md-4 control-label" for="filtro">Ordenar por:</label>
							<div class="col-xs-10 col-sm-8 col-md-8" id="filtro">
								<select class="form-control" name="section_id">
									<option value="nombre_asc" selected>Nombre (A-Z)</option>
									<option value="nombre_desc">Nombre (Z-A)</option>
									<option value="precio_asc">Más barato primero</option>
									<option value="precio_desc">Más caro primero</option>
									<option value="calif_desc">Mejor valorado primero</option>
									<option value="creado_desc">Más nuevo primero</option>
									<option value="creado_asc">Más viejo primero</option>
								</select>
							</div>
						</div>
						<button class="btn btn-primary pull-right" value="filtrar" name="filtrar" type="submit">Filtrar</button>
					</form>
				</div>
			</div>
			<div class="col-md-9">

				<div class="row">
					@foreach($articulos as $a)
					@if($a->activo == 0)
						@continue
					@endif
					<div class="col-sm-4 col-lg-4 col-md-4">
						<div class="thumbnail">
							<img src="http://placehold.it/320x150" alt="">
							<div class="caption">
								<h4 class="pull-right">${{$a->precio}}</h4>
								<h4><a href='{{url("articulo/".$a->id)}}'>{{$a->nombre}}</a>
								</h4>
								<p>{{$a->descripcion}}.</p>
							</div>
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
						</div>
					</div>
					@endforeach

				</div>

			</div>

		</div>

	</div>
@stop

@section('scripts')
@stop