<?php 
require_once 'conexion.php';

class class16servae  extends Conexion
{
	private $PU16IDSAE;
	private $PU16DESCAE;

	private $conexion;
	
	function __construct()
	{
		$this->conexion = new Conexion();
	}
	//Manda un atributo convertido en minuscula, o ya sea solamente el primer caracter
	public function setAtributo($PU16DESCAE, $valor)
	{
		$this->$PU16DESCAE = ucfirst(strtolower($valor));//Cualquier data al introducir en Mayuscula sera convertido en minuscula
	}

	public function getAtributo($PU16DESCAE)
	{
		return $this->$PU16DESCAE;
	}

	public function buscar($PU16IDSAE)
	{
		$sql = "CALL SP16_SERVAE_BUSCAR  ('".$PU16IDSAE."');";
		$result = $this->conexion->ConsultaRetorno($sql);
		$class16servae = $this->convertToclass16servae($result);
		return $class16servae;
	}

	public function listar()
	{
		$sql = "CALL SP16_SERVAE_MOSTRAR();";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function guardar()
	{
		$sql = "call SP16_SERVAE_GUARDAR('$this->PU16IDSAE','$this->PU16DESCAE');";
		$this->conexion->ConsultaSimple($sql);
	}

	public function actualizar()
	{
		$sql = "call SP16_SERVAE_ACTUALIZAR('$this->PU16IDSAE','$this->PU16DESCAE');";
		$this->conexion->ConsultaSimple($sql);
	}

	public function eliminar()
	{
		$sql = "call SP16_SERVAE_ELIMINAR('$this->PU16IDSAE');";
		$this->conexion->ConsultaSimple($sql);
	}

	public function convertToclass16servae($result)
	{
		$class16servae = new class16servae();
		while ($row = mysqli_fetch_array($result)) {
			$class16servae->setAtributo('PU16IDSAE',$row[0]);
			$class16servae->setAtributo('PU16DESCAE',$row[1]);
		}
		return $class16servae;
	}
}
?>