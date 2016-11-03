@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href='<?= asset("css/store.css") ?>'>
@stop

@section('categorias')
	@foreach($categorias as $c)
	<li><a href="categorias/{{$c->nombre}}" class="[ animate ]">{{$c->nombre}}</a></li>
	@endforeach
@stop

@section('content')
<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div id="search_block" class="panel-body">
					<form role="form" class="form-horizontal" method="post" action="">
						<div class="form-group">
							<label class="col-xs-10 col-sm-2 col-md-4 control-label" for="filtro_nombre">Nombre:</label>
							<div class="col-xs-10 col-sm-8 col-md-8" id="filtro_nombre">
								<select class="form-control" name="section_id">
									<option value="all" selected>No importa</option>
									<option value="des">A-Z</option>
									<option value="asc">Z-A</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-10 col-sm-2 col-md-4 control-label" for="filtro_precio">Precio:</label>
							<div class="col-xs-10 col-sm-8 col-md-8" id="filtro_precio">
								<select class="form-control" name="section_id">
									<option value="all" selected>No importa</option>
									<option value="des">Más barato primero</option>
									<option value="asc">Más caro primero</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-10 col-sm-2 col-md-4 control-label" for="filtro_calificacion">Calificación:</label>
							<div class="col-xs-10 col-sm-8 col-md-8" id="filtro_calificacion">
								<select class="form-control" name="section_id">
									<option value="all" selected>No importa</option>
									<option value="des">Mejor valorado primero</option>
									<option value="asc">Menos valorado primero</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-10 col-sm-2 col-md-4 control-label" for="filtro_agregado">Agregado:</label>
							<div class="col-xs-10 col-sm-8 col-md-8" id="filtro_agregado">
								<select class="form-control" name="section_id">
									<option value="all" selected>No importa</option>
									<option value="des">Más nuevo primero</option>
									<option value="asc">Más viejo primero</option>
								</select>
							</div>
						</div>
						<button class="btn btn-primary pull-right" value="filtrar" name="filtrar" type="submit">Filtrar</button>
					</form>
				</div>
			</div>
			<div class="col-md-9">

				<div class="row">

					<div class="col-sm-4 col-lg-4 col-md-4">
						<div class="thumbnail">
							<img src="http://placehold.it/320x150" alt="">
							<div class="caption">
								<h4 class="pull-right">$24.99</h4>
								<h4><a href="#">First Product</a>
								</h4>
								<p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
							</div>
							<div class="ratings">
								<p class="pull-right">15 reviews</p>
								<p>
									<span class="glyphicon glyphicon-star"></span>
									<span class="glyphicon glyphicon-star"></span>
									<span class="glyphicon glyphicon-star"></span>
									<span class="glyphicon glyphicon-star"></span>
									<span class="glyphicon glyphicon-star"></span>
								</p>
							</div>
						</div>
					</div>

					<div class="col-sm-4 col-lg-4 col-md-4">
						<div class="thumbnail">
							<img src="http://placehold.it/320x150" alt="">
							<div class="caption">
								<h4 class="pull-right">$64.99</h4>
								<h4><a href="#">Second Product</a>
								</h4>
								<p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							</div>
							<div class="ratings">
								<p class="pull-right">12 reviews</p>
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

					<div class="col-sm-4 col-lg-4 col-md-4">
						<div class="thumbnail">
							<img src="http://placehold.it/320x150" alt="">
							<div class="caption">
								<h4 class="pull-right">$74.99</h4>
								<h4><a href="#">Third Product</a>
								</h4>
								<p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							</div>
							<div class="ratings">
								<p class="pull-right">31 reviews</p>
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

					<div class="col-sm-4 col-lg-4 col-md-4">
						<div class="thumbnail">
							<img src="http://placehold.it/320x150" alt="">
							<div class="caption">
								<h4 class="pull-right">$84.99</h4>
								<h4><a href="#">Fourth Product</a>
								</h4>
								<p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							</div>
							<div class="ratings">
								<p class="pull-right">6 reviews</p>
								<p>
									<span class="glyphicon glyphicon-star"></span>
									<span class="glyphicon glyphicon-star"></span>
									<span class="glyphicon glyphicon-star"></span>
									<span class="glyphicon glyphicon-star-empty"></span>
									<span class="glyphicon glyphicon-star-empty"></span>
								</p>
							</div>
						</div>
					</div>

					<div class="col-sm-4 col-lg-4 col-md-4">
						<div class="thumbnail">
							<img src="http://placehold.it/320x150" alt="">
							<div class="caption">
								<h4 class="pull-right">$94.99</h4>
								<h4><a href="#">Fifth Product</a>
								</h4>
								<p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							</div>
							<div class="ratings">
								<p class="pull-right">18 reviews</p>
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

					<div class="col-sm-4 col-lg-4 col-md-4">
						<h4><a href="#">Like this template?</a>
						</h4>
						<p>If you like this template, then check out <a target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">this tutorial</a> on how to build a working review system for your online store!</p>
						<a class="btn btn-primary" target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">View Tutorial</a>
					</div>

				</div>

			</div>

		</div>

	</div>
@stop

@section('scripts')
@stop