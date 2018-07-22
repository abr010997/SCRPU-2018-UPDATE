<?php 
require_once 'conexion.php';
//`pu09desceg`
//`PU09IDDEG``PU09DESCREG`
class class09desceg  extends Conexion
{
	
	private $PU09IDDEG;
	private $PU09DESCREG;

	private $conexion;
	
	function __construct()
	{
		$this->conexion = new Conexion();
	}
	//Manda un atributo convertido en minuscula, o ya sea solamente el primer caracter
	public function setAtributo($PU09DESCREG, $valor)
	{
		$this->$PU09DESCREG = ucfirst(strtolower($valor));//Cualquier data al introducir en Mayuscula sera convertido en minuscula
	}

	public function getAtributo($PU09DESCREG)
	{
		return $this->$PU09DESCREG;
	}

	public function buscar($PU09IDDEG)
	{
		$sql = "CALL SP09_DESCEG_BUSCAR  ('".$PU09IDDEG."');";
		$result = $this->conexion->consultaRetorno($sql);
		$class09desceg = $this->convertToclass09desceg($result);
		return $class09desceg;
	}

	public function listar()
	{
		$sql = "call SP09_DESCEG_MOSTRAR();";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function guardar()
	{
		$sql = "call SP09_DESCEG_GUARDAR('$this->PU09IDDEG','$this->PU09DESCREG');";
		$this->conexion->consultaSimple($sql);
	}

	public function actualizar()
	{
		$sql = "call SP09_DESCEG_ACTUALIZAR('$this->PU09IDDEG','$this->PU09DESCREG');";
		$this->conexion->consultaSimple($sql);
	}

	public function eliminar()
	{
		$sql = "call SP09_DESCEG_ELIMINAR('$this->PU09IDDEG');";
		$this->conexion->consultaSimple($sql);
	}

	public function convertToclass09desceg($result)
	{
		$class09desceg = new class09desceg();
		while ($row = mysqli_fetch_array($result)) {
			$class09desceg->setAtributo('PU09IDDEG',$row[0]);
			$class09desceg->setAtributo('PU09DESCREG',$row[1]);
		}
		return $class09desceg;
	}
}
 ?>