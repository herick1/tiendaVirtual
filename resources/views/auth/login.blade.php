@extends('layout')


@section('contenido')
	<h1>Loginn¿ hecho por mi</h1>
	<form method= "POST" action="/login">
	{!!csrf_field()!!}
	<input type="email" name="email" placeholder="Email">
	<input type="password" name="password" placeholder="Password">

    <input type="submit" value="entrar">
	</form>


@stop