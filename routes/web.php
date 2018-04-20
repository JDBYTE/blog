<?php


Route::get('/', [ 'as' =>'home' ,'uses' => 'PagesController@home'])->middleware('example');


Route::get('contactanos',['as' => 'contactos' ,'uses' => 'PagesController@contact']);

Route::get('saludos/{nombre?}',['as' =>'saludos', 'uses' =>'PagesController@saludo'])->where('nombre',"[A-Za-z]+");




Route::post('contacto','PagesController@mensajes');

Route::get('mensajes/create', ['as' => 'messages.create', 'uses' =>'MessagesControler@create']);

Route::post('mensajes', ['as' => 'messages.store', 'uses' =>'MessagesControler@store']);

	Route::get('mensajes', ['as' => 'messages.index', 'uses' =>'MessagesControler@index']);

		Route::get('mensajes/{id}', ['as' => 'messages.show', 'uses' =>'MessagesControler@show']);

		Route::get('mensajes/{id}/edit', ['as' => 'messages.edit', 'uses' =>'MessagesControler@edit']);

		Route::put('mensajes/{id}', ['as' => 'messages.update', 'uses' =>'MessagesControler@update']);

		Route::delete('mensajes/{id}', ['as' => 'messages.destroy', 'uses' =>'MessagesControler@destroy']);