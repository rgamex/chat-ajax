<?php

class mensajeChat
{
	
	public $id;
	public $mensaje;
	public $origen;
	public $destino;
	public $fecha;
	public $hora;
	
	function mensajeChat($id,$mensaje, $origen, $destino, $fecha, $hora)
	{
		$this->id=$id;
		$this->mensaje=$mensaje;
		$this->origen=$origen;
		$this->destino=$destino;
		$this->fecha=$fecha;
		$this->hora=$hora;
	}
	
	
}




?>