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

class CarritoController extends CrudController{

		public function mostrar(){
			$usuario 		= Usuario::find(Auth::id());
			$categorias = Categoria::orderBy('nombre','asc')->get();
			// Devuelve el carrito que no esta asociado a una venta.
			$carrito 		= DB::table('carritos')
											->whereNotIn('id', $this->carritoSinVentaId($usuario->id))
											->where('carritos.usuario_id','=',$usuario->id)
											->get();

			if(sizeof($carrito)==0){
				// AKI DEBE REDIRIGIR HACI UN MENSAJE DE ERROR
				return redirect() -> intended('/');
			}
			$carrito 		= Carrito::find($carrito[0]->id);
			return view('carrito', compact('carrito','categorias') );
		}
		// Devuelve los ID's de los carritos asociados a una venta.
		public function carritoSinVentaId($id){
			$carritosId = DB::table('carritos as c')
										->join('ventas as v','v.carrito_id','c.id')
										->select('c.id')
										->where('c.usuario_id',$id)
										->get();
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
