<?php 
require_once 'conexion.php';

class class07terrft  extends Conexion
{
	
	private $PU07IDTFR;
	private $PU07NOMTFR;

	private $conexion;
	
	function __construct()
	{
		$this->conexion = new Conexion();
	}
	//Manda un atributo convertido en minuscula, o ya sea solamente el primer caracter
	public function setAtributo($PU07NOMTFR, $valor)
	{
		$this->$PU07NOMTFR = ucfirst(strtolower($valor));//Cualquier data al introducir en Mayuscula sera convertido en minuscula
	}

	public function getAtributo($PU07NOMTFR)
	{
		return $this->$PU07NOMTFR;
	}

	public function buscar($PU07IDTFR)
	{
		$sql = "call SP07_TERRFT_BUSCAR('".$PU07IDTFR."');";
		$result = $this->conexion->consultaRetorno($sql);
		$class07terrft = $this->convertToclass07terrft($result);
		return $class07terrft;
	}

	public function listar()
	{
		$sql = "call SP07_TERRFT_MOSTRAR();";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function guardar()
	{
		$sql = "call SP07_TERRFT_GUARDAR('$this->PU07IDTFR','$this->PU07NOMTFR');";
		$this->conexion->consultaSimple($sql);
	}

	public function actualizar()
	{
		$sql = "call SP07_TERRFT_ACTUALIZAR('$this->PU07IDTFR','$this->PU07NOMTFR');";
		$this->conexion->consultaSimple($sql);
	}

	public function eliminar()
	{
		$sql = "call SP07_TERRFT_ELIMINAR('$this->PU07IDTFR')";
		$this->conexion->consultaSimple($sql);
	}

	public function convertToclass07terrft($result)
	{
		$class07terrft = new class07terrft();
		while ($row = mysqli_fetch_array($result)) {
			$class07terrft->setAtributo('PU07IDTFR',$row[0]);
			$class07terrft->setAtributo('PU07NOMTFR',$row[1]);
	
		}
		return $class07terrft;
	}
}
 ?>