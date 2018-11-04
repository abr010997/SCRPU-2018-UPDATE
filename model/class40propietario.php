<?php 
require_once 'conexion.php';

class class40propietario extends Conexion
{
	private $PU04IDTRA;
	private $PU40CEDPROPIE;
	private $PU40NOMPROPIE;
	private $PU40APE1PROPIE;
	private $PU40APE2PROPIE;



	private $conexion;
	
	function __construct()
	{
		$this->conexion = new Conexion();
	}
	
	public function setAtributo($PU40NOMPROPIE, $valor)
	{
		$this->$PU40NOMPROPIE = ucfirst(strtolower($valor)); 
	}

	public function getAtributo($PU40NOMPROPIE)
	{
		return $this->$PU40NOMPROPIE;
	}

	public function buscar($PU40CEDPROPIE)
	{
		$sql = "CALL SP40_PROPIETARIO_BUSCAR('".$PU40CEDPROPIE."')";
		$result = $this->conexion->consultaRetorno($sql);
		$class40propietario = $this->convertToclass40propietario($result);
		return $class40propietario;
	}

	public function listar()
	{
		$sql = "CALL SP40_PROPIETARIO_MOSTRAR();";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function guardar()
	{
		$sql = "CALL SP40_PROPIETARIO_GUARDAR('$this->PU40CEDPROPIE','$this->PU40NOMPROPIE','$this->PU40APE1PROPIE','$this->PU40APE2PROPIE');";	

		$this->conexion->consultaSimple($sql);
	}

	public function actualizar()
	{
		$sql = "call SP40_PROPIETARIO_ACTUALIZAR('$this->PU40CEDPROPIE','$this->PU40NOMPROPIE','$this->PU40APE1PROPIE','$this->PU40APE2PROPIE')";	

		$this->conexion->consultaSimple($sql);
	}

	public function eliminar()
	{
		$sql = "call SP40_PROPIETARIO_ELIMINAR('$this->$PU40CEDPROPIE')";	
		$this->conexion->consultaSimple($sql);
	}

	public function convertToclass40propietario($result)
	{
		$class40propietario = new class40propietario();
		while ($row = mysqli_fetch_array($result)) {
			$class40propietario->setAtributo('PU40CEDPROPIE',$row[0]);
			$class40propietario->setAtributo('PU40NOMPROPIE',$row[1]);
			$class40propietario->setAtributo('PU40APE1PROPIE',$row[2]);
			$class40propietario->setAtributo('PU40APE2PROPIE',$row[3]);
			
		}
		return $class40propietario;
	}
}