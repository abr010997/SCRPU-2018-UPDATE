<?php 
require_once 'conexion.php';

class class04oficina  extends Conexion
{
	private $PU04IDTRA;
	private $PU39CEDSOLICI;
	private $PU39NOMSOLICI;
	private $PU39APE1SOLICI;
	private $PU39APE2SOLICI;

	private $PU04IDDISTRITO;
	private $PU39BARRIO;
	private $PU39DIRECCION;

	private $PU40CEDPROPIE;
	private $PU40NOMPROPIE;
	private $PU40APE1PROPIE;
	private $PU40APE2PROPIE;

	private $PU40NFINCA;
	private $PU40NPLANO;

	private $conexion;


	private $PU04IDDISTRITOTRA;
	private $PU04FETRA;

	private $PU04NORTE;
	private $PU04ESTE;
	private $PU04ALTITUD;

	private $PU09IDDEG;
	private $PU09DESCREG;

	private $PU38IDSERVIDUMBRE;
	private $PU38DESCRIPSERVIDUM;

	private $PU26IDPLAN;
	private $PU26PLNDESC;

	private $PU26IDDESCNICOYASAMA;
	private $PU26DESCACNICOYASAMA;

	private $PU13IDAAP;
	private $PU13DESCAAP;
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	private $PU10IDASBIO;
	private $PU10DESCABIO;

	private $PU12IDTDESEC;
	private $PU12TIPODES;

	private $PU22IDTREDV;
	private $PU22DESCTRV;

	private $PU24IDINFR;
	private $PU24DESCINF;

	private $PU06IDACTDES;
	private $PU06DESAD;

	private $PU06IDACTDESDESA;
	private $PU06DESADDESA;

	private $PU06IDACTCOMERCIAL;
	private $PU06DESADCOMERCIAL;

	private $PU06IDACTCOMERCIALINDUSTRIAL;
	private $PU06DESADCOMERCIALINDUSTRIAL;

	private $PU06IDACTESTACIONSERVICIOS;
	private $PU06DESADESTACIONSERVICIOS;

   

	private $PU04OBSERVACIONESREVISIONTRA;
	private $PU06OBSERVACIONES;
	private $PU06OBSERVACIONESCOMER;
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	
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

	/*public function buscar($PU04IDTRA)
	{
		$sql = "CALL SP04_REGTRAMITEINFO_BUSCAR ('".$PU04IDTRA."');";
		$result = $this->conexion->consultaRetorno($sql);
		$cliente = $this->convertToclass04oficina($result);
		return $cliente;
	}*/

