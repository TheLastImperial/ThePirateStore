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
<table class="table table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>Fecha</th>
			<th>Opciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach($carritos as $c)
			<tr>
				<td>{{$c->id}}</td>
				<td>{{$c->updated_at}}</td>
				<td>
					<a href="{{url('/miscompras/')}}/{{$c->id}}" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>Solicitar comprobante</a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
@stop

@section('scripts')
<script src='{{asset("js/thumbnails.js")}}'></script>
@stop