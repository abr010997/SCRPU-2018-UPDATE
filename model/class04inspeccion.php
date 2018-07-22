<?php 
require_once 'conexion.php';

class class04inspeccion extends Conexion
{
	private $PU04IDTRA;
	private $PU04NORTE;
	private $PU04ESTE;
	private $PU04ALTITUD;
	
	private $conexion;
	
	function __construct()
	{
		$this->conexion = new Conexion();
	}
	
	public function setAtributo($nombre, $valor)
	{
		$this->$nombre = ucfirst(strtolower($valor)); 
	}

	public function getAtributo($nombre)
	{
		return $this->$nombre;
	}

	public function listar()
	{
		$sql = "CALL SP00_LISTAR_INGRESO_TRAMITE();";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}
	
 	
 	public function guardar($pu09tradeg,$pu10aspbio,$pu13aap,$pu05actdes)
	{
		$sql = "call SP04_REGISTROTR_GUARDAR('$this->PU04IDTRA','$this->PU04NORTE',
		'$this->PU04ESTE','$this->PU04ALTITUD');";
		$this->conexion->consultaSimple($sql);
		//Inserción de aspecto a la tabla pivote
		foreach ($pu09tradeg as $tradegId) {			
			$sql2 = "call SP09_DESCEG_TRA_GUARDAR('$this->PU04IDTRA','$tradegId');";
			$this->conexion->consultaSimple($sql2);
		}
		//Inserción de pu10aspbio a la tabla pivote
		foreach ($pu10aspbio as $aspbioId) {			
			$sql3 = "CALL SP10_ASPBIO_TRA_GUARDAR('$this->PU04IDTRA','$aspbioId');";
			$this->conexion->consultaSimple($sql3);
		}
		//Inserción de pu13aap a la tabla pivote
		foreach ($pu13aap as $pu13aapId) {			
			$sql4 = "CALL SP13_AAREP_TRA_GUARDAR('$this->PU04IDTRA','$pu13aapId');";
			$this->conexion->consultaSimple($sql4);
		}
		//Inserción de pu13aap a la tabla pivote
		foreach ($pu05actdes as $pu05actdesId) {			
			$sql4 = "CALL SP06_ACTDES_TRA_GUARDAR('$this->PU04IDTRA','$pu05actdesId');";
			$this->conexion->consultaSimple($sql4);
		}
	}
}
?>
