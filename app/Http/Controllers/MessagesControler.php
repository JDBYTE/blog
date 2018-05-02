<?php

namespace App\Http\Controllers;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Message;

class MessagesControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* QUERY BUILDER
        //obtengo todos los valores de la tabla
        $messages =DB::table('messages')->get();
        //los paso a las vista
        return view('messages.index' , compact('messages'));
        */
        //ELOQUENT
        $messages = Message::all();
 return view('messages.index' , compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Guardar Mensaje con QUERY BUILDER
        /*
    DB::table('messages')->insert([
        "nombre" => $request->input('nombre'),
        "email" => $request->input('email'),
        "mensaje" => $request->input('mensaje'),
        "created_at" => Carbon::now(),
        "updated_at" => Carbon::now(),

    ]);
    */
    /* PRIMERA FORMA CON ELOQUENT
$message =  new Message;
$message->nombre = $request->input('nombre');
$message->email = $request->input('email');
$message->mensaje = $request->input('mensaje');
$message->save();
*/
//SEGUNDA FORMA MAS CORTA
Message::create($request->all()); 
        //redireccionar
    return redirect()->route('mensajes.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    // $message=   DB::table('messages')->where('id',$id)->first();
//CON ELOQUENT
        $menssaje =Message::findOrFail($id);

        return view('messages.show' , compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $message=   DB::table('messages')->where('id',$id)->first();
        return view('messages.edit' , compact('message'));
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /*
        DB::table('messages')->where('id' , $id)->update([
            "nombre" => $request->input('nombre'),
            "email" => $request->input('email'),
            "mensaje" => $request->input('mensaje'),
             "updated_at" =>Carbon::now(),
        ]);
        */
  
             Message::findOrFail($id)->update($request->all());
        return redirect()->route("mensajes.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//   DB::table('messages')->where('id',$id)->delete();
          Message::findOrFail($id)->delete();
return redirect()->route('mensajes.index')  ; 



    }
}
