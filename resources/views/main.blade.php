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

			<div class="col-md-12">

				<div class="row carousel-holder">

					<div class="col-md-12">
						<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
							<ol class="carousel-indicators">
								<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
								<li data-target="#carousel-example-generic" data-slide-to="1"></li>
								<li data-target="#carousel-example-generic" data-slide-to="2"></li>
							</ol>
							<div class="carousel-inner">
								<div class="item active">
									<img class="slide-image" src="http://placehold.it/1140x300" alt="">
								</div>
								<div class="item">
									<img class="slide-image" src="http://placehold.it/1140x300" alt="">
								</div>
								<div class="item">
									<img class="slide-image" src="http://placehold.it/1140x300" alt="">
								</div>
							</div>
							<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
								<span class="glyphicon glyphicon-chevron-left"></span>
							</a>
							<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
								<span class="glyphicon glyphicon-chevron-right"></span>
							</a>
						</div>
					</div>

				</div>

				<div class="row">
					@foreach($articulos as $a )
						<div class="col-sm-4 col-lg-4 col-md-4">
							<div class="thumbnail">
								@if(sizeof($a->imagen) > 0)
									<img src="imagenes/articulos/{{$a->imagen[0]->imagen}}" alt="{{$a->nombre}}" style="width:355px;height:228px;">
								@else
									<img src="img/default-image.jpg" alt="{{$a->nombre}}" style="width:355px;height:228px;">
								@endif
								<div class="caption">
									<h4 class="pull-right">{{$a->precio}}</h4>
									<h4><a href='{{url("articulo/".$a->id)}}'>{{$a->nombre}}</a>
									</h4>
									<p>{{$a->descripcion}}</p>
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
					@endforeach


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
