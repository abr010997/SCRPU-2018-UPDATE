<?php 
require_once 'conexion.php';

class class26planreg  extends Conexion
{
	private $PU26IDPLAN;
	private $PU26PLNDESC;


	private $conexion;
	
	function __construct()
	{
		$this->conexion = new Conexion();
	}
	//Manda un atributo convertido en minuscula, o ya sea solamente el primer caracter
	public function setAtributo($PU26PLNDESC, $valor)
	{
		$this->$PU26PLNDESC = ucfirst(strtolower($valor));//Cualquier data al introducir en Mayuscula sera convertido en minuscula
	}

	public function getAtributo($PU26PLNDESC)
	{
		return $this->$PU26PLNDESC;
	}

	public function buscar($PU26IDPLAN)
	{
		$sql = "CALL SP26_PLANREG_BUSCAR('".$PU26IDPLAN."');";
		$result = $this->conexion->consultaRetorno($sql);
		$class26planreg = $this->convertToclass26planreg($result);
		return $class26planreg;
	}

	public function listar()
	{
		$sql = "call SP26_PLANREG_MOSTRAR();";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function listarNicoya()
	{
		$sql = "call SP26_PLANREGACTIVI_NICOYA_MOSTRAR();";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}
	public function listarSamara()
	{
		$sql = "call SP26_PLANREGACTIVI_SAMARA_MOSTRAR();";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function guardar()
	{
		$sql = "CALL SP26_PLANREG_GUARDAR('$this->PU26IDPLAN','$this->PU26PLNDESC')";
		$this->conexion->consultaSimple($sql);
	}

	public function actualizar()
	{
		$sql = "CALL SP26_PLANREG_ACTUALIZAR('$this->PU26IDPLAN','$this->PU26PLNDESC')";
		$this->conexion->consultaSimple($sql);
	}

	public function eliminar()
	{
		$sql = "CALL SP26_PLANREG_ELIMINAR('$this->PU26IDPLAN')";
		$this->conexion->consultaSimple($sql);
	}

	public function convertToclass26planreg($result)
	{
		$class26planreg = new class26planreg();
		while ($row = mysqli_fetch_array($result)) {
			$class26planreg->setAtributo('PU26IDPLAN',$row[0]);
			$class26planreg->setAtributo('PU26PLNDESC',$row[1]);
		
		}
		return $class26planreg;
	}

	


}
 ?>