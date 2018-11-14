<?php 
require_once 'conexion.php';

class class39solicitante extends Conexion
{
	private $PU04IDTRA;
	private $PU39CEDSOLICI;
	private $PU39NOMSOLICI;
	private $PU39APE1SOLICI;
	private $PU39APE2SOLICI;



	private $conexion;
	
	function __construct()
	{
		$this->conexion = new Conexion();
	}
	
	public function setAtributo($PU39NOMSOLICI, $valor)
	{
		$this->$PU39NOMSOLICI = ucfirst(strtolower($valor)); 
	}

	public function getAtributo($PU39NOMSOLICI)
	{
		return $this->$PU39NOMSOLICI;
	}

	public function buscar($PU39CEDSOLICI)
	{
		$sql = "CALL SP39_SOLICITANTE_BUSCAR('".$PU39CEDSOLICI."')";
		$result = $this->conexion->consultaRetorno($sql);
		$class39solicitante = $this->convertToclass39solicitante($result);
		return $class39solicitante;
	}

	public function listar()
	{
		$sql = "CALL SP39_SOLICITANTE_MOSTRAR();";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function guardar()
	{
		$sql = "call SP39_SOLICITANTE_GUARDAR('$this->PU39CEDSOLICI','$this->PU39NOMSOLICI','$this->PU39APE1SOLICI','$this->PU39APE2SOLICI');";	

		$this->conexion->consultaSimple($sql);
	}

	public function actualizar()
	{
		$sql = "call SP39_SOLICITANTE_ACTUALIZAR('$this->PU39CEDSOLICI','$this->PU39NOMSOLICI','$this->PU39APE1SOLICI','$this->PU39APE2SOLICI')";	

		$this->conexion->consultaSimple($sql);
	}

	public function eliminar()
	{
		$sql = "call SP39_SOLICITANTE_ELIMINAR('$this->PU39CEDSOLICI')";	
		$this->conexion->consultaSimple($sql);
	}

	public function convertToclass39solicitante($result)
	{
		$class39solicitante = new class39solicitante();
		while ($row = mysqli_fetch_array($result)) {
			$class39solicitante->setAtributo('PU39CEDSOLICI',$row[0]);
			$class39solicitante->setAtributo('PU39NOMSOLICI',$row[1]);
			$class39solicitante->setAtributo('PU39APE1SOLICI',$row[2]);
			$class39solicitante->setAtributo('PU39APE2SOLICI',$row[3]);
			
		}
		return $class39solicitante;
	}
}