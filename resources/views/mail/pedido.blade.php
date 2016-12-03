<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Pedido</title>
  </head>
  <body>
    <h1>Se ha confirmado tu pedido con el id: {{ $id }}</h1>
    <table>
      <thead>
        <tr>
          <td>Nombre</td>
          <td>Precio</td>
          <td>Cantidad</td>
          <td>Total</td>
        </tr>
      </thead>

      <tbody>
        @php
         $total = 0;
        @endphp
        @foreach($carrito->articuloCarrito as $ac)
        <tr>
          <td> {{ $ac->articulo->nombre }} </td>
          <td> {{ $ac->articulo->cantidad }} </td>
          <td> {{ $ac->cantidad  }} </td>
          @php
            $t      =  $ac->cantidad * $ac->articulo->precio;
            $total += $t;
          @endphp
          <td> {{  formato($t) }} </td>
        </tr>
        @endforeach

        <tr>
          <td></td>
          <td></td>
          <td>Total: </td>
          <td>${{formato($total)}}</td>
        </tr>

      </tbody>
    </table>
  </body>
</html>
