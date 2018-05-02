@extends('layout')
@section('contenido')
<h1>Todos Los Mensajes</h1>
<table width="100%" border="1">
	<thead>
		<tr>
			<th>id</th>
			<th>Nombre</th>
			<th>Email</th>
			<th>Mensaje</th>
			<th>Acciones</th>
		</tr>

	</thead>
	<tbody>
		@foreach($messages as $message)
		<tr>
        <td>	<a href="{{ route('mensajes.show', $message -> id  ) }}">			
	{{ $message->id}}
			</a>
		</td>



 
			<td>{{$message->nombre}}</td>
			<td>{{$message->email}}</td>
			<td>{{$message->mensaje}}</td>
	<td>
		<a href="{{route('mensajes.edit',$message->id)}}">Editar</a>
		<form style="display: inline" method="POST" action="{{route('mensajes.destroy',$message->id )}}">
	{!! method_field('DELETE')!!}
    {!! csrf_field()!!}

			<button type="submit">Eliminar</button>

		</form>
			

	</td>

		</tr>
		@endforeach
	</tbody>
</table>
@stop