<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;

use Illuminate\Http\Request;

class ImagenController extends CrudController{

    public function all($entity){
        parent::all($entity);

        // Simple code of  filter and grid part , List of all fields here : http://laravelpanel.com/docs/master/crud-fields


			$this->filter = \DataFilter::source(new \App\Imagen);
			$this->filter->add('name', 'Name', 'text');
			$this->filter->submit('search');
			$this->filter->reset('reset');
			$this->filter->build();

			$this->grid = \DataGrid::source(\App\Imagen::with('articulo'));
			$this->grid->add('id', 'ID');
      $this->grid->add('articulo.nombre','Articulo');
			$this->grid->add('imagen', 'Imagen');
			$this->addStylesToGrid();



        return $this->returnView();
    }

    public function  edit($entity){

        parent::edit($entity);

        // Simple code of  edit part , List of all fields here : http://laravelpanel.com/docs/master/crud-fields

			$this->edit = \DataEdit::source(new \App\Imagen());

			$this->edit->label('Edit Category');

      $this->edit->add('imagen', 'Imagen', 'image')
        ->move('imagenes/articulos/')
        ->preview(200,200);

			$this->edit->add('articulo_id','Articulo','select')
        ->options(\App\Articulo::pluck("nombre", "id")->all());

        return $this->returnEditView();
    }
}
