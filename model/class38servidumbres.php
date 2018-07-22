<?php 
require_once 'conexion.php';

class class38servidumbres  extends Conexion
{

	private $conexion;
	function __construct()
	{
		$this->conexion = new Conexion();
	}
	

	public function listar()
	{
		$sql = "CALL SP38_SERVIDUMBRES_MOSTRAR();";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	
}
 ?>