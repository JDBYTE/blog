<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Requests\CreateMessageRequest;//aqui esta la validacion

class PagesController extends Controller
{

//Contructor para middleware asignados a metodos

public function _construct()
{
	$this->middleware('example',['only' =>['home']]);
}


    //
public function home()
{
	return view('home');

	
}
public function contact()
{
	return view('contactos');

	
}


public function mensajes( CreateMessageRequest $request) //\App\Http\Requests\CreateMessageRequest es lo que se valida antes de ejecutar el contenido del metodo
{
	//pasa por la validacion  que esta en CreateMessageRequest antes de enviar la respuesta
 $data = $request->all();
 //return response()->json(['data' =>$data] , 202)
 //->header('TOKEN','secret');
return redirect()
->route('contactos')
->with('info','Tu mensaje ha sido enviado correctamente :');
//dentro de los parenessis del with defino la session info

}

	public function saludo($nombre ="Invitado")	
	{
$html ="<h2>Contenido HTML</h2>";
$script ="<script>alert('Problema XSS -Cross site Scripting !')</script>";
$consolas =[
"Play Station 4",
"Xbox One",
"Wii U"
];
 	return view('saludo' ,compact('nombre','html', 'script', 'consolas'));
	}


}
