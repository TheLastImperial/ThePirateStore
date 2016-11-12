@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href='<?= asset("css/store.css") ?>'>
<style>
	.row::after {
	content: "";
	clear: both;
	display: block;
}
.tg  {
	border-collapse:collapse;
	border-spacing:0;
	border-color:#ccc;
	width: 100%;
	margin-bottom: 1em;
}
table { border-collapse:collapse;border-spacing:0; }
.tg td {
	font-family:Arial, sans-serif;
	font-size:14px;
	padding:10px 8px;
	border-style:solid;
	border-width:0px;
	overflow:hidden;
	word-break:normal;
}
.tg th {
	font-family:Arial, sans-serif;
	font-size:14px;
	font-weight:bold;
	padding:10px 8px;
	border-style:solid;
	border-width:0px;
	overflow:hidden;
	word-break:normal;
}
.tg .tg-b7b8{background-color:#f9f9f9;vertical-align:top;}
</style>
@stop

@section('categorias')
	@foreach($categorias as $c)
	<li><a href="../../categorias/{{$c->nombre}}" class="[ animate ]">{{$c->nombre}}</a></li>
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
					{!! $total = 0; !!}
					@foreach($carrito->articuloCarrito as $ac)
					<tr>
						<td class="tg-b7b8">{{$ac->articulo->nombre}}</td>
						<td class="tg-b7b8">{{$ac->articulo->precio}}</td>
						<td class="tg-b7b8">{{$ac->cantidad}}</td>
							 {!!
								 $t 		=  $ac->cantidad * $ac->articulo->precio;
								 $total += $t;
							 !!}
						<td class="tg-b7b8">{{$t}}</td>
					</tr>
					@endforeach
					<tr>
						<td class="tg-b7b8"></td>
						<td class="tg-b7b8"></td>
						<td class="tg-b7b8">Total: </td>
						<td class="tg-b7b8">${{$total}}</td>
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
