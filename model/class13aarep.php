<?php 
require_once 'conexion.php';

class class13aarep  extends Conexion
{
	
	private $PU13IDAAP;
	private $PU13DESCAAP;

	private $conexion;
	
	function __construct()
	{
		$this->conexion = new Conexion();
	}
	//Manda un atributo convertido en minuscula, o ya sea solamente el primer caracter
	public function setAtributo($PU13DESCAAP, $valor)
	{
		$this->$PU13DESCAAP = ucfirst(strtolower($valor));//Cualquier data al introducir en Mayuscula sera convertido en minuscula
	}

	public function getAtributo($PU13DESCAAP)
	{
		return $this->$PU13DESCAAP;
	}

	public function buscar($PU13IDAAP)
	{
		$sql = "CALL SP13_AAREP_BUSCAR  ('".$PU13IDAAP."');";
		$result = $this->conexion->consultaRetorno($sql);
		$class13aarep = $this->convertToclass13aarep($result);
		return $class13aarep;
	}

	public function listar()
	{
		$sql = "CALL SP13_AAREP_MOSTRAR();";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function guardar()
	{
		$sql = "call SP13_AAREP_GUARDAR('$this->PU13IDAAP','$this->PU13DESCAAP');";
		$this->conexion->consultaSimple($sql);
	}

	public function actualizar()
	{
		$sql = "call SP13_AAREP_ACTUALIZAR('$this->PU13IDAAP','$this->PU13DESCAAP');";
		$this->conexion->consultaSimple($sql);
	}

	public function eliminar()
	{
		$sql = "call SP13_AAREP_ELIMINAR('$this->PU13IDAAP');";
		$this->conexion->consultaSimple($sql);
	}

	public function convertToclass13aarep($result)
	{
		$class13aarep = new class13aarep();
		while ($row = mysqli_fetch_array($result)) {
			$class13aarep->setAtributo('PU13IDAAP',$row[0]);
			$class13aarep->setAtributo('PU13DESCAAP',$row[1]);
	
		}
		return $class13aarep;
	}
}
 ?>