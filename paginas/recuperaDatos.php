<?php

	include_once("manejador_BD.php");
	
	
	if(!isset($_SESSION))//Inicio la sesion
	{
	session_start();
	}
	
	
	$manejador=new manejador();
	$usuario="root";
	$contraseña="";
	$dsn="mysql:host=localhost;dbname=chat";

	$conexion_mysql=$manejador->conectar_BD($usuario, $contraseña, $dsn);


	$query=("select ID, nick_origen from chat ORDER BY ID DESC LIMIT 1");
	$datos=$manejador->seleccionar($conexion_mysql,$query);
	
	
	
	

?>