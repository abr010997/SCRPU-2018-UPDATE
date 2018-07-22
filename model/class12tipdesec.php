<?php 
require_once 'conexion.php';

class class12tipdesec  extends Conexion
{
	
	private $PU12IDTDESEC;
	private $PU12TIPODES;

	private $conexion;
	
	function __construct()
	{
		$this->conexion = new Conexion();
	}
	//Manda un atributo convertido en minuscula, o ya sea solamente el primer caracter
	public function setAtributo($PU12TIPODES, $valor)
	{
		$this->$PU12TIPODES = ucfirst(strtolower($valor));//Cualquier data al introducir en Mayuscula sera convertido en minuscula
	}

	public function getAtributo($PU12TIPODES)
	{
		return $this->$PU12TIPODES;
	}

	public function buscar($PU12IDTDESEC)
	{
		$sql = "CALL SP12_TIPDESEC_BUSCAR  ('".$PU12IDTDESEC."');";
		$result = $this->conexion->consultaRetorno($sql);
		$class12tipdesec = $this->convertToclass12tipdesec($result);
		return $class12tipdesec;
	}

	public function listar()
	{
		$sql = "CALL SP12_TIPDESEC_MOSTRAR();";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function guardar()
	{
		$sql = "call SP12_TIPDESEC_GUARDAR('$this->PU12IDTDESEC','$this->PU12TIPODES');";
		$this->conexion->consultaSimple($sql);
	}

	public function actualizar()
	{
		$sql = "call SP12_TIPDESEC_ACTUALIZAR('$this->PU12IDTDESEC','$this->PU12TIPODES');";
		$this->conexion->consultaSimple($sql);
	}

	public function eliminar()
	{
		$sql = "call SP12_TIPDESEC_ELIMINAR('$this->PU12IDTDESEC');";
		$this->conexion->consultaSimple($sql);
	}

	public function convertToclass12tipdesec($result)
	{
		$class12tipdesec = new class12tipdesec();
		while ($row = mysqli_fetch_array($result)) {
			$class12tipdesec->setAtributo('PU12IDTDESEC',$row[0]);
			$class12tipdesec->setAtributo('PU12TIPODES',$row[1]);
		}
		return $class12tipdesec;
	}
}
 ?>