<?php

namespace App\Http\Controllers;
use App\Mail\pedido;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class VentaController extends CrudController{

    public function comprar(Request $request){

      $correo = \App\Usuario::find(Auth::id())->correo;

      $carrito = \App\Carrito::find($request->input('carrito_id'));
      foreach($carrito->articuloCarrito as $ac){

        $articulo             = \App\Articulo::find($ac->articulo_id);
        if($articulo->cantidad < $ac->cantidad){
          echo "El articulo: ".$articulo->nombre."sera omitido ya que no hay sufientes en el inventario.";
          continue;
        }
        $articulo->cantidad   -= $ac->cantidad;
        $articulo->save();
      }

      $venta = new \App\Venta();
      $venta->carrito_id  = $request->input('carrito_id');
      $venta->total       = $request->input('total');

      if (!($venta->save()))
        return redirect() -> intended('/') -> withError('Falló la venta.');

        // Enviar correo
      Mail::to($correo)->send(new pedido($carrito, $venta->id));
      return redirect() -> intended('/') -> withSuccess('Venta completada con éxito. Tu producto llegará pronto.');

      // DEBE REDIRECCIONAR HACIA UN GACIAS POR COMPRAR

    }
    public function all($entity){
        parent::all($entity);

        /** Simple code of  filter and grid part , List of all fields here : http://laravelpanel.com/docs/master/crud-fields


			$this->filter = \DataFilter::source(new \App\Category);
			$this->filter->add('name', 'Name', 'text');
			$this->filter->submit('search');
			$this->filter->reset('reset');
			$this->filter->build();

			$this->grid = \DataGrid::source($this->filter);
			$this->grid->add('name', 'Name');
			$this->grid->add('code', 'Code');
			$this->addStylesToGrid();

        */

        return $this->returnView();
    }

    public function  edit($entity){

        parent::edit($entity);

        /* Simple code of  edit part , List of all fields here : http://laravelpanel.com/docs/master/crud-fields

			$this->edit = \DataEdit::source(new \App\Category());

			$this->edit->label('Edit Category');

			$this->edit->add('name', 'Name', 'text');

			$this->edit->add('code', 'Code', 'text')->rule('required');


        */

        return $this->returnEditView();
    }
}
