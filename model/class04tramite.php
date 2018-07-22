<?php 
require_once 'conexion.php';

class class04tramite extends Conexion
{
//class04tramite
	private $PU04IDTRA;
	private $PU04FETRA;
	private $PU07IDTFR;
	private $PU04NORTE;
	private $PU04ESTE;
	private $PU04ALTITUD;
	private $PU12IDTDESEC;
//ESPACIO GEOGRAFICO
	private $PU09IDDEG1;
	private $PU09IDDEG2;
	private $PU09IDDEG3;
	private $PU09IDDEG4;
	private $PU09IDDEG5;
	private $PU09IDDEG6;
	private $PU09IDDEG7;
//ASPECTO BIOFISICO
	private $PU10IDASBIO1;
	private $PU10IDASBIO2;
	private $PU10IDASBIO3;
	private $PU10IDASBIO4;
	private $PU10IDASBIO5;
	private $PU10IDASBIO6;
	//AFECTACION DE AREAS DE PROTECCION
	private $PU13IDAAP1;
	private $PU13IDAAP2;
	private $PU13IDAAP3;
	private $PU13IDAAP4;
	private $PU13IDAAP5;
	private $PU13IDAAP6;
	private $PU13IDAAP7;

//ACTIVIDAD A DESARROLLAR
	private $PU06IDACTDES1;
	private $PU06IDACTDES2;
	private $PU06IDACTDES3;
	private $PU06IDACTDES4;
	private $PU06IDACTDES5;
	private $PU06IDACTDES6;
	
	// private $PU15IDSERVI;


	private $conexion;
	
	function __construct()
	{
		$this->conexion = new Conexion();
	}
	
	// public function setAtributo($PU04IDTRA, $valor)
	// {
	// 	$this->$PU04IDTRA = ($valor); 
	// }

	// public function getAtributo($PU04IDTRA)
	// {
	// 	return $this->$PU04IDTRA;
	// }

	// public function buscar($PU04IDTRA)
	// {
		
	// 	$sql = "CALL SP04_REGISTROTRA_MOSTRAR_INFOR('".$PU04IDTRA."');";
	// 	$result = $this->conexion->consultaRetorno($sql);
	// 	$class04tramite = $this->convertToclass04tramite($result);
	// 	return $class04tramite;
	// }
// lista el tramitey sus datos
	public function listarRetrasado()
	{
		$sql = "CALL SP04_TRAMITE_MOSTRARRETRASADOS();";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}
	public function listarNuevo()
	{
		$sql = "CALL SP04_TRAMITE_MOSTRARNUEVOS();";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function listarProceso()
	{
		$sql = "CALL SP10_TIPDESEC_MOSTRAR();";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function listarOficina()
	{
		$sql = "CALL SP05_DESCEG_MOSTRAR();";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}
	public function listarAceptados()
	{
		$sql = "CALL SP06_ASPBIO_MOSTRAR();";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function listarDenegados()
	{
		$sql = "CALL SP04_ACTDES_MOSTRAR();";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}
	// public function listarAAP()
	// {
	// 	$sql = "CALL SP13_AAREP_MOSTRAR();";
	// 	$result = $this->conexion->consultaRetorno($sql);
	// 	return $result;
	// }

	// public function guardar()
	// {

	// 	$sql = "call SP04_REGISTROTRA_GUARDAR(
	// 	'$this->PU04IDTRA',
	// 	'$this->PU04FETRA',
	// 	'$this->PU07IDTFR',
	// 	'$this->PU04NORTE',
	// 	'$this->PU04ESTE',
	// 	'$this->PU04ALTITUD',
	// 	'$this->PU12IDTDESEC',

	// 	'$this->PU09IDDEG1',
	// 	'$this->PU09IDDEG2',
	// 	'$this->PU09IDDEG3',
	// 	'$this->PU09IDDEG4',
	// 	'$this->PU09IDDEG5',
	// 	'$this->PU09IDDEG6',
	// 	'$this->PU09IDDEG7,

	// 	'$this->PU10IDASBIO1',
	// 	'$this->PU10IDASBIO2',
	// 	'$this->PU10IDASBIO3',
	// 	'$this->PU10IDASBIO4',
	// 	'$this->PU10IDASBIO5',
	// 	'$this->PU10IDASBIO6',

	// 	'$this->PU13IDAAP1',
	// 	'$this->PU13IDAAP2',
	// 	'$this->PU13IDAAP3',
	// 	'$this->PU13IDAAP4',
	// 	'$this->PU13IDAAP5',
	// 	'$this->PU13IDAAP6',
	// 	'$this->PU13IDAAP7',
		
	// 	'$this->PU06IDACTDES1',
	// 	'$this->PU06IDACTDES2',
	// 	'$this->PU06IDACTDES3',
	// 	'$this->PU06IDACTDES4',
	// 	'$this->PU06IDACTDES5',
	// 	'$this->PU06IDACTDES6');";

	// 	$this->conexion->consultaSimple($sql);
	// }

	// public function actualizar()
	// {
	// 	$sql = "call SP04_REGISTROTRA_ACTUALIZAR(
	// 	'$this->PU04IDTRA',
	// 	'$this->PU04FETRA',
	// 	'$this->PU07IDTFR',
	// 	'$this->PU04NORTE',
	// 	'$this->PU04ESTE',
	// 	'$this->PU04ALTITUD',
	// 	'$this->PU12IDTDESEC',

	// 	'$this->PU09IDDEG1',
	// 	'$this->PU09IDDEG2',
	// 	'$this->PU09IDDEG3',
	// 	'$this->PU09IDDEG4',
	// 	'$this->PU09IDDEG5',
	// 	'$this->PU09IDDEG6',
	// 	'$this->PU09IDDEG7,

	// 	'$this->PU10IDASBIO1',
	// 	'$this->PU10IDASBIO2',
	// 	'$this->PU10IDASBIO3',
	// 	'$this->PU10IDASBIO4',
	// 	'$this->PU10IDASBIO5',
	// 	'$this->PU10IDASBIO6',

	// 	'$this->PU13IDAAP1',
	// 	'$this->PU13IDAAP2',
	// 	'$this->PU13IDAAP3',
	// 	'$this->PU13IDAAP4',
	// 	'$this->PU13IDAAP5',
	// 	'$this->PU13IDAAP6',
	// 	'$this->PU13IDAAP7',
		
	// 	'$this->PU06IDACTDES1',
	// 	'$this->PU06IDACTDES2',
	// 	'$this->PU06IDACTDES3',
	// 	'$this->PU06IDACTDES4',
	// 	'$this->PU06IDACTDES5',
	// 	'$this->PU06IDACTDES6');";

	// 	$this->conexion->consultaSimple($sql);
	// }

	// public function eliminar()
	// {
	// 	$sql = "cal SP04_REGISTROTRA_ELIMINAR('$this->PU04IDTRA');";	
	// 	$this->conexion->consultaSimple($sql);
	// }

	public function convertToclass04tramite($result)
	{
		$class04tramite = new class04tramite();
		while ($row = mysqli_fetch_array($result)) {
			$class04tramite->setAtributo('PU04IDTRA',$row[0]);
			$class04tramite->setAtributo('PU04FETRA',$row[1]);
			$class04tramite->setAtributo('PU07IDTFR',$row[2]);
			$class04tramite->setAtributo('PU04NORTE',$row[3]);
			$class04tramite->setAtributo('PU04ESTE',$row[4]);
			$class04tramite->setAtributo('PU04ALTITUD',$row[5]);
			$class04tramite->setAtributo('PU12IDTDESEC',$row[6]);
		}
		return $class04tramite;
	}
}
 ?>