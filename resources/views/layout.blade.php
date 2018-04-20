<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<style>
		.active{
			text-decoration: none;
			color: green;
		}
		.error{
			color: red;
			font-size: 12px;
		}
	</style>		

	<title>Mi Sitio</title>
</head>
	<body>
		<h1>{{request()->is('/') ? 'Estás en el Home':'No estas en el HOME'}}</h1>
		<header>
<?php function activeMenu($url){

	return  request()-> is($url) ? 'active' :'';

} ?>


			<nav>
			<a class ="{{ activeMenu('/') ? 'active':''}}" href="{{route('home')}}">Inicio</a>
			<a class ="{{ activeMenu('saludos/*') ? 'active':''}}"  href="{{route('saludos')}}">Saludos</a>
			<a class ="{{ activeMenu('mensajes/create') ? 'active':''}}"  href="{{route('messages.create')}}">Contactos</a>
		

			<a class ="{{ activeMenu('mensajes') ? 'active':''}}"  href="{{route('messages.index')}}">Mensajes</a>

		</header>
		@yield('contenido')
		<footer>Copyrig {{date('Y')}}</footer>
	</body>


</html>