<?php
class manejador
{
	
	
	
	function conectar_BD($usuario,$contraseña,$dsn)
	{
		
		
				$usuario=$usuario;
				$contraseña=$contraseña;
				$dsn=$dsn;
				//dsn es una cadena de caracteres que tiene que decirnos que tipo de base de datos es la que queremos 		conectar,nombre del host,
				//puerto y base de datos que queremos abrir
				return $conexion_mysql=new PDO($dsn,$usuario,$contraseña);
			
	
	}
	
	
	function seleccionar($conexion_mysql,$query) {
		
		$datos=$conexion_mysql->query($query);
		
		return	$datos;//ejecuta la sentencia
		
	}
	
	
	function insertar($conexion_mysql,$query)
	{
	
		
		$conexion_mysql->query($query);
		
		
		
	}
	
	function borrarDatos($conexion_mysql,$tabla,$condicion)
	{
		
		$conexion_mysql->query("DELETE FROM $tabla where $condicion ");
		
	}
	
	
	function modificar($conexion_mysql,$tabla,$campo,$condicion)
	{
	
		echo ("UPDATE $tabla SET $campo WHERE $condicion");
		
		$conexion_mysql->query("UPDATE $tabla SET $campo WHERE $condicion");
	
		
	
	
	}
	

	
}