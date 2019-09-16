<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|  Tenemos un router que independientemente de la url es la pagina de incio y la llamamos home y este usara
| la funcion home ubicada en pagecontroller responsable de deolver la vista home
| al cambiar las url no se cambien el direccionamiento de las mismas ya que todas van a contactos por el as
| es buena practica utilizar as 
*/
Route::get('/', [ 'as' => 'home' , 'uses'=> 'PagesController@home' ]);

Route::get('contactanos', [ 'as' => 'contactos' , 'uses'=> 'PagesController@contactos' ]); 

Route::post('contacto', [ 'as' => 'contacto' , 'uses'=> 'PagesController@contacto' ]);
/*
| variables, en este se prueba el uso de variables por medio del cambio en las url
| primero llamamos a la variable en la url entre llaves , ademas se pone el simbolo de interrogacion para
| que pueda ser opcional esto de poner el nombre o no , despues en la funciion se procede a poner el nombre de la |variable en simbolo de dolar
| el where funciona para que solo sea palabras (expresions regulares pues) ya que estamos utilizan esto ajuro hay |que poner un valor por defecto que en este caso es invitado, porque sino salta una excepcion
|
|para pasar parametros pos vistas utilizamos el compact tambien se puede utilizar el with pero asi queda mas limpio |el codigo
*/
Route::get('servicios/{nombre?}', ['as' => 'servicios', 'uses'=> 'PagesController@servicios'])->where('nombre' , "[A-Za-z]+");

Route::get('proyectos/{nombre?}', ['as' => 'proyectos', 'uses'=> 'PagesController@proyectos'])->where('nombre' , "[A-Za-z]+");


Route::resource('mensajes', 'MessagesController');


//inicio de sesion en laravel
Route::get('login', 'Auth\LoginController@showLoginForm');

Route::post('login','Auth\LoginController@login');

//para finalizar la cesion 
Route::get('logout', 'Auth\LoginController@logout');


//cambiar y hacer vista para registrar usuario
Route::get('test', function(){
	$user = new App\User;
	$user->name ='herikc';
	$user->email ='herikc@gmail.com';
	$user->password = bcrypt('herikc');
	$user->save();
	return $user;
});
