<?php 
require_once 'conexion.php';

class classindex  extends Conexion
{

	private $conexion;
	
	function __construct()
	{
		$this->conexion = new Conexion();
	}
	

}
 ?>