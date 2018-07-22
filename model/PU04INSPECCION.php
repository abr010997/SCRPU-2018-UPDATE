<?php 
require_once 'conexion.php';
class PU04INSPECCION extends Conexion
{
	private $PU04IDTRA;
	private $PU04NORTE;
	private $PU04ESTE;
	private $PU04ALTITUD;
	private $PU04OBSERVACIONES;
	private $PU09OBSERVACIONES;
	private $PU10OBSERVACIONES;
	private $PU06OBSERVACIONES;
	private $PU12OBSERVACIONES;
	private $PU24TIPOCONSTRUCCION;
	private $PU38OBSERVACIONES;
	
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

	public function guardarInspeccion()
	{
		$sql = "call SP04_TRAMITEESTADO_GUARDAR('$this->PU04IDTRA');";
		$this->conexion->consultaSimple($sql);
	}	

		public function guardarObservacion()
	{
		$sql = "call SP04_OBSERVACIONES_TRAMITE_GUARDAR('$this->PU04IDTRA','$this->PU04OBSERVACIONES');";
		$this->conexion->consultaSimple($sql);
	}	
	
	public function guardarObservacionDesceg()
	{
		$sql = "call SP09_OBSERVACIONES_DESCEG_GUARDAR('$this->PU04IDTRA','$this->PU09OBSERVACIONES');";
		$this->conexion->consultaSimple($sql);
	}
	public function guardarObservacionAspBio()
	{
		$sql = "call SP10_OBSERVACIONES_DESCEG_GUARDAR('$this->PU04IDTRA','$this->PU10OBSERVACIONES');";
		$this->conexion->consultaSimple($sql);
	}	
	public function guardarObservacionActdes()
	{
		$sql = "call SP06_OBSERVACIONES_ACTDES_GUARDAR('$this->PU04IDTRA','$this->PU06OBSERVACIONES');";
		$this->conexion->consultaSimple($sql);
	}	
	public function guardarObservacionTipdesc()
	{
		$sql = "call SP12_OBSERVACIONES_TIPDESC_GUARDAR('$this->PU04IDTRA','$this->PU12OBSERVACIONES');";
		$this->conexion->consultaSimple($sql);
	}	
	////////////////////////
	public function guardarObservacionAccesos()
	{
		$sql = "call SP38_OBSERVACIONES_ACCESOS_GUARDAR('$this->PU04IDTRA','$this->PU38OBSERVACIONES');";
		$this->conexion->consultaSimple($sql);
	}	
	
	///////////////////////
	
