<?php 
require_once 'conexion.php';

class class01index  extends Conexion
{
	private $conexion;
	
	function __construct()
	{
		$this->conexion = new Conexion();
	}
	
	public function listar()
	{
		$sql = "CALL SP02_PUESTOS_MOSTRAR ();";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}
}
 ?>