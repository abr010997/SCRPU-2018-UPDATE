<?php 
require_once 'conexion.php';

class class03puestos  extends Conexion
{
	private $PU03IDPUES;
	private $PU03PUESTO;

	private $conexion;
	
	function __construct()
	{
		$this->conexion = new Conexion();
	}
	
	public function setAtributo($PU03PUESTO, $valor)
	{
		$this->$PU03PUESTO = ucfirst(strtolower($valor)); 
	}

	public function getAtributo($PU03PUESTO)
	{
		return $this->$PU03PUESTO;
	}

	public function buscar($PU03IDPUES)
	{
		$sql = "CALL SP03_PUESTOS_BUSCAR ('".$PU03IDPUES."');";
		$result = $this->conexion->consultaRetorno($sql);
		$cliente = $this->convertToclass03puestos($result);
		return $cliente;
	}

	public function listar()
	{
		$sql = "CALL SP03_PUESTOS_MOSTRAR ();";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function guardar()
	{
		$sql = "CALL SP03_PUESTOS_GUARDAR ('$this->PU03IDPUES','$this->PU03PUESTO');";
		$this->conexion->consultaSimple($sql);
	}

	public function actualizar()
	{
		$sql = "CALL SP03_PUESTOS_ACTUALIZAR ('$this->PU03IDPUES','$this->PU03PUESTO');";
		$this->conexion->consultaSimple($sql);
	}

	public function eliminar()
	{
		$sql = "CALL SP03_PUESTOS_ELIMINAR ('$this->PU03IDPUES');";
		$this->conexion->consultaSimple($sql);
	}

	public function convertToclass03puestos($result)
	{
		$class03puestos = new class03puestos();
		while ($row = mysqli_fetch_array($result)) {
			$class03puestos->setAtributo('PU03IDPUES',$row[0]);
			$class03puestos->setAtributo('PU03PUESTO',$row[1]);
		}
		return $class03puestos;
	}
}
 ?>