<?php 
require_once 'conexion.php';

class class34clases  extends Conexion
{
	private $PU34IDCLAS;
	private $PU34DESCLA;


	private $conexion;
	
	function __construct()
	{
		$this->conexion = new Conexion();
	}
	//Manda un atributo convertido en minuscula, o ya sea solamente el primer caracter
	public function setAtributo($PU34DESCLA, $valor)
	{
		$this->$PU34DESCLA = ucfirst(strtolower($valor));//Cualquier data al introducir en Mayuscula sera convertido en minuscula
	}

	public function getAtributo($PU34DESCLA)
	{
		return $this->$PU34DESCLA;
	}

	public function buscar($PU34IDCLAS)
	{
		$sql = "CALL SP34_CLASES_BUSCAR('".$PU34IDCLAS."');";
		$result = $this->conexion->consultaRetorno($sql);
		$class34clases = $this->convertToclass34clases($result);
		return $class34clases;
	}

	public function listar()
	{
		$sql = "call SP34_CLASES_MOSTRAR();";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function guardar()
	{
		$sql = "CALL SP34_CLASES_GUARDAR('$this->PU34IDCLAS','$this->PU34DESCLA')";
		$this->conexion->consultaSimple($sql);
	}

	public function actualizar()
	{
		$sql = "CALL SP34_CLASES_ACTUALIZAR('$this->PU34IDCLAS','$this->PU34DESCLA')";
		$this->conexion->consultaSimple($sql);
	}

	public function eliminar()
	{
		$sql = "CALL SP34_CLASES_ELIMINAR('$this->PU34IDCLAS')";
		$this->conexion->consultaSimple($sql);
	}

	public function convertToclass34clases($result)
	{
		$class34clases = new class34clases();
		while ($row = mysqli_fetch_array($result)) {
			$class34clases->setAtributo('PU34IDCLAS',$row[0]);
			$class34clases->setAtributo('PU34DESCLA',$row[1]);
		
		}
		return $class34clases;
	}
}
 ?>