	public function listar()
	{
		$sql = "CALL SP39_40_REFINFOSOLIPROPIE_MOSTRAR();";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ///////////
	public function buscarIngresoTraDeg($PU04IDTRA)
	{
		$sql = "CALL SP04_INGRESOTRAMITE_LISTAR_DEG('".$PU04IDTRA."')";
		$result = $this->conexion->consultaRetorno($sql);
		$class04oficina = $this->convertToIngresoTraDeg($result);
		return $class04oficina;
	}
	//////////////////////
	public function convertToIngresoTraDeg($result)
	{
		$espaciosGeo = array();
		$i=0;
		while ($row = mysqli_fetch_array($result)) {
			$class04oficina = new class04oficina();
			//$class04oficina->setAtributo('PU04IDTRA',$row[0]);
			$class04oficina->setAtributo('PU09IDDEG',$row[0]);		
			$class04oficina->setAtributo('PU09DESCREG',$row[1]);
			$espaciosGeo[$i]=$class04oficina;
			$i++;
		}
		return $espaciosGeo;
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function buscarIngresoTraAcceso($PU04IDTRA)
	{
		$sql = "CALL SP04_INGRESOTRAMITE_LISTAR_ACCESO('".$PU04IDTRA."')";
		$result = $this->conexion->consultaRetorno($sql);
		$class04oficina = $this->convertToIngresoTraAcceso($result);
		return $class04oficina;
	}
	//////////////////////
	public function convertToIngresoTraAcceso($result)
	{
		$acceso = array();
		$i=0;
		while ($row = mysqli_fetch_array($result)) {
			$class04oficina = new class04oficina();
			//$class04oficina->setAtributo('PU04IDTRA',$row[0]);
			$class04oficina->setAtributo('PU38IDSERVIDUMBRE',$row[0]);		
			$class04oficina->setAtributo('PU38DESCRIPSERVIDUM',$row[1]);
			$acceso[$i]=$class04oficina;
			$i++;
		}
		return $acceso;
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	public function buscarIngresoTraPlanReg($PU04IDTRA)
	{
		$sql = "CALL SP04_INGRESOTRAMITE_LISTAR_PLANREG('".$PU04IDTRA."')";
		$result = $this->conexion->consultaRetorno($sql);
		$class04oficina = $this->convertToIngresoTraPlanReg($result);
		return $class04oficina;
	}
	//////////////////////
	public function convertToIngresoTraPlanReg($result)
	{
		$planreg = array();
		$i=0;
		while ($row = mysqli_fetch_array($result)) {
			$class04oficina = new class04oficina();
			//$class04oficina->setAtributo('PU04IDTRA',$row[0]);
			$class04oficina->setAtributo('PU26IDPLAN',$row[0]);		
			$class04oficina->setAtributo('PU26PLNDESC',$row[1]);
			$planreg[$i]=$class04oficina;
			$i++;
		}
		return $planreg;
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	public function buscarIngresoTraNicoSama($PU04IDTRA)
	{
		$sql = "CALL SP04_INGRESOTRAMITE_LISTAR_NICOSAMA('".$PU04IDTRA."')";
		$result = $this->conexion->consultaRetorno($sql);
		$class04oficina = $this->convertToIngresoTraNicoSama($result);
		return $class04oficina;
	}
	//////////////////////
	public function convertToIngresoTraNicoSama($result)
	{
		$nicosama = array();
		$i=0;
		while ($row = mysqli_fetch_array($result)) {
			$class04oficina = new class04oficina();
			//$class04oficina->setAtributo('PU04IDTRA',$row[0]);
			$class04oficina->setAtributo('PU26IDDESCNICOYASAMA',$row[0]);		
			$class04oficina->setAtributo('PU26DESCACNICOYASAMA',$row[1]);
			$nicosama[$i]=$class04oficina;
			$i++;
		}
		return $nicosama;
	}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		public function buscarIngresoTraAAP($PU04IDTRA)
	{
		$sql = "CALL SP04_INGRESOTRAMITE_LISTAR_AAP('".$PU04IDTRA."')";
		$result = $this->conexion->consultaRetorno($sql);
		$class04oficina = $this->convertToIngresoTraAAP($result);
		return $class04oficina;
	}
	//////////////////////
	public function convertToIngresoTraAAP($result)
	{
		$aap = array();
		$i=0;
		while ($row = mysqli_fetch_array($result)) {
			$class04oficina = new class04oficina();
			//$class04oficina->setAtributo('PU04IDTRA',$row[0]);
			$class04oficina->setAtributo('PU13IDAAP',$row[0]);		
			$class04oficina->setAtributo('PU13DESCAAP',$row[1]);
			$aap[$i]=$class04oficina;
			$i++;
		}
		return $aap;
	}	
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	public function guardar()
	{
		$sql = "CALL SP39_40_REFINFOSOLIPROPIE_GUARDAR ('$this->PU04IDTRA','$this->PU39CEDSOLICI',
		'$this->PU39NOMSOLICI','$this->PU39APE1SOLICI','$this->PU39APE2SOLICI','$this->PU04IDDISTRITO',
		'$this->PU39BARRIO','$this->PU39DIRECCION','$this->PU40CEDPROPIE','$this->PU40NOMPROPIE',
		'$this->PU40APE1PROPIE','$this->PU40APE2PROPIE','$this->PU40NFINCA','$this->PU40NPLANO');";
		$this->conexion->consultaSimple($sql);
	
	}

	public function editar()
	{
		$sql = "CALL SP39_40_REFINFOSOLIPROPIE_ACTUALIZAR ('$this->PU04IDTRA','$this->PU39CEDSOLICI',
		'$this->PU39NOMSOLICI','$this->PU39APE1SOLICI','$this->PU39APE2SOLICI','$this->PU04IDDISTRITO',
		'$this->PU39BARRIO','$this->PU39DIRECCION','$this->PU40CEDPROPIE','$this->PU40NOMPROPIE',
		'$this->PU40APE1PROPIE','$this->PU40APE2PROPIE','$this->PU40NFINCA','$this->PU40NPLANO');";
		$this->conexion->consultaSimple($sql);
	
	}
	public function buscar($PU04IDTRA)
	{
		$sql = "CALL SP39_40_REFINFOSOLIPROPIE_BUSCAR('".$PU04IDTRA."')";
		$result = $this->conexion->consultaRetorno($sql);
		$class04oficina = $this->convertToclass04oficina1($result);
		return $class04oficina;
	}

	public function buscarTraIng($idtramite)
	{
		$sql4 = "SELECT * FROM pu04tramite1 WHERE PU04IDTRA ='".$idtramite."'";
		$result = $this->conexion->consultaRetorno($sql4);
		$tramite = $this->convertToTramite($result);
		return $tramite;
	}

	public function buscarTraIngreso($PU04IDTRA)
	{
		$sql = "CALL SP04_REGTRAMITEINFO_TRA1_BUSCAR ('".$PU04IDTRA."');";
		$result = $this->conexion->consultaRetorno($sql);
		$cliente = $this->convertToclass04oficinaIngresoTra($result);
		return $cliente;
	}

	public function buscarRegTramite($PU04IDTRA)
	{
		$sql = "CALL SP04_REGTRAMITEINFO_REGTRA_BUSCAR ('".$PU04IDTRA."');";
		$result = $this->conexion->consultaRetorno($sql);
		$cliente = $this->convertToRegTramite($result);
		return $cliente;
	}

	public function convertToTramite($result)
	{
		$tramite = new class04oficina();
		while ($row = mysqli_fetch_array($result)) {
			$tramite->setAtributo('PU04IDTRA',$row[0]);
	
		}
		return $tramite;
	}
		

	public function convertToRegTramite($result)
	{
		$class04oficina = new class04oficina();
		while ($row = mysqli_fetch_array($result)) {
			$class04oficina->setAtributo('PU04IDTRA',$row[0]);
			$class04oficina->setAtributo('PU04NORTE',$row[1]);
			$class04oficina->setAtributo('PU04ESTE',$row[2]);
			$class04oficina->setAtributo('PU04ALTITUD',$row[3]);
		}
		return $class04oficina;
	}
	public function convertToclass04oficina1($result)
	{
		$class04oficina = new class04oficina();
		while ($row = mysqli_fetch_array($result)) {
			$class04oficina->setAtributo('PU04IDTRA',$row[0]);
			$class04oficina->setAtributo('PU39CEDSOLICI',$row[1]);
			$class04oficina->setAtributo('PU39NOMSOLICI',$row[2]);
			$class04oficina->setAtributo('PU39APE1SOLICI',$row[3]);
			$class04oficina->setAtributo('PU39APE2SOLICI',$row[4]);
			$class04oficina->setAtributo('PU04IDDISTRITO',$row[5]);
			$class04oficina->setAtributo('PU39BARRIO',$row[6]);
			$class04oficina->setAtributo('PU39DIRECCION',$row[7]);
			$class04oficina->setAtributo('PU40CEDPROPIE',$row[8]);
			$class04oficina->setAtributo('PU40NOMPROPIE',$row[9]);
			$class04oficina->setAtributo('PU40APE1PROPIE',$row[10]);
			$class04oficina->setAtributo('PU40APE2PROPIE',$row[11]);
			$class04oficina->setAtributo('PU40NFINCA',$row[12]);
			$class04oficina->setAtributo('PU40NPLANO',$row[13]);
		}
		return $class04oficina;
	}

	public function convertToclass04oficina($result)
	{
		$class04oficina = new class04oficina();
		while ($row = mysqli_fetch_array($result)) {
			$class04oficina->setAtributo('PU04IDTRA',$row[0]);
			$class04oficina->setAtributo('PU39CEDSOLICI',$row[1]);
			$class04oficina->setAtributo('PU39NOMSOLICI',$row[2]);
			$class04oficina->setAtributo('PU39APE1SOLICI',$row[3]);
			$class04oficina->setAtributo('PU39APE2SOLICI',$row[4]);
			$class04oficina->setAtributo('PU04IDDISTRITO',$row[5]);
			$class04oficina->setAtributo('PU39BARRIO',$row[6]);
			$class04oficina->setAtributo('PU39DIRECCION',$row[7]);
			$class04oficina->setAtributo('PU40CEDPROPIE',$row[8]);
			$class04oficina->setAtributo('PU40NOMPROPIE',$row[9]);
			$class04oficina->setAtributo('PU40APE1PROPIE',$row[10]);
			$class04oficina->setAtributo('PU40APE2PROPIE',$row[11]);
			$class04oficina->setAtributo('PU40NFINCA',$row[12]);
			$class04oficina->setAtributo('PU40NPLANO',$row[13]);
		}
		return $class04oficina;
	}


	public function convertToclass04oficinaIngresoTra($result)
	{
		$class04oficina = new class04oficina();
		while ($row = mysqli_fetch_array($result)) {
			$class04oficina->setAtributo('PU04IDTRA',$row[0]);
			$class04oficina->setAtributo('PU04FETRA',$row[1]);		
			$class04oficina->setAtributo('PU04IDDISTRITOTRA',$row[2]);
		}
		return $class04oficina;
	}
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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
	///////////////////////////////////////////////////////////////////////

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

public function eliminarActividades00($idtramite)
	{
		$sql5 = "DELETE FROM PU00ADTRA WHERE PU04IDTRA = '".$idtramite."';";	
		$this->conexion->consultaSimple($sql5);		
	}

	public function asignarActividades00($idtramite, $idactdes)
	{
		$sql6 = "INSERT INTO PU00ADTRA VALUES ('".$idtramite."','".$idactdes."');";
		$this->conexion->consultaSimple($sql6);	
	}

	public function tieneActividades00($idtramite, $idactdes)
	{
		
		$sql7 = "SELECT COUNT(*) AS total50 FROM PU00ADTRA WHERE PU04IDTRA='".$idtramite."' AND PU00IDAD='".$idactdes."';";
		$result = $this->conexion->consultaRetorno($sql7);
		$row = mysqli_fetch_array($result);		
		return $row;

	
	}

	public function getTododasEstados()
	{
		//$sql = "CALL SP06_ACTIVIDAD_DESARROLLOS_MOSTRAR();";
		$sql = "SELECT * FROM PU00AD";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


	/////////////////////////////////////////////////////////////////////////////////////////////////
	public function listarTraRealizado()
	{
		$sql = "CALL SP00_LISTAR_TRAMITE_REALIZADO();";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////
public function guardarObservacionActdes()
	{
		$sql = "call SP06_OBSERVACIONES_ACTDES_GUARDAR('$this->PU04IDTRA','$this->PU06OBSERVACIONES');";
		$this->conexion->consultaSimple($sql);
	}
///////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////
public function guardarObservacionComercial()
	{
		$sql = "call SP06_OBSERVACIONES_COMERCIAL_GUARDAR('$this->PU04IDTRA','$this->PU06OBSERVACIONESCOMER');";
		$this->conexion->consultaSimple($sql);
	}
///////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////
public function guardarObservacionResidencial()
	{
		$sql = "call SP06_OBSERVACIONES_RESIDENCIAL_GUARDAR('$this->PU04IDTRA','$this->PU06OBSERVACIONES');";
		$this->conexion->consultaSimple($sql);
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////
public function guardarObservacionComercialIndustrial()
	{
		$sql = "call SP06_OBSERVACIONES_COMERINDUSTRIAL_GUARDAR('$this->PU04IDTRA','$this->PU06OBSERVACIONES');";
		$this->conexion->consultaSimple($sql);
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////
public function guardarObservacionEstacionDeServicios()
	{
		$sql = "call SP06_OBSERVACIONES_ESTACIONSERVICIOS_GUARDAR('$this->PU04IDTRA','$this->PU06OBSERVACIONES');";
		$this->conexion->consultaSimple($sql);
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////
public function guardarObservacionPatentes()
	{
		$sql = "call SP25_OBSERVACIONES_PATENTES_GUARDAR('$this->PU04IDTRA','$this->PU06OBSERVACIONES');";
		$this->conexion->consultaSimple($sql);
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///
	///
public function eliminarLeyes($idtramite)
	{
		$sql6 = "DELETE FROM pu44traleyes WHERE pu04idtra = '".$idtramite."';";	
		$this->conexion->consultaSimple($sql6);		
	}

	public function asignarLeyes($idtramite, $pu45idley)
	{
		$sql7 = "INSERT INTO pu44traleyes VALUES ('".$idtramite."','".$pu45idley."');";
		$this->conexion->consultaSimple($sql7);	
	}

	public function tieneLeyes($idtramite, $pu45idley)
	{
		
		$sql8 = "SELECT COUNT(*) AS total20 FROM pu44traleyes WHERE pu04idtra='".$idtramite."' AND pu45idley='".$pu45idley."';";
		$result = $this->conexion->consultaRetorno($sql8);
		$row = mysqli_fetch_array($result);		
		return $row;

	
	}
	public function getTodasLeyes()
	{
		$sql9 = "SELECT * FROM pu45leyes";
		$result = $this->conexion->consultaRetorno($sql9);
		return $result;
	}



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	public function buscarIngresoTraEspacioGeo($PU04IDTRA)
	{
		$sql = "CALL SP04_INGRESOTRAMITE_LISTAR_ESPACIOGEOGRAFICO('".$PU04IDTRA."')";
		$result = $this->conexion->consultaRetorno($sql);
		$class04oficina = $this->convertToIngresoTraEspacioGeo($result);
		return $class04oficina;
	}
	//////////////////////
	public function convertToIngresoTraEspacioGeo($result)
	{
		$DEG = array();
		$i=0;
		while ($row = mysqli_fetch_array($result)) {
			$class04oficina = new class04oficina();
			//$class04oficina->setAtributo('PU04IDTRA',$row[0]);
			$class04oficina->setAtributo('PU09IDDEG',$row[0]);		
			$class04oficina->setAtributo('PU09DESCREG',$row[1]);
			$DEG[$i]=$class04oficina;
			$i++;
		}
		return $DEG;
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	public function buscarIngresoTraAspBiofisicos($PU04IDTRA)
	{
		$sql = "CALL SP04_INGRESOTRAMITE_LISTAR_ASPBIOFISICOS('".$PU04IDTRA."')";
		$result = $this->conexion->consultaRetorno($sql);
		$class04oficina = $this->convertToIngresoTraAspBiofisicos($result);
		return $class04oficina;
	}
	//////////////////////
	public function convertToIngresoTraAspBiofisicos($result)
	{
		$ASPBIO = array();
		$i=0;
		while ($row = mysqli_fetch_array($result)) {
			$class04oficina = new class04oficina();
			//$class04oficina->setAtributo('PU04IDTRA',$row[0]);
			$class04oficina->setAtributo('PU10IDASBIO',$row[0]);		
			$class04oficina->setAtributo('PU10DESCABIO',$row[1]);
			$ASPBIO[$i]=$class04oficina;
			$i++;
		}
		return $ASPBIO;
	}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	public function buscarIngresoTraDesarrolloSector($PU04IDTRA)
	{
		$sql = "CALL SP04_INGRESOTRAMITE_LISTAR_DESARROLLOSECTOR('".$PU04IDTRA."')";
		$result = $this->conexion->consultaRetorno($sql);
		$class04oficina = $this->convertToIngresoTraDesarrolloSector($result);
		return $class04oficina;
	}
	//////////////////////
	public function convertToIngresoTraDesarrolloSector($result)
	{
		$DESECTOR = array();
		$i=0;
		while ($row = mysqli_fetch_array($result)) {
			$class04oficina = new class04oficina();
			//$class04oficina->setAtributo('PU04IDTRA',$row[0]);
			$class04oficina->setAtributo('PU12IDTDESEC',$row[0]);		
			$class04oficina->setAtributo('PU12TIPODES',$row[1]);
			$DESECTOR[$i]=$class04oficina;
			$i++;
		}
		return $DESECTOR;
	}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	public function buscarIngresoTraTipoRedVial($PU04IDTRA)
	{
		$sql = "CALL SP04_INGRESOTRAMITE_LISTAR_TIPOREDVIAL('".$PU04IDTRA."')";
		$result = $this->conexion->consultaRetorno($sql);
		$class04oficina = $this->convertToIngresoTraTipoRedVial($result);
		return $class04oficina;
	}
	//////////////////////
	public function convertToIngresoTraTipoRedVial($result)
	{
		$TREDVIAL = array();
		$i=0;
		while ($row = mysqli_fetch_array($result)) {
			$class04oficina = new class04oficina();
			//$class04oficina->setAtributo('PU04IDTRA',$row[0]);
			$class04oficina->setAtributo('PU22IDTREDV',$row[0]);		
			$class04oficina->setAtributo('PU22DESCTRV',$row[1]);
			$TREDVIAL[$i]=$class04oficina;
			$i++;
		}
		return $TREDVIAL;
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	public function buscarIngresoTraPatentes($PU04IDTRA)
	{
		$sql = "CALL SP04_INGRESOTRAMITE_LISTAR_PATENTES('".$PU04IDTRA."')";
		$result = $this->conexion->consultaRetorno($sql);
		$class04oficina = $this->convertToIngresoTraPatentes($result);
		return $class04oficina;
	}
	//////////////////////
	public function convertToIngresoTraPatentes($result)
	{
		$PATENTE = array();
		$i=0;
		while ($row = mysqli_fetch_array($result)) {
			$class04oficina = new class04oficina();
			//$class04oficina->setAtributo('PU04IDTRA',$row[0]);
			$class04oficina->setAtributo('PU24IDINFR',$row[0]);		
			$class04oficina->setAtributo('PU24DESCINF',$row[1]);
			$PATENTE[$i]=$class04oficina;
			$i++;
		}
		return $PATENTE;
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	public function buscarIngresoTraActResidencial($PU04IDTRA)
	{
		$sql = "CALL SP04_INGRESOTRAMITE_LISTAR_ACT_RESIDENCIAL('".$PU04IDTRA."')";
		$result = $this->conexion->consultaRetorno($sql);
		$class04oficina = $this->convertToIngresoTraActResidencial($result);
		return $class04oficina;
	}
	//////////////////////
	public function convertToIngresoTraActResidencial($result)
	{
		$ACTRESIDENCIAL = array();
		$i=0;
		while ($row = mysqli_fetch_array($result)) {
			$class04oficina = new class04oficina();
			//$class04oficina->setAtributo('PU04IDTRA',$row[0]);
			$class04oficina->setAtributo('PU06IDACTDES',$row[0]);		
			$class04oficina->setAtributo('PU06DESAD',$row[1]);
			$ACTRESIDENCIAL[$i]=$class04oficina;
			$i++;
		}
		return $ACTRESIDENCIAL;
	}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	public function buscarIngresoTraActDesarrollo($PU04IDTRA)
	{
		$sql = "CALL SP04_INGRESOTRAMITE_LISTAR_ACT_DESARROLLO('".$PU04IDTRA."')";
		$result = $this->conexion->consultaRetorno($sql);
		$class04oficina = $this->convertToIngresoTraActDesarrollo($result);
		return $class04oficina;
	}
	//////////////////////
	public function convertToIngresoTraActDesarrollo($result)
	{
		$ACTDESARROLLO = array();
		$i=0;
		while ($row = mysqli_fetch_array($result)) {
			$class04oficina = new class04oficina();
			//$class04oficina->setAtributo('PU04IDTRA',$row[0]);
			$class04oficina->setAtributo('PU06IDACTDESDESA',$row[0]);		
			$class04oficina->setAtributo('PU06DESADDESA',$row[1]);
			$ACTDESARROLLO[$i]=$class04oficina;
			$i++;
		}
		return $ACTDESARROLLO;
	}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	public function buscarIngresoTraActComercial($PU04IDTRA)
	{
		$sql = "CALL SP04_INGRESOTRAMITE_LISTAR_ACT_COMERCIAL('".$PU04IDTRA."')";
		$result = $this->conexion->consultaRetorno($sql);
		$class04oficina = $this->convertToIngresoTraActComercial($result);
		return $class04oficina;
	}
	//////////////////////
	public function convertToIngresoTraActComercial($result)
	{
		$ACTCOMERCIAL = array();
		$i=0;
		while ($row = mysqli_fetch_array($result)) {
			$class04oficina = new class04oficina();
			//$class04oficina->setAtributo('PU04IDTRA',$row[0]);
			$class04oficina->setAtributo('PU06IDACTCOMERCIAL',$row[0]);		
			$class04oficina->setAtributo('PU06DESADCOMERCIAL',$row[1]);
			$ACTCOMERCIAL[$i]=$class04oficina;
			$i++;
		}
		return $ACTCOMERCIAL;
	}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	public function buscarIngresoTraActComercialIndustrial($PU04IDTRA)
	{
		$sql = "CALL SP04_INGRESOTRAMITE_LISTAR_ACT_COMERCIAL_INDUSTRIAL('".$PU04IDTRA."')";
		$result = $this->conexion->consultaRetorno($sql);
		$class04oficina = $this->convertToIngresoTraActComercialIndustrial($result);
		return $class04oficina;
	}
	//////////////////////
	public function convertToIngresoTraActComercialIndustrial($result)
	{
		$ACTCOMERCIALINDUSTRIAL = array();
		$i=0;
		while ($row = mysqli_fetch_array($result)) {
			$class04oficina = new class04oficina();
			//$class04oficina->setAtributo('PU04IDTRA',$row[0]);
			$class04oficina->setAtributo('PU06IDACTCOMERCIALINDUSTRIAL',$row[0]);		
			$class04oficina->setAtributo('PU06DESADCOMERCIALINDUSTRIAL',$row[1]);
			$ACTCOMERCIALINDUSTRIAL[$i]=$class04oficina;
			$i++;
		}
		return $ACTCOMERCIALINDUSTRIAL;
	}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	public function buscarIngresoTraActEstacionServicios($PU04IDTRA)
	{
		$sql = "CALL SP04_INGRESOTRAMITE_LISTAR_ACT_ESTACIONSERCIVIOS('".$PU04IDTRA."')";
		$result = $this->conexion->consultaRetorno($sql);
		$class04oficina = $this->convertToIngresoTraActEstacionServicios($result);
		return $class04oficina;
	}
	//////////////////////
	public function convertToIngresoTraActEstacionServicios($result)
	{
		$ACTESTACIONSERVICIOS = array();
		$i=0;
		while ($row = mysqli_fetch_array($result)) {
			$class04oficina = new class04oficina();
			//$class04oficina->setAtributo('PU04IDTRA',$row[0]);
			$class04oficina->setAtributo('PU06IDACTESTACIONSERVICIOS',$row[0]);		
			$class04oficina->setAtributo('PU06DESADESTACIONSERVICIOS',$row[1]);
			$ACTESTACIONSERVICIOS[$i]=$class04oficina;
			$i++;
		}
		return $ACTESTACIONSERVICIOS;
	}

		public function guardarObservacionRevisionTramite()
	{
		$sql = "call SP04_OBSERVACIONESREVISIONTRAMITE_GUARDAR('$this->PU04IDTRA','$this->PU04OBSERVACIONESREVISIONTRA');";
		$this->conexion->consultaSimple($sql);
	}	


	

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	public function eliminarPatenteOf($idtramite)
	{
		$sql30 = "DELETE FROM pu25patent WHERE PU04IDTRA = '".$idtramite."';";	
		$this->conexion->consultaSimple($sql30);		
	}

	public function asignarPatenteOf($idtramite, $idtipopatente)
	{
		$sql31 = "INSERT INTO pu25patent VALUES ('".$idtramite."','".$idtipopatente."');";
		$this->conexion->consultaSimple($sql31);	
	}

	public function tienePatenteOf($idtramite, $idtipopatente)
	{
		
		$sql32 = "SELECT COUNT(*) AS total9 FROM pu25patent WHERE PU04IDTRA='".$idtramite."' AND PU24IDINFR='".$idtipopatente."';";
		$result32 = $this->conexion->consultaRetorno($sql32);
		$row = mysqli_fetch_array($result32);		
		return $row;

	
	}
	public function getTodasPatenteOf()
	{
		$sql33 = "SELECT * FROM pu24infest";
		$result = $this->conexion->consultaRetorno($sql33);
		return $result;
	}
	
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///
	///
	public function eliminarLeyAccesos($idtramite)
	{
		$sql100 = "DELETE FROM pu44traleyaccesos WHERE pu04idtra = '".$idtramite."';";	
		$this->conexion->consultaSimple($sql100);		
	}

	public function asignarLeyAccesos($idtramite, $pu45idley)
	{
		$sql101 = "INSERT INTO pu44traleyaccesos VALUES ('".$idtramite."','".$pu45idley."');";
		$this->conexion->consultaSimple($sql101);	
	}

	public function tieneLeyAccesos($idtramite, $pu45idley)
	{
		
		$sql102 = "SELECT COUNT(*) AS total20 FROM pu44traleyaccesos WHERE pu04idtra='".$idtramite."' AND pu45idley='".$pu45idley."';";
		$result = $this->conexion->consultaRetorno($sql102);
		$row = mysqli_fetch_array($result);		
		return $row;

	
	}
	public function getTodasLeyAccesos()
	{
		$sql103 = "SELECT `pu45idley`,`pu45objetivo`,`pu45descripcion`FROM`pu45leyes`
		WHERE `pu45idtipo`=1;";
		$result = $this->conexion->consultaRetorno($sql103);
		return $result;
	}	

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///
	///
	public function eliminarLeyPlanregulador($idtramite)
	{
		$sql104 = "DELETE FROM pu46traleyplan WHERE pu04idtra = '".$idtramite."';";	
		$this->conexion->consultaSimple($sql104);		
	}

	public function asignarLeyPlanregulador($idtramite, $pu45idley)
	{
		$sql104 = "INSERT INTO pu46traleyplan VALUES ('".$idtramite."','".$pu45idley."');";
		$this->conexion->consultaSimple($sql104);	
	}

	public function tieneLeyPlanregulador($idtramite, $pu45idley)
	{
		
		$sql104 = "SELECT COUNT(*) AS total21 FROM pu46traleyplan WHERE pu04idtra='".$idtramite."' AND pu45idley='".$pu45idley."';";
		$result = $this->conexion->consultaRetorno($sql104);
		$row = mysqli_fetch_array($result);		
		return $row;	
	}

	public function getTodasLeyPlanregulador()
	{
		$sql104 = "SELECT `pu45idley`,`pu45objetivo`,`pu45descripcion`FROM`pu45leyes`
		WHERE `pu45idtipo`=0;";
		$result = $this->conexion->consultaRetorno($sql104);
		return $result;
	}	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	public function eliminarLeyAreaspro($idtramite)
	{
		$sql105 = "DELETE FROM pu46traleyareaspro WHERE pu04idtra = '".$idtramite."';";	
		$this->conexion->consultaSimple($sql105);		
	}

	public function asignarLeyAreaspro($idtramite, $pu45idley)
	{
		$sql105 = "INSERT INTO pu46traleyareaspro VALUES ('".$idtramite."','".$pu45idley."');";
		$this->conexion->consultaSimple($sql105);	
	}

	public function tieneLeyAreaspro($idtramite, $pu45idley)
	{
		
		$sql105 = "SELECT COUNT(*) AS total22 FROM pu46traleyareaspro WHERE pu04idtra='".$idtramite."' AND pu45idley='".$pu45idley."';";
		$result = $this->conexion->consultaRetorno($sql105);
		$row = mysqli_fetch_array($result);		
		return $row;	
	}

	public function getTodasLeyAreaspro()
	{
		$sql105 = "SELECT `pu45idley`,`pu45objetivo`,`pu45descripcion`FROM`pu45leyes`
		WHERE `pu45idtipo`=6;";
		$result = $this->conexion->consultaRetorno($sql105);
		return $result;
	}	
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///
	///
	public function eliminarLeyEspaciosgeo($idtramite)
	{
		$sql106 = "DELETE FROM pu46traleyespaciosgeo WHERE pu04idtra = '".$idtramite."';";	
		$this->conexion->consultaSimple($sql106);		
	}

	public function asignarLeyEspaciosgeo($idtramite, $pu45idley)
	{
		$sql106 = "INSERT INTO pu46traleyespaciosgeo VALUES ('".$idtramite."','".$pu45idley."');";
		$this->conexion->consultaSimple($sql106);	
	}

	public function tieneLeyEspaciosgeo($idtramite, $pu45idley)
	{
		
		$sql106 = "SELECT COUNT(*) AS total23 FROM pu46traleyespaciosgeo WHERE pu04idtra='".$idtramite."' AND pu45idley='".$pu45idley."';";
		$result = $this->conexion->consultaRetorno($sql106);
		$row = mysqli_fetch_array($result);		
		return $row;	
	}

	public function getTodasLeyEspaciosgeo()
	{
		$sql106 = "SELECT `pu45idley`,`pu45objetivo`,`pu45descripcion`FROM`pu45leyes`
		WHERE `pu45idtipo`=2;";
		$result = $this->conexion->consultaRetorno($sql106);
		return $result;
	}	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function eliminarLeyAspectosbio($idtramite)
	{
		$sql107 = "DELETE FROM pu46traleyaspectobio WHERE pu04idtra = '".$idtramite."';";	
		$this->conexion->consultaSimple($sql107);		
	}

	public function asignarLeyAspectosbio($idtramite, $pu45idley)
	{
		$sql107 = "INSERT INTO pu46traleyaspectobio VALUES ('".$idtramite."','".$pu45idley."');";
		$this->conexion->consultaSimple($sql107);	
	}

	public function tieneLeyAspectosbio($idtramite, $pu45idley)
	{
		
		$sql107 = "SELECT COUNT(*) AS total24 FROM pu46traleyaspectobio WHERE pu04idtra='".$idtramite."' AND pu45idley='".$pu45idley."';";
		$result = $this->conexion->consultaRetorno($sql107);
		$row = mysqli_fetch_array($result);		
		return $row;	
	}

	public function getTodasLeyAspectosbio()
	{
		$sql107 = "SELECT `pu45idley`,`pu45objetivo`,`pu45descripcion`FROM`pu45leyes`
		WHERE `pu45idtipo`=3;";
		$result = $this->conexion->consultaRetorno($sql107);
		return $result;
	}	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function eliminarLeyDesarrollosec($idtramite)
	{
		$sql108 = "DELETE FROM pu46traleydesarrosect WHERE pu04idtra = '".$idtramite."';";	
		$this->conexion->consultaSimple($sql108);		
	}

	public function asignarLeyDesarrollosec($idtramite, $pu45idley)
	{
		$sql108 = "INSERT INTO pu46traleydesarrosect VALUES ('".$idtramite."','".$pu45idley."');";
		$this->conexion->consultaSimple($sql108);	
	}

	public function tieneLeyDesarrollosec($idtramite, $pu45idley)
	{
		
		$sql108 = "SELECT COUNT(*) AS total25 FROM pu46traleydesarrosect WHERE pu04idtra='".$idtramite."' AND pu45idley='".$pu45idley."';";
		$result = $this->conexion->consultaRetorno($sql108);
		$row = mysqli_fetch_array($result);		
		return $row;	
	}

	public function getTodasLeyDesarrollosec()
	{
		$sql108 = "SELECT `pu45idley`,`pu45objetivo`,`pu45descripcion`FROM`pu45leyes`
		WHERE `pu45idtipo`=4;";
		$result = $this->conexion->consultaRetorno($sql108);
		return $result;
	}	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function eliminarLeyTipored($idtramite)
	{
		$sql109 = "DELETE FROM pu46traleyredvial WHERE pu04idtra = '".$idtramite."';";	
		$this->conexion->consultaSimple($sql109);		
	}

	public function asignarLeyTipored($idtramite, $pu45idley)
	{
		$sql109 = "INSERT INTO pu46traleyredvial VALUES ('".$idtramite."','".$pu45idley."');";
		$this->conexion->consultaSimple($sql109);	
	}

	public function tieneLeyTipored($idtramite, $pu45idley)
	{
		
		$sql109 = "SELECT COUNT(*) AS total26 FROM pu46traleyredvial WHERE pu04idtra='".$idtramite."' AND pu45idley='".$pu45idley."';";
		$result = $this->conexion->consultaRetorno($sql109);
		$row = mysqli_fetch_array($result);		
		return $row;	
	}

	public function getTodasLeyTipored()
	{
		$sql109 = "SELECT `pu45idley`,`pu45objetivo`,`pu45descripcion`FROM`pu45leyes`
		WHERE `pu45idtipo`=1;";
		$result = $this->conexion->consultaRetorno($sql109);
		return $result;
	}	

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///
	public function eliminarLeyPatentes($idtramite)
	{
		$sql106 = "DELETE FROM pu46traleypatente WHERE pu04idtra = '".$idtramite."';";	
		$this->conexion->consultaSimple($sql106);		
	}

	public function asignarLeyPatentes($idtramite, $pu45idley)
	{
		$sql111= "INSERT INTO pu46traleypatente VALUES ('".$idtramite."','".$pu45idley."');";
		$this->conexion->consultaSimple($sql111);	
	}

	public function tieneLeyPatentes($idtramite, $pu45idley)
	{
		
		$sql111 = "SELECT COUNT(*) AS total27 FROM pu46traleypatente WHERE pu04idtra='".$idtramite."' AND pu45idley='".$pu45idley."';";
		$result = $this->conexion->consultaRetorno($sql111);
		$row = mysqli_fetch_array($result);		
		return $row;	
	}

	public function getTodasLeyPatentes()
	{
		$sql111 = "SELECT `pu45idley`,`pu45objetivo`,`pu45descripcion`FROM`pu45leyes`
		WHERE `pu45idtipo`=5;";
		$result = $this->conexion->consultaRetorno($sql111);
		return $result;
	}	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function eliminarLeyActividades($idtramite)
	{
		$sql222 = "DELETE FROM pu46traleyactividades WHERE pu04idtra = '".$idtramite."';";	
		$this->conexion->consultaSimple($sql222);		
	}

	public function asignarLeyActividades($idtramite, $pu45idley)
	{
		$sql222 = "INSERT INTO pu46traleyactividades VALUES ('".$idtramite."','".$pu45idley."');";
		$this->conexion->consultaSimple($sql222);	
	}

	public function tieneLeyActividades($idtramite, $pu45idley)
	{
		
		$sql222 = "SELECT COUNT(*) AS total28 FROM pu46traleyactividades WHERE pu04idtra='".$idtramite."' AND pu45idley='".$pu45idley."';";
		$result = $this->conexion->consultaRetorno($sql222);
		$row = mysqli_fetch_array($result);		
		return $row;	
	}

	public function getTodasLeyActividades()
	{
		$sql222 = "SELECT `pu45idley`,`pu45objetivo`,`pu45descripcion`FROM`pu45leyes`
		WHERE `pu45idtipo`=2;";
		$result = $this->conexion->consultaRetorno($sql222);
		return $result;
	}	
}

 ?>