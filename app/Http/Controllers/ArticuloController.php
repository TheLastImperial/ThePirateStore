<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;

use Illuminate\Http\Request;

class ArticuloController extends CrudController{

    public function all($entity){
        parent::all($entity);

        // Simple code of  filter and grid part , List of all fields here : http://laravelpanel.com/docs/master/crud-fields


			$this->filter = \DataFilter::source(new \App\Articulo);
			$this->filter->add('nombre', 'Nombre', 'text');
			$this->filter->submit('search');
			$this->filter->reset('reset');
			$this->filter->build();

			$this->grid = \DataGrid::source(\App\Articulo::with('categoria'));
      $this->grid->add('id', 'ID');
      $this->grid->add('nombre', 'Nombre');
      $this->grid->add('descripcion', 'Descripcion');
      $this->grid->add('precio', 'Precio');
      $this->grid->add('cantidad', 'Cantidad');
      $this->grid->add('activo', 'Activo');
      $this->grid->add('categoria.nombre', 'Categoria');

			$this->addStylesToGrid();



        return $this->returnView();
    }

    public function  edit($entity){

        parent::edit($entity);

        // Simple code of  edit part , List of all fields here : http://laravelpanel.com/docs/master/crud-fields

			$this->edit = \DataEdit::source(new \App\Articulo());

			$this->edit->label('Edit Category');

			$this->edit->add('nombre', 'Nombre', 'text');


			$this->edit->add('descripcion', 'Descripcion', 'textarea');

      $this->edit->add('precio', 'Precio', 'text');

      $this->edit->add('cantidad', 'Cantidad', 'text');

      $this->edit->add('activo', 'Activo', 'radiogroup')
        ->insertvalue(1)
        ->option('1','Activo')->option('0', 'Inactivo');

      $this->edit->add('categoria_id','Categoria', 'select')
        ->options(\App\Categoria::pluck("nombre","id")->all()  );

        return $this->returnEditView();
    }
}
