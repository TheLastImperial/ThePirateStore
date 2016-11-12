<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Categoria;
use App\Articulo;
use App\Carrito;
use App\Usuario;

class ArticuloCarritoController extends CrudController{
	public function agregar(Request $request) {
		$usuario = Usuario::find(Auth::id());
		// Crear carrito solo si no se tiene ya un carrito no asociado a la venta
		// $carrito = new Carrito();
		//dd( $this->carritoSinVentaId($usuario->id) );
		$carrito 		= DB::table('carritos')
										->whereNotIn('id', $this->carritoSinVentaId($usuario->id))
										->where('carritos.usuario_id','=',$usuario->id)
										->get();
		// Si es mayor a cero entonces ya hay un carrito no asociado
		// a una venta para agregarsele el articulo_carritos.
		if(sizeof($carrito) == 0){
			$carrito 							= new \App\Carrito();
			$carrito->usuario_id 	= $usuario->id;
			$carrito->save();

			$ac 							= new \App\ArticuloCarrito();

			$ac->carrito_id 	= $carrito->id;
			$ac->articulo_id	= (int)$request->input('articulo_id');
			$ac->cantidad 		= (int)$request->input('cantidad');
			$ac->save();

			return redirect() -> intended('/carrito');
		}
		$carrito 					= $carrito[0];
		$ac 							= new \App\ArticuloCarrito();

		$ac->carrito_id 	= $carrito->id;
		$ac->articulo_id	= (int)$request->input('articulo_id');
		$ac->cantidad 		= (int)$request->input('cantidad');
		$ac->save();

		return redirect() -> intended('/carrito');

	}

	public function carritoSinVentaId($id){
		$carritosId = DB::table('carritos as c')
									->join('ventas as v','v.carrito_id','c.id')
									->select('c.id')
									->where('c.usuario_id',$id)
									->pluck('id');
		return $carritosId;
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
