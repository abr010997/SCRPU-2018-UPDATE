<?php 
require_once 'conexion.php';

class class10aspbio  extends Conexion
{
	
	private $PU10IDASBIO;
	private $PU10DESCABIO;

	private $conexion;
	
	function __construct()
	{
		$this->conexion = new Conexion();
	}
	//Manda un atributo convertido en minuscula, o ya sea solamente el primer caracter
	public function setAtributo($PU10DESCABIO, $valor)
	{
		$this->$PU10DESCABIO = ucfirst(strtolower($valor));//Cualquier data al introducir en Mayuscula sera convertido en minuscula
	}

	public function getAtributo($PU10DESCABIO)
	{
		return $this->$PU10DESCABIO;
	}

	public function buscar($PU10IDASBIO)
	{
		$sql = "CALL SP10_ASPBIO_BUSCAR  ('".$PU10IDASBIO."');";
		$result = $this->conexion->consultaRetorno($sql);
		$class10aspbio = $this->convertToclass10aspbio($result);
		return $class10aspbio;
	}

	public function listar()
	{
		$sql = "CALL SP10_ASPBIO_MOSTRAR();";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function guardar()
	{
		$sql = "call SP10_ASPBIO_GUARDAR('$this->PU10IDASBIO','$this->PU10DESCABIO');";
		$this->conexion->consultaSimple($sql);
	}

	public function actualizar()
	{
		$sql = "call SP10_ASPBIO_ACTUALIZAR('$this->PU10IDASBIO','$this->PU10DESCABIO');";
		$this->conexion->consultaSimple($sql);
	}

	public function eliminar()
	{
		$sql = "call SP10_ASPBIO_ELIMINAR('$this->PU10IDASBIO');";
		$this->conexion->consultaSimple($sql);
	}

	public function convertToclass10aspbio($result)
	{
		$class10aspbio = new class10aspbio();
		while ($row = mysqli_fetch_array($result)) {
			$class10aspbio->setAtributo('PU10IDASBIO',$row[0]);
			$class10aspbio->setAtributo('PU10DESCABIO',$row[1]);
		}
		return $class10aspbio;
	}
}
 ?>