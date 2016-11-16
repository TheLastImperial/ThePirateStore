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

class ArticuloController extends CrudController {
    public function articulosCategoria($categoria) {
        $categorias  = Categoria::orderBy('nombre','asc')
                                ->get();
        $idCategoria = Categoria::select('id')
                                ->where('nombre','=',$categoria)
                                ->get();
        $articulos   = Articulo::where('categoria_id','=',$idCategoria[0]->id)
                                ->get();

        return view('categorias', compact('categorias','articulos'));
    }
    public function articulo($id) {
        $categorias  = Categoria::orderBy('nombre','asc')
                                ->get();
        $articulo = Articulo::find($id);
        // la variable comprado nos indica si
        // el usuario ha comprado el articulo anteriormente
        $comprado = Auth::check() && $this->anteriormenteComprado($id);

        return view('articulo', compact('categorias','articulo','comprado'));
    }
    public function buscar(Request $request) {
        $query      = $request->input('q');
        $categorias = Categoria::orderBy('nombre','asc')
                              ->get();
        $articulos  = Articulo::where('nombre','like','%'.$query.'%')
                              ->get();

        return view('categorias', compact('categorias','articulos'));
    }
    public function anteriormenteComprado($id){
      $flag     = false;
      $articulo = DB::table('articulos as a')
                  ->join('articulo_carritos as ac','a.id','ac.articulo_id')
                  ->join('carritos as c','c.id','ac.carrito_id')
                  ->join('ventas as v','v.carrito_id','c.id')
                  ->where('a.id',$id)
                  ->where('c.usuario_id',Auth::id())
                  ->get();
      if(sizeof($articulo) > 0 )
        $flag = true;
      return $flag;
    }

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
