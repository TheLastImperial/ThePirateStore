<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>The Pirate Store</title>

	<link rel="stylesheet" href='<?= asset("css/carrito.css") ?>'>
</head>
<body>
	<script>
		alert("hola");
	</script>
	<div id="info" class="row">
		<div class="col-12">
			<img class="logo" src='{{asset("img/logo.png")}}'>
			<table>
				<tr><td>The Pirate Store</td></tr>
				<tr><td>Av. Juan de Dios Bátiz 310 Pte., ITC Edificio CC</td></tr>
				<tr><td>80220</td></tr>
				<tr><td>Culiacán, Sinaloa</td></tr>
			</table>
		</div>
	</div>
	<hr>
	<div id="concepto" class="row">
		<div class="col-12">
			<table class="tg">
				<thead>
					<tr>
						<th width="57.5%">Concepto</th>
						<th width="10%">Precio Unitario</th>
						<th width="10%">Cantidad</th>
						<th width="10%">Precio</th>
					</tr>
				</thead>
				<tbody>
					<?php $total = 0 ?>
					@for($i = 0; $i < count($item['articulos']) ; $i++)
					<tr>
						<td class="tg-yw4l">{{$item['articulos'][$i]->nombre}}</td>
						<td class="tg-b7b8">${{formato($item['articulos'][$i]->precio)}}</td>
						<td class="tg-yw4l">{{$item['cantidades'][$i]}}</td>
						<?php $precio = $item['articulos'][$i]->precio*$item['cantidades'][$i] ?>
						<td class="tg-b7b8">${{formato($item['articulos'][$i]->precio)}}</td>
					</tr>
					<?php $total = $total + $precio ?>
					@endfor
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td class="tg-yw4l">Total: </td>
						<td class="tg-b7b8">${{formato($total)}}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>