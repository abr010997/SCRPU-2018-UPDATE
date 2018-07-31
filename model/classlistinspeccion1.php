<?php 
require_once 'conexion.php';

class classlistinspeccion1 extends Conexion
{
	private $PU04IDTRA;
	private $PU04FEPLATAFOR;

	private $conexion;

	function __construct()
	{
		$this->conexion = new Conexion();
	}
	
	public function listar()
	{
		$sql = "CALL SP00_LISTAR_INGRESO_TRAMITE_D1234();";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}
	

}
 ?>