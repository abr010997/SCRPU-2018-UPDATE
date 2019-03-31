<?php 
require_once 'conexion.php';

class classreporte  extends Conexion
{
	private $PU04IDTRA;

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

	public function buscar($PU04IDTRA)
	{
		$sql = "CALL SP03_PUESTOS_BUSCAR ('".$PU04IDTRA."');";
		$result = $this->conexion->consultaRetorno($sql);
		$cliente = $this->convertToclassreporte($result);
		return $cliente;
	}

	public function listarPRIN(){
		$sql = "CALL R_PRINCIPAL('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function listarFotoTramite(){
		$sql = "CALL R_FOTO('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}


//listarFotoTramite
	public function listarZonaVerde()
	{
		$sql = "CALL R_RESI('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function listardatosZonaVerde()
	{
		$sql = "CALL R_RESI1('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}
//

//
	public function listarInstitucional()
	{
		$sql = "CALL R_RESI('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function listardatosInstitu()
	{
		$sql = "CALL R_RESI1('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}
//

//
	public function listarComercialCentral()
	{
		$sql = "CALL R_RESI('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function listardatosComerCentral()
	{
		$sql = "CALL R_RESI1('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}
//

//
	public function listarIndustrial()
	{
		$sql = "CALL R_RESI('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function listardatosIndustrial()
	{
		$sql = "CALL R_RESI1('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}
//

//
	public function listarResidencialComercial()
	{
		$sql = "CALL R_RESI('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function listardatosResiComercial()
	{
		$sql = "CALL R_RESI1('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}
//

//
	public function listarResi()
	{
		$sql = "CALL R_RESI('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function listardatosResi()
	{
		$sql = "CALL R_RESI1('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}
//R_CONS_TRA
	public function listarCons()
	{
		$sql = "CALL R_CONS_TRA('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}
//
	public function listarTuristicoComercial()
	{
		$sql = "CALL R_RESI('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function listardatosTuristico()
	{
		$sql = "CALL R_RESI1('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}
//
	public function listarReso()
	{
		$sql = "CALL R_RESOLUCION('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	///SAMARA

public function listarZonaPrivada()
	{
		$sql = "CALL R_RESI('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function listardatosZonaPrivada()
	{
		$sql = "CALL R_RESI1('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function listarzonadearriendo()
	{
		$sql = "CALL R_RESI('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function listardatoszonadearriendo()
	{
		$sql = "CALL R_RESI1('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function listarzonahotelera()
	{
		$sql = "CALL R_RESI('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function listardatoszonahotelera()
	{
		$sql = "CALL R_RESI1('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function listarZonaComercialTuristica()
	{
		$sql = "CALL R_RESI('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function listardatosZonaComercialTuristica()
	{
		$sql = "CALL R_RESI1('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function listarZonaResidencialPrivada()
	{
		$sql = "CALL R_RESI('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function listardatosZonaResidencialPrivada()
	{
		$sql = "CALL R_RESI1('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function listarZonaInstitucional()
	{
		$sql = "CALL R_RESI('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function listardatosZonaInstitucional()
	{
		$sql = "CALL R_RESI1('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}
///FIN  SAMARA

	//FUERA DEL PLAN REGULADOR

	public function listarFueraPLan()
	{
		$sql = "CALL R_RESI('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

//FIN FUERA DE PLAN REGULADOR


	///DAR

public function listarDarNew()
	{
		$sql = "CALL R_RESI('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function listarDarInta()
	{
		$sql = "CALL R_RESI('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function listarMINAEClaseVIII()
	{
		$sql = "CALL R_RESI('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}


	public function listarDireccionAgua()
	{
		$sql = "CALL R_RESI('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

public function listarAntecedentesDominio()
	{
		$sql = "CALL R_RESI('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}


	

	public function listarFechaRegTra()
	{
		$sql = "CALL R_DAR('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}
	/// FIN DAR

	public function listarDESCEG()
	{
		$sql = "CALL R_DESCEG('$this->PU04IDTRA');";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}
	//--
	public function listarACTDESES()
	{
		$sql = "CALL R_ACTDES_ES('$this->PU04IDTRA');";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function listarACTDESCOM()
	{
		$sql = "CALL R_ACTDES_COM('$this->PU04IDTRA');";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function listarACTDESCOMIN()
	{
		$sql = "CALL R_ACTDES_COM_IN('$this->PU04IDTRA');";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function listarACTDESDESA()
	{
		$sql = "CALL R_ACTDES_DESA('$this->PU04IDTRA');";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function listarACTDESRES()
	{
		$sql = "CALL R_ACTDES_RES('$this->PU04IDTRA');";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}
	//--
	public function listarLeyAccesos()
	{
		$sql = "CALL R_LEYES_ACCESOS('$this->PU04IDTRA');";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function listarLeyActividades()
	{
		$sql = "CALL R_LEYES_ACTIVIDADES('$this->PU04IDTRA');";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function listarLeyAreasPro()
	{
		$sql = "CALL R_LEYES_AREASPRO('$this->PU04IDTRA');";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function listarLeyAspectoBio()
	{
		$sql = "CALL R_LEYES_ASPECTOBIO('$this->PU04IDTRA');";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function listarLeyDesarroSect()
	{
		$sql = "CALL R_LEYES_DESARROSECT('$this->PU04IDTRA');";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function listarLeyEspacioGeo()
	{
		$sql = "CALL R_LEYES_ESPACIOGEO('$this->PU04IDTRA');";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function listarLeyPatente()
	{
		$sql = "CALL R_LEYES_PATENTE('$this->PU04IDTRA');";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function listarLeyPlan()
	{
		$sql = "CALL R_LEYES_PLAN('$this->PU04IDTRA');";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function listarLeyRedVial()
	{
		$sql = "CALL R_LEYES_REDVIAL('$this->PU04IDTRA');";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function listarLeyServi()
	{
		$sql = "CALL R_LEYES_SERVIDUMBRES('$this->PU04IDTRA');";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}
	
	public function listarR_APRO_DENE()
	{
		$sql = "CALL R_APRO_DENE('$this->PU04IDTRA');";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function listarR_OBSERV_TRAMITE()
	{
		$sql = "CALL R_OBSERV_TRAMITE('$this->PU04IDTRA');";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}


	public function listar_ObserResidencial()
	{
		$sql = "CALL SP06_OBSERVACIONESRESIDENCIAL_BUSCAR('$this->PU04IDTRA');";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function listar_ObserDesarrollo()
	{
		$sql = "CALL SP06_OBSERVACIONESDESARROLLO_BUSCAR('$this->PU04IDTRA');";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function listarencabezadoPatente(){
		$sql = "CALL R_ENCABEZADO_PATENTE('$this->PU04IDTRA');";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function listarencabezadoConstruccion(){
		$sql = "CALL R_ENCABEZADO_CONSTRUCCION('$this->PU04IDTRA');";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	//Reporte Inspección
	public function listarInspeccion()
	{
		$sql = "CALL R_INS_INSPECTOR('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function listarEspacioGeo()
	{
		$sql = "CALL R_INS_ESPACIO_GEO('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function listarAspectoBio()
	{
		$sql = "CALL R_INS_ASPECTOS_BIOFISICOS('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function listarDesaSect()
	{
		$sql = "CALL R_INS_DESARROLLO_SECTOR('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function listarTipRed()
	{
		$sql = "CALL R_INS_TIPO_RED_VIAL('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function listarPaten()
	{
		$sql = "CALL R_INS_PATENTES('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function listarAcServi()
	{
		$sql = "CALL R_INS_SERVIDUMBRE('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function listarAreas()
	{
		$sql = "CALL R_INS_AREAS('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}
	//Fin Reporte Inspección
	//Nuevos Reportes
	public function  listarConstrucciónViviendaBonoUnifamiliarQuebradaRiosUrbanoDentrodelPlanRegulador(){
		$sql = "CALL R_RESI('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function listarConstrucciónViviendaBonoUnifamiliarDentrodelPlanRegulador(){
		$sql = "CALL R_RESI('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function listarConstrucciónViviendaBonoUnifamiliarFueradelPlanRegulador(){
		$sql = "CALL R_RESI('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function listarConstrucciónViviendaBonoUnifamiliarQuebradasRiosRuralFuerdelPlanRegulador(){
		$sql = "CALL R_RESI('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function listarConstrucciónViviendaBonoUnifamiliarVulnerabilidadPotreroBajaFueradelPlanRegulador(){
		$sql = "CALL R_RESI('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function listarViviendaBonoUnifamiliarVulnerabilidaPotreroMediaFueradelPlanRegulador(){
		$sql = "CALL R_RESI('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function listarConstrucciónViviendaBonoUnifamiliarServidumbreAgricolaFueradelPlanRegulador(){
		$sql = "CALL R_RESI('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function listarConstrucciónViviendaBonoUnifamiliarServidumbredePasoAprobadaFueradelPlanRegulador(){
		$sql = "CALL R_RESI('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function listarPatenteComercialFueradelPlanRegulador(){
		$sql = "CALL R_RESI('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function listarPatenteComercialDentrodelPlanRegulador(){
		$sql = "CALL R_RESI('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}
	//Fin Nuevos Reportes
	public function convertToclassreporte($result)
	{
		$classreporte = new classreporte();
		while ($row = mysqli_fetch_array($result)) {
			$classreporte->setAtributo('PU04IDTRA',$row[0]);
		}
		return $classreporte;
	}
}
 ?>