	public function guardarTipoInfra()
	{
		$sql = "call SP24_TIPODECONTRUCCION_INFEST_GUARDAR('$this->PU04IDTRA','$this->PU24TIPOCONSTRUCCION');";
		$this->conexion->consultaSimple($sql);
	}	
	

 	
 	public function guardar($pu09tradeg,$pu10aspbio,$pu13aap,$pu05actdes,$pu07terrft,$pu12tipdesec,
 		$pu21servicios,$pu22tredv)
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
		//Inserción de pu05actdes a la tabla pivote
		foreach ($pu05actdes as $pu05actdesId) {			
			$sql4 = "CALL SP06_ACTDES_TRA_GUARDAR('$this->PU04IDTRA','$pu05actdesId');";
			$this->conexion->consultaSimple($sql4);
		}//Inserción de pu05actdes a la tabla pivote
		foreach ($pu07terrft as $pu07terrftId) {			
			$sql9 = "CALL SP07_TERRFR_TRA_GUARDAR('$this->PU04IDTRA','$pu07terrftId');";
			$this->conexion->consultaSimple($sql9);
		}
		foreach ($pu12tipdesec as $pu12tipdesecId) {			
			$sql9 = "CALL SP12_TIPODESEC_TRA_GUARDAR('$this->PU04IDTRA','$pu12tipdesecId');";
			$this->conexion->consultaSimple($sql9);
		}
		foreach ($pu21servicios as $pu21serviciosId) {			
			$sql9 = "CALL SP121_SERVICIOS_TRA_GUARDAR('$this->PU04IDTRA','$pu21serviciosId');";
			$this->conexion->consultaSimple($sql9);
		}
		foreach ($pu22tredv as $pu21tredvId) {			
			$sql9 = "CALL SP22_TREDV_TRA_GUARDAR('$this->PU04IDTRA','$pu21tredvId');";
			$this->conexion->consultaSimple($sql9);
		}
	}
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function actualizar()
	{
		$sql = "call SP01_REGTRA_ACTUALIZAR('$this->PU04IDTRA','$this->PU04NORTE',
		'$this->PU04ESTE','$this->PU04ALTITUD')";	

		$this->conexion->consultaSimple($sql);
	}
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function guardarespaciogeo($pu09tradeg)
	{		

		foreach ($pu09tradeg as $tradegId) {			
			$sql12 = "call SP09_DESCEG_TRA_GUARDAR('$this->PU04IDTRA','$tradegId');";
			$this->conexion->consultaSimple($sql12);
		}		
	}
	public function guardaraspectosbio($pu10aspbio)
	{		

		foreach ($pu10aspbio as $aspbioId) {			
			$sql3 = "CALL SP10_ASPBIO_TRA_GUARDAR('$this->PU04IDTRA','$aspbioId');";
			$this->conexion->consultaSimple($sql3);
		}	
	}
	public function guardaraaproteccion($pu10aspbio)
	{		

		foreach ($pu13aap as $pu13aapId) {			
			$sql4 = "CALL SP13_AAREP_TRA_GUARDAR('$this->PU04IDTRA','$pu13aapId');";
			$this->conexion->consultaSimple($sql4);
		}
	}


	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///
	///
	public function listar()
	{
		$sql = "CALL SP00_LISTAR_INGRESO_TRAMITE();";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}
	public function listarTraRealizado()
	{
		$sql = "CALL SP00_LISTAR_TRAMITE_REALIZADO();";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}
	/////////////////////////////////////////////////////////////
	public function buscar($idtramite)
	{
		$sql4 = "SELECT * FROM pu04regtra WHERE PU04IDTRA ='".$idtramite."'";
		$result = $this->conexion->consultaRetorno($sql4);
		$tramite = $this->convertToTramite($result);
		return $tramite;
	}
	/////////////////////////////////////////////////////////////
	public function buscarTraIng($idtramite)
	{
		$sql4 = "SELECT * FROM pu04tramite1 WHERE PU04IDTRA ='".$idtramite."'";
		$result = $this->conexion->consultaRetorno($sql4);
		$tramite = $this->convertToTramite($result);
		return $tramite;
	}

	public function buscarTraIng1($PU04IDTRA)
	{
		$sql = "CALL SP04_REGTRAMITEINFO_REGTRA_BUSCAR ('".$PU04IDTRA."');";
		$result = $this->conexion->consultaRetorno($sql);
		$cliente = $this->convertToTramite1($result);
		return $cliente;
	}
public function convertToTramite1($result)
	{
		$tramite = new PU04INSPECCION();
		while ($row = mysqli_fetch_array($result)) {
			$tramite->setAtributo('PU04IDTRA',$row[0]);
			$tramite->setAtributo('PU04NORTE',$row[1]);
			$tramite->setAtributo('PU04ESTE',$row[2]);			
			$tramite->setAtributo('PU04ALTITUD',$row[3]);
	
		}
		return $tramite;
	}
