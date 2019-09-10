<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CreateMessageRequest;


class PagesController extends Controller
{
	protected $request;

	public function __construct(Request $requests)
	{
			$this->request = $requests;
	}
    /*
	| primero se crea una direcciones que rediriguen a la pagina de contactos 
	| 	echo "<a href= " + route('contactos') +"/> Contactos <br>";
	| route('link') sirve en laravel para redirigir a un nombre de alguna pagina dentro del sitio
	| recordar que para concatenar es con punto en vez de con el mas
	*/
    //	echo "<a href= " . route('contactos') ."> Contactos </a><br>";
    public function home(){
    	return view('welcome');	
    } 

 	public function servicios($nombre = 'Invitado') {
    	return view ('home',compact ('nombre'));
	}
    public function proyectos($nombre = 'Invitado'){
    	return view ('home',compact ('nombre'));	
    }
	public function contactos(){
    	return view('contactos');	
    }
    public function contacto(CreateMessageRequest $formRequest){	

    	// aui utilizamos la clase de validaciones de reqquest 
    	$data =$formRequest->all();
    	return redirect()->route('contactos');
    	//en vez de retornar una url podemos hacer es
    	// return back();

    	// esto es para mandar una respuesta con un estado 
    	//return response->json(['data' => $data] , 200);
    
    }
}
