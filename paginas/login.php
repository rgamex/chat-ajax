<?php
session_start();

	include_once("manejador_BD.php");
	include_once("mensajeChat.php");
	


	if($_SESSION["chat"]== NULL) // si no está inicializada la sesion del carrito la inicializo
	{
		$_SESSION["chat"]= array();
	}

$manejador=new manejador();
$usuario="root";
$contraseña="";
$dsn="mysql:host=localhost;dbname=chat";

$conexion_mysql=$manejador->conectar_BD($usuario, $contraseña, $dsn);


if(isset($_GET))//Si existe una petición por get, que haga lo que hay dentro
{
	
	//para insertar a la base de datos los mensajes, junto con los nicks, la fecha y la hora del mensaje
	if(isset($_GET["Norigen"])&&isset($_GET["Ndestino"])&&isset($_GET["msg"]))
	{
		$mensaje=$_GET["msg"];
		$origen=$_GET['Norigen'];
		$destino=$_GET['Ndestino'];
		$hora=$_GET["hora"];
		$fecha=$_GET["fecha"];
		
		//Creo el query para insertar los datos
		$query=("Insert INTO chat.chat (ID, nick_origen, nick_destino, mensaje, hora, fecha) VALUES ('','$origen','$destino','$mensaje','$hora','$fecha')");
		
		//Inserto los datos en la base de datos
		$manejador->insertar($conexion_mysql,$query);
		
		$mensajeChat= new mensajeChat($_GET["ultimo"],$mensaje,$origen,$destino,$fecha,$hora);
		
		array_push($_SESSION["chat"],$mensajeChat);
		
		
		echo json_encode($_SESSION["chat"]);
		
	}
	else if (isset($_GET["Norigen"])&&isset($_GET["Ndestino"])&&isset($_GET["ultimo"])) //para hacer una consulta y recuperar los ultimos datos
	{
		$origen=$_GET["Norigen"];
		$destino=$_GET['Ndestino'];
		$ultimo=$_GET['ultimo'];
		
		$mensajes=array();//array para guardar todos los mensajes que seanmayores que el ultimo id que tenia
		$ids=array();//Para guardar  todos los id que he mandado, para luego en js escoger solo el ultimo
		
		$query=("Select * from chat where (nick_destino='$destino' OR nick_destino='$origen') AND ID>'$ultimo' AND (nick_origen='$destino' OR nick_origen='$origen')");
		$resultado=$manejador->seleccionar($conexion_mysql,$query);
		
		$datos=json_encode($resultado->fetchAll(PDO::FETCH_ASSOC));
		
		echo "{".'"mensajes"'.":$datos}"; // IMPORTANTE LAS MALDITAS COMILLAS!!!! TIENEN QUE SER DOBLES!!!
		

		
		
		
		
		
	}
	

}



		
?>