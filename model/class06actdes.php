<?php 
require_once 'conexion.php';

class class06actdes  extends Conexion
{
	
	private $PU06IDACTDES;
	private $PU06DESAD;

	private $conexion;
	
	function __construct()
	{
		$this->conexion = new Conexion();
	}
	//Manda un atributo convertido en minuscula, o ya sea solamente el primer caracter
	public function setAtributo($PU06DESAD, $valor)
	{
		$this->$PU06DESAD = ucfirst(strtolower($valor));//Cualquier data al introducir en Mayuscula sera convertido en minuscula
	}

	public function getAtributo($PU06DESAD)
	{
		return $this->$PU06DESAD;
	}

	public function buscar($PU06IDACTDES)
	{
		$sql = "Call SP06_ACTDES_BUSCAR('".$PU06IDACTDES."');";
		$result = $this->conexion->consultaRetorno($sql);
		$class06actdes = $this->convertToclass06actdes($result);
		return $class06actdes;
	}

	public function listar()
	{
		$sql = "call SP06_ACTDES_MOSTRAR()";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function guardar()
	{
		$sql = "call SP06_ACTDES_GUARDAR('$this->PU06IDACTDES','$this->PU06DESAD');";
		$this->conexion->consultaSimple($sql);
	}

	public function actualizar()
	{
		$sql = "call SP06_ACTDES_ACTUALIZAR('$this->PU06IDACTDES','$this->PU06DESAD');";
		$this->conexion->consultaSimple($sql);
	}

	public function eliminar()
	{
		$sql = "call SP06_ACTDES_ELIMINAR('$this->PU06IDACTDES');";
		$this->conexion->consultaSimple($sql);
	}

	public function convertToclass06actdes($result)
	{
		$class06actdes = new class06actdes();
		while ($row = mysqli_fetch_array($result)) {
			$class06actdes->setAtributo('PU06IDACTDES',$row[0]);
			$class06actdes->setAtributo('PU06DESAD',$row[1]);
		}
		return $class06actdes;
	}
}
 ?>