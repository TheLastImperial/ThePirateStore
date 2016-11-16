<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Usuario;

class UsuarioController extends CrudController{

	public function register(Request $request){
    	$nombre		= $request->input('nombre');
    	$correo		= $request->input('email');
    	$contrasena = $request->input('password');
        //Verificar que no exista antes el correo
        $usuario    = Usuario::where('correo', '=', $correo)->first();
        if(isset($usuario)) {
            return redirect() -> intended('/') -> withError('Ya existe un usuario registrado con ese correo');
        }
    	//Guardar en BD
    	$nuevo = new Usuario;
    	$nuevo -> nombre 	 = $nombre;
    	$nuevo -> correo 	 = $correo;
    	$nuevo -> contrasena = bcrypt($contrasena);
    	$nuevo -> save();

        if(isset($usuario)) {
            if(Hash::check($contrasena,$usuario->contrasena)) {
                        Auth::login($usuario);
                return redirect() -> intended('/');
            }
        }

    	return redirect() -> intended('/');
    }
    public function login(Request $request) {
    	$correo		= $request->input('email');
    	$contrasena = $request->input('password');
    	$usuario 	= Usuario::where('correo', '=', $correo)->first();
		if(isset($usuario)) {
		    if(Hash::check($contrasena,$usuario->contrasena)) {
		        		Auth::login($usuario);
                return redirect() -> intended('/');
		    }
		}
    	return redirect() -> intended('/');
    }
    public function logout() {
      Auth::logout();
      return redirect() -> intended('/');
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
