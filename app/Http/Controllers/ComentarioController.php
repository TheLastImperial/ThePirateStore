<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ComentarioController extends CrudController{

    public function comentar(Request $request){
      $comentario               = new \App\Comentario();
      $comentario->usuario_id   = Auth::id();
      $comentario->articulo_id  = (int)$request->input('articulo_id');
      $comentario->calificacion = (int)$request->input('calificacion');
      $comentario->comentario   = $request->input('comentario');
      $comentario->save();

      return redirect() -> intended('/articulo/'.$request->input('articulo_id'));
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
