<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;

use Illuminate\Http\Request;

use App\Categoria;

class CategoriaController extends CrudController{
	public function index() {
		$categorias = Categoria::orderBy('nombre','asc')->get();
		$articulos  = \App\Articulo::all();
		return view('main', compact('categorias', 'articulos'));
	}
    public function all($entity){
        parent::all($entity);

      // Simple code of  filter and grid part , List of all fields here : http://laravelpanel.com/docs/master/crud-fields


			$this->filter = \DataFilter::source(new \App\Categoria);
			$this->filter->add('name', 'Name', 'text');
			$this->filter->submit('search');
			$this->filter->reset('reset');
			$this->filter->build();

			$this->grid = \DataGrid::source($this->filter);
			$this->grid->add('id', 'ID');
			$this->grid->add('nombre', 'Nombre');
			$this->grid->add('activo', 'Activo');
			$this->addStylesToGrid();


        return $this->returnView();
    }

    public function  edit($entity){

        parent::edit($entity);

        // Simple code of  edit part , List of all fields here : http://laravelpanel.com/docs/master/crud-fields

			$this->edit = \DataEdit::source(new \App\Categoria());

			$this->edit->label('Edit Category');

			$this->edit->add('nombre', 'Nombre', 'text');

			$this->edit->add('activo', 'Activo', 'radiogroup')
			 ->option('1', 'Activo')->option('0', 'Inactivo');

        return $this->returnEditView();
    }
}