/*	public function eliminar()
	{
		$sql = "DELETE FROM tramite WHERE id = '$this->id';";	
		$this->conexion->consultaSimple($sql);
	}
//No va a eliminar porque tiene llaves foráneas*/
	public function convertToTramite($result)
	{
		$tramite = new PU04INSPECCION();
		while ($row = mysqli_fetch_array($result)) {
			$tramite->setAtributo('PU04IDTRA',$row[0]);
			$tramite->setAtributo('PU04NORTE',$row[1]);
			$tramite->setAtributo('PU04ESTE',$row[2]);			
			$tramite->setAtributo('PU04ALTITUD',$row[3]);
	
		}
		return $tramite;
	}
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function eliminarActividades($idtramite)
	{
		$sql5 = "DELETE FROM PU06TRARESIDENCIAL WHERE PU04IDTRA = '".$idtramite."';";	
		$this->conexion->consultaSimple($sql5);		
	}

	public function asignarActividades($idtramite, $idactdes)
	{
		$sql6 = "INSERT INTO PU06TRARESIDENCIAL VALUES ('".$idtramite."','".$idactdes."');";
		$this->conexion->consultaSimple($sql6);	
	}

	public function tieneActividades($idtramite, $idactdes)
	{
		
		$sql7 = "SELECT COUNT(*) AS total FROM PU06TRARESIDENCIAL WHERE PU04IDTRA='".$idtramite."' AND PU06IDACTDES='".$idactdes."';";
		$result = $this->conexion->consultaRetorno($sql7);
		$row = mysqli_fetch_array($result);		
		return $row;

	
	}
	public function getTodasActividades()
	{
		$sql8 = "SELECT * FROM pu06actdes WHERE PU06IDTIPO = 1;";
		$result = $this->conexion->consultaRetorno($sql8);
		return $result;
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function eliminarActividades2($idtramite)
	{
		$sql5 = "DELETE FROM PU06TRADESARROLLOS WHERE PU04IDTRA = '".$idtramite."';";	
		$this->conexion->consultaSimple($sql5);		
	}

	public function asignarActividades2($idtramite, $idactdes)
	{
		$sql6 = "INSERT INTO PU06TRADESARROLLOS VALUES ('".$idtramite."','".$idactdes."');";
		$this->conexion->consultaSimple($sql6);	
	}

	public function tieneActividades2($idtramite, $idactdes)
	{
		
		$sql7 = "SELECT COUNT(*) AS total15 FROM PU06TRADESARROLLOS WHERE PU04IDTRA='".$idtramite."' AND PU06IDACTDES='".$idactdes."';";
		$result = $this->conexion->consultaRetorno($sql7);
		$row = mysqli_fetch_array($result);		
		return $row;

	
	}

	public function getTodasActividadesDesarrollo()
	{
		//$sql = "CALL SP06_ACTIVIDAD_DESARROLLOS_MOSTRAR();";
		$sql = "SELECT * FROM pu06actdes WHERE PU06IDTIPO = 2;";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function eliminarActividades3($idtramite)
	{
		$sql5 = "DELETE FROM PU06TRACOMERCIAL WHERE PU04IDTRA = '".$idtramite."';";	
		$this->conexion->consultaSimple($sql5);		
	}

	public function asignarActividades3($idtramite, $idactdes)
	{
		$sql6 = "INSERT INTO PU06TRACOMERCIAL VALUES ('".$idtramite."','".$idactdes."');";
		$this->conexion->consultaSimple($sql6);	
	}

	public function tieneActividades3($idtramite, $idactdes)
	{
		
		$sql7 = "SELECT COUNT(*) AS total16 FROM PU06TRACOMERCIAL WHERE PU04IDTRA='".$idtramite."' AND PU06IDACTDES='".$idactdes."';";
		$result = $this->conexion->consultaRetorno($sql7);
		$row = mysqli_fetch_array($result);		
		return $row;

	
	}

	public function getTodasActividadesComercial()
	{
		//$sql = "CALL SP06_ACTIVIDAD_DESARROLLOS_MOSTRAR();";
		$sql = "SELECT * FROM pu06actdes WHERE PU06IDTIPO = 3;";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function eliminarActividades4($idtramite)
	{
		$sql5 = "DELETE FROM PU06TRACOMERCIAL_INDUSTRIAL WHERE PU04IDTRA = '".$idtramite."';";	
		$this->conexion->consultaSimple($sql5);		
	}

	public function asignarActividades4($idtramite, $idactdes)
	{
		$sql6 = "INSERT INTO PU06TRACOMERCIAL_INDUSTRIAL VALUES ('".$idtramite."','".$idactdes."');";
		$this->conexion->consultaSimple($sql6);	
	}

	public function tieneActividades4($idtramite, $idactdes)
	{
		
		$sql7 = "SELECT COUNT(*) AS total17 FROM PU06TRACOMERCIAL_INDUSTRIAL WHERE PU04IDTRA='".$idtramite."' AND PU06IDACTDES='".$idactdes."';";
		$result = $this->conexion->consultaRetorno($sql7);
		$row = mysqli_fetch_array($result);		
		return $row;

	
	}

	public function getTodasActividadesComercialIndustrial()
	{
		//$sql = "CALL SP06_ACTIVIDAD_DESARROLLOS_MOSTRAR();";
		$sql = "SELECT * FROM pu06actdes WHERE PU06IDTIPO = 4;";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function eliminarActividades5($idtramite)
	{
		$sql5 = "DELETE FROM PU06TRAESTACIONSERVICIOS WHERE PU04IDTRA = '".$idtramite."';";	
		$this->conexion->consultaSimple($sql5);		
	}

	public function asignarActividades5($idtramite, $idactdes)
	{
		$sql6 = "INSERT INTO PU06TRAESTACIONSERVICIOS VALUES ('".$idtramite."','".$idactdes."');";
		$this->conexion->consultaSimple($sql6);	
	}

	public function tieneActividades5($idtramite, $idactdes)
	{
		
		$sql7 = "SELECT COUNT(*) AS total19 FROM PU06TRAESTACIONSERVICIOS WHERE PU04IDTRA='".$idtramite."' AND PU06IDACTDES='".$idactdes."';";
		$result = $this->conexion->consultaRetorno($sql7);
		$row = mysqli_fetch_array($result);		
		return $row;

	
	}

	public function getTodasActividadesEstacionDeServicio()
	{
		//$sql = "CALL SP06_ACTIVIDAD_DESARROLLOS_MOSTRAR();";
		$sql = "SELECT * FROM pu06actdes WHERE PU06IDTIPO = 5;";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function eliminarEspaciosGeo($idtramite)
	{
		$sql9 = "DELETE FROM pu09tradeg WHERE PU04IDTRA = '".$idtramite."';";	
		$this->conexion->consultaSimple($sql9);		
	}

	public function asignarEspaciosGeo($idtramite, $idespacio)
	{
		$sql10 = "INSERT INTO pu09tradeg VALUES ('".$idtramite."','".$idespacio."');";
		$this->conexion->consultaSimple($sql10);	
	}

	public function tieneEspaciosGeo($idtramite, $idespacio)
	{
		
		$sql11 = "SELECT COUNT(*) AS total1 FROM pu09tradeg WHERE PU04IDTRA='".$idtramite."' AND PU09IDDEG ='".$idespacio."';";
		$result11 = $this->conexion->consultaRetorno($sql11);
		$row = mysqli_fetch_array($result11);		
		return $row;

	
	}
	public function getTodasEspaciosGeo()
	{
		$sql12 = "SELECT * FROM pu09desceg";
		$result12 = $this->conexion->consultaRetorno($sql12);
		return $result12;
	}

	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function eliminarTerrenoFR($idtramite)
	{
		$sql13 = "DELETE FROM pu07traterrft WHERE PU04IDTRA = '".$idtramite."';";	
		$this->conexion->consultaSimple($sql13);		
	}

	public function asignarTerrenoFR($idtramite, $idtrf)
	{
		$sql14 = "INSERT INTO pu07traterrft VALUES ('".$idtramite."','".$idtrf."');";
		$this->conexion->consultaSimple($sql14);	
	}

	public function tieneTerrenoFR($idtramite, $idtrf)
	{
		
		$sql15 = "SELECT COUNT(*) AS total3 FROM pu07traterrft WHERE PU04IDTRA='".$idtramite."' AND PU07IDTFR ='".$idtrf."';";
		$result12 = $this->conexion->consultaRetorno($sql15);
		$row = mysqli_fetch_array($result12);		
		return $row;

	
	}
	public function getTodasTerrenoFR()
	{
		$sql16 = "SELECT * FROM pu07terrft";
		$result12 = $this->conexion->consultaRetorno($sql16);
		return $result12;
	}
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function eliminarDesarrolloSec($idtramite)
	{
		$sql13 = "DELETE FROM pu12tratipdesec WHERE PU04IDTRA = '".$idtramite."';";	
		$this->conexion->consultaSimple($sql13);		
	}

	public function asignarDesarrolloSec($idtramite, $iddesec)
	{
		$sql14 = "INSERT INTO pu12tratipdesec VALUES ('".$idtramite."','".$iddesec."');";
		$this->conexion->consultaSimple($sql14);	
	}

	public function tieneDesarrolloSec($idtramite, $iddesec)
	{
		
		$sql15 = "SELECT COUNT(*) AS total4 FROM pu12tratipdesec WHERE PU04IDTRA='".$idtramite."' AND PU12IDTDESEC ='".$iddesec."';";
		$result12 = $this->conexion->consultaRetorno($sql15);
		$row = mysqli_fetch_array($result12);		
		return $row;

	
	}
	public function getTodasDesarrolloSec()
	{
		$sql16 = "SELECT * FROM pu12tipdesec";
		$result12 = $this->conexion->consultaRetorno($sql16);
		return $result12;
	}
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//
	public function eliminarAspectosBio($idtramite)
	{
		$sql17 = "DELETE FROM pu11uniabio WHERE PU04IDTRA = '".$idtramite."';";	
		$this->conexion->consultaSimple($sql17);		
	}

	public function asignarAspectosBio($idtramite, $idaspecto)
	{
		$sql18 = "INSERT INTO pu11uniabio VALUES ('".$idtramite."','".$idaspecto."');";
		$this->conexion->consultaSimple($sql18);	
	}

	public function tieneAspectosBio($idtramite, $idaspecto)
	{
		
		$sql19 = "SELECT COUNT(*) AS total5 FROM pu11uniabio WHERE PU04IDTRA='".$idtramite."' AND PU10IDASBIO ='".$idaspecto."';";
		$result13 = $this->conexion->consultaRetorno($sql19);
		$row = mysqli_fetch_array($result13);		
		return $row;

	
	}
	public function getTodasAspectosBio()
	{
		$sql20 = "SELECT * FROM pu10aspbio";
		$result14 = $this->conexion->consultaRetorno($sql20);
		return $result14;
	}
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function eliminarServicios($idtramite)
	{
		$sql17 = "DELETE FROM pu23traservi WHERE PU04IDTRA = '".$idtramite."';";	
		$this->conexion->consultaSimple($sql17);		
	}

	public function asignarServicios($idtramite, $idservi)
	{
		$sql18 = "INSERT INTO pu23traservi VALUES ('".$idtramite."','".$idservi."');";
		$this->conexion->consultaSimple($sql18);	
	}

	public function tieneServicios($idtramite, $idservi)
	{
		
		$sql19 = "SELECT COUNT(*) AS total6 FROM pu23traservi WHERE PU04IDTRA='".$idtramite."' AND PU21IDSERVI ='".$idservi."';";
		$result13 = $this->conexion->consultaRetorno($sql19);
		$row = mysqli_fetch_array($result13);		
		return $row;

	
	}
	public function getTodasServicios()
	{
		$sql20 = "SELECT * FROM pu21serviservicios";
		$result14 = $this->conexion->consultaRetorno($sql20);
		return $result14;
	}
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function eliminarAreasPro($idtramite)
	{
		$sql5 = "DELETE FROM pu14trarep WHERE PU04IDTRA = '".$idtramite."';";	
		$this->conexion->consultaSimple($sql5);		
	}

	public function asignarAreasPro($idtramite, $idareas)
	{
		$sql6 = "INSERT INTO pu14trarep VALUES ('".$idtramite."','".$idareas."');";
		$this->conexion->consultaSimple($sql6);	
	}

	public function tieneAreasPro($idtramite, $idareas)
	{
		
		$sql7 = "SELECT COUNT(*) AS total7 FROM pu14trarep WHERE PU04IDTRA='".$idtramite."' AND PU13IDAAP='".$idareas."';";
		$result = $this->conexion->consultaRetorno($sql7);
		$row = mysqli_fetch_array($result);		
		return $row;
	}
	public function getTodasAreasPro()
	{
		$sql8 = "SELECT * FROM pu13aarep";
		$result18 = $this->conexion->consultaRetorno($sql8);
		return $result18;
	}
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function eliminarTipoRed($idtramite)
	{
		$sql21 = "DELETE FROM pu22traserv WHERE PU04IDTRA = '".$idtramite."';";	
		$this->conexion->consultaSimple($sql21);		
	}

	public function asignarTipoRed($idtramite, $idtiporedvial)
	{
		$sql22 = "INSERT INTO pu22traserv VALUES ('".$idtramite."','".$idtiporedvial."');";
		$this->conexion->consultaSimple($sql22);	
	}

	public function tieneTipoRed($idtramite, $idtiporedvial)
	{
		
	$sql24 = "SELECT COUNT(*) AS total8 FROM pu22traserv WHERE PU04IDTRA='".$idtramite."' AND PU22IDTREDV='".$idtiporedvial."';";
		$result24 = $this->conexion->consultaRetorno($sql24);
		$row = mysqli_fetch_array($result24);		
		return $row;

	
	}
	public function getTodasTipoRed()
	{
		$sql8 = "SELECT * FROM pu22tredv";
		$result = $this->conexion->consultaRetorno($sql8);
		return $result;
	}
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	public function eliminarPatente($idtramite)
	{
		$sql30 = "DELETE FROM pu25patent WHERE PU04IDTRA = '".$idtramite."';";	
		$this->conexion->consultaSimple($sql30);		
	}

	public function asignarPatente($idtramite, $idtipopatente)
	{
		$sql31 = "INSERT INTO pu25patent VALUES ('".$idtramite."','".$idtipopatente."');";
		$this->conexion->consultaSimple($sql31);	
	}

	public function tienePatente($idtramite, $idtipopatente)
	{
		
		$sql32 = "SELECT COUNT(*) AS total9 FROM pu25patent WHERE PU04IDTRA='".$idtramite."' AND PU24IDINFR='".$idtipopatente."';";
		$result32 = $this->conexion->consultaRetorno($sql32);
		$row = mysqli_fetch_array($result32);		
		return $row;

	
	}
	public function getTodasPatente()
	{
		$sql33 = "SELECT * FROM pu24infest";
		$result = $this->conexion->consultaRetorno($sql33);
		return $result;
	}
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///
	//////////////////////// DENTRO DEL MODELO 04INPECCION
	public function agregarTra()
	{
		$sql = "CALL SP04_REGISTROTR_GUARDAR('$this->PU04IDTRA','$this->PU04NORTE','$this->PU04ESTE','$this->PU04ALTITUD');";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
    
   
	}
  
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///
	//////////////////////// DENTRO DEL MODELO 04INPECCION
	public function agregarObservacion()
	{
		$sql = "CALL SP04_REGISTROTRAMITE_GUARDAR('$this->PU04IDTRA','$this->PU04OBSERVACIONES');";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;	
	}

	////////////////////Accesos//////////////////////////////////////////////////////////////////////////////////
	
	public function eliminarAcceso($idtramite)
	{
		$sql49 = "DELETE FROM pu43traacceso WHERE PU04IDTRA = '".$idtramite."';";	
		$this->conexion->consultaSimple($sql49);		
	}

	public function asignarAcceso($idtramite, $idtipoaccesos)
	{
		$sql50 = "INSERT INTO pu43traacceso VALUES ('".$idtramite."','".$idtipoaccesos."');";
		$this->conexion->consultaSimple($sql50);	
	}

	public function tieneAcceso($idtramite, $idtipoaccesos)
	{
		
		$sql51 = "SELECT COUNT(*) AS total49 FROM pu43traacceso WHERE PU04IDTRA='".$idtramite."' AND PU42IDSERVID='".$idtipoaccesos."';";
		$result51 = $this->conexion->consultaRetorno($sql51);
		$row = mysqli_fetch_array($result51);		
		return $row;

	
	}
	public function getTodasAcceso()
	{
		$sql52 = "SELECT * FROM pu42servidumbre WHERE PU38IDSERVIDUMBRE=1;";
		$result = $this->conexion->consultaRetorno($sql52);
		return $result;
	}
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	//////////////////////Accesos/////////////////////////////////////////////////////////////////////////////////////
	
	public function eliminarAcceso2($idtramite)
	{
		$sql490 = "DELETE FROM pu43traacceso WHERE PU04IDTRA = '".$idtramite."';";	
		$this->conexion->consultaSimple($sql490);		
	}

	public function asignarAcceso2($idtramite, $idtipoaccesos2)
	{
		$sql500 = "INSERT INTO pu43traacceso VALUES ('".$idtramite."','".$idtipoaccesos2."');";
		$this->conexion->consultaSimple($sql500);	
	}

	public function tieneAcceso2($idtramite, $idtipoaccesos2)
	{
		
		$sql510 = "SELECT COUNT(*) AS total70 FROM pu43traacceso WHERE PU04IDTRA='".$idtramite."' AND PU42IDSERVID='".$idtipoaccesos2."';";
		$result510 = $this->conexion->consultaRetorno($sql510);
		$row = mysqli_fetch_array($result510);		
		return $row;

	
	}
	public function getTodasAcceso2()
	{
		$sql520 = "SELECT * FROM pu42servidumbre WHERE PU38IDSERVIDUMBRE=2;";
		$result = $this->conexion->consultaRetorno($sql520);
		return $result;
	}
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
?>