@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href='<?= asset("css/store.css") ?>'>
<link rel="stylesheet" href='<?= asset("css/carrito.css") ?>'>
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
			<form role="form" class="form-horizontal" method="post" action='{{url("/venta")}}'>
			<input type="hidden" name="_token" value="{{csrf_token() }}">
			<table class="tg">
				<thead>
					<tr>
						<th width="50%" class="tg-031e">Artículo</th>
						<th width="20%" class="tg-031e">Precio Unitario</th>
						<th width="20%" class="tg-031e">Cantidad</th>
						<th width="20%" class="tg-031e">Precio</th>
					</tr>
				</thead>
				<tbody>
					<?php $total = 0 ?>
					@foreach($carrito->articuloCarrito as $ac)
					<tr>
						<td class="tg-b7b8">{{$ac->articulo->nombre}}</td>
						<td class="tg-b7b8">${{formato($ac->articulo->precio)}}</td>
						<td class="tg-b7b8">{{$ac->cantidad}}</td>
							@php
								$t =  $ac->cantidad * $ac->articulo->precio;
								$total += $t;
							@endphp
						<td class="tg-b7b8">${{formato($t)}}</td>
					</tr>
					@endforeach
					<tr>
						<td class="tg-b7b8"></td>
						<td class="tg-b7b8"></td>
						<td class="tg-b7b8">Total: </td>
						<td class="tg-b7b8">${{formato($total)}}</td>
					</tr>
				</tbody>
			</table>
			<input type="hidden" name="carrito_id" value="{{$carrito->id}}">
			<input type="hidden" name="total" value="{{$total}}">
			<a href="{{url("/")}}" class="btn btn-primary pull-right"> Seguir comprando</a>
			<button class="btn btn-success pull-right" value="comprar" name="comprar" type="submit">Comprar</button>
			</form>
		</div>
	</div>
</div>
@stop