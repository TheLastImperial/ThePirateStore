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

					<tr>
						<td class="tg-b7b8">Artículo 1</td>
						<td class="tg-b7b8">$100.00</td>
						<td class="tg-b7b8">1</td>
						<td class="tg-b7b8">$100.00</td>
					</tr>

					<tr>
						<td class="tg-yw4l"></td>
						<td class="tg-yw4l"></td>
						<td class="tg-yw4l"></td>
						<td class="tg-yw4l"></td>
					</tr>
					<tr>
						<td class="tg-b7b8"></td>
						<td class="tg-b7b8"></td>
						<td class="tg-b7b8">Total: </td>
						<td class="tg-b7b8">$100.00</td>
					</tr>
				</tbody>
			</table>
		</div>
		<button class="btn btn-primary pull-right" value="comprar" name="comprar" type="submit">Seguir comprando</button>
		<button class="btn btn-success pull-right" value="comprar" name="comprar" type="submit">Comprar</button>
	</div>
</div>
@stop