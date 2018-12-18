<?php 
require_once 'model/classreporte.php';
require_once 'public/reporte/plantilla.php';
class classreporteController
{
	private $classreporte;
	//Nicoya
	private $zonaverde;
	private $datoszonaverde;

	private $institucional;
	private $datosintitu;

	private $comercialcentral;
	private $datoscomercentral;

	private $industrial;
	private $datosindustrial;

	private $residencialcomercial;
	private $datosresicomercial;

	private $residecial;
	private $datosresidencial;

	private $turisticocomercial;
	private $datosturistico;

	//Fin Nicoya

	//Samara
	private $zonacomerturistica;
	private $datoscomerturistica;

	private $zonaresiprivada;
	private $datosresiprivada;

	private $zonainstitucional;
	private $datoszonainstitucional;


	private $zonaprivada;
	private $datoszonaprivada;

	private $zonadearriendo;
	private $datoszonadearriendo;

	private $zonahotelera;
	private $datoszonahotelera;

	//Fin Samara

	//DAR
	private $DarInta;
	private $MINAEClaseVIII;
	private $DireccionAgua;
	private $AntecedentesDominio;
	private $FechaRegTra;
	//FIN DAR
	//Datos
	private $resolusion;
	private $constra;
	//Fin Datos
	//Actividades
	private $actdes_res;
	private $actdes_com;
	private $actdes_com_in;
	private $actdes_es;
	private $actdes_desa;
	//Fin Actividades
	//Uso de suelo
	private $desceg;
	//Fin usu de suelo
	//Leyes
	private $leyesAccesos;
	private $leyesDesarroSect;
	private $leyesEspacioGeo;
	private $leyesActividades;
	private $leyesAspectoBio;
	private $leyesPatente;
	private $leyesPlan;
	private $leyesRedVial;
	private $leyesAreasPro;
	private $leyesServi;
	//Fin leyes
	//Extra
	private $fototramite;
	private $apro_dene;
	private $observacion;
	private $observaResidencial;
	private $observaDesarrollo;
	//Fin Extra

	private $encabezadopatente;
	private $encabezadoconstruccion;
	//Reporte Inspección
	private $inspeccion;
	private $espaciogeo;
	private $aspectosbiofisicos;
	private $desarrollosector;
	private $tiporedvial;
	private $patentes;
	private $accesoservi;
	private $areas;
	//Fin Reporte Inspección
function __construct()
{
	$this->classreporte = new classreporte();
}

public function index()
{
	require_once 'view/header.php';
	require_once 'view/classreporte/index.php';
	require_once 'view/footer.php';
}

public function agregar()
{
	if ($_POST) {
		$this->classreporte->setAtributo('PU03IDPUES',$_POST['PU03IDPUES']);
		$this->classreporte->setAtributo('PU03PUESTO',$_POST['PU03PUESTO']);
		$this->classreporte->guardar();
		header('location:?c=classreporte&m=index');
	}
	else{
		require_once 'view/header.php';
		require_once 'view/classreporte/agregar.php';
		require_once 'view/footer.php';
	}
}

public function editar()
{
	if ($_POST) {
		$this->classreporte->setAtributo('PU03IDPUES',$_POST['PU03IDPUES']);
		$this->classreporte->setAtributo('PU03PUESTO',$_POST['PU03PUESTO']);
		$this->classreporte->actualizar();
		header('location:?c=classreporte&m=index');
	}
	else {
		$this->classreporte = $this->classreporte->buscar($_REQUEST['id']);
		require_once 'view/header.php';
		require_once 'view/classreporte/editar.php';
		require_once 'view/footer.php';		
	}
}

public function eliminar()
{
	$this->classreporte->setAtributo('PU03IDPUES',$_REQUEST['id']);
	$this->classreporte->eliminar();
	header('location:?c=classreporte&m=index');
}

public function ver()
{
	$this->classreporte = $this->classreporte->buscar($_REQUEST['id']);
	require_once 'view/header.php';
	require_once 'view/classreporte/ver.php';
	require_once 'view/footer.php';
}

public function rInspeccion(){
	$this->classreporte->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$this->inspeccion 		  = new classreporte();
	$this->espaciogeo 		  = new classreporte();
	$this->aspectosbiofisicos = new classreporte();
	$this->desarrollosector   = new classreporte();
	$this->tiporedvial 		  = new classreporte();
	$this->patentes 		  = new classreporte();
	$this->accesoservi 		  = new classreporte();
	$this->areas 			  = new classreporte();

	$this->inspeccion->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLista 			= $this->inspeccion->listarInspeccion();

	$this->espaciogeo->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rEsGeo 			= $this->espaciogeo->listarEspacioGeo();
	$this->aspectosbiofisicos->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rAsBio 			= $this->aspectosbiofisicos->listarAspectoBio();
	$this->desarrollosector->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rDesSec 			= $this->desarrollosector->listarDesaSect();
	$this->tiporedvial->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rTipRed 			= $this->tiporedvial->listarTipRed();
	$this->patentes->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rPaten 			= $this->patentes->listarPaten();
	$this->accesoservi->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rAcServi 			= $this->accesoservi->listarAcServi();
	$this->areas->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rAreas 			= $this->areas->listarAreas();

	$pdf 				= new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFillColor(255,255,255);
	$pdf->SetFont('Arial','B',11);
	try
	{
		$pdf->MultiCell(125,3,utf8_decode('REPORTE DE INSPECCIÓN'),0,0,'J');
		$pdf->MultiCell(105,10,'Datos',0,0,'J');
		while ($ins = mysqli_fetch_array($rLista)){
			$pdf->MultiCell(100,5,utf8_decode('Fecha: '.$ins[0]),0,1,'J');
			$pdf->MultiCell(50,5,utf8_decode('Tramite: '.$ins[1]),0,1,'J');
			$pdf->MultiCell(103,5,utf8_decode('GPS'),0,0,'J');
			$pdf->MultiCell(130,5,utf8_decode('Norte: '.$ins[2].' Este: '.$ins[3].' Altitud: '.$ins[4]),0,0,'J');
			$pdf->MultiCell(50,5,utf8_decode('Cedula: '.$ins[5]),0,1,'J');
			$pdf->MultiCell(190,5,utf8_decode('Nombre: '.$ins[6].''.$ins[7].''.$ins[8]),0,1,'J');
		}
		$pdf->MultiCell(115,5,utf8_decode('Datos Inspección'),0,0,'J');
		$pdf->MultiCell(118,5,utf8_decode('Espacio Geográfico'),0,1,'J');
		while ($eg = mysqli_fetch_array($rEsGeo)) {
			$pdf->MultiCell(100,5,utf8_decode('* '.$eg[0]),0,1,'J');
		}
		
		$pdf->MultiCell(118,5,utf8_decode('Aspectos Biofísicos'),0,1,'J');
		while ($ab = mysqli_fetch_array($rAsBio)) {
			$pdf->MultiCell(100,5,utf8_decode('* '.$ab[0]),0,1,'J');
		}
		
		$pdf->MultiCell(120,5,utf8_decode('Desarrollo en el Sector'),0,1,'J');
		while ($ds = mysqli_fetch_array($rDesSec)) {
			$pdf->MultiCell(100,5,utf8_decode('* '.$ds[0]),0,1,'J');
		}
		
		$pdf->MultiCell(112,5,utf8_decode('Tipo Red Vial'),0,1,'J');
		while ($tr = mysqli_fetch_array($rTipRed)) {
			$pdf->MultiCell(100,5,utf8_decode('* '.$tr[0]),0,1,'J');
		}

		$pdf->MultiCell(108,5,utf8_decode('Patentes'),0,1,'J');
		while ($p = mysqli_fetch_array($rPaten)) {
			$pdf->MultiCell(100,5,utf8_decode('* '.$p[0]),0,1,'J');
		}

		$pdf->MultiCell(122,5,utf8_decode('Acceso de Servidumbre'),0,1,'J');
		while ($as = mysqli_fetch_array($rAcServi)) {
			$pdf->MultiCell(100,5,utf8_decode('* '.$as[0]),0,1,'J');
		}

		$pdf->MultiCell(105,5,utf8_decode('Áreas'),0,1,'J');
		while ($a = mysqli_fetch_array($rAreas)) {
			$pdf->MultiCell(100,5,utf8_decode('* '.$a[0]),0,1,'J');
		}

		$pdf->Ln(5);
	 	$pdf->MultiCell(190,5,"Atentamente, ",0,1);
	 	$pdf->MultiCell(180,5,"Firma Inspector",0,0);
	 	$pdf->Ln(2);
	 	$pdf->MultiCell(190,5,"__________________________",0,0)	;
	 	$pdf->Ln(5);
	 	$pdf->MultiCell(190,5,utf8_decode('# Cédula: __________________________'),0,0,'R');
	 	

		$pdf->Output();
	} catch(Exception $e){
		$pdf->Cell(30, 10, "Sin datos", 0, 0, 'C');
		$pdf->Output();
	}
}

// Reporte
public function reporte(){
	$this->classreporte->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$this->resolusion 	 		= new classreporte();

	$this->constra 				= new classreporte();
	
	$this->actdes_res 	 		= new classreporte();
	$this->actdes_com 	 		= new classreporte();
	$this->actdes_com_in 		= new classreporte();
	$this->actdes_desa 	 		= new classreporte();
	$this->actdes_es 	 		= new classreporte();
	
	$this->desceg 		 		= new classreporte();
	
	$this->leyesAccesos 		= new classreporte();
	$this->leyesDesarroSect 	= new classreporte();
	$this->leyesEspacioGeo 		= new classreporte();
	$this->leyesActividades 	= new classreporte();
	$this->leyesAspectoBio 		= new classreporte();
	$this->leyesPatente 		= new classreporte();
	$this->leyesPlan 		 	= new classreporte();
	$this->leyesRedVial 		= new classreporte();
	$this->leyesAreasPro 		= new classreporte();
	$this->leyesServi			= new classreporte();
	
	$this->apro_dene 			= new classreporte();
	$this->observacion          = new classreporte();

	$this->encabezadopatente	= new classreporte();
	$this->encabezadoconstruccion = new classreporte();

	$this->resolusion->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLista 			= $this->resolusion->listarResi();
	$this->desceg->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rDesceg 			= $this->desceg->listarDESCEG();
	$this->constra->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rConstra			= $this->constra->listarCons();

	$this->actdes_res->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesRes 		= $this->actdes_res->listarACTDESRES();
	$this->actdes_com->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesCom 		= $this->actdes_com->listarACTDESCOM();
	$this->actdes_com_in->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesComIn 		= $this->actdes_com_in->listarACTDESCOMIN();
	$this->actdes_desa->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesDesa 		= $this->actdes_desa->listarACTDESDESA();
	$this->actdes_es->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesEs 			= $this->actdes_es->listarACTDESES();

	$this->leyesAccesos->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAccesos 		= $this->leyesAccesos->listarLeyAccesos();
	$this->leyesDesarroSect->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesDesarroSect 	= $this->leyesDesarroSect->listarLeyDesarroSect();
	$this->leyesEspacioGeo->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesEspacioGeo 	= $this->leyesEspacioGeo->listarLeyEspacioGeo();
	$this->leyesActividades->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesActividades	= $this->leyesActividades->listarLeyActividades();
	$this->leyesAspectoBio->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAspectoBio 	= $this->leyesAspectoBio->listarLeyAspectoBio();
	$this->leyesPatente->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesPatente 		= $this->leyesPatente->listarLeyPatente();
	$this->leyesPlan->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesPlan 		= $this->leyesPlan->listarLeyPlan();
	$this->leyesRedVial->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesRedVial 		= $this->leyesRedVial->listarLeyRedVial();
	$this->leyesAreasPro->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAreasPro 	= $this->leyesAreasPro->listarLeyAreasPro();
	$this->leyesServi->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rleyesServi 		= $this->leyesServi->listarLeyServi();

	$this->apro_dene->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rApro_Dene 		= $this->apro_dene->listarR_APRO_DENE();

	$this->observacion->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$robservacion 		= $this->observacion->listarR_OBSERV_TRAMITE();

	$this->encabezadopatente->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rencabezadopatente = $this->encabezadopatente->listarencabezadoPatente();
	$this->encabezadoconstruccion->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rencabezadoconstruccion = $this->encabezadoconstruccion->listarencabezadoConstruccion();

	$pdf 				= new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFillColor(255,255,255);
	$pdf->SetFont('Arial','B',11);
	try
	{
		while ($rpantente = mysqli_fetch_array($rencabezadopatente) ) {
			$pdf->Cell(185, 5, utf8_decode($rpantente[0]), 0, 0, 'C');
		}
		while ($rconstruccion = mysqli_fetch_array($rencabezadoconstruccion) ) {
			$pdf->Cell(185, 5, utf8_decode($rconstruccion[0]), 0, 0, 'C');
		}
		//$pdf->Cell(185, 5, utf8_decode($rpantente[0]), 0, 0, 'C');
		$pdf->Ln(5);
		//Muestras los primeros datos que dan referencia a los nombres, planos, terrenos, numero de finca... etc
		while ($row = mysqli_fetch_array($rLista)) {
			$pdf->MultiCell(50,5,$row[0],0,1);
			while ($cons = mysqli_fetch_array($rConstra)) {
		 		$pdf->MultiCell(60,5,"DPU-".$cons[0]."-".$cons[1]."-".$cons[2],0,'L');
			 	$pdf->MultiCell(0,0,utf8_decode("Número de Trámite:"),0,0,'L');
			 	$pdf->Ln(2);
			 	$pdf->MultiCell(175,20,$row[1],0,0,'L');
			 	$pdf->MultiCell(100,5,utf8_decode("Señor(a):"));
			 	$pdf->Ln(1);
			 	$pdf->MultiCell(100,5,utf8_decode($row[2]." ".$row[3]." ".$row[4]),0,1,'J');
			 	$pdf->Ln(1);
			 	$pdf->MultiCell(40,5,utf8_decode("Cédula: ".$row[5]),0,1,'J');
			 	$pdf->MultiCell(23,10,"Presente",0,1,'J');
			 	$pdf->SetFont('Arial','B',10);
			 	$pdf->MultiCell(180,5,utf8_decode(
			 		"Se extiende RESOLUCIÓN MUNICIPAL DE UBICACIÓN DE USO para la Propiedad Plano G-".$row[6]." de la Finca 5-".$row[7].", Propiedad de ".$row[8]." ".$row[9]." ".$row[10].", Cédula/Jurídica ".$row[11].", Ubicada en ".$row[12].", ".$row[13].", Distrito ".$row[14].", Nicoya, indicando lo siguiente:" ),0,1,'J' );
			 	$pdf->Ln(2);
			 	$pdf->Ln(2);
			 	$pdf->Ln(2);
			 	$pdf->Ln(2);
			 	$pdf->MultiCell(55,5,'> Uso Actual del Suelo',0,1,'J');
			 	//Muestra los usos del suelo actual
			 	while ($as = mysqli_fetch_array($rDesceg)) {
			 		$pdf->Ln(1);
			 		$pdf->MultiCell(100,5,utf8_decode("* ".$as[0]."."),0,1,'J');
			 		$pdf->Ln(1);
			 	}
			 	// Fin suelo actual
			 	$pdf->Ln(2);
			 	$pdf->MultiCell(55,5,"> Actividad a Desarrollar",0,1,'J');
			 	$pdf->Ln(2);
			 	//Muestra las actividades a desarrollar
			 	while ($adr = mysqli_fetch_array($rActdesRes)) {
			 		$pdf->Ln(1);
			 		$pdf->MultiCell(100,5,utf8_decode("* ".$adr[0]."."),0,1,'J');
			 		$pdf->Ln(1);
			 	}
			 	while ($ades = mysqli_fetch_array($rActdesEs)) {
			 		$pdf->Ln(1);
			 		$pdf->MultiCell(100,5,utf8_decode("* ".$ades[0]."."),0,1,'J');
			 		$pdf->Ln(1);
			 	}
			 	while ($adci = mysqli_fetch_array($rActdesComIn)) {
			 		$pdf->Ln(1);
			 		$pdf->MultiCell(100,5,utf8_decode("* ".$adci[0]."."),0,1,'J');
			 		$pdf->Ln(1);
			 	}
			 	while ($add = mysqli_fetch_array($rActdesDesa)) {
			 		$pdf->Ln(1);
			 		$pdf->MultiCell(100,5,utf8_decode("* ".$add[0]."."),0,1,'J');
			 		$pdf->Ln(1);
			 	}
			 	while ($adc = mysqli_fetch_array($rActdesCom)) {
			 		$pdf->Ln(1);
			 		$pdf->MultiCell(100,5,utf8_decode("* ".$adc[0]."."),0,1,'J');
			 		$pdf->Ln(1);
			 	}
			 	//Fin Actividades
			 	$pdf->Ln(2);
			 	$pdf->MultiCell(190,5,"Se concluye: ",0,1,'J');
			 	// Inicio Leyes
			 	while ($leyA = mysqli_fetch_array($rLeyesAccesos)) {
			 		$pdf->Ln(1);
			 		$pdf->MultiCell(190,5,utf8_decode($leyA[0]),0,'J');
			 		$pdf->Ln(2);
			 	}
			 	while ($leyPT = mysqli_fetch_array($rLeyesPatente)) {
			 		$pdf->Ln(1);
			 		$pdf->MultiCell(190,5,utf8_decode($leyPT[0]),0,'J');
			 		$pdf->Ln(2);
			 	}
			 	while ($leyAD = mysqli_fetch_array($rLeyesActividades)) {
			 		$pdf->Ln(1);
			 		$pdf->MultiCell(190,5,utf8_decode($leyAD[0]),0,'J');
			 		$pdf->Ln(2);
			 	}
			 	while ($leyAP = mysqli_fetch_array($rLeyesAreasPro)) {
			 		$pdf->Ln(1);
			 		$pdf->MultiCell(190,5,utf8_decode($leyAP[0]),0,'J');
			 		$pdf->Ln(2);
			 	}
			 	while ($leyRV = mysqli_fetch_array($rLeyesRedVial)) {
			 		$pdf->Ln(1);
			 		$pdf->MultiCell(190,5,utf8_decode($leyRV[0]),0,'J');
			 		$pdf->Ln(2);
			 	}
			 	while ($leyAB = mysqli_fetch_array($rLeyesAspectoBio)) {
			 		$pdf->Ln(1);
			 		$pdf->MultiCell(190,5,utf8_decode($leyAB[0]),0,'J');
			 		$pdf->Ln(2);
			 	}
			 	while ($leyDS = mysqli_fetch_array($rLeyesDesarroSect)) {
			 		$pdf->Ln(1);
			 		$pdf->MultiCell(190,5,utf8_decode($leyDS[0]),0,'J');
			 		$pdf->Ln(2);
			 	}
			 	while ($leyEG = mysqli_fetch_array($rLeyesEspacioGeo)) {
			 		$pdf->Ln(1);
			 		$pdf->MultiCell(190,5,utf8_decode($leyEG[0]),0,'J');
			 		$pdf->Ln(2);
			 	}
			 	while ($leySD = mysqli_fetch_array($rleyesServi)){
			 		$pdf->Ln(1);
			 		$pdf->MultiCell(190,5,utf8_decode($leySD[0]),0,'J');
			 		$pdf->Ln(2);
			 	}
				// Fin leyes
			 	while ($obser = mysqli_fetch_array($robservacion)) {
			 		$pdf->Ln(1);
			 		$pdf->MultiCell(190,5,utf8_decode($obser[0]),0,'J');
			 		$pdf->Ln(2);
			 	}
			 	$pdf->MultiCell(190,5,utf8_decode(
			 			'Condicionado a contar con a disponibilidad de agua para el proyecto a realizar por parte de la entidad competente (Asada o AyA), basado en el decreto de sequía Nª MP-38642-MAG' ),0,'J');
				$pdf->Ln(2);
				$pdf->MultiCell(190,5,utf8_decode(
			 		'Debiendo coordinar el permiso de corta de árboles existente en la propiedad ante el MINAE. La altura máxima y la cobertura deberán estar apegadas a lo dispuesto en la Ley de Planificación Urbana, Ley de Uso, Manejo y Conservación de Suelo N° 7779, Ley forestal N°7575 y demás Legislación Vigente. Si se realiza movimientos de Tierra se debe solicitar el permiso Respectivo ante el departamento de Control Constructivo.' ),0,'J');
				$pdf->Ln(2);
				$pdf->MultiCell(190,5,utf8_decode(
			 		'De requerirse remodelar, ampliar, renovar o reparar el local comercial, se requiere del trámite de la licencia municipal de construcción, para lo cual deberá sujetarse a las regulaciones estipuladas en el reglamento de construcciones, publicado en el diario oficial La Gaceta N°56, alcance N.º 17 del 11 de marzo de 1983 y sus reformas, así como lo indicado en la ley N°833 de noviembre de 1949 Ley de construcciones , así mismo,  cumplir con la normativa ambiental, sanitaria, urbanística y otras vigentes que regulen los procesos constructivos.' ),0,'J');
				$pdf->Ln(2);
				while ($leyP = mysqli_fetch_array($rLeyesPlan)) {
			 		$pdf->Ln(1);
			 		$pdf->MultiCell(190,5,utf8_decode($leyP[0]),0,'J');
			 		$pdf->Ln(2);
			 	}
			 	$pdf->MultiCell(100,5,"Por tanto",0,0);
			 	$pdf->Ln(1);
			 	$pdf->MultiCell(190,5,utf8_decode("Se ".$row[15]." la RESOLUCIÓN DE UBICACIÓN MUNICIPAL, mediante oficio DPU-".$cons[0]."-".$cons[1]."-".$cons[2].", para la Finca 5-".$row[7].", quedando sujeto a las disposiciones de la legislación vigente y en observaciones de nuestro ordenamiento jurídico, cualquier transgresión a las normas, producirá anulación del acto administrativo."),0,'J');
		 	}
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'Nota: Al haber aprobado la Resolución de Ubicación Municipal eso implica que se está dado el permiso para movimiento de tierra, cortes, rellenos, construcción construcción, desfogue fluvial, todo lo relacionado con obras civiles por lo que deberan ser tramitado en el momento que se requiera dicho permiso y también si la Resolución Municipal (Uso de Suelo) es positivo, no obliga a la municipalidad a otorgar la respectiva pantente, esta debe ser solicitado de conformidad con la normativa establecido por esta institución para estos efectos.' ),0,'J');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,"Atentamente, ",0,1);
		 	$pdf->MultiCell(180,5,"Firma de Recibido",0,0);
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,"__________________________",0,0)	;
		 	$pdf->Ln(5);
		 	$pdf->MultiCell(190,5,utf8_decode('# Cédula: __________________________'),0,0,'R');
		 	$pdf->Ln(3);
		 	$pdf->MultiCell(190,5,utf8_decode('Fecha: __________________ Hora: __________________'),0,0,'R');
		 	$pdf->Ln(3);
		 	$pdf->MultiCell(60,5,"__________________________",0,1);
		 	$pdf->MultiCell(50,5,"Arq. Jonathan Soto Segura",0,1);
		 	$pdf->MultiCell(80,5,utf8_decode("Coordinador de Planificación Urbana"),0,1);
		 	$pdf->MultiCell(80,5,utf8_decode("Municipalidad de Nicoya"),0,1);
		}
		$pdf->Output();
	} catch(Exception $e){
		$pdf->Cell(30, 10, "Sin datos", 0, 0, 'C');
		$pdf->Output();
	}
}

// Nicoya {
public function rZonaVerde(){
	$this->zonaverde 			= new classreporte();
	$this->constra 				= new classreporte();
	$this->actdes_res 	 		= new classreporte();
	$this->actdes_com 	 		= new classreporte();
	$this->actdes_com_in 		= new classreporte();
	$this->actdes_desa 	 		= new classreporte();
	$this->actdes_es 	 		= new classreporte();
	$this->desceg 		 		= new classreporte();
	$this->leyesAccesos 		= new classreporte();
	$this->leyesDesarroSect 	= new classreporte();
	$this->leyesEspacioGeo 		= new classreporte();
	$this->leyesActividades 	= new classreporte();
	$this->leyesAspectoBio 		= new classreporte();
	$this->leyesPatente 		= new classreporte();
	$this->leyesPlan 		 	= new classreporte();
	$this->leyesRedVial 		= new classreporte();
	$this->leyesAreasPro 		= new classreporte();
	$this->leyesServi			= new classreporte();
	$this->apro_dene 			= new classreporte();
	$this->observacion          = new classreporte();
	$this->datoszonaverde 		= new classreporte();


	$this->encabezadopatente	= new classreporte();
	$this->encabezadoconstruccion = new classreporte();

	$this->zonaverde->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$result1 = $this->zonaverde->listarZonaVerde();
	$this->datoszonaverde->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$datos = $this->datoszonaverde->listardatosZonaVerde();
	$this->constra->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rConstra			= $this->constra->listarCons();

	$this->desceg->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rDesceg 			= $this->desceg->listarDESCEG();

	$this->actdes_res->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesRes 		= $this->actdes_res->listarACTDESRES();
	$this->actdes_com->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesCom 		= $this->actdes_com->listarACTDESCOM();
	$this->actdes_com_in->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesComIn 		= $this->actdes_com_in->listarACTDESCOMIN();
	$this->actdes_desa->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesDesa 		= $this->actdes_desa->listarACTDESDESA();
	$this->actdes_es->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesEs 			= $this->actdes_es->listarACTDESES();

	$this->leyesAccesos->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAccesos 		= $this->leyesAccesos->listarLeyAccesos();
	$this->leyesDesarroSect->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesDesarroSect 	= $this->leyesDesarroSect->listarLeyDesarroSect();
	$this->leyesEspacioGeo->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesEspacioGeo 	= $this->leyesEspacioGeo->listarLeyEspacioGeo();
	$this->leyesActividades->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesActividades	= $this->leyesActividades->listarLeyActividades();
	$this->leyesAspectoBio->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAspectoBio 	= $this->leyesAspectoBio->listarLeyAspectoBio();
	$this->leyesPatente->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesPatente 		= $this->leyesPatente->listarLeyPatente();
	$this->leyesPlan->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesPlan 		= $this->leyesPlan->listarLeyPlan();
	$this->leyesRedVial->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesRedVial 		= $this->leyesRedVial->listarLeyRedVial();
	$this->leyesAreasPro->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAreasPro 	= $this->leyesAreasPro->listarLeyAreasPro();
	$this->leyesServi->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rleyesServi 	= $this->leyesServi->listarLeyServi();

	$this->apro_dene->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rApro_Dene 	= $this->apro_dene->listarR_APRO_DENE();

	$this->observacion->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$robservacion 	= $this->observacion->listarR_OBSERV_TRAMITE();

	$this->encabezadopatente->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rencabezadopatente = $this->encabezadopatente->listarencabezadoPatente();
	$this->encabezadoconstruccion->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rencabezadoconstruccion = $this->encabezadoconstruccion->listarencabezadoConstruccion();

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFillColor(255,255,255);
	$pdf->SetFont('Arial','B',11);
	try
	{
		while ($rpantente = mysqli_fetch_array($rencabezadopatente) ) {
			$pdf->Cell(185, 5, utf8_decode($rpantente[0]), 0, 0, 'C');
		}
		while ($rconstruccion = mysqli_fetch_array($rencabezadoconstruccion) ) {
			$pdf->Cell(185, 5, utf8_decode($rconstruccion[0]), 0, 0, 'C');
		}
		$pdf->Ln(15);
		while ($row = mysqli_fetch_array($result1)) {
			$pdf->MultiCell(50,5,$row[0],0,1);
			while ($cons = mysqli_fetch_array($rConstra)) {
		 		$pdf->MultiCell(60,5,"DPU-".$cons[0]."-".$cons[1]."-".$cons[2],0,'L');
		 	$pdf->MultiCell(0,0,utf8_decode("Número de Trámite:"),0,0,'L');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(175,20,$row[1],0,0,'L');
		 	$pdf->MultiCell(100,5,utf8_decode("Señor(a):"));
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(100,5,utf8_decode($row[2]." ".$row[3]." ".$row[4]),0,1,'J');
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(40,5,utf8_decode("Cédula: ".$row[5]),0,1,'J');
		 	$pdf->MultiCell(23,10,"Presente",0,1,'J');
		 	$pdf->SetFont('Arial','B',10);
		 	$pdf->MultiCell(180,5,utf8_decode("Se extiende RESOLUCIÓN MUNICIPAL DE UBICACIÓN DE USO para la Propiedad Plano G-".$row[6]." de la Finca 5-".$row[7].", Propiedad de ".$row[8]." ".$row[9]." ".$row[10].", Cédula Jurídica ".$row[11].", Ubicada ".$row[12].", ".$row[13].", Distrito ".$row[14].", Nicoya, indicando lo siguiente:"),0,1,'J');
		 	
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,utf8_decode('El terreno evaluado es afectado por el Plan Regulador vigente del cantón de Nicoya. La Resolución Municipal de Ubicación corresponde a Zona:'),0,1,'J');
		 	while ($fila = mysqli_fetch_array($datos)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$fila[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}

		 	$pdf->Ln(2);

		 	$pdf->MultiCell(55,5,'> Uso Actual del Suelo',0,1,'J');
		 	//Muestra los usos del suelo actual
		 	while ($as = mysqli_fetch_array($rDesceg)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$as[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(55,5,"> Actividad a Desarrollar",0,1,'J');
		 	$pdf->Ln(2);
		 	//Muestra las actividades a desarrollar
		 	while ($adr = mysqli_fetch_array($rActdesRes)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$adr[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($ades = mysqli_fetch_array($rActdesEs)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$ades[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($adci = mysqli_fetch_array($rActdesComIn)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$adci[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($add = mysqli_fetch_array($rActdesDesa)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$add[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($adc = mysqli_fetch_array($rActdesCom)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$adc[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,"Se concluye: ",0,1,'J');
		 	while ($leyA = mysqli_fetch_array($rLeyesAccesos)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyA[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	
		 	while ($leyPT = mysqli_fetch_array($rLeyesPatente)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyPT[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyAD = mysqli_fetch_array($rLeyesActividades)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyAD[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyAP = mysqli_fetch_array($rLeyesAreasPro)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyAP[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyRV = mysqli_fetch_array($rLeyesRedVial)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyRV[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyAB = mysqli_fetch_array($rLeyesAspectoBio)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyAB[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyDS = mysqli_fetch_array($rLeyesDesarroSect)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyDS[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyEG = mysqli_fetch_array($rLeyesEspacioGeo)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyEG[0]),0,'J');
		 		$pdf->Ln(2);
		 	}

		 	while ($obser = mysqli_fetch_array($robservacion)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($obser[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyP = mysqli_fetch_array($rLeyesPlan)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyP[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
			$pdf->MultiCell(190,5,utf8_decode('Nota: Al haber aprobado la Resolución de Ubicación Municipal eso implica que se está dado el permiso para movimiento de tierra, cortes, rellenos, construcción construcción, desfogue fluvial, todo lo relacionado con obras civiles por lo que deberan ser tramitado en el momento que se requiera dicho permiso y también si la Resolución Municipal (Uso de Suelo) es positivo, no obliga a la municipalidad a otorgar la respectiva pantente, esta debe ser solicitado de conformidad con la normativa establecido por esta institución para estos efectos.'),0,'J');
			$pdf->Ln(1);
		 	$pdf->MultiCell(100,5,"Por tanto",0,0);
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(190,5,utf8_decode("Se ".$row[15]." la RESOLUCIÓN DE UBICACIÓN MUNICIPAL, mediante oficio DPU-".$cons[0]."-".$cons[1]."-".$cons[2].", para la Finca 5-".$row[7]." quedando sujeto a las disposiciones de la legislación vigente y en observaciones de nuestro ordenamiento jurídico, cualquier transgresión a las normas, producirá anulación del acto administrativo."),0,'J');
		 	}
		 	
		 	
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,"Atentamente, ",0,1);
		 	$pdf->MultiCell(180,5,"Firma de Recibido",0,0);
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,"__________________________",0,0)	;
		 	$pdf->Ln(5);
		 	$pdf->MultiCell(190,5,utf8_decode('# Cédula: __________________________'),0,0,'R');
		 	$pdf->Ln(3);
		 	$pdf->MultiCell(190,5,utf8_decode('Fecha: ____________________ Hora: __________________________'),0,0,'R');
		 	$pdf->Ln(3);
		 	$pdf->MultiCell(60,5,"__________________________",0,1);
		 	$pdf->MultiCell(50,5,"Arq. Jonathan Soto Segura",0,1);
		 	$pdf->MultiCell(80,5,utf8_decode("Coordinador de Planificación Urbana"),0,1);
		 	$pdf->MultiCell(80,5,utf8_decode("Municipalidad de Nicoya"),0,1);

		 }
		 $pdf->Output();
	} catch(Exception $e) {
		$pdf->Cell(30, 10, "Sin datos".$e, 0, 0, 'C');
		$pdf->Output();
	}
}

public function rInstitucional(){
	$this->institucional 		= new classreporte();
	$this->constra 				= new classreporte();
	$this->actdes_res 	 		= new classreporte();
	$this->actdes_com 	 		= new classreporte();
	$this->actdes_com_in 		= new classreporte();
	$this->actdes_desa 	 		= new classreporte();
	$this->actdes_es 	 		= new classreporte();
	$this->desceg 		 		= new classreporte();
	$this->leyesAccesos 		= new classreporte();
	$this->leyesDesarroSect 	= new classreporte();
	$this->leyesEspacioGeo 		= new classreporte();
	$this->leyesActividades 	= new classreporte();
	$this->leyesAspectoBio 		= new classreporte();
	$this->leyesPatente 		= new classreporte();
	$this->leyesPlan 		 	= new classreporte();
	$this->leyesRedVial 		= new classreporte();
	$this->leyesAreasPro 		= new classreporte();
	$this->leyesServi			= new classreporte();
	$this->apro_dene 			= new classreporte();
	$this->observacion          = new classreporte();
	$this->datosintitu 			= new classreporte();

	$this->encabezadopatente	= new classreporte();
	$this->encabezadoconstruccion = new classreporte();

	$this->institucional->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$result1 = $this->institucional->listarInstitucional();
	$this->datosintitu->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$datos = $this->datosintitu->listardatosInstitu();
	$this->constra->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rConstra			= $this->constra->listarCons();

	$this->desceg->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rDesceg 			= $this->desceg->listarDESCEG();

	$this->actdes_res->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesRes 		= $this->actdes_res->listarACTDESRES();
	$this->actdes_com->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesCom 		= $this->actdes_com->listarACTDESCOM();
	$this->actdes_com_in->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesComIn 		= $this->actdes_com_in->listarACTDESCOMIN();
	$this->actdes_desa->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesDesa 		= $this->actdes_desa->listarACTDESDESA();
	$this->actdes_es->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesEs 			= $this->actdes_es->listarACTDESES();

	$this->leyesAccesos->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAccesos 		= $this->leyesAccesos->listarLeyAccesos();
	$this->leyesDesarroSect->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesDesarroSect 	= $this->leyesDesarroSect->listarLeyDesarroSect();
	$this->leyesEspacioGeo->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesEspacioGeo 	= $this->leyesEspacioGeo->listarLeyEspacioGeo();
	$this->leyesActividades->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesActividades	= $this->leyesActividades->listarLeyActividades();
	$this->leyesAspectoBio->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAspectoBio 	= $this->leyesAspectoBio->listarLeyAspectoBio();
	$this->leyesPatente->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesPatente 		= $this->leyesPatente->listarLeyPatente();
	$this->leyesPlan->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesPlan 		= $this->leyesPlan->listarLeyPlan();
	$this->leyesRedVial->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesRedVial 		= $this->leyesRedVial->listarLeyRedVial();
	$this->leyesAreasPro->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAreasPro 	= $this->leyesAreasPro->listarLeyAreasPro();
	$this->leyesServi->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rleyesServi 	= $this->leyesServi->listarLeyServi();

	$this->apro_dene->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rApro_Dene 	= $this->apro_dene->listarR_APRO_DENE();

	$this->observacion->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$robservacion 	= $this->observacion->listarR_OBSERV_TRAMITE();


	$this->encabezadopatente->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rencabezadopatente = $this->encabezadopatente->listarencabezadoPatente();
	$this->encabezadoconstruccion->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rencabezadoconstruccion = $this->encabezadoconstruccion->listarencabezadoConstruccion();

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFillColor(255,255,255);
	$pdf->SetFont('Arial','B',11);
	try
	{
		while ($rpantente = mysqli_fetch_array($rencabezadopatente) ) {
			$pdf->Cell(185, 5, utf8_decode($rpantente[0]), 0, 0, 'C');
		}
		while ($rconstruccion = mysqli_fetch_array($rencabezadoconstruccion) ) {
			$pdf->Cell(185, 5, utf8_decode($rconstruccion[0]), 0, 0, 'C');
		}
		$pdf->Ln(15);
		while ($row = mysqli_fetch_array($result1)) {
			$pdf->MultiCell(50,5,$row[0],0,1);
			while ($cons = mysqli_fetch_array($rConstra)) {
		 		$pdf->MultiCell(60,5,"DPU-".$cons[0]."-".$cons[1]."-".$cons[2],0,'L');
		 	$pdf->MultiCell(0,0,utf8_decode("Número de Trámite:"),0,0,'L');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(175,20,$row[1],0,0,'L');
		 	$pdf->MultiCell(100,5,utf8_decode("Señor(a):"));
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(100,5,utf8_decode($row[2]." ".$row[3]." ".$row[4]),0,1,'J');
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(40,5,utf8_decode("Cédula: ".$row[5]),0,1,'J');
		 	$pdf->MultiCell(23,10,"Presente",0,1,'J');
		 	$pdf->SetFont('Arial','B',10);
		 	$pdf->MultiCell(180,5,utf8_decode("Se extiende RESOLUCIÓN MUNICIPAL DE UBICACIÓN DE USO para la Propiedad Plano G-".$row[6]." de la Finca 5-".$row[7].", Propiedad de ".$row[8]." ".$row[9]." ".$row[10].", Cédula Jurídica ".$row[11].", Ubicada ".$row[12].", ".$row[13].", Distrito ".$row[14].", Nicoya, indicando lo siguiente:"),0,1,'J');
		 
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,utf8_decode('El terreno evaluado es afectado por el Plan Regulador vigente del cantón de Nicoya. La Resolución Municipal de Ubicación corresponde a Zona.'),0,1,'J');
		 	while ($fila = mysqli_fetch_array($datos)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$fila[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	$pdf->MultiCell(190,5,utf8_decode('En caso de Uso Público Institucional los usos permitidos son: '),0,1,'J');
		 	$pdf->MultiCell(190,5,utf8_decode('1.	Oficinas de Administración Pública.'),0,1,'J');
		 	$pdf->MultiCell(190,5,utf8_decode('2.	Instituciones de Educación Pública.'),0,1,'J');
		 	$pdf->MultiCell(190,5,utf8_decode('3.	Museos, bibliotecas y centros comunales.'),0,1,'J');
		 	$pdf->MultiCell(190,5,utf8_decode('4.	Servicios Públicos de tipo de asistencia hospitalaria.'),0,1,'C');
		 	$pdf->MultiCell(190,5,utf8_decode('5.	Instituciones públicas de beneficencia.'),0,1,'C');
		 	$pdf->MultiCell(190,5,utf8_decode('6.	Estaciones de bomberos y delegaciones de policía.'),0,1,'C');
		 	$pdf->MultiCell(190,5,utf8_decode('7.	Estacionamientos públicos.'),0,1,'J');
		 	$pdf->MultiCell(190,5,utf8_decode('8.	Centros sociales y recreativos, como clubes, lagos, piscinas y campo de juegos.'),0,1,'J');
		 	$pdf->MultiCell(190,5,utf8_decode('9.	Otros usos públicos no molestos.'),0,1,'J');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(55,5,'> Uso Actual del Suelo',0,1,'J');
		 	//Muestra los usos del suelo actual
		 	while ($as = mysqli_fetch_array($rDesceg)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$as[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(55,5,"> Actividad a Desarrollar",0,1,'J');
		 	$pdf->Ln(2);
		 	//Muestra las actividades a desarrollar
		 	while ($adr = mysqli_fetch_array($rActdesRes)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$adr[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($ades = mysqli_fetch_array($rActdesEs)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$ades[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($adci = mysqli_fetch_array($rActdesComIn)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$adci[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($add = mysqli_fetch_array($rActdesDesa)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$add[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($adc = mysqli_fetch_array($rActdesCom)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$adc[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,"Se concluye: ",0,1,'J');
		 	while ($leyA = mysqli_fetch_array($rLeyesAccesos)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyA[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	
		 	while ($leyPT = mysqli_fetch_array($rLeyesPatente)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyPT[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyAD = mysqli_fetch_array($rLeyesActividades)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyAD[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyAP = mysqli_fetch_array($rLeyesAreasPro)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyAP[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyRV = mysqli_fetch_array($rLeyesRedVial)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyRV[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyAB = mysqli_fetch_array($rLeyesAspectoBio)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyAB[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyDS = mysqli_fetch_array($rLeyesDesarroSect)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyDS[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyEG = mysqli_fetch_array($rLeyesEspacioGeo)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyEG[0]),0,'J');
		 		$pdf->Ln(2);
		 	}

		 	while ($obser = mysqli_fetch_array($robservacion)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($obser[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyP = mysqli_fetch_array($rLeyesPlan)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyP[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	$pdf->MultiCell(190,5,utf8_decode('Nota: Al haber aprobado la Resolución de Ubicación Municipal eso implica que se está dado el permiso para movimiento de tierra, cortes, rellenos, construcción construcción, desfogue fluvial, todo lo relacionado con obras civiles por lo que deberan ser tramitado en el momento que se requiera dicho permiso y también si la Resolución Municipal (Uso de Suelo) es positivo, no obliga a la municipalidad a otorgar la respectiva pantente, esta debe ser solicitado de conformidad con la normativa establecido por esta institución para estos efectos.'),0,'J');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(100,5,"Por tanto",0,0);
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(190,5,utf8_decode("Se ".$row[15]." la RESOLUCIÓN DE UBICACIÓN MUNICIPAL, mediante oficio DPU-".$cons[0]."-".$cons[1]."-".$cons[2].", para la Finca 5-".$row[7]." quedando sujeto a las disposiciones de la legislación vigente y en observaciones de nuestro ordenamiento jurídico, cualquier transgresión a las normas, producirá anulación del acto administrativo."),0,'J');
		 	}
		 	$pdf->Ln(1);
		 	
		 	$pdf->MultiCell(190,5,"Atentamente, ",0,1);
		 	$pdf->MultiCell(180,5,"Firma de Recibido",0,0);
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,"__________________________",0,0)	;
		 	$pdf->Ln(5);
		 	$pdf->MultiCell(190,5,utf8_decode('# Cédula: __________________________'),0,0,'R');
		 	$pdf->Ln(3);
		 	$pdf->MultiCell(190,5,utf8_decode('Fecha: ____________________ Hora: __________________________'),0,0,'R');
		 	$pdf->Ln(3);
		 	$pdf->MultiCell(60,5,"__________________________",0,1);
		 	$pdf->MultiCell(50,5,"Arq. Jonathan Soto Segura",0,1);
		 	$pdf->MultiCell(80,5,utf8_decode("Coordinador de Planificación Urbana"),0,1);
		 	$pdf->MultiCell(80,5,utf8_decode("Municipalidad de Nicoya"),0,1);

		 }
		 $pdf->Output();
	} catch(Exception $e) {
		$pdf->Cell(30, 10, "Sin datos".$e, 0, 0, 'C');
		$pdf->Output();
	}
}

public function rComercialCentral(){
	$this->comercialcentral 	= new classreporte();
	$this->constra 				= new classreporte();
	$this->actdes_res 	 		= new classreporte();
	$this->actdes_com 	 		= new classreporte();
	$this->actdes_com_in 		= new classreporte();
	$this->actdes_desa 	 		= new classreporte();
	$this->actdes_es 	 		= new classreporte();
	$this->desceg 		 		= new classreporte();
	$this->leyesAccesos 		= new classreporte();
	$this->leyesDesarroSect 	= new classreporte();
	$this->leyesEspacioGeo 		= new classreporte();
	$this->leyesActividades 	= new classreporte();
	$this->leyesAspectoBio 		= new classreporte();
	$this->leyesPatente 		= new classreporte();
	$this->leyesPlan 		 	= new classreporte();
	$this->leyesRedVial 		= new classreporte();
	$this->leyesAreasPro 		= new classreporte();
	$this->leyesServi			= new classreporte();
	$this->apro_dene 			= new classreporte();
	$this->observacion          = new classreporte();
	$this->datoscomercentral 	= new classreporte();

	$this->encabezadopatente	= new classreporte();
	$this->encabezadoconstruccion = new classreporte();

	$this->comercialcentral->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$result1 = $this->comercialcentral->listarComercialCentral();
	$this->datoscomercentral->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$datos = $this->datoscomercentral->listardatosComerCentral();
	$this->constra->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rConstra			= $this->constra->listarCons();

	$this->desceg->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rDesceg 			= $this->desceg->listarDESCEG();

	$this->actdes_res->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesRes 		= $this->actdes_res->listarACTDESRES();
	$this->actdes_com->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesCom 		= $this->actdes_com->listarACTDESCOM();
	$this->actdes_com_in->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesComIn 		= $this->actdes_com_in->listarACTDESCOMIN();
	$this->actdes_desa->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesDesa 		= $this->actdes_desa->listarACTDESDESA();
	$this->actdes_es->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesEs 			= $this->actdes_es->listarACTDESES();

	$this->leyesAccesos->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAccesos 		= $this->leyesAccesos->listarLeyAccesos();
	$this->leyesDesarroSect->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesDesarroSect 	= $this->leyesDesarroSect->listarLeyDesarroSect();
	$this->leyesEspacioGeo->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesEspacioGeo 	= $this->leyesEspacioGeo->listarLeyEspacioGeo();
	$this->leyesActividades->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesActividades	= $this->leyesActividades->listarLeyActividades();
	$this->leyesAspectoBio->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAspectoBio 	= $this->leyesAspectoBio->listarLeyAspectoBio();
	$this->leyesPatente->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesPatente 		= $this->leyesPatente->listarLeyPatente();
	$this->leyesPlan->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesPlan 		= $this->leyesPlan->listarLeyPlan();
	$this->leyesRedVial->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesRedVial 		= $this->leyesRedVial->listarLeyRedVial();
	$this->leyesAreasPro->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAreasPro 	= $this->leyesAreasPro->listarLeyAreasPro();
	$this->leyesServi->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rleyesServi 	= $this->leyesServi->listarLeyServi();

	$this->apro_dene->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rApro_Dene 	= $this->apro_dene->listarR_APRO_DENE();

	$this->observacion->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$robservacion 	= $this->observacion->listarR_OBSERV_TRAMITE();

	$this->encabezadopatente->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rencabezadopatente = $this->encabezadopatente->listarencabezadoPatente();
	$this->encabezadoconstruccion->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rencabezadoconstruccion = $this->encabezadoconstruccion->listarencabezadoConstruccion();

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFillColor(255,255,255);
	$pdf->SetFont('Arial','B',11);
	try
	{
		while ($rpantente = mysqli_fetch_array($rencabezadopatente) ) {
			$pdf->Cell(185, 5, utf8_decode($rpantente[0]), 0, 0, 'C');
		}
		while ($rconstruccion = mysqli_fetch_array($rencabezadoconstruccion) ) {
			$pdf->Cell(185, 5, utf8_decode($rconstruccion[0]), 0, 0, 'C');
		}
		$pdf->Ln(15);
		while ($row = mysqli_fetch_array($result1)) {
			$pdf->MultiCell(50,5,$row[0],0,1);
			while ($cons = mysqli_fetch_array($rConstra)) {
		 		$pdf->MultiCell(60,5,"DPU-".$cons[0]."-".$cons[1]."-".$cons[2],0,'L');
		 	$pdf->MultiCell(0,0,utf8_decode("Número de Trámite:"),0,0,'L');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(175,20,$row[1],0,0,'L');
		 	$pdf->MultiCell(100,5,utf8_decode("Señor(a):"));
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(100,5,utf8_decode($row[2]." ".$row[3]." ".$row[4]),0,1,'J');
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(40,5,utf8_decode("Cédula: ".$row[5]),0,1,'J');
		 	$pdf->MultiCell(23,10,"Presente",0,1,'J');
		 	$pdf->SetFont('Arial','B',10);
		 	$pdf->MultiCell(180,5,utf8_decode("Se extiende RESOLUCIÓN MUNICIPAL DE UBICACIÓN DE USO para la Propiedad Plano G-".$row[6]." de la Finca 5-".$row[7].", Propiedad de ".$row[8]." ".$row[9]." ".$row[10].", Cédula Jurídica ".$row[11].", Ubicada ".$row[12].", ".$row[13].", Distrito ".$row[14].", Nicoya, indicando lo siguiente:"),0,1,'J');
		 	
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,utf8_decode('El terreno evaluado es afectado por el Plan Regulador vigente del cantón de Nicoya. La Resolución Municipal de Ubicación corresponde zona'),0,1,'J');
		 	while ($fila = mysqli_fetch_array($datos)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$fila[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 		$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,utf8_decode('Zona Comercial Central'),0,1,'J');
		 	$pdf->MultiCell(190,5,utf8_decode('Usos permitidos: '),0,1,'J');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,utf8_decode('*Viviendas y apartamentos situados en pisos superiores al primero.'),0,1,'J');
		 	$pdf->MultiCell(190,5,utf8_decode('*El resto de los usos urbanos a excepción de los indicados en usos condicionales de Comercio Central y los usos industriales.'),0,1,'J');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,utf8_decode(' Usos Condicionales: '),0,1,'J');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,utf8_decode('Previo cumplimiento de requisitos establecidos en este reglamento para los usos condicionales (artículo 2, inciso b, párrafo 3), se permitirá el uso de terreno y edificios para los fines indicados.'),0,1,'C');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,utf8_decode('*Venta por menor de materiales de construcción en locales cerrados.'),0,1,'C');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,utf8_decode('* Talleres de artesanía e industrias artesanales que no emplee mas de 5 empleados , así como reparación de artículos eléctricos, equipo oficina, utensilios domésticos, bicicletas y similares, siempre que su operación y el almacenamiento de materiales y equipo se haga  en un local completamente cerrado y  un área de piso no mayor de 200 metros cuadrados.'),0,1,'C');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,utf8_decode('* Cualquier otro servicio o negocio de características y efectos similares de los descritos  que además, de no ser perjudiciales a los usos vecinos, no produzcan  ruidos, vibraciones, humo, olores polvo suciedad, gases nocivos,  resplandor, calor y peligro de fuego, o explosión en mayor grado que normalmente producirán las indicadas actividades.'),0,1,'J');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,utf8_decode('Requisitos:'),0,1,'J');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,utf8_decode('*La superficie del lote no será menor de 140 m2 para construcciones de hasta 2 pisos y de 280 m2, para las que exceden de 2 pisos.'),0,1,'J');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,utf8_decode('*Frente de lote no será menor a 8 m.'),0,1,'J');
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(190,5,utf8_decode('*Retiros: '),0,1,'J');
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(190,5,utf8_decode('Frontal: 2.5 m, que se usará de antejardín, con la posibilidad de ser acera peatonal.'),0,1,'C');
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(190,5,utf8_decode('Posterior: 3 m.'),0,1,'C');
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(190,5,utf8_decode('*Cobertura de las estructuras: se permitirá una cobertura del 80 % de la superficie del lote.'),0,1,'J');
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(190,5,utf8_decode('*Área de piso no excederá del 80 % de la superficie del lote.'),0,1,'J');
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(190,5,utf8_decode('*Altura de las estructuras: la altura de los edificios no excederá de 12 m o 4 pisos.'),0,1,'J');

		 	$pdf->Ln(2);

		 	$pdf->MultiCell(55,5,'> Uso Actual del Suelo',0,1,'J');
		 	//Muestra los usos del suelo actual
		 	while ($as = mysqli_fetch_array($rDesceg)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$as[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(55,5,"> Actividad a Desarrollar",0,1,'J');
		 	$pdf->Ln(2);
		 	//Muestra las actividades a desarrollar
		 	while ($adr = mysqli_fetch_array($rActdesRes)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$adr[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($ades = mysqli_fetch_array($rActdesEs)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$ades[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($adci = mysqli_fetch_array($rActdesComIn)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$adci[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($add = mysqli_fetch_array($rActdesDesa)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$add[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($adc = mysqli_fetch_array($rActdesCom)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$adc[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,"Se concluye: ",0,1,'J');
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'Uso Conforme de Resolución Municipal de Ubicación con el proyecto a realizar.' ),0,'J');
		 	while ($leyPT = mysqli_fetch_array($rLeyesPatente)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyPT[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyA = mysqli_fetch_array($rLeyesAccesos)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyA[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	
		 	
		 	while ($leyAD = mysqli_fetch_array($rLeyesActividades)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyAD[0]),0,'J');
		 		$pdf->Ln(3);
		 	}
		 	while ($leyAP = mysqli_fetch_array($rLeyesAreasPro)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyAP[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyRV = mysqli_fetch_array($rLeyesRedVial)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyRV[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyAB = mysqli_fetch_array($rLeyesAspectoBio)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyAB[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyDS = mysqli_fetch_array($rLeyesDesarroSect)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyDS[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyEG = mysqli_fetch_array($rLeyesEspacioGeo)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyEG[0]),0,'J');
		 		$pdf->Ln(2);
		 	}

		 	while ($obser = mysqli_fetch_array($robservacion)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($obser[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyP = mysqli_fetch_array($rLeyesPlan)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyP[0]),0,'J');
		 		$pdf->Ln(1);
		 	}
		 	$pdf->MultiCell(190,5,utf8_decode('Nota: Al haber aprobado la Resolución de Ubicación Municipal eso implica que se está dado el permiso para movimiento de tierra, cortes, rellenos, construcción construcción, desfogue fluvial, todo lo relacionado con obras civiles por lo que deberan ser tramitado en el momento que se requiera dicho permiso y también si la Resolución Municipal (Uso de Suelo) es positivo, no obliga a la municipalidad a otorgar la respectiva pantente, esta debe ser solicitado de conformidad con la normativa establecido por esta institución para estos efectos.'),0,'J');
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(100,5,"POR TANTO",0,0);
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,utf8_decode("Se ".$row[15]." la RESOLUCIÓN DE UBICACIÓN MUNICIPAL, mediante oficio DPU-".$cons[0]."-".$cons[1]."-".$cons[2].", para la Finca 5-".$row[7]." quedando sujeto a las disposiciones de la legislación vigente y en observaciones de nuestro ordenamiento jurídico, cualquier transgresión a las normas, producirá anulación del acto administrativo."),0,'J');
		 	}
		 	$pdf->Ln(1);
		 	
		 	$pdf->MultiCell(190,5,"Atentamente, ",0,1);
		 	$pdf->MultiCell(180,5,"Firma de Recibido",0,0);
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,"__________________________",0,0)	;
		 	$pdf->Ln(5);
		 	$pdf->MultiCell(190,5,utf8_decode('# Cédula: __________________________'),0,0,'R');
		 	$pdf->Ln(3);
		 	$pdf->MultiCell(190,5,utf8_decode('Fecha: ____________________ Hora: __________________________'),0,0,'R');
		 	$pdf->Ln(3);
		 	$pdf->MultiCell(60,5,"__________________________",0,1);
		 	$pdf->MultiCell(50,5,"Arq. Jonathan Soto Segura",0,1);
		 	$pdf->MultiCell(80,5,utf8_decode("Coordinador de Planificación Urbana"),0,1);
		 	$pdf->MultiCell(80,5,utf8_decode("Municipalidad de Nicoya"),0,1);

		 }
		 $pdf->Output();
	} catch(Exception $e) {
		$pdf->Cell(30, 10, "Sin datos".$e, 0, 0, 'C');
		$pdf->Output();
	}
}

public function rIndustrial(){
	$this->industrial 			= new classreporte();
	$this->constra 				= new classreporte();
	$this->actdes_res 	 		= new classreporte();
	$this->actdes_com 	 		= new classreporte();
	$this->actdes_com_in 		= new classreporte();
	$this->actdes_desa 	 		= new classreporte();
	$this->actdes_es 	 		= new classreporte();
	$this->desceg 		 		= new classreporte();
	$this->leyesAccesos 		= new classreporte();
	$this->leyesDesarroSect 	= new classreporte();
	$this->leyesEspacioGeo 		= new classreporte();
	$this->leyesActividades 	= new classreporte();
	$this->leyesAspectoBio 		= new classreporte();
	$this->leyesPatente 		= new classreporte();
	$this->leyesPlan 		 	= new classreporte();
	$this->leyesRedVial 		= new classreporte();
	$this->leyesAreasPro 		= new classreporte();
	$this->leyesServi			= new classreporte();
	$this->apro_dene 			= new classreporte();
	$this->observacion          = new classreporte();
	$this->datosindustrial 		= new classreporte();

	$this->encabezadopatente	= new classreporte();
	$this->encabezadoconstruccion = new classreporte();

	$this->industrial->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$result1 = $this->industrial->listarIndustrial();
	$this->datosindustrial->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$datos = $this->datosindustrial->listardatosIndustrial();
	$this->constra->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rConstra			= $this->constra->listarCons();

	$this->desceg->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rDesceg 			= $this->desceg->listarDESCEG();

	$this->actdes_res->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesRes 		= $this->actdes_res->listarACTDESRES();
	$this->actdes_com->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesCom 		= $this->actdes_com->listarACTDESCOM();
	$this->actdes_com_in->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesComIn 		= $this->actdes_com_in->listarACTDESCOMIN();
	$this->actdes_desa->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesDesa 		= $this->actdes_desa->listarACTDESDESA();
	$this->actdes_es->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesEs 			= $this->actdes_es->listarACTDESES();

	$this->leyesAccesos->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAccesos 		= $this->leyesAccesos->listarLeyAccesos();
	$this->leyesDesarroSect->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesDesarroSect 	= $this->leyesDesarroSect->listarLeyDesarroSect();
	$this->leyesEspacioGeo->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesEspacioGeo 	= $this->leyesEspacioGeo->listarLeyEspacioGeo();
	$this->leyesActividades->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesActividades	= $this->leyesActividades->listarLeyActividades();
	$this->leyesAspectoBio->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAspectoBio 	= $this->leyesAspectoBio->listarLeyAspectoBio();
	$this->leyesPatente->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesPatente 		= $this->leyesPatente->listarLeyPatente();
	$this->leyesPlan->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesPlan 		= $this->leyesPlan->listarLeyPlan();
	$this->leyesRedVial->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesRedVial 		= $this->leyesRedVial->listarLeyRedVial();
	$this->leyesAreasPro->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAreasPro 	= $this->leyesAreasPro->listarLeyAreasPro();
	$this->leyesServi->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rleyesServi 	= $this->leyesServi->listarLeyServi();

	$this->apro_dene->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rApro_Dene 	= $this->apro_dene->listarR_APRO_DENE();

	$this->observacion->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$robservacion 	= $this->observacion->listarR_OBSERV_TRAMITE();

	$this->encabezadopatente->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rencabezadopatente = $this->encabezadopatente->listarencabezadoPatente();
	$this->encabezadoconstruccion->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rencabezadoconstruccion = $this->encabezadoconstruccion->listarencabezadoConstruccion();

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFillColor(255,255,255);
	$pdf->SetFont('Arial','B',11);
	try
	{
		while ($rpantente = mysqli_fetch_array($rencabezadopatente) ) {
			$pdf->Cell(185, 5, utf8_decode($rpantente[0]), 0, 0, 'C');
		}
		while ($rconstruccion = mysqli_fetch_array($rencabezadoconstruccion) ) {
			$pdf->Cell(185, 5, utf8_decode($rconstruccion[0]), 0, 0, 'C');
		}

		$pdf->Ln(5);
		while ($row = mysqli_fetch_array($result1)) {
			$pdf->MultiCell(50,5,$row[0],0,1);
			while ($cons = mysqli_fetch_array($rConstra)) {
		 		$pdf->MultiCell(60,5,"DPU-".$cons[0]."-".$cons[1]."-".$cons[2],0,'L');
		 	$pdf->MultiCell(0,0,utf8_decode("Número de Trámite:"),0,0,'L');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(175,20,$row[1],0,0,'L');
		 	$pdf->MultiCell(100,5,utf8_decode("Señor(a):"));
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(100,5,utf8_decode($row[2]." ".$row[3]." ".$row[4]),0,1,'J');
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(40,5,utf8_decode("Cédula: ".$row[5]),0,1,'J');
		 	$pdf->MultiCell(23,10,"Presente",0,1,'J');
		 	$pdf->SetFont('Arial','B',10);
		 	$pdf->MultiCell(180,5,utf8_decode("Se extiende RESOLUCIÓN MUNICIPAL DE UBICACIÓN DE USO para la Propiedad Plano G-".$row[6]." de la Finca 5-".$row[7].", Propiedad de ".$row[8]." ".$row[9]." ".$row[10].", Cédula Jurídica ".$row[11].", Ubicada ".$row[12].", ".$row[13].", Distrito ".$row[14].", Nicoya, indicando lo siguiente:"),0,1,'J');
		 	$pdf->MultiCell(190,5,$row[1],0,1,'J');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,utf8_decode('El terreno evaluado es afectado por el Plan Regulador vigente del cantón de Nicoya. La Resolución Municipal de Ubicación corresponde a Zona.'),0,1,'J');
		 	while ($fila = mysqli_fetch_array($datos)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$fila[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	$pdf->MultiCell(190,5,utf8_decode('A)	Propósito: '),0,1,'J');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,utf8_decode('La ubicación de esta zona obedece a situaciones especiales, por vientos, fácil acceso y a su distancia respecto al casco central de la ciudad. El propósito de ella es proteger a la industria de uso incompatibles que puedan poner en peligro la seguridad de la inversión.'),0,1,'J');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,utf8_decode('B)	Usos Permitidos:'),0,1,'J');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,utf8_decode('Todas Aquellas Industrias, Talleres y bodega o depósitos que cuente con la aprobación del Ministerio de economía, industria y comercio, ministerio de Salud, Instituto Costarricense de Acueductos y Alcantarillado, Dirección de Urbanismo y Municipalidad, y cualquier otro Organismo que deba dar aprobación en el Campo que les compete. '),0,1,'J');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,utf8_decode('La Municipalidad otorgara la aprobación final de los proyectos de Instalaciones Industriales solo cuando de los antecedentes se desprendan con toda claridad que la Industria no generara efectos adversos sobre la población de la ciudad, ni sobre la fauna y producción agricula o forestal, ya sea por las características mismas del proceso, o porque se contempla debidamente en el proyecto las medidas de control de contaminación necesaria. '),0,1,'J');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,utf8_decode('De establecerse una industria pasada y contaminante en grado que no perjudique como anteriormente se dijo a la población y su actividad Agropecuaria, la localización la determinaran las instituciones en conjunto antes mencionadas. '),0,1,'C');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,utf8_decode('C)	  Usos condicionales:  '),0,1,'C');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,utf8_decode('1.	Vivienda Unifamiliar Complementaria o conexa con la Industria, o que sea necesaria para su funcionamiento. '),0,1,'C');
		 	$pdf->MultiCell(190,5,utf8_decode('2.	Comercio Mayorista. '),0,1,'J');
		 	$pdf->MultiCell(190,5,utf8_decode('3.	Comercio menor y otros servicios, que sean necesarios para el buen funcionamiento del conjunto de la Industria y para servir a la población que allí labora.    '),0,1,'J');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,utf8_decode('D)	 Prohibiciones:   '),0,1,'J');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,utf8_decode('Quedan absolutamente prohibidas en las zonas Industriales las urbanizaciones residenciales y los conjuntos residenciales de cualquier tipo. '),0,1,'J');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,utf8_decode('E)	Requisitos:        '),0,1,'J');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,utf8_decode('Tratándose de Industrias o procesos que requieren del cumplimiento de exigencia para no interferir otros usos, causando daños a la población, o para la seguridad de los propios trabajadores de la industria, los requisitos serán fijados en cada caso y para todos los aspectos que interesen por el ministerio de salud en lo concerniente a seguridad y sanidad y por la dirección de Urbanismo en lo concerniente al urbanismo.'),0,1,'J');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,utf8_decode('De acuerdo con esto, los permisos se concederán en definitiva, solamente cuando los planos den completo y cabal cumplimiento a esos requisitos, '),0,1,'J');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,utf8_decode('Sin perjuicio de lo anterior, en la zona Industrial, deberán cumplirse como mínimo los siguientes  requisitos: '),0,1,'J');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,utf8_decode('1.	 Superficie mínima de lote: 500 m²'),0,1,'J');
		 	$pdf->MultiCell(190,5,utf8_decode('2.	Frente mínimo de lote: 15 m²'),0,1,'J');
		 	$pdf->MultiCell(190,5,utf8_decode('3.	Retiro Mínimo:    '),0,1,'J');
		 	$pdf->MultiCell(190,5,utf8_decode('a)	Frontal: 6m el retiro frontal solamente se permitirá emplearlo para áreas Verdes.'),0,1,'J');
		 	$pdf->MultiCell(190,5,utf8_decode('b)	Lateral:  3m '),0,1,'J');
		 	$pdf->MultiCell(190,5,utf8_decode('c)	Posterior: 6m '),0,1,'J');
		 	$pdf->MultiCell(190,5,utf8_decode('4.	Cobertura máxima: 60% '),0,1,'J');
		 	$pdf->MultiCell(190,5,utf8_decode('5.	Carga y descarga: se deberán prever dentro de los lotes las áreas necesarias para carga y descarga. '),0,1,'J');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,utf8_decode('Se podrán exceptuar o reducir de estos requisitos mínimos solo aquellos casos muy especiales ( por ejemplo, Galpones Industriales para alquilar o concesión, Industrias muy pequeñas o de servicio, etc.) y para los usos condicionales. '),0,1,'J');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,utf8_decode('En esos casos, la municipalidad y la Dirección de Urbanismo fijaran los requisitos.'),0,1,'J');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(55,5,'> Uso Actual del Suelo',0,1,'J');
		 	//Muestra los usos del suelo actual
		 	while ($as = mysqli_fetch_array($rDesceg)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$as[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(55,5,"> Actividad a Desarrollar",0,1,'J');
		 	$pdf->Ln(2);
		 	//Muestra las actividades a desarrollar
		 	while ($adr = mysqli_fetch_array($rActdesRes)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$adr[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($ades = mysqli_fetch_array($rActdesEs)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$ades[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($adci = mysqli_fetch_array($rActdesComIn)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$adci[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($add = mysqli_fetch_array($rActdesDesa)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$add[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($adc = mysqli_fetch_array($rActdesCom)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$adc[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,"Se concluye: ",0,1,'J');
		 	while ($leyA = mysqli_fetch_array($rLeyesAccesos)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyA[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyP = mysqli_fetch_array($rLeyesPlan)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyP[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyPT = mysqli_fetch_array($rLeyesPatente)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyPT[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyAD = mysqli_fetch_array($rLeyesActividades)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyAD[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyAP = mysqli_fetch_array($rLeyesAreasPro)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyAP[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyRV = mysqli_fetch_array($rLeyesRedVial)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyRV[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyAB = mysqli_fetch_array($rLeyesAspectoBio)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyAB[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyDS = mysqli_fetch_array($rLeyesDesarroSect)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyDS[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyEG = mysqli_fetch_array($rLeyesEspacioGeo)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyEG[0]),0,'J');
		 		$pdf->Ln(2);
		 	}

		 	while ($obser = mysqli_fetch_array($robservacion)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($obser[0]),0,'J');
		 		$pdf->Ln(1);
		 	}
		 	$pdf->MultiCell(190,5,utf8_decode('Nota: Al haber aprobado la Resolución de Ubicación Municipal eso implica que se está dado el permiso para movimiento de tierra, cortes, rellenos, construcción construcción, desfogue fluvial, todo lo relacionado con obras civiles por lo que deberan ser tramitado en el momento que se requiera dicho permiso y también si la Resolución Municipal (Uso de Suelo) es positivo, no obliga a la municipalidad a otorgar la respectiva pantente, esta debe ser solicitado de conformidad con la normativa establecido por esta institución para estos efectos.'),0,'J');
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(100,5,"Por tanto",0,0);
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(190,5,utf8_decode("Se ".$row[15]." la RESOLUCIÓN DE UBICACIÓN MUNICIPAL, mediante oficio DPU-".$cons[0]."-".$cons[1]."-".$cons[2].", para la Finca 5-".$row[7]." quedando sujeto a las disposiciones de la legislación vigente y en observaciones de nuestro ordenamiento jurídico, cualquier transgresión a las normas, producirá anulación del acto administrativo."),0,'J');
		 	}
		 	$pdf->Ln(1);
		 	
		 	$pdf->MultiCell(190,5,"Atentamente, ",0,1);
		 	$pdf->MultiCell(180,5,"Firma de Recibido",0,0);
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,"__________________________",0,0)	;
		 	$pdf->Ln(5);
		 	$pdf->MultiCell(190,5,utf8_decode('# Cédula: __________________________'),0,0,'R');
		 	$pdf->Ln(3);
		 	$pdf->MultiCell(190,5,utf8_decode('Fecha: ____________________ Hora: __________________________'),0,0,'R');
		 	$pdf->Ln(3);
		 	$pdf->MultiCell(60,5,"__________________________",0,1);
		 	$pdf->MultiCell(50,5,"Arq. Jonathan Soto Segura",0,1);
		 	$pdf->MultiCell(80,5,utf8_decode("Coordinador de Planificación Urbana"),0,1);
		 	$pdf->MultiCell(80,5,utf8_decode("Municipalidad de Nicoya"),0,1);

		 }
		 $pdf->Output();
	} catch(Exception $e) {
		$pdf->Cell(30, 10, "Sin datos".$e, 0, 0, 'C');
		$pdf->Output();
	}
}

public function rResidencialComercial(){
	$this->residencialcomercial = new classreporte();
	$this->constra 				= new classreporte();
	$this->actdes_res 	 		= new classreporte();
	$this->actdes_com 	 		= new classreporte();
	$this->actdes_com_in 		= new classreporte();
	$this->actdes_desa 	 		= new classreporte();
	$this->actdes_es 	 		= new classreporte();
	$this->desceg 		 		= new classreporte();
	$this->leyesAccesos 		= new classreporte();
	$this->leyesDesarroSect 	= new classreporte();
	$this->leyesEspacioGeo 		= new classreporte();
	$this->leyesActividades 	= new classreporte();
	$this->leyesAspectoBio 		= new classreporte();
	$this->leyesPatente 		= new classreporte();
	$this->leyesPlan 		 	= new classreporte();
	$this->leyesRedVial 		= new classreporte();
	$this->leyesAreasPro 		= new classreporte();
	$this->leyesServi			= new classreporte();
	$this->apro_dene 			= new classreporte();
	$this->observacion          = new classreporte();
	$this->datosresicomercial 	= new classreporte();
	$this->encabezadopatente	= new classreporte();
	$this->encabezadoconstruccion = new classreporte();

	$this->residencialcomercial->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$result1 = $this->residencialcomercial->listarResidencialComercial();
	$this->datosresicomercial->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$datos = $this->datosresicomercial->listardatosResiComercial();
	$this->constra->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rConstra			= $this->constra->listarCons();

	$this->desceg->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rDesceg 			= $this->desceg->listarDESCEG();

	$this->actdes_res->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesRes 		= $this->actdes_res->listarACTDESRES();
	$this->actdes_com->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesCom 		= $this->actdes_com->listarACTDESCOM();
	$this->actdes_com_in->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesComIn 		= $this->actdes_com_in->listarACTDESCOMIN();
	$this->actdes_desa->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesDesa 		= $this->actdes_desa->listarACTDESDESA();
	$this->actdes_es->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesEs 			= $this->actdes_es->listarACTDESES();

	$this->leyesAccesos->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAccesos 		= $this->leyesAccesos->listarLeyAccesos();
	$this->leyesDesarroSect->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesDesarroSect 	= $this->leyesDesarroSect->listarLeyDesarroSect();
	$this->leyesEspacioGeo->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesEspacioGeo 	= $this->leyesEspacioGeo->listarLeyEspacioGeo();
	$this->leyesActividades->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesActividades	= $this->leyesActividades->listarLeyActividades();
	$this->leyesAspectoBio->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAspectoBio 	= $this->leyesAspectoBio->listarLeyAspectoBio();
	$this->leyesPatente->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesPatente 		= $this->leyesPatente->listarLeyPatente();
	$this->leyesPlan->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesPlan 		= $this->leyesPlan->listarLeyPlan();
	$this->leyesRedVial->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesRedVial 		= $this->leyesRedVial->listarLeyRedVial();
	$this->leyesAreasPro->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAreasPro 	= $this->leyesAreasPro->listarLeyAreasPro();
	$this->leyesServi->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rleyesServi 	= $this->leyesServi->listarLeyServi();

	$this->apro_dene->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rApro_Dene 	= $this->apro_dene->listarR_APRO_DENE();

	$this->observacion->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$robservacion 	= $this->observacion->listarR_OBSERV_TRAMITE();


	$this->encabezadopatente->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rencabezadopatente = $this->encabezadopatente->listarencabezadoPatente();
	$this->encabezadoconstruccion->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rencabezadoconstruccion = $this->encabezadoconstruccion->listarencabezadoConstruccion();

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFillColor(255,255,255);
	$pdf->SetFont('Arial','B',11);
	try
	{
	while ($rpantente = mysqli_fetch_array($rencabezadopatente) ) {
			$pdf->Cell(185, 5, utf8_decode($rpantente[0]), 0, 0, 'C');
		}
		while ($rconstruccion = mysqli_fetch_array($rencabezadoconstruccion) ) {
			$pdf->Cell(185, 5, utf8_decode($rconstruccion[0]), 0, 0, 'C');
		}
		$pdf->Ln(5);
		while ($row = mysqli_fetch_array($result1)) {
			$pdf->MultiCell(50,5,$row[0],0,1);
			while ($cons = mysqli_fetch_array($rConstra)) {
		 		$pdf->MultiCell(60,5,"DPU-".$cons[0]."-".$cons[1]."-".$cons[2],0,'L');
		 	$pdf->MultiCell(0,0,utf8_decode("Número de Trámite:"),0,0,'L');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(175,20,$row[1],0,0,'L');
		 	$pdf->MultiCell(100,5,utf8_decode("Señor(a):"));
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(100,5,utf8_decode($row[2]." ".$row[3]." ".$row[4]),0,1,'J');
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(40,5,utf8_decode("Cédula: ".$row[5]),0,1,'J');
		 	$pdf->MultiCell(23,10,"Presente",0,1,'J');
		 	$pdf->SetFont('Arial','B',10);
		 	$pdf->MultiCell(180,5,utf8_decode("Se extiende RESOLUCIÓN MUNICIPAL DE UBICACIÓN DE USO para la Propiedad Plano G-".$row[6]." de la Finca 5-".$row[7].", Propiedad de ".$row[8]." ".$row[9]." ".$row[10].", Cédula Jurídica ".$row[11].", Ubicada ".$row[12].", ".$row[13].", Distrito ".$row[14].", Nicoya, indicando lo siguiente:"),0,1,'J');
		 	
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,utf8_decode('El terreno evaluado es afectado por el Plan Regulador vigente del cantón de Nicoya. La Resolución Municipal de Ubicación corresponde a Zona.'),0,1,'J');
		 	while ($fila = mysqli_fetch_array($datos)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$fila[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	$pdf->MultiCell(190,5,utf8_decode('Usos permitidos:'),0,1,'J');
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(190,5,utf8_decode('Todos los urbanos, a excepción de las industrias, talleres, bodegas, aserraderos y usos similares a estos en cuanto a las molestias (ruido, tránsito intenso, olor, etc.) que provoquen en el vecindario. También se  exceptúa el comercio que produzca las molestias antes dichas.'),0,1,'J');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,utf8_decode('Usos Condicionados:'),0,1,'J');
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(190,5,utf8_decode('Pequeña industria, bodega, talleres, ambos de gasolina, depósitos de madera y materiales de construcción y otros comercios que produzcan molestias pero que con requisitos, puedan darse, amparados a un dictamen favorable al Ministerio de Salud. Sin perjuicio de lo anterior para todos  estos  casos las molestias deberán quedar absolutamente confinadas a los límites de la propiedad. Se exceptúan a todo caso los aserraderos y las industrias peligrosas, que deberán ir a las zonas industriales.'),0,1,'J');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,utf8_decode('REQUISITOS'),0,1,'J');
		 	$pdf->MultiCell(190,5,utf8_decode('1.	Superficie mínima del lote:155m2'),0,1,'J');
		 	$pdf->MultiCell(190,5,utf8_decode('2.	Frente mínimo del lote:8m'),0,1,'J');
		 	$pdf->MultiCell(190,5,utf8_decode('3.	Retiros mínimos:'),0,1,'J');
		 	$pdf->MultiCell(190,5,utf8_decode('a)	Frontal:2,5m'),0,1,'C');
		 	$pdf->MultiCell(190,5,utf8_decode('b)	Lateral: no hay'),0,1,'C');
		 	$pdf->MultiCell(190,5,utf8_decode('c)	Posterior :3m'),0,1,'C');
		 	$pdf->MultiCell(190,5,utf8_decode('4.	Cobertura de edificación máxima 60% del área del lote'),0,1,'J');
		 	$pdf->MultiCell(190,5,utf8_decode('5.	Área de piso máxima, tres veces la cobertura máxima.'),0,1,'J');
		 	$pdf->MultiCell(190,5,utf8_decode('6.	Altura de edificación máxima:10m'),0,1,'J');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(55,5,'> Uso Actual del Suelo',0,1,'J');
		 	//Muestra los usos del suelo actual
		 	while ($as = mysqli_fetch_array($rDesceg)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$as[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(55,5,"> Actividad a Desarrollar",0,1,'J');
		 	$pdf->Ln(2);
		 	//Muestra las actividades a desarrollar
		 	while ($adr = mysqli_fetch_array($rActdesRes)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$adr[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($ades = mysqli_fetch_array($rActdesEs)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$ades[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($adci = mysqli_fetch_array($rActdesComIn)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$adci[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($add = mysqli_fetch_array($rActdesDesa)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$add[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($adc = mysqli_fetch_array($rActdesCom)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$adc[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,"Se concluye: ",0,1,'J');
		 	while ($leyA = mysqli_fetch_array($rLeyesAccesos)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyA[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	
		 	while ($leyPT = mysqli_fetch_array($rLeyesPatente)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyPT[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyAD = mysqli_fetch_array($rLeyesActividades)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyAD[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyAP = mysqli_fetch_array($rLeyesAreasPro)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyAP[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyRV = mysqli_fetch_array($rLeyesRedVial)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyRV[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyAB = mysqli_fetch_array($rLeyesAspectoBio)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyAB[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyDS = mysqli_fetch_array($rLeyesDesarroSect)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyDS[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyEG = mysqli_fetch_array($rLeyesEspacioGeo)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyEG[0]),0,'J');
		 		$pdf->Ln(2);
		 	}

		 	while ($obser = mysqli_fetch_array($robservacion)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($obser[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyP = mysqli_fetch_array($rLeyesPlan)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyP[0]),0,'J');
		 		$pdf->Ln(1);
		 	}
		 	$pdf->MultiCell(190,5,utf8_decode('Nota: Al haber aprobado la Resolución de Ubicación Municipal eso implica que se está dado el permiso para movimiento de tierra, cortes, rellenos, construcción construcción, desfogue fluvial, todo lo relacionado con obras civiles por lo que deberan ser tramitado en el momento que se requiera dicho permiso y también si la Resolución Municipal (Uso de Suelo) es positivo, no obliga a la municipalidad a otorgar la respectiva pantente, esta debe ser solicitado de conformidad con la normativa establecido por esta institución para estos efectos.'),0,'J');
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(100,5,"Por tanto",0,0);
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(190,5,utf8_decode("Se ".$row[15]." la RESOLUCIÓN DE UBICACIÓN MUNICIPAL, mediante oficio DPU-".$cons[0]."-".$cons[1]."-".$cons[2].", para la Finca 5-".$row[7]." quedando sujeto a las disposiciones de la legislación vigente y en observaciones de nuestro ordenamiento jurídico, cualquier transgresión a las normas, producirá anulación del acto administrativo."),0,'J');
		 	}
		 	$pdf->Ln(1);
		 	
		 	$pdf->MultiCell(190,5,"Atentamente, ",0,1);
		 	$pdf->MultiCell(180,5,"Firma de Recibido",0,0);
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,"__________________________",0,0)	;
		 	$pdf->Ln(5);
		 	$pdf->MultiCell(190,5,utf8_decode('# Cédula: __________________________'),0,0,'R');
		 	$pdf->Ln(3);
		 	$pdf->MultiCell(190,5,utf8_decode('Fecha: ____________________ Hora: __________________________'),0,0,'R');
		 	$pdf->Ln(3);
		 	$pdf->MultiCell(60,5,"__________________________",0,1);
		 	$pdf->MultiCell(50,5,"Arq. Jonathan Soto Segura",0,1);
		 	$pdf->MultiCell(80,5,utf8_decode("Coordinador de Planificación Urbana"),0,1);
		 	$pdf->MultiCell(80,5,utf8_decode("Municipalidad de Nicoya"),0,1);

		 }
		 $pdf->Output();
	} catch(Exception $e) {
		$pdf->Cell(30, 10, "Sin datos".$e, 0, 0, 'C');
		$pdf->Output();
	}
}

public function rResidencial(){
	$this->residecial 			= new classreporte();
	$this->constra 				= new classreporte();
	$this->actdes_res 	 		= new classreporte();
	$this->actdes_com 	 		= new classreporte();
	$this->actdes_com_in 		= new classreporte();
	$this->actdes_desa 	 		= new classreporte();
	$this->actdes_es 	 		= new classreporte();
	$this->desceg 		 		= new classreporte();
	$this->leyesAccesos 		= new classreporte();
	$this->leyesDesarroSect 	= new classreporte();
	$this->leyesEspacioGeo 		= new classreporte();
	$this->leyesActividades 	= new classreporte();
	$this->leyesAspectoBio 		= new classreporte();
	$this->leyesPatente 		= new classreporte();
	$this->leyesPlan 		 	= new classreporte();
	$this->leyesRedVial 		= new classreporte();
	$this->leyesAreasPro 		= new classreporte();
	$this->leyesServi			= new classreporte();
	$this->apro_dene 			= new classreporte();
	$this->observacion          = new classreporte();
	$this->datosresidencial = new classreporte();
	$this->encabezadopatente	= new classreporte();
	$this->encabezadoconstruccion = new classreporte();


	$this->residecial->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$result1 = $this->residecial->listarRESI();
	$this->datosresidencial->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$datos = $this->datosresidencial->listarDatosResi();
	$this->constra->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rConstra			= $this->constra->listarCons();

	$this->desceg->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rDesceg 			= $this->desceg->listarDESCEG();

	$this->actdes_res->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesRes 		= $this->actdes_res->listarACTDESRES();
	$this->actdes_com->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesCom 		= $this->actdes_com->listarACTDESCOM();
	$this->actdes_com_in->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesComIn 		= $this->actdes_com_in->listarACTDESCOMIN();
	$this->actdes_desa->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesDesa 		= $this->actdes_desa->listarACTDESDESA();
	$this->actdes_es->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesEs 			= $this->actdes_es->listarACTDESES();

	$this->leyesAccesos->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAccesos 		= $this->leyesAccesos->listarLeyAccesos();
	$this->leyesDesarroSect->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesDesarroSect 	= $this->leyesDesarroSect->listarLeyDesarroSect();
	$this->leyesEspacioGeo->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesEspacioGeo 	= $this->leyesEspacioGeo->listarLeyEspacioGeo();
	$this->leyesActividades->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesActividades	= $this->leyesActividades->listarLeyActividades();
	$this->leyesAspectoBio->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAspectoBio 	= $this->leyesAspectoBio->listarLeyAspectoBio();
	$this->leyesPatente->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesPatente 		= $this->leyesPatente->listarLeyPatente();
	$this->leyesPlan->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesPlan 		= $this->leyesPlan->listarLeyPlan();
	$this->leyesRedVial->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesRedVial 		= $this->leyesRedVial->listarLeyRedVial();
	$this->leyesAreasPro->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAreasPro 	= $this->leyesAreasPro->listarLeyAreasPro();
	$this->leyesServi->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rleyesServi 	= $this->leyesServi->listarLeyServi();

	$this->apro_dene->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rApro_Dene 	= $this->apro_dene->listarR_APRO_DENE();

	$this->observacion->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$robservacion 	= $this->observacion->listarR_OBSERV_TRAMITE();
	$this->encabezadopatente->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rencabezadopatente = $this->encabezadopatente->listarencabezadoPatente();
	$this->encabezadoconstruccion->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rencabezadoconstruccion = $this->encabezadoconstruccion->listarencabezadoConstruccion();

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFillColor(255,255,255);
	$pdf->SetFont('Arial','B',11);
	try
	{
		while ($rpantente = mysqli_fetch_array($rencabezadopatente) ) {
			$pdf->Cell(185, 5, utf8_decode($rpantente[0]), 0, 0, 'C');
		}
		while ($rconstruccion = mysqli_fetch_array($rencabezadoconstruccion) ) {
			$pdf->Cell(185, 5, utf8_decode($rconstruccion[0]), 0, 0, 'C');
		}
		$pdf->Ln(8);

		while ($row = mysqli_fetch_array($result1)) {
			$pdf->MultiCell(50,5,$row[0],0,1);
			while ($cons = mysqli_fetch_array($rConstra)) {
		 		$pdf->MultiCell(60,5,"DPU-".$cons[0]."-".$cons[1]."-".$cons[2],0,'L');
		 	$pdf->MultiCell(0,0,utf8_decode("Número de Trámite:"),0,0,'L');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(175,20,$row[1],0,0,'L');
		 	$pdf->MultiCell(100,5,utf8_decode("Señor(a):"));
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(100,5,utf8_decode($row[2]." ".$row[3]." ".$row[4]),0,1,'J');
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(40,5,utf8_decode("Cédula: ".$row[5]),0,1,'J');
		 	$pdf->MultiCell(23,10,"Presente",0,1,'J');
		 	$pdf->SetFont('Arial','B',10);
		 	$pdf->MultiCell(180,5,utf8_decode("Se extiende RESOLUCIÓN MUNICIPAL DE UBICACIÓN DE USO para la Propiedad Plano G-".$row[6]." de la Finca 5-".$row[7].", Propiedad de ".$row[8]." ".$row[9]." ".$row[10].", Cédula Jurídica ".$row[11].", Ubicada ".$row[12].", ".$row[13].", Distrito ".$row[14].", Nicoya, indicando lo siguiente:"),0,1,'J');
		
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,utf8_decode('El terreno evaluado es afectado por el Plan Regulador vigente del cantón de Nicoya. La Resolución Municipal de Ubicación corresponde a Zona Residencial.'),0,1,'J');
		 	while ($fila = mysqli_fetch_array($datos)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$fila[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	$pdf->MultiCell(190,5,utf8_decode('-Usos Permitidos: Todos los urbanos que tengan relación con la vivienda, sin que la perjudiquen. El tipo de comercio que se permite es el siguiente: tiendas de abarrotes, boticas, fuentes de soda, barberías, carnicerías oficinas profesionales, usos comunales y áreas verdes. La pequeña industria (artesanal Inofensiva) supermercados.'),0,1,'J');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,utf8_decode('-No se permiten: bodegas, aserraderos, talleres, industrias y usos similares a estos en cuanto a molestias (ruido, transito intenso, olor, etc.) que afectan la zona. También se exceptúan el comercio que produzca las molestias antes dichas como salas de baile, cantinas, etc.'),0,1,'J');
		 	$pdf->MultiCell(190,5,utf8_decode('1.	SUPERFICIE DE LOTE: 155m2'),0,1,'J');
		 	$pdf->MultiCell(190,5,utf8_decode('2.	FRENTE MÍNIMO DE LOTE: 8m2'),0,1,'J');
		 	$pdf->MultiCell(190,5,utf8_decode('3.	RETIROS MÍNIMOS:'),0,1,'J');
		 	$pdf->MultiCell(190,5,utf8_decode('-FRONTAL: 2,5m'),0,1,'C');
		 	$pdf->MultiCell(190,5,utf8_decode('-LATERAL: NO HAY'),0,1,'C');
		 	$pdf->MultiCell(190,5,utf8_decode('-POSTERIOR: 3m'),0,1,'C');
		 	$pdf->MultiCell(190,5,utf8_decode('4.   COBERTURA DE EDIFICACIÓN MÁXIMA 60% DEL ÁREA DEL LOTE'),0,1,'J');
		 	$pdf->MultiCell(190,5,utf8_decode('5.   ÁREA DE PISO MÁXIMA, TRES VECES LA COBERTURA MÁXIMA'),0,1,'J');
		 	$pdf->MultiCell(190,5,utf8_decode('6.   ALTURA DE EDIFICACIÓN MÁXIMA 10m'),0,1,'J');

		 	$pdf->Ln(2);

		 	$pdf->MultiCell(55,5,'> Uso Actual del Suelo',0,1,'J');
		 	//Muestra los usos del suelo actual
		 	while ($as = mysqli_fetch_array($rDesceg)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$as[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(55,5,"> Actividad a Desarrollar",0,1,'J');
		 	$pdf->Ln(1);
		 	//Muestra las actividades a desarrollar
		 	while ($adr = mysqli_fetch_array($rActdesRes)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$adr[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($ades = mysqli_fetch_array($rActdesEs)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$ades[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($adci = mysqli_fetch_array($rActdesComIn)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$adci[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($add = mysqli_fetch_array($rActdesDesa)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$add[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($adc = mysqli_fetch_array($rActdesCom)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$adc[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,"Se concluye: ",0,1,'J');
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'Uso Conforme de Resolución Municipal de Ubicación con el proyecto a realizar.' ),0,'J');
		 	while ($leyA = mysqli_fetch_array($rLeyesAccesos)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyA[0]),0,'J');
		 		$pdf->Ln(1);
		 	}
		 	
		 	while ($leyPT = mysqli_fetch_array($rLeyesPatente)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyPT[0]),0,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($leyAD = mysqli_fetch_array($rLeyesActividades)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyAD[0]),0,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($leyAP = mysqli_fetch_array($rLeyesAreasPro)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyAP[0]),0,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($leyRV = mysqli_fetch_array($rLeyesRedVial)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyRV[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyAB = mysqli_fetch_array($rLeyesAspectoBio)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyAB[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyDS = mysqli_fetch_array($rLeyesDesarroSect)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyDS[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyEG = mysqli_fetch_array($rLeyesEspacioGeo)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyEG[0]),0,'J');
		 		$pdf->Ln(2);
		 	}

		 	while ($obser = mysqli_fetch_array($robservacion)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($obser[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyP = mysqli_fetch_array($rLeyesPlan)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyP[0]),0,'J');
		 		$pdf->Ln(1);
		 	}
		 	$pdf->MultiCell(190,5,utf8_decode('Nota: Al haber aprobado la Resolución de Ubicación Municipal eso implica que se está dado el permiso para movimiento de tierra, cortes, rellenos, construcción construcción, desfogue fluvial, todo lo relacionado con obras civiles por lo que deberan ser tramitado en el momento que se requiera dicho permiso y también si la Resolución Municipal (Uso de Suelo) es positivo, no obliga a la municipalidad a otorgar la respectiva pantente, esta debe ser solicitado de conformidad con la normativa establecido por esta institución para estos efectos.'),0,'J');
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(100,5,"POR LO TANTO",0,0);
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(190,5,utf8_decode("Se ".$row[15]." la RESOLUCIÓN DE UBICACIÓN MUNICIPAL, mediante oficio DPU-".$cons[0]."-".$cons[1]."-".$cons[2].", para la Finca 5-".$row[7]." quedando sujeto a las disposiciones de la legislación vigente y en observaciones de nuestro ordenamiento jurídico, cualquier transgresión a las normas, producirá anulación del acto administrativo."),0,'J');
		 	}
		 	$pdf->Ln(1);
		 	
		 	$pdf->MultiCell(190,5,"Atentamente, ",0,1);
		 	$pdf->MultiCell(180,5,"Firma de Recibido",0,0);
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,"__________________________",0,0)	;
		 	$pdf->Ln(5);
		 	$pdf->MultiCell(190,5,utf8_decode('# Cédula: __________________________'),0,0,'R');
		 	$pdf->Ln(3);
		 	$pdf->MultiCell(190,5,utf8_decode('Fecha: ____________________ Hora: __________________________'),0,0,'R');
		 	$pdf->Ln(3);
		 	$pdf->MultiCell(60,5,"__________________________",0,1);
		 	$pdf->MultiCell(50,5,"Arq. Jonathan Soto Segura",0,1);
		 	$pdf->MultiCell(80,5,utf8_decode("Coordinador de Planificación Urbana"),0,1);
		 	$pdf->MultiCell(80,5,utf8_decode("Municipalidad de Nicoya"),0,1);

		 }
		 $pdf->Output();
	} catch(Exception $e) {
		$pdf->Cell(30, 10, "Sin datos".$e, 0, 0, 'C');
		$pdf->Output();
	}
}

public function rTuristicoComercial(){
	$this->turisticocomercial 	= new classreporte();
	$this->constra 				= new classreporte();
	$this->actdes_res 	 		= new classreporte();
	$this->actdes_com 	 		= new classreporte();
	$this->actdes_com_in 		= new classreporte();
	$this->actdes_desa 	 		= new classreporte();
	$this->actdes_es 	 		= new classreporte();
	$this->desceg 		 		= new classreporte();
	$this->leyesAccesos 		= new classreporte();
	$this->leyesDesarroSect 	= new classreporte();
	$this->leyesEspacioGeo 		= new classreporte();
	$this->leyesActividades 	= new classreporte();
	$this->leyesAspectoBio 		= new classreporte();
	$this->leyesPatente 		= new classreporte();
	$this->leyesPlan 		 	= new classreporte();
	$this->leyesRedVial 		= new classreporte();
	$this->leyesAreasPro 		= new classreporte();
	$this->leyesServi			= new classreporte();
	$this->apro_dene 			= new classreporte();
	$this->observacion          = new classreporte();
	$this->datosturistico 		= new classreporte();
	$this->encabezadopatente	= new classreporte();
	$this->encabezadoconstruccion = new classreporte();

	$this->turisticocomercial->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$result1 = $this->turisticocomercial->listarTuristicoComercial();
	$this->datosturistico->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$datos = $this->datosturistico->listarTuristicoComercial();
	$this->constra->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rConstra			= $this->constra->listarCons();

	$this->desceg->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rDesceg 			= $this->desceg->listarDESCEG();

	$this->actdes_res->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesRes 		= $this->actdes_res->listarACTDESRES();
	$this->actdes_com->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesCom 		= $this->actdes_com->listarACTDESCOM();
	$this->actdes_com_in->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesComIn 		= $this->actdes_com_in->listarACTDESCOMIN();
	$this->actdes_desa->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesDesa 		= $this->actdes_desa->listarACTDESDESA();
	$this->actdes_es->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesEs 			= $this->actdes_es->listarACTDESES();

	$this->leyesAccesos->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAccesos 		= $this->leyesAccesos->listarLeyAccesos();
	$this->leyesDesarroSect->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesDesarroSect 	= $this->leyesDesarroSect->listarLeyDesarroSect();
	$this->leyesEspacioGeo->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesEspacioGeo 	= $this->leyesEspacioGeo->listarLeyEspacioGeo();
	$this->leyesActividades->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesActividades	= $this->leyesActividades->listarLeyActividades();
	$this->leyesAspectoBio->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAspectoBio 	= $this->leyesAspectoBio->listarLeyAspectoBio();
	$this->leyesPatente->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesPatente 		= $this->leyesPatente->listarLeyPatente();
	$this->leyesPlan->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesPlan 		= $this->leyesPlan->listarLeyPlan();
	$this->leyesRedVial->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesRedVial 		= $this->leyesRedVial->listarLeyRedVial();
	$this->leyesAreasPro->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAreasPro 	= $this->leyesAreasPro->listarLeyAreasPro();
	$this->leyesServi->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rleyesServi 	= $this->leyesServi->listarLeyServi();

	$this->apro_dene->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rApro_Dene 	= $this->apro_dene->listarR_APRO_DENE();

	$this->observacion->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$robservacion 	= $this->observacion->listarR_OBSERV_TRAMITE();
	$this->encabezadopatente->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rencabezadopatente = $this->encabezadopatente->listarencabezadoPatente();
	$this->encabezadoconstruccion->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rencabezadoconstruccion = $this->encabezadoconstruccion->listarencabezadoConstruccion();


	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFillColor(255,255,255);
	$pdf->SetFont('Arial','B',11);
	try
	{
		while ($rpantente = mysqli_fetch_array($rencabezadopatente) ) {
			$pdf->Cell(185, 5, utf8_decode($rpantente[0]), 0, 0, 'C');
		}
		while ($rconstruccion = mysqli_fetch_array($rencabezadoconstruccion) ) {
			$pdf->Cell(185, 5, utf8_decode($rconstruccion[0]), 0, 0, 'C');
		}
		$pdf->Ln(8);
		while ($row = mysqli_fetch_array($result1)) {
			$pdf->MultiCell(50,5,$row[0],0,1);
			while ($cons = mysqli_fetch_array($rConstra)) {
		 		$pdf->MultiCell(60,5,"DPU-".$cons[0]."-".$cons[1]."-".$cons[2],0,'L');
		 	$pdf->MultiCell(0,0,utf8_decode("Número de Trámite:"),0,0,'L');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(175,20,$row[1],0,0,'L');
		 	$pdf->MultiCell(100,5,utf8_decode("Señor(a):"));
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(100,5,utf8_decode($row[2]." ".$row[3]." ".$row[4]),0,1,'J');
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(40,5,utf8_decode("Cédula: ".$row[5]),0,1,'J');
		 	$pdf->MultiCell(23,10,"Presente",0,1,'J');
		 	$pdf->SetFont('Arial','B',10);
		 	$pdf->MultiCell(180,5,utf8_decode("Se extiende RESOLUCIÓN MUNICIPAL DE UBICACIÓN DE USO para la Propiedad Plano G-".$row[6]." de la Finca 5-".$row[7].", Propiedad de ".$row[8]." ".$row[9]." ".$row[10].", Cédula Jurídica ".$row[11].", Ubicada ".$row[12].", ".$row[13].", Distrito ".$row[14].", Nicoya, indicando lo siguiente:"),0,1,'J');
		 	
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,utf8_decode('La zona donde se encuentra esta propiedad corresponde a Comercial-Turístico, según el Plan Regulador Vigente del Cantón de Nicoya.'),0,1,'J');
		 	
		 	$pdf->MultiCell(190,5,utf8_decode('Usos permitidos: '),0,1,'J');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,utf8_decode('-Viviendas y apartamentos situados en pisos superiores al primero.'),0,1,'J');
		 	$pdf->MultiCell(190,5,utf8_decode('-El resto de los usos urbanos a excepción de los indicados en usos condicionales de Comercio Central y los usos industriales.'),0,1,'J');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,utf8_decode(' Usos Condicionales: '),0,1,'J');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,utf8_decode('Previo cumplimiento de requisitos establecidos en este reglamento para los usos condicionales (artículo 2, inciso b, párrafo 3), se permitirá el uso de terreno y edificios para los fines indicados.'),0,1,'J');
		 
		 	$pdf->MultiCell(190,5,utf8_decode('* Venta por menor de materiales de construcción en locales cerrados.'),0,1,'J');
		 	$pdf->MultiCell(190,5,utf8_decode('* Talleres de artesanía e industrias artesanales que no emplee mas de 5 empleados , así como reparación de artículos eléctricos, equipo oficina, utensilios domésticos, bicicletas y similares, siempre que su operación y el almacenamiento de materiales y equipo se haga  en un local completamente cerrado y  un área de piso no mayor de 200 metros cuadrados.'),0,1,'J');
		 	$pdf->MultiCell(190,5,utf8_decode('* Cualquier otro servicio o negocio de características y efectos similares de los descritos  que además, de no ser perjudiciales a los usos vecinos, no produzcan  ruidos, vibraciones, humo, olores polvo suciedad, gases nocivos,  resplandor, calor y peligro de fuego, o explosión en mayor grado que normalmente producirán las indicadas actividades.'),0,1,'J');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,utf8_decode('Requisitos:'),0,1,'J');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,utf8_decode('* La superficie del lote no será menor de 140 m2 para construcciones de hasta 2 pisos y de 280 m2, para las que exceden de 2 pisos.'),0,1,'J');
		 	$pdf->MultiCell(190,5,utf8_decode('* Frente de lote no será menor a 8 m.'),0,1,'J');
		 	$pdf->MultiCell(190,5,utf8_decode('* Retiros: '),0,1,'J');
		 	$pdf->MultiCell(190,5,utf8_decode('Frontal: 2.5 m, que se usará de antejardín, con la posibilidad de ser acera peatonal.'),0,1,'J');
		 	$pdf->MultiCell(190,5,utf8_decode('Posterior: 3 m.'),0,1,'J');
		 	$pdf->MultiCell(190,5,utf8_decode('* Cobertura de las estructuras: se permitirá una cobertura del 80 % de la superficie del lote.'),0,1,'J');
		 	$pdf->MultiCell(190,5,utf8_decode('* Área de piso no excederá del 80 % de la superficie del lote.'),0,1,'J');
		 	$pdf->MultiCell(190,5,utf8_decode('* Altura de las estructuras: la altura de los edificios no excederá de 12 m o 4 pisos.'),0,1,'J');

		 	$pdf->Ln(2);

		 	$pdf->MultiCell(55,5,'> Uso Actual del Suelo',0,1,'J');
		 	//Muestra los usos del suelo actual
		 	while ($as = mysqli_fetch_array($rDesceg)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$as[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(55,5,"> Actividad a Desarrollar",0,1,'J');
		 	$pdf->Ln(2);
		 	//Muestra las actividades a desarrollar
		 	while ($adr = mysqli_fetch_array($rActdesRes)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$adr[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($ades = mysqli_fetch_array($rActdesEs)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$ades[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($adci = mysqli_fetch_array($rActdesComIn)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$adci[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($add = mysqli_fetch_array($rActdesDesa)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$add[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($adc = mysqli_fetch_array($rActdesCom)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$adc[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,"Se concluye: ",0,1,'J');
		 	while ($leyA = mysqli_fetch_array($rLeyesAccesos)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyA[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	
		 	while ($leyPT = mysqli_fetch_array($rLeyesPatente)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyPT[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyAD = mysqli_fetch_array($rLeyesActividades)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyAD[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyAP = mysqli_fetch_array($rLeyesAreasPro)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyAP[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyRV = mysqli_fetch_array($rLeyesRedVial)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyRV[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyAB = mysqli_fetch_array($rLeyesAspectoBio)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyAB[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyDS = mysqli_fetch_array($rLeyesDesarroSect)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyDS[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyEG = mysqli_fetch_array($rLeyesEspacioGeo)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyEG[0]),0,'J');
		 		$pdf->Ln(2);
		 	}

		 	while ($obser = mysqli_fetch_array($robservacion)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($obser[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyP = mysqli_fetch_array($rLeyesPlan)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyP[0]),0,'J');
		 		$pdf->Ln(1);
		 	}
		 	$pdf->MultiCell(190,5,utf8_decode('Nota: Al haber aprobado la Resolución de Ubicación Municipal eso implica que se está dado el permiso para movimiento de tierra, cortes, rellenos, construcción construcción, desfogue fluvial, todo lo relacionado con obras civiles por lo que deberan ser tramitado en el momento que se requiera dicho permiso y también si la Resolución Municipal (Uso de Suelo) es positivo, no obliga a la municipalidad a otorgar la respectiva pantente, esta debe ser solicitado de conformidad con la normativa establecido por esta institución para estos efectos.'),0,'J');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(100,5,"POR LO TANTO",0,0);
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(190,5,utf8_decode("Se ".$row[15]." la RESOLUCIÓN DE UBICACIÓN MUNICIPAL, mediante oficio DPU-".$cons[0]."-".$cons[1]."-".$cons[2].", para la Finca 5-".$row[7]." quedando sujeto a las disposiciones de la legislación vigente y en observaciones de nuestro ordenamiento jurídico, cualquier transgresión a las normas, producirá anulación del acto administrativo."),0,'J');
		 	}
		 	$pdf->Ln(1);
		 	
		 	$pdf->MultiCell(190,5,"Atentamente, ",0,1);
		 	$pdf->MultiCell(180,5,"Firma de Recibido",0,0);
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,"__________________________",0,0)	;
		 	$pdf->Ln(5);
		 	$pdf->MultiCell(190,5,utf8_decode('# Cédula: __________________________'),0,0,'R');
		 	$pdf->Ln(3);
		 	$pdf->MultiCell(190,5,utf8_decode('Fecha: ____________________ Hora: __________________________'),0,0,'R');
		 	$pdf->Ln(3);
		 	$pdf->MultiCell(60,5,"__________________________",0,1);
		 	$pdf->MultiCell(50,5,"Arq. Jonathan Soto Segura",0,1);
		 	$pdf->MultiCell(80,5,utf8_decode("Coordinador de Planificación Urbana"),0,1);
		 	$pdf->MultiCell(80,5,utf8_decode("Municipalidad de Nicoya"),0,1);

		 }
		 $pdf->Output();
	} catch(Exception $e) {
		$pdf->Cell(30, 10, "Sin datos".$e, 0, 0, 'C');
		$pdf->Output();
	}
}

// Fin Nicoya }

// Samara {

public function rZonaComercialTuristica(){
	$this->zonacomerturistica 	= new classreporte();

	$this->constra 				= new classreporte();
	
	$this->actdes_res 	 		= new classreporte();
	$this->actdes_com 	 		= new classreporte();
	$this->actdes_com_in 		= new classreporte();
	$this->actdes_desa 	 		= new classreporte();
	$this->actdes_es 	 		= new classreporte();
	
	$this->desceg 		 		= new classreporte();
	
	$this->leyesAccesos 		= new classreporte();
	$this->leyesDesarroSect 	= new classreporte();
	$this->leyesEspacioGeo 		= new classreporte();
	$this->leyesActividades 	= new classreporte();
	$this->leyesAspectoBio 		= new classreporte();
	$this->leyesPatente 		= new classreporte();
	$this->leyesPlan 		 	= new classreporte();
	$this->leyesRedVial 		= new classreporte();
	$this->leyesAreasPro 		= new classreporte();
	$this->leyesServi			= new classreporte();
	
	$this->apro_dene 			= new classreporte();
	$this->observacion          = new classreporte();
	$this->datoscomerturistica  = new classreporte();
	$this->encabezadopatente	= new classreporte();
	$this->encabezadoconstruccion = new classreporte();

	$this->zonacomerturistica->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLista 			= $this->zonacomerturistica->listarZonaComercialTuristica();
	$this->datoscomerturistica->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$datos = $this->datoscomerturistica->listardatosZonaComercialTuristica();

	$this->desceg->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rDesceg 			= $this->desceg->listarDESCEG();
	$this->constra->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rConstra			= $this->constra->listarCons();

	$this->actdes_res->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesRes 		= $this->actdes_res->listarACTDESRES();
	$this->actdes_com->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesCom 		= $this->actdes_com->listarACTDESCOM();
	$this->actdes_com_in->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesComIn 		= $this->actdes_com_in->listarACTDESCOMIN();
	$this->actdes_desa->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesDesa 		= $this->actdes_desa->listarACTDESDESA();
	$this->actdes_es->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesEs 			= $this->actdes_es->listarACTDESES();

	$this->leyesAccesos->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAccesos 		= $this->leyesAccesos->listarLeyAccesos();
	$this->leyesDesarroSect->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesDesarroSect 	= $this->leyesDesarroSect->listarLeyDesarroSect();
	$this->leyesEspacioGeo->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesEspacioGeo 	= $this->leyesEspacioGeo->listarLeyEspacioGeo();
	$this->leyesActividades->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesActividades	= $this->leyesActividades->listarLeyActividades();
	$this->leyesAspectoBio->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAspectoBio 	= $this->leyesAspectoBio->listarLeyAspectoBio();
	$this->leyesPatente->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesPatente 		= $this->leyesPatente->listarLeyPatente();
	$this->leyesPlan->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesPlan 		= $this->leyesPlan->listarLeyPlan();
	$this->leyesRedVial->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesRedVial 		= $this->leyesRedVial->listarLeyRedVial();
	$this->leyesAreasPro->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAreasPro 	= $this->leyesAreasPro->listarLeyAreasPro();
	$this->leyesServi->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rleyesServi 		= $this->leyesServi->listarLeyServi();

	$this->apro_dene->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rApro_Dene 		= $this->apro_dene->listarR_APRO_DENE();

	$this->observacion->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$robservacion 		= $this->observacion->listarR_OBSERV_TRAMITE();

	$this->encabezadopatente->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rencabezadopatente = $this->encabezadopatente->listarencabezadoPatente();
	$this->encabezadoconstruccion->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rencabezadoconstruccion = $this->encabezadoconstruccion->listarencabezadoConstruccion();

	$pdf 				= new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFillColor(255,255,255);
	$pdf->SetFont('Arial','B',11);
	try
	{
		while ($rpantente = mysqli_fetch_array($rencabezadopatente) ) {
			$pdf->Cell(185, 5, utf8_decode($rpantente[0]), 0, 0, 'C');
		}
		while ($rconstruccion = mysqli_fetch_array($rencabezadoconstruccion) ) {
			$pdf->Cell(185, 5, utf8_decode($rconstruccion[0]), 0, 0, 'C');
		}
		$pdf->Ln(8);
		//Muestras los primeros datos que dan referencia a los nombres, planos, terrenos, numero de finca... etc
		while ($row = mysqli_fetch_array($rLista)) {
			$pdf->MultiCell(50,5,$row[0],0,1);
			// Inicio Consecutivo
			while ($cons = mysqli_fetch_array($rConstra)) {
		 		$pdf->MultiCell(60,5,"DPU-".$cons[0]."-".$cons[1]."-".$cons[2],0,'L');
		 	$pdf->MultiCell(0,0,utf8_decode("Número de Trámite:"),0,0,'L');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(175,20,$row[1],0,0,'L');
		 	$pdf->MultiCell(100,5,utf8_decode("Señor(a):"));
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(100,5,utf8_decode($row[2]." ".$row[3]." ".$row[4]),0,1,'J');
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(40,5,utf8_decode("Cédula: ".$row[5]),0,1,'J');
		 	$pdf->MultiCell(23,10,"Presente",0,1,'J');
		 	$pdf->SetFont('Arial','B',10);
		 	$pdf->MultiCell(180,5,utf8_decode(
		 		"Se extiende RESOLUCIÓN MUNICIPAL DE UBICACIÓN DE USO para la Propiedad Plano G-".$row[6]." de la Finca 5-".$row[7].", Propiedad de ".$row[8]." ".$row[9]." ".$row[10].", Cédula/Jurídica ".$row[11].", Ubicada en ".$row[12].", ".$row[13].", Distrito ".$row[14].", Samara; me permito  indicarle según el Plan Regulador Vigente aprobado para la zona, esta propiedad pertenece al sector determinado por los siguientes términos: ZONA  COMERCIAL - TURISTICA." ),0,1,'J' );
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(180,5,"",0,1,'J');
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'Esta es la parte de la zona restringida que se dedica a las concesiones para uso Institucional de acuerdo a la ley 6043. Incluye tanto a aquellos lotes existentes y que cumplen con la Ley  6043, como los  que resultan del nuevo ordenamiento establecido, según el Plan Regulador de Samara publicado en la Gaceta 208 el 30 de Noviembre de 1981, para la Zona Comercial - Turística del mismo se desprende lo siguiente:' ),0,'J');
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'Propósitos: Ares dedicadas al comercio de bienes y servicios de consumo local y turístico.' ),0,'J');
		 		$pdf->Ln(2);
		 		$pdf->MultiCell(190,5,utf8_decode(
		 		'Localización:' ),0,'J');
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'Mojón 23 a mojón 23 + 40 mts. (Sector Medio)' ),0,'J');
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'Mojón 19 a Mojón 19 + 50 mts. (Sector Posterior)' ),0,'J');
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'Mojón 1 + 240 mts a Mojón 2 + 90 mts ' ),0,'J');
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'Los usos permitidos:' ),0,'J');
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'Restaurantes, cafeterías, sodas, artículos fotográficos, agencias de viajes, artesanías y souvenirs, juego de salón, panaderías, reposterías, agencia bancarias.' ),0,'J');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'Usos condicionales:' ),0,'J');
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'Supermercados, salón de bailes, oficinas de profesionales y bares.' ),0,'J');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'Usos  conflictivos:' ),0,'J');
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'Cantinas, bares o licoreras, almacenes de productos agrícolas, talleres, industrias, toda instalación que afecte mediante olores, humo o vibración.' ),0,'J');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'Requisitos: ' ),0,'J');
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'1.	Superficie Mínima: 150m2.' ),0,'J');
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'2.	Superficie Máxima: 1000 m2.' ),0,'J');
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'3.	Frente Mínimo: 10 m.' ),0,'J');
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'4.	Frente Máximo: 20 m.' ),0,'J');
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'5.	Retiro Frontal: 3 m.' ),0,'J');
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'6.	Retiro Lateral 2 m.' ),0,'J');
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'7.	Cobertura Máxima: 70%' ),0,'J');
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'8.	Altura Máxima: 5 m.' ),0,'J');
		 		$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'Concesiones:' ),0,'J');
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'De acuerdo con el proceso establecido por la Ley 6043 y su Reglamento.' ),0,'J');
		 		$pdf->Ln(2);
		 		


		 	while ($fila = mysqli_fetch_array($datos)) { 		 		
		 		$pdf->Ln(1); 		 		
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$fila[0]."."),0,1,'J'); 		 		
		 		$pdf->Ln(1); 		 	
		 	}
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(55,5,'> Uso Actual del Suelo',0,1,'J');
		 	//Muestra los usos del suelo actual
		 	while ($as = mysqli_fetch_array($rDesceg)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$as[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	// Fin suelo actual
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(55,5,"> Actividad a Desarrollar",0,1,'J');
		 	$pdf->Ln(2);
		 	//Muestra las actividades a desarrollar
		 	while ($adr = mysqli_fetch_array($rActdesRes)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$adr[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($ades = mysqli_fetch_array($rActdesEs)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$ades[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($adci = mysqli_fetch_array($rActdesComIn)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$adci[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($add = mysqli_fetch_array($rActdesDesa)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$add[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($adc = mysqli_fetch_array($rActdesCom)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$adc[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	//Fin Actividades
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,"Se concluye: ",0,1,'J');
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'Uso Conforme de Resolución Municipal de Ubicación con el proyecto a realizar.' ),0,'J');
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'La altura máxima y la cobertura deberán estar apegadas a lo dispuesto en la Ley de Planificación Urbana, Ley de Uso, Manejo y Conservación de Suelo N° 7779, Ley forestal N°7575 y demás Legislación Vigente.' ),0,'J');
		 		$pdf->Ln(2);
		 	// Inicio Leyes
		 	while ($leyA = mysqli_fetch_array($rLeyesAccesos)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyA[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyPT = mysqli_fetch_array($rLeyesPatente)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyPT[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyAD = mysqli_fetch_array($rLeyesActividades)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyAD[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyAP = mysqli_fetch_array($rLeyesAreasPro)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyAP[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyRV = mysqli_fetch_array($rLeyesRedVial)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyRV[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyAB = mysqli_fetch_array($rLeyesAspectoBio)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyAB[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyDS = mysqli_fetch_array($rLeyesDesarroSect)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyDS[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyEG = mysqli_fetch_array($rLeyesEspacioGeo)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyEG[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leySD = mysqli_fetch_array($rleyesServi)){
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leySD[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
			// Fin leyes
		 	while ($obser = mysqli_fetch_array($robservacion)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($obser[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'La validez de la presente certificación está sometida a toda la normativa correspondiente vigente y al cumplimiento de los requisitos solicitados por el Ministerio de Salud amparado a un dictamen favorable de esta institución. Sin perjuicio de lo anterior para todos estos casos las molestias deberán quedar absolutamente confinadas a los límites de la propiedad.' ),0,'J');
		 	
			$pdf->Ln(2);
			while ($leyP = mysqli_fetch_array($rLeyesPlan)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyP[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'Nota: Al haber aprobado la Resolución de Ubicación Municipal eso implica que se está dado el permiso para movimiento de tierra, cortes, rellenos, construcción construcción, desfogue fluvial, todo lo relacionado con obras civiles por lo que deberan ser tramitado en el momento que se requiera dicho permiso y también si la Resolución Municipal (Uso de Suelo) es positivo, no obliga a la municipalidad a otorgar la respectiva pantente, esta debe ser solicitado de conformidad con la normativa establecido por esta institución para estos efectos.' ),0,'J');
		 	$pdf->MultiCell(100,5,"Por tanto",0,0);
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(190,5,utf8_decode("Se ".$row[15]." la RESOLUCIÓN DE UBICACIÓN MUNICIPAL, mediante oficio DPU-".$cons[0]."-".$cons[1]."-".$cons[2].", para la Finca 5-".$row[7]." quedando sujeto a las disposiciones de la legislación vigente y en observaciones de nuestro ordenamiento jurídico, cualquier transgresión a las normas, producirá anulación del acto administrativo."),0,'J');
		 	}// Finaliza Consecutivo
		 	$pdf->Ln(1);
		 	$pdf->Ln(2);
		 	
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,"Atentamente, ",0,1);
		 	$pdf->MultiCell(180,5,"Firma de Recibido",0,0);
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,"__________________________",0,0)	;
		 	$pdf->Ln(5);
		 	$pdf->MultiCell(190,5,utf8_decode('# Cédula: __________________________'),0,0,'R');
		 	$pdf->Ln(3);
		 	$pdf->MultiCell(190,5,utf8_decode('Fecha: __________________ Hora: __________________'),0,0,'R');
		 	$pdf->Ln(3);
		 	$pdf->MultiCell(60,5,"__________________________",0,1);
		 	$pdf->MultiCell(50,5,"Arq. Jonathan Soto Segura",0,1);
		 	$pdf->MultiCell(80,5,utf8_decode("Coordinador de Planificación Urbana"),0,1);
		 	$pdf->MultiCell(80,5,utf8_decode("Municipalidad de Nicoya"),0,1);
		 }
		 $pdf->Output();
	} catch(Exception $e){
		$pdf->Cell(30, 10, "Sin datos".$e, 0, 0, 'C');
		$pdf->Output();
	}
}

public function rZonaResidencialPrivada(){
	$this->zonaresiprivada   	= new classreporte();

	$this->constra 				= new classreporte();
	
	$this->actdes_res 	 		= new classreporte();
	$this->actdes_com 	 		= new classreporte();
	$this->actdes_com_in 		= new classreporte();
	$this->actdes_desa 	 		= new classreporte();
	$this->actdes_es 	 		= new classreporte();
	
	$this->desceg 		 		= new classreporte();
	
	$this->leyesAccesos 		= new classreporte();
	$this->leyesDesarroSect 	= new classreporte();
	$this->leyesEspacioGeo 		= new classreporte();
	$this->leyesActividades 	= new classreporte();
	$this->leyesAspectoBio 		= new classreporte();
	$this->leyesPatente 		= new classreporte();
	$this->leyesPlan 		 	= new classreporte();
	$this->leyesRedVial 		= new classreporte();
	$this->leyesAreasPro 		= new classreporte();
	$this->leyesServi			= new classreporte();
	
	$this->apro_dene 			= new classreporte();
	$this->observacion          = new classreporte();
	$this->datosresiprivada     = new classreporte();
	$this->encabezadopatente	= new classreporte();
	$this->encabezadoconstruccion = new classreporte();

	$this->zonaresiprivada->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLista 			= $this->zonaresiprivada->listarZonaResidencialPrivada();
	$this->datosresiprivada->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$datos = $this->datosresiprivada->listardatosZonaResidencialPrivada();

	$this->desceg->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rDesceg 			= $this->desceg->listarDESCEG();
	$this->constra->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rConstra			= $this->constra->listarCons();

	$this->actdes_res->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesRes 		= $this->actdes_res->listarACTDESRES();
	$this->actdes_com->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesCom 		= $this->actdes_com->listarACTDESCOM();
	$this->actdes_com_in->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesComIn 		= $this->actdes_com_in->listarACTDESCOMIN();
	$this->actdes_desa->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesDesa 		= $this->actdes_desa->listarACTDESDESA();
	$this->actdes_es->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesEs 			= $this->actdes_es->listarACTDESES();

	$this->leyesAccesos->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAccesos 		= $this->leyesAccesos->listarLeyAccesos();
	$this->leyesDesarroSect->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesDesarroSect 	= $this->leyesDesarroSect->listarLeyDesarroSect();
	$this->leyesEspacioGeo->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesEspacioGeo 	= $this->leyesEspacioGeo->listarLeyEspacioGeo();
	$this->leyesActividades->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesActividades	= $this->leyesActividades->listarLeyActividades();
	$this->leyesAspectoBio->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAspectoBio 	= $this->leyesAspectoBio->listarLeyAspectoBio();
	$this->leyesPatente->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesPatente 		= $this->leyesPatente->listarLeyPatente();
	$this->leyesPlan->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesPlan 		= $this->leyesPlan->listarLeyPlan();
	$this->leyesRedVial->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesRedVial 		= $this->leyesRedVial->listarLeyRedVial();
	$this->leyesAreasPro->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAreasPro 	= $this->leyesAreasPro->listarLeyAreasPro();
	$this->leyesServi->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rleyesServi 		= $this->leyesServi->listarLeyServi();

	$this->apro_dene->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rApro_Dene 		= $this->apro_dene->listarR_APRO_DENE();

	$this->observacion->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$robservacion 		= $this->observacion->listarR_OBSERV_TRAMITE();
	$this->encabezadopatente->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rencabezadopatente = $this->encabezadopatente->listarencabezadoPatente();
	$this->encabezadoconstruccion->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rencabezadoconstruccion = $this->encabezadoconstruccion->listarencabezadoConstruccion();

	$pdf 				= new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFillColor(255,255,255);
	$pdf->SetFont('Arial','B',11);
	try {
		while ($rpantente = mysqli_fetch_array($rencabezadopatente) ) {
			$pdf->Cell(185, 5, utf8_decode($rpantente[0]), 0, 0, 'C');
		}
		while ($rconstruccion = mysqli_fetch_array($rencabezadoconstruccion) ) {
			$pdf->Cell(185, 5, utf8_decode($rconstruccion[0]), 0, 0, 'C');
		}
		$pdf->Ln(8);
		//Muestras los primeros datos que dan referencia a los nombres, planos, terrenos, numero de finca... etc
		while ($row = mysqli_fetch_array($rLista)) {
			$pdf->MultiCell(50,5,$row[0],0,1);
			// Inicio Consecutivo
			while ($cons = mysqli_fetch_array($rConstra)) {
		 		$pdf->MultiCell(60,5,"DPU-".$cons[0]."-".$cons[1]."-".$cons[2],0,'L');
			 	$pdf->MultiCell(0,0,utf8_decode("Número de Trámite:"),0,0,'L');
			 	$pdf->Ln(2);
			 	$pdf->MultiCell(175,20,$row[1],0,0,'L');
			 	$pdf->MultiCell(100,5,utf8_decode("Señor(a):"));
			 	$pdf->Ln(1);
			 	$pdf->MultiCell(100,5,utf8_decode($row[2]." ".$row[3]." ".$row[4]),0,1,'J');
			 	$pdf->Ln(1);
			 	$pdf->MultiCell(40,5,utf8_decode("Cédula: ".$row[5]),0,1,'J');
			 	$pdf->MultiCell(23,10,"Presente",0,1,'J');
			 	$pdf->SetFont('Arial','B',10);
			 	$pdf->MultiCell(180,5,utf8_decode(
			 		"Se extiende RESOLUCIÓN MUNICIPAL DE UBICACIÓN DE USO para la Propiedad Plano G-".$row[6]." de la Finca 5-".$row[7].", Propiedad de ".$row[8]." ".$row[9]." ".$row[10].", Cédula/Jurídica ".$row[11].", Ubicada en ".$row[12].", ".$row[13].", Distrito ".$row[14].", Indicando lo siguientes:" ),0,1,'J' );
			 	$pdf->MultiCell(190,5,utf8_decode(
			 		'La zona donde se encuentra este terreno se consigna como Zona Residencial Privada según el Plan Regulador publicado en la Gaceta No.208 del 30 de octubre de 1981, sin embargo, el artículo 6 de la Ley 6043 indica que las disposiciones de esta Ley no se aplicarán a las áreas situadas en los litorales, ni a las propiedades inscritas con la sujeción a la Ley a nombre de particulares, ni aquellas cuya legitimidad reconozcan las leyes.  ' ),0,'J');
			 	$pdf->Ln(2);
			 	$pdf->MultiCell(190,5,utf8_decode(
			 		'Por la zona en que se encuentra, esta propiedad cualquier tipo de construcción debe apegarse a lo dispuesto en la Ley Orgánica del Ambiente y su reglamento y normativa vigente y a lo dispuesto en la Ley de Construcciones y Ley de Planificación Urbana y demás Legislación vigente.' ),0,'J');
			 	$pdf->Ln(2);
			 	$pdf->Ln(1);
			 	$pdf->MultiCell(55,5,'> Uso Actual del Suelo',0,1,'J');
			 	//Muestra los usos del suelo actual
			 	while ($as = mysqli_fetch_array($rDesceg)) {
			 		$pdf->Ln(1);
			 		$pdf->MultiCell(100,5,utf8_decode("* ".$as[0]."."),0,1,'J');
			 		$pdf->Ln(1);
			 	}
			 	// Fin suelo actual
			 	$pdf->Ln(1);
			 	$pdf->MultiCell(55,5,"> Actividad a Desarrollar",0,1,'J');
			 	$pdf->Ln(1);
			 	//Muestra las actividades a desarrollar
			 	while ($adr = mysqli_fetch_array($rActdesRes)) {
			 		$pdf->Ln(1);
			 		$pdf->MultiCell(100,5,utf8_decode("* ".$adr[0]."."),0,1,'J');
			 		$pdf->Ln(1);
			 	}
			 	while ($ades = mysqli_fetch_array($rActdesEs)) {
			 		$pdf->Ln(1);
			 		$pdf->MultiCell(100,5,utf8_decode("* ".$ades[0]."."),0,1,'J');
			 		$pdf->Ln(1);
			 	}
			 	while ($adci = mysqli_fetch_array($rActdesComIn)) {
			 		$pdf->Ln(1);
			 		$pdf->MultiCell(100,5,utf8_decode("* ".$adci[0]."."),0,1,'J');
			 		$pdf->Ln(1);
			 	}
			 	while ($add = mysqli_fetch_array($rActdesDesa)) {
			 		$pdf->Ln(1);
			 		$pdf->MultiCell(100,5,utf8_decode("* ".$add[0]."."),0,1,'J');
			 		$pdf->Ln(1);
			 	}
			 	while ($adc = mysqli_fetch_array($rActdesCom)) {
			 		$pdf->Ln(1);
			 		$pdf->MultiCell(100,5,utf8_decode("* ".$adc[0]."."),0,1,'J');
			 		$pdf->Ln(1);
			 	}
			 	//Fin Actividades
			 	$pdf->Ln(2);
			 	$pdf->MultiCell(190,5,"Se concluye: ",0,1,'J');
			 	$pdf->MultiCell(190,5,utf8_decode(
			 		'Uso Conforme de Resolución Municipal con el proyecto a desarrollar, en cumplimiento con el art.7 Zonas Privadas del Reglamento de Zonificación del Plan Regulador de Samara., debe de cumplir: ' ),0,'J');
			 	$pdf->Ln(2);
			 	// Inicio Leyes
			 	while ($leyA = mysqli_fetch_array($rLeyesAccesos)) {
			 		$pdf->Ln(1);
			 		$pdf->MultiCell(190,5,utf8_decode($leyA[0]),0,'J');
			 		$pdf->Ln(2);
			 	}
			 	while ($leyPT = mysqli_fetch_array($rLeyesPatente)) {
			 		$pdf->Ln(1);
			 		$pdf->MultiCell(190,5,utf8_decode($leyPT[0]),0,'J');
			 		$pdf->Ln(2);
			 	}
			 	while ($leyAD = mysqli_fetch_array($rLeyesActividades)) {
			 		$pdf->Ln(1);
			 		$pdf->MultiCell(190,5,utf8_decode($leyAD[0]),0,'J');
			 		$pdf->Ln(2);
			 	}
			 	while ($leyAP = mysqli_fetch_array($rLeyesAreasPro)) {
			 		$pdf->Ln(1);
			 		$pdf->MultiCell(190,5,utf8_decode($leyAP[0]),0,'J');
			 		$pdf->Ln(2);
			 	}
			 	while ($leyRV = mysqli_fetch_array($rLeyesRedVial)) {
			 		$pdf->Ln(1);
			 		$pdf->MultiCell(190,5,utf8_decode($leyRV[0]),0,'J');
			 		$pdf->Ln(2);
			 	}
			 	while ($leyAB = mysqli_fetch_array($rLeyesAspectoBio)) {
			 		$pdf->Ln(1);
			 		$pdf->MultiCell(190,5,utf8_decode($leyAB[0]),0,'J');
			 		$pdf->Ln(2);
			 	}
			 	while ($leyDS = mysqli_fetch_array($rLeyesDesarroSect)) {
			 		$pdf->Ln(1);
			 		$pdf->MultiCell(190,5,utf8_decode($leyDS[0]),0,'J');
			 		$pdf->Ln(2);
			 	}
			 	
			 	while ($leyEG = mysqli_fetch_array($rLeyesEspacioGeo)) {
			 		$pdf->Ln(1);
			 		$pdf->MultiCell(190,5,utf8_decode($leyEG[0]),0,'J');
			 		$pdf->Ln(2);
			 	}
			 	while ($leySD = mysqli_fetch_array($rleyesServi)){
			 		$pdf->Ln(1);
			 		$pdf->MultiCell(190,5,utf8_decode($leySD[0]),0,'J');
			 		$pdf->Ln(2);
			 	}
				// Fin leyes
			 	while ($obser = mysqli_fetch_array($robservacion)) {
			 		$pdf->Ln(1);
			 		$pdf->MultiCell(190,5,utf8_decode($obser[0]),0,'J');
			 		$pdf->Ln(2);
			 	}
			 
				$pdf->MultiCell(190,5,utf8_decode(
			 		'De previo a desarrollar el proyecto debe garantizar que toda posible molestia debe quedar completamente confinada dentro del inmueble; así como realizar todos los análisis para verificar la viabilidad ambiental, económico, vial, patrimonial, de afectaciones, de infraestructura, de mecánica de suelos, de escorrentía, de riesgos naturales, de disponibilidad de servicios, de transporte público, etc., para conocer si realmente la propiedad en este caso privada es apta para la construcción de este tipo de proyecto.' ),0,'J');
				$pdf->Ln(2);
				while ($leyP = mysqli_fetch_array($rLeyesPlan)) {
			 		$pdf->Ln(1);
			 		$pdf->MultiCell(190,5,utf8_decode($leyP[0]),0,'J');
			 		$pdf->Ln(2);
			 	}
			 	$pdf->MultiCell(190,5,utf8_decode(
			 		'Nota: Al haber aprobado la Resolución de Ubicación Municipal eso implica que se está dado el permiso para movimiento de tierra, cortes, rellenos, construcción construcción, desfogue fluvial, todo lo relacionado con obras civiles por lo que deberan ser tramitado en el momento que se requiera dicho permiso y también si la Resolución Municipal (Uso de Suelo) es positivo, no obliga a la municipalidad a otorgar la respectiva pantente, esta debe ser solicitado de conformidad con la normativa establecido por esta institución para estos efectos.' ),0,'J');
			 	$pdf->Ln(2);
			 	$pdf->MultiCell(100,5,"Por tanto",0,0);
			 	$pdf->Ln(1);
			 	$pdf->MultiCell(190,5,utf8_decode("Se ".$row[15]." la RESOLUCIÓN DE UBICACIÓN MUNICIPAL, mediante oficio DPU-".$cons[0]."-".$cons[1]."-".$cons[2].", para la Finca 5-".$row[7]." quedando sujeto a las disposiciones de la legislación vigente y en observaciones de nuestro ordenamiento jurídico, cualquier transgresión a las normas, producirá anulación del acto administrativo."),0,'J');
			 	}// Finaliza Consecutivo
			 	$pdf->Ln(1);
			 	
			 	$pdf->MultiCell(190,5,"Atentamente, ",0,1);
			 	$pdf->MultiCell(180,5,"Firma de Recibido",0,0);
			 	$pdf->Ln(2);
			 	$pdf->MultiCell(190,5,"__________________________",0,0)	;
			 	$pdf->Ln(5);
			 	$pdf->MultiCell(190,5,utf8_decode('# Cédula: __________________________'),0,0,'R');
			 	$pdf->Ln(3);
			 	$pdf->MultiCell(190,5,utf8_decode('Fecha: __________________ Hora: __________________'),0,0,'R');
			 	$pdf->Ln(3);
			 	$pdf->MultiCell(60,5,"__________________________",0,1);
			 	$pdf->MultiCell(50,5,"Arq. Jonathan Soto Segura",0,1);
			 	$pdf->MultiCell(80,5,utf8_decode("Coordinador de Planificación Urbana"),0,1);
			 	$pdf->MultiCell(80,5,utf8_decode("Municipalidad de Nicoya"),0,1);
		}
		$pdf->Output();
	} catch (Exception $e) {
		$pdf->Cell(30, 10, "Sin datos".$e, 0, 0, 'C');
		$pdf->Output();
	}
}


/////////////////////

public function rZonaInstitucional(){
	$this->zonainstitucional  		= new classreporte();

	$this->constra 				= new classreporte();
	
	$this->actdes_res 	 		= new classreporte();
	$this->actdes_com 	 		= new classreporte();
	$this->actdes_com_in 		= new classreporte();
	$this->actdes_desa 	 		= new classreporte();
	$this->actdes_es 	 		= new classreporte();
	
	$this->desceg 		 		= new classreporte();
	
	$this->leyesAccesos 		= new classreporte();
	$this->leyesDesarroSect 	= new classreporte();
	$this->leyesEspacioGeo 		= new classreporte();
	$this->leyesActividades 	= new classreporte();
	$this->leyesAspectoBio 		= new classreporte();
	$this->leyesPatente 		= new classreporte();
	$this->leyesPlan 		 	= new classreporte();
	$this->leyesRedVial 		= new classreporte();
	$this->leyesAreasPro 		= new classreporte();
	$this->leyesServi			= new classreporte();
	
	$this->apro_dene 			= new classreporte();
	$this->observacion          = new classreporte();
	$this->datoszonainstitucional     = new classreporte();
	$this->encabezadopatente	= new classreporte();
	$this->encabezadoconstruccion = new classreporte();

	

	$this->zonainstitucional->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLista 			= $this->zonainstitucional->listarZonaInstitucional();

	$this->datoszonainstitucional->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$datos = $this->datoszonainstitucional->listardatosZonaInstitucional();

	$this->desceg->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rDesceg 			= $this->desceg->listarDESCEG();
	$this->constra->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rConstra			= $this->constra->listarCons();

	$this->actdes_res->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesRes 		= $this->actdes_res->listarACTDESRES();
	$this->actdes_com->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesCom 		= $this->actdes_com->listarACTDESCOM();
	$this->actdes_com_in->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesComIn 		= $this->actdes_com_in->listarACTDESCOMIN();
	$this->actdes_desa->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesDesa 		= $this->actdes_desa->listarACTDESDESA();
	$this->actdes_es->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesEs 			= $this->actdes_es->listarACTDESES();

	$this->leyesAccesos->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAccesos 		= $this->leyesAccesos->listarLeyAccesos();
	$this->leyesDesarroSect->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesDesarroSect 	= $this->leyesDesarroSect->listarLeyDesarroSect();
	$this->leyesEspacioGeo->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesEspacioGeo 	= $this->leyesEspacioGeo->listarLeyEspacioGeo();
	$this->leyesActividades->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesActividades	= $this->leyesActividades->listarLeyActividades();
	$this->leyesAspectoBio->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAspectoBio 	= $this->leyesAspectoBio->listarLeyAspectoBio();
	$this->leyesPatente->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesPatente 		= $this->leyesPatente->listarLeyPatente();
	$this->leyesPlan->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesPlan 		= $this->leyesPlan->listarLeyPlan();
	$this->leyesRedVial->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesRedVial 		= $this->leyesRedVial->listarLeyRedVial();
	$this->leyesAreasPro->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAreasPro 	= $this->leyesAreasPro->listarLeyAreasPro();
	$this->leyesServi->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rleyesServi 		= $this->leyesServi->listarLeyServi();

	$this->apro_dene->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rApro_Dene 		= $this->apro_dene->listarR_APRO_DENE();

	$this->observacion->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$robservacion 		= $this->observacion->listarR_OBSERV_TRAMITE();

	$this->encabezadopatente->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rencabezadopatente = $this->encabezadopatente->listarencabezadoPatente();
	$this->encabezadoconstruccion->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rencabezadoconstruccion = $this->encabezadoconstruccion->listarencabezadoConstruccion();

	$pdf 				= new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFillColor(255,255,255);
	$pdf->SetFont('Arial','B',11);
	try
	{
		while ($rpantente = mysqli_fetch_array($rencabezadopatente) ) {
			$pdf->Cell(185, 5, utf8_decode($rpantente[0]), 0, 0, 'C');
		}
		while ($rconstruccion = mysqli_fetch_array($rencabezadoconstruccion) ) {
			$pdf->Cell(185, 5, utf8_decode($rconstruccion[0]), 0, 0, 'C');
		}


		$pdf->Ln(8);
		//Muestras los primeros datos que dan referencia a los nombres, planos, terrenos, numero de finca... etc
		while ($row = mysqli_fetch_array($rLista)) {
			$pdf->MultiCell(50,5,$row[0],0,1);
			while ($cons = mysqli_fetch_array($rConstra)) {
		 		$pdf->MultiCell(60,5,"DPU-".$cons[0]."-".$cons[1]."-".$cons[2],0,'L');
		 	$pdf->MultiCell(0,0,utf8_decode("Número de Trámite:"),0,0,'L');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(175,20,$row[1],0,0,'L');
		 	$pdf->MultiCell(100,5,utf8_decode("Señor(a):"));
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(100,5,utf8_decode($row[2]." ".$row[3]." ".$row[4]),0,1,'J');
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(40,5,utf8_decode("Cédula: ".$row[5]),0,1,'J');
		 	$pdf->MultiCell(23,10,"Presente",0,1,'J');
		 	$pdf->SetFont('Arial','B',10);
		 	$pdf->MultiCell(180,5,utf8_decode(
		 		"Se extiende RESOLUCIÓN MUNICIPAL DE UBICACIÓN DE USO para la Propiedad Plano G-".$row[6]." de la Finca 5-".$row[7].", Propiedad de ".$row[8]." ".$row[9]." ".$row[10].", Cédula/Jurídica ".$row[11].", Ubicada en ".$row[12].", ".$row[13].", Distrito ".$row[14].", Samara; según oficio Nº ZMT 00449-07  del Departamento de Zona Marítima Terrestre con fecha del  28 de mayo del 2008;  me permito  indicarle según el Plan Regulador Vigente aprobado para la zona, esta propiedad pertenece al sector determinado por los siguientes términos: ZONA  INSTITUCIONAL." ),0,1,'J' );

		 	$pdf->MultiCell(190,5,utf8_decode(
		 			'Esta es la parte de la zona restringida que se dedica a las concesiones para uso Institucional de acuerdo a la ley 6043. Incluye tanto a aquellos lotes existentes y que cumplen con la Ley  6043, como los  que resultan del nuevo ordenamiento establecido, según el Plan Regulador de Samara publicado en la Gaceta 208 el 30 de Noviembre de 1981, para la Zona Institucional del mismo se desprende lo siguiente:'),0,'J');
			$pdf->Ln(1);
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'Localización:' ),0,'J');
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'Mojón 23 a mojón 23 + 40 mts. (Sector Posterior)' ),0,'J');
		 		$pdf->MultiCell(190,5,utf8_decode(
		 		'Mojón 23 + 50 mts a Mojón 23 + 85 mts. (Sector Medio)' ),0,'J');
		 			$pdf->MultiCell(190,5,utf8_decode(
		 		'Mojón 19 a Mojón 19 + 50 mts. (Sector Posterior)' ),0,'J');
		 				$pdf->MultiCell(190,5,utf8_decode(
		 		'Mojón 18 + 100 mts. a Mojón 19 + 20 mts (Sector Medio)' ),0,'J');
		 		$pdf->Ln(1);
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'Los usos permitidos:' ),0,'J');
		 		$pdf->MultiCell(190,5,utf8_decode(
		 		'Telégrafo, Correo, Puesto de Salud, Guardia Rural, Unidad Sanitaria, Ministerios, Teléfono, Instituciones Autónomas, Iglesia, Baños, Vestidores, Servicios Sanitarios, Parqueo, Caseta de Guarda, Primeros Auxilios, Información, Pilas y Venta de Frutas.' ),0,'J');
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'Usos condicionales:' ),0,'J');
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'Cafetería, Soda, Ranchos de Almuerzo Campestre, Parrillas.' ),0,'J');
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'Usos  conflictivos:' ),0,'J');
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'Cualquier instalación que no sea de carácter institucional.' ),0,'J');
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'Concesiones:' ),0,'J');
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'Las concesiones se darán a las Instalaciones interesadas, de acuerdo al proceso establecido por la Ley 6043 y su Reglamento, pero la Municipalidad no les cobrara el canon respectivo.' ),0,'J');
			
		 	$pdf->Ln(2);

		 	$pdf->Ln(2);
		 	$pdf->Ln(2);
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(55,5,'> Uso Actual del Suelo',0,1,'J');
		 	//Muestra los usos del suelo actual
		 	while ($as = mysqli_fetch_array($rDesceg)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$as[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	// Fin suelo actual
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(55,5,"> Actividad a Desarrollar",0,1,'J');
		 	$pdf->Ln(2);
		 	//Muestra las actividades a desarrollar
		 	while ($adr = mysqli_fetch_array($rActdesRes)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$adr[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($ades = mysqli_fetch_array($rActdesEs)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$ades[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($adci = mysqli_fetch_array($rActdesComIn)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$adci[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($add = mysqli_fetch_array($rActdesDesa)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$add[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($adc = mysqli_fetch_array($rActdesCom)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$adc[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	//Fin Actividades
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,"Se concluye: ",0,1,'J');
		 	// Inicio Leyes
		 	while ($leyA = mysqli_fetch_array($rLeyesAccesos)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyA[0]),0,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($leyPT = mysqli_fetch_array($rLeyesPatente)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyPT[0]),0,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($leyAD = mysqli_fetch_array($rLeyesActividades)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyAD[0]),0,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($leyAP = mysqli_fetch_array($rLeyesAreasPro)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyAP[0]),0,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($leyRV = mysqli_fetch_array($rLeyesRedVial)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyRV[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyAB = mysqli_fetch_array($rLeyesAspectoBio)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyAB[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyDS = mysqli_fetch_array($rLeyesDesarroSect)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyDS[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyEG = mysqli_fetch_array($rLeyesEspacioGeo)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyEG[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leySD = mysqli_fetch_array($rleyesServi)){
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leySD[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
			// Fin leyes
		 	while ($obser = mysqli_fetch_array($robservacion)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($obser[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	

			$pdf->Ln(2);
			while ($leyP = mysqli_fetch_array($rLeyesPlan)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyP[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'Nota: Al haber aprobado la Resolución de Ubicación Municipal eso implica que se está dado el permiso para movimiento de tierra, cortes, rellenos, construcción construcción, desfogue fluvial, todo lo relacionado con obras civiles por lo que deberan ser tramitado en el momento que se requiera dicho permiso y también si la Resolución Municipal (Uso de Suelo) es positivo, no obliga a la municipalidad a otorgar la respectiva pantente, esta debe ser solicitado de conformidad con la normativa establecido por esta institución para estos efectos.' ),0,'J');
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(100,5,"POR LO TANTO",0,0);
		 	$pdf->Ln(1);

		 	$pdf->MultiCell(190,5,utf8_decode("Se ".$row[15]." la RESOLUCIÓN DE UBICACIÓN MUNICIPAL, mediante oficio DPU-".$cons[0]."-".$cons[1]."-".$cons[2].", para la Finca 5-".$row[7]." quedando sujeto a las disposiciones de la legislación vigente y en observaciones de nuestro ordenamiento jurídico, cualquier transgresión a las normas, producirá anulación del acto administrativo."),0,'J');
		 	}
		 	$pdf->Ln(1);
		 	
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,"Atentamente, ",0,1);
		 	$pdf->MultiCell(180,5,"Firma de Recibido",0,0);
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,"__________________________",0,0)	;
		 	$pdf->Ln(5);
		 	$pdf->MultiCell(190,5,utf8_decode('# Cédula: __________________________'),0,0,'R');
		 	$pdf->Ln(3);
		 	$pdf->MultiCell(190,5,utf8_decode('Fecha: __________________ Hora: __________________'),0,0,'R');
		 	$pdf->Ln(3);
		 	$pdf->MultiCell(60,5,"__________________________",0,1);
		 	$pdf->MultiCell(50,5,"Arq. Jonathan Soto Segura",0,1);
		 	$pdf->MultiCell(80,5,utf8_decode("Coordinador de Planificación Urbana"),0,1);
		 	$pdf->MultiCell(80,5,utf8_decode("Municipalidad de Nicoya"),0,1);
		 }
		 $pdf->Output();
	} catch(Exception $e){
		$pdf->Cell(30, 10, "Sin datos".$e, 0, 0, 'C');
		$pdf->Output();
	}	
}



public function rZonaPrivada(){
	$this->zonaprivada 	 		= new classreporte();

	$this->constra 				= new classreporte();
	
	$this->actdes_res 	 		= new classreporte();
	$this->actdes_com 	 		= new classreporte();
	$this->actdes_com_in 		= new classreporte();
	$this->actdes_desa 	 		= new classreporte();
	$this->actdes_es 	 		= new classreporte();
	
	$this->desceg 		 		= new classreporte();
	
	$this->leyesAccesos 		= new classreporte();
	$this->leyesDesarroSect 	= new classreporte();
	$this->leyesEspacioGeo 		= new classreporte();
	$this->leyesActividades 	= new classreporte();
	$this->leyesAspectoBio 		= new classreporte();
	$this->leyesPatente 		= new classreporte();
	$this->leyesPlan 		 	= new classreporte();
	$this->leyesRedVial 		= new classreporte();
	$this->leyesAreasPro 		= new classreporte();
	$this->leyesServi			= new classreporte();
	
	$this->apro_dene 			= new classreporte();
	$this->observacion          = new classreporte();
	$this->datoszonaprivada     = new classreporte();
	$this->encabezadopatente	= new classreporte();
	$this->encabezadoconstruccion = new classreporte();


	

	$this->zonaprivada->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLista 			= $this->zonaprivada->listarZonaPrivada();

	$this->datoszonaprivada->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$datos = $this->datoszonaprivada->listardatosZonaPrivada();

	$this->desceg->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rDesceg 			= $this->desceg->listarDESCEG();
	$this->constra->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rConstra			= $this->constra->listarCons();

	$this->actdes_res->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesRes 		= $this->actdes_res->listarACTDESRES();
	$this->actdes_com->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesCom 		= $this->actdes_com->listarACTDESCOM();
	$this->actdes_com_in->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesComIn 		= $this->actdes_com_in->listarACTDESCOMIN();
	$this->actdes_desa->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesDesa 		= $this->actdes_desa->listarACTDESDESA();
	$this->actdes_es->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesEs 			= $this->actdes_es->listarACTDESES();

	$this->leyesAccesos->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAccesos 		= $this->leyesAccesos->listarLeyAccesos();
	$this->leyesDesarroSect->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesDesarroSect 	= $this->leyesDesarroSect->listarLeyDesarroSect();
	$this->leyesEspacioGeo->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesEspacioGeo 	= $this->leyesEspacioGeo->listarLeyEspacioGeo();
	$this->leyesActividades->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesActividades	= $this->leyesActividades->listarLeyActividades();
	$this->leyesAspectoBio->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAspectoBio 	= $this->leyesAspectoBio->listarLeyAspectoBio();
	$this->leyesPatente->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesPatente 		= $this->leyesPatente->listarLeyPatente();
	$this->leyesPlan->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesPlan 		= $this->leyesPlan->listarLeyPlan();
	$this->leyesRedVial->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesRedVial 		= $this->leyesRedVial->listarLeyRedVial();
	$this->leyesAreasPro->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAreasPro 	= $this->leyesAreasPro->listarLeyAreasPro();
	$this->leyesServi->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rleyesServi 		= $this->leyesServi->listarLeyServi();

	$this->apro_dene->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rApro_Dene 		= $this->apro_dene->listarR_APRO_DENE();

	$this->observacion->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$robservacion 		= $this->observacion->listarR_OBSERV_TRAMITE();

	$this->encabezadopatente->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rencabezadopatente = $this->encabezadopatente->listarencabezadoPatente();
	$this->encabezadoconstruccion->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rencabezadoconstruccion = $this->encabezadoconstruccion->listarencabezadoConstruccion();

	$pdf 				= new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFillColor(255,255,255);
	$pdf->SetFont('Arial','B',11);
	try
	{
		while ($rpantente = mysqli_fetch_array($rencabezadopatente) ) {
			$pdf->Cell(185, 5, utf8_decode($rpantente[0]), 0, 0, 'C');
		}
		while ($rconstruccion = mysqli_fetch_array($rencabezadoconstruccion) ) {
			$pdf->Cell(185, 5, utf8_decode($rconstruccion[0]), 0, 0, 'C');
		}

		$pdf->Ln(8);
		//Muestras los primeros datos que dan referencia a los nombres, planos, terrenos, numero de finca... etc
		while ($row = mysqli_fetch_array($rLista)) {
			$pdf->MultiCell(50,5,$row[0],0,1);
			while ($cons = mysqli_fetch_array($rConstra)) {
		 		$pdf->MultiCell(60,5,"DPU-".$cons[0]."-".$cons[1]."-".$cons[2],0,'L');
		 	$pdf->MultiCell(0,0,utf8_decode("Número de Trámite:"),0,0,'L');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(175,20,$row[1],0,0,'L');
		 	$pdf->MultiCell(100,5,utf8_decode("Señor(a):"));
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(100,5,utf8_decode($row[2]." ".$row[3]." ".$row[4]),0,1,'J');
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(40,5,utf8_decode("Cédula: ".$row[5]),0,1,'J');
		 	$pdf->MultiCell(23,10,"Presente",0,1,'J');
		 	$pdf->SetFont('Arial','B',10);
		 	$pdf->MultiCell(180,5,utf8_decode(
		 		"Se extiende RESOLUCIÓN MUNICIPAL DE UBICACIÓN DE USO para la Propiedad Plano G-".$row[6]." de la Finca 5-".$row[7].", Propiedad de ".$row[8]." ".$row[9]." ".$row[10].", Cédula/Jurídica ".$row[11].", Ubicada en ".$row[12].", ".$row[13].", Distrito ".$row[14].", Nicoya, indicando lo siguiente:" ),0,1,'J' );
		 	$pdf->MultiCell(190,5,utf8_decode(
		 			'Para  dicho terreno este se ubica en Zona Privada. Además el artículo 6, de la Ley 6043 indica que las disposiciones  de esta Ley no se aplicaran a las áreas situadas  en los litorales, ni a las propiedades inscritas, con  sujeción a la Ley, a nombre  de particulares, ni a aquellas cuya legitimidad reconozcan las leyes.' ),0,'J');
			$pdf->Ln(2);
			$pdf->MultiCell(190,5,utf8_decode(
		 			'Según el Plan Regulador Vigente aprobado  para el Sector costero  de Playa Samara  en las Zona Privadas no se puede aplicar  la Ley 6043, pero se  recomienda para Uso  Residencial y Turístico.' ),0,'J');
			
		 	$pdf->Ln(2);

		 	$pdf->Ln(2);
		 	$pdf->Ln(2);
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(55,5,'> Uso Actual del Suelo',0,1,'J');
		 	//Muestra los usos del suelo actual
		 	while ($as = mysqli_fetch_array($rDesceg)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$as[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	// Fin suelo actual
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(55,5,"> Actividad a Desarrollar",0,1,'J');
		 	$pdf->Ln(2);
		 	//Muestra las actividades a desarrollar
		 	while ($adr = mysqli_fetch_array($rActdesRes)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$adr[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($ades = mysqli_fetch_array($rActdesEs)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$ades[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($adci = mysqli_fetch_array($rActdesComIn)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$adci[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($add = mysqli_fetch_array($rActdesDesa)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$add[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($adc = mysqli_fetch_array($rActdesCom)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$adc[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	//Fin Actividades
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,"Se concluye: ",0,1,'J');
		 	// Inicio Leyes
		 	while ($leyA = mysqli_fetch_array($rLeyesAccesos)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyA[0]),0,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($leyPT = mysqli_fetch_array($rLeyesPatente)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyPT[0]),0,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($leyAD = mysqli_fetch_array($rLeyesActividades)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyAD[0]),0,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($leyAP = mysqli_fetch_array($rLeyesAreasPro)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyAP[0]),0,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($leyRV = mysqli_fetch_array($rLeyesRedVial)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyRV[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyAB = mysqli_fetch_array($rLeyesAspectoBio)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyAB[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyDS = mysqli_fetch_array($rLeyesDesarroSect)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyDS[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyEG = mysqli_fetch_array($rLeyesEspacioGeo)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyEG[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leySD = mysqli_fetch_array($rleyesServi)){
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leySD[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
			// Fin leyes
		 	while ($obser = mysqli_fetch_array($robservacion)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($obser[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	$pdf->MultiCell(190,5,utf8_decode(
		 			'La validez de la presente certificación está sometida a toda la normativa correspondiente vigente y al cumplimiento de los requisitos solicitados por el Ministerio de Salud amparado a un dictamen favorable de esta institución. Sin perjuicio de lo anterior para todos estos casos las molestias deberán quedar absolutamente confinadas a los límites de la propiedad.' ),0,'J');
			$pdf->Ln(2);
			
			$pdf->MultiCell(190,5,utf8_decode(
		 		'La altura máxima y la cobertura deberán estar apegadas a lo dispuesto en la Ley de Planificación Urbana, INVU, Ley  de Construcción y demás legislación vigente.' ),0,'J');
			$pdf->Ln(2);
			
			$pdf->MultiCell(190,5,utf8_decode(
		 		'Por otra parte  según Secretaria Municipal mediante  oficio SM-004-01-2007, con fecha del 03 de enero del presente año manifiesta mediante ACUERDO Nº 19 de la sesión ordinaria Nº  034 del 18 de diciembre del 2006 QUE DICE: EL  CONSEJO MUNICIPAL EN FORMA UNÁNIME APRUEBA PARA QUE, mientras se aprueba un reglamento ambiental, los permisos de construcción que involucren áreas vulnerables desde el punto de vista ecológico, de la belleza escénica  o del recurso hídrico, de previo a aprobarse, deben de tener  la anuencia de las comisiones, Ambiental y de Obras, así  como el visto bueno del Departamento Legal.' ),0,'J');

			$pdf->Ln(2);
			while ($leyP = mysqli_fetch_array($rLeyesPlan)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyP[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'Nota: Al haber aprobado la Resolución de Ubicación Municipal eso implica que se está dado el permiso para movimiento de tierra, cortes, rellenos, construcción construcción, desfogue fluvial, todo lo relacionado con obras civiles por lo que deberan ser tramitado en el momento que se requiera dicho permiso y también si la Resolución Municipal (Uso de Suelo) es positivo, no obliga a la municipalidad a otorgar la respectiva pantente, esta debe ser solicitado de conformidad con la normativa establecido por esta institución para estos efectos.' ),0,'J');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(100,5,"POR LO TANTO",0,0);
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(190,5,utf8_decode("Se ".$row[15]." la RESOLUCIÓN DE UBICACIÓN MUNICIPAL, mediante oficio DPU-".$cons[0]."-".$cons[1]."-".$cons[2].", para la Finca 5-".$row[7]." quedando sujeto a las disposiciones de la legislación vigente y en observaciones de nuestro ordenamiento jurídico, cualquier transgresión a las normas, producirá anulación del acto administrativo."),0,'J');
		 	}
		 	$pdf->Ln(1);
		 	
		 	$pdf->MultiCell(190,5,"Atentamente, ",0,1);
		 	$pdf->MultiCell(180,5,"Firma de Recibido",0,0);
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,"__________________________",0,0)	;
		 	$pdf->Ln(5);
		 	$pdf->MultiCell(190,5,utf8_decode('# Cédula: __________________________'),0,0,'R');
		 	$pdf->Ln(3);
		 	$pdf->MultiCell(190,5,utf8_decode('Fecha: __________________ Hora: __________________'),0,0,'R');
		 	$pdf->Ln(3);
		 	$pdf->MultiCell(60,5,"__________________________",0,1);
		 	$pdf->MultiCell(50,5,"Arq. Jonathan Soto Segura",0,1);
		 	$pdf->MultiCell(80,5,utf8_decode("Coordinador de Planificación Urbana"),0,1);
		 	$pdf->MultiCell(80,5,utf8_decode("Municipalidad de Nicoya"),0,1);
		 }
		 $pdf->Output();
	} catch(Exception $e){
		$pdf->Cell(30, 10, "Sin datos".$e, 0, 0, 'C');
		$pdf->Output();
	}	
}

public function rZonaArriendo() {
	$this->zonadearriendo 	 		= new classreporte();

	$this->constra 				= new classreporte();
	
	$this->actdes_res 	 		= new classreporte();
	$this->actdes_com 	 		= new classreporte();
	$this->actdes_com_in 		= new classreporte();
	$this->actdes_desa 	 		= new classreporte();
	$this->actdes_es 	 		= new classreporte();
	
	$this->desceg 		 		= new classreporte();
	
	$this->leyesAccesos 		= new classreporte();
	$this->leyesDesarroSect 	= new classreporte();
	$this->leyesEspacioGeo 		= new classreporte();
	$this->leyesActividades 	= new classreporte();
	$this->leyesAspectoBio 		= new classreporte();
	$this->leyesPatente 		= new classreporte();
	$this->leyesPlan 		 	= new classreporte();
	$this->leyesRedVial 		= new classreporte();
	$this->leyesAreasPro 		= new classreporte();
	$this->leyesServi			= new classreporte();
	
	$this->apro_dene 			= new classreporte();
	$this->observacion          = new classreporte();
	$this->datoszonadearriendo     = new classreporte();
	$this->encabezadopatente	= new classreporte();
	$this->encabezadoconstruccion = new classreporte();
	

	$this->zonadearriendo->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLista 			= $this->zonadearriendo->listarzonadearriendo();

	$this->datoszonadearriendo->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$datos = $this->datoszonadearriendo->listardatoszonadearriendo();

	$this->desceg->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rDesceg 			= $this->desceg->listarDESCEG();
	$this->constra->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rConstra			= $this->constra->listarCons();

	$this->actdes_res->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesRes 		= $this->actdes_res->listarACTDESRES();
	$this->actdes_com->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesCom 		= $this->actdes_com->listarACTDESCOM();
	$this->actdes_com_in->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesComIn 		= $this->actdes_com_in->listarACTDESCOMIN();
	$this->actdes_desa->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesDesa 		= $this->actdes_desa->listarACTDESDESA();
	$this->actdes_es->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesEs 			= $this->actdes_es->listarACTDESES();

	$this->leyesAccesos->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAccesos 		= $this->leyesAccesos->listarLeyAccesos();
	$this->leyesDesarroSect->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesDesarroSect 	= $this->leyesDesarroSect->listarLeyDesarroSect();
	$this->leyesEspacioGeo->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesEspacioGeo 	= $this->leyesEspacioGeo->listarLeyEspacioGeo();
	$this->leyesActividades->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesActividades	= $this->leyesActividades->listarLeyActividades();
	$this->leyesAspectoBio->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAspectoBio 	= $this->leyesAspectoBio->listarLeyAspectoBio();
	$this->leyesPatente->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesPatente 		= $this->leyesPatente->listarLeyPatente();
	$this->leyesPlan->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesPlan 		= $this->leyesPlan->listarLeyPlan();
	$this->leyesRedVial->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesRedVial 		= $this->leyesRedVial->listarLeyRedVial();
	$this->leyesAreasPro->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAreasPro 	= $this->leyesAreasPro->listarLeyAreasPro();
	$this->leyesServi->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rleyesServi 		= $this->leyesServi->listarLeyServi();

	$this->apro_dene->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rApro_Dene 		= $this->apro_dene->listarR_APRO_DENE();

	$this->observacion->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$robservacion 		= $this->observacion->listarR_OBSERV_TRAMITE();

	$this->encabezadopatente->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rencabezadopatente = $this->encabezadopatente->listarencabezadoPatente();
	$this->encabezadoconstruccion->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rencabezadoconstruccion = $this->encabezadoconstruccion->listarencabezadoConstruccion();


	$pdf 				= new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFillColor(255,255,255);
	$pdf->SetFont('Arial','B',11);
	try
	{
		while ($rpantente = mysqli_fetch_array($rencabezadopatente) ) {
			$pdf->Cell(185, 5, utf8_decode($rpantente[0]), 0, 0, 'C');
		}
		while ($rconstruccion = mysqli_fetch_array($rencabezadoconstruccion) ) {
			$pdf->Cell(185, 5, utf8_decode($rconstruccion[0]), 0, 0, 'C');
		}
		$pdf->Ln(8);
		//Muestras los primeros datos que dan referencia a los nombres, planos, terrenos, numero de finca... etc
		while ($row = mysqli_fetch_array($rLista)) {
			$pdf->MultiCell(50,5,$row[0],0,1);
			while ($cons = mysqli_fetch_array($rConstra)) {
		 		$pdf->MultiCell(60,5,"DPU-".$cons[0]."-".$cons[1]."-".$cons[2],0,'L');
		 	$pdf->MultiCell(0,0,utf8_decode("Número de Trámite:"),0,0,'L');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(175,20,$row[1],0,0,'L');
		 	$pdf->MultiCell(100,5,utf8_decode("Señor(a):"));
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(100,5,utf8_decode($row[2]." ".$row[3]." ".$row[4]),0,1,'J');
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(40,5,utf8_decode("Cédula: ".$row[5]),0,1,'J');
		 	$pdf->MultiCell(23,10,"Presente",0,1,'J');
		 	$pdf->SetFont('Arial','B',10);
		 	$pdf->MultiCell(180,5,utf8_decode(
		 		"Se extiende RESOLUCIÓN MUNICIPAL DE UBICACIÓN DE USO para la Propiedad Plano G-".$row[6]." de la Finca 5-".$row[7].", Propiedad de ".$row[8]." ".$row[9]." ".$row[10].", Cédula/Jurídica ".$row[11].", Ubicada en ".$row[12].", ".$row[13].", Distrito ".$row[14].", Nicoya, indicando lo siguiente:" ),0,1,'J' );
		 	$pdf->MultiCell(190,5,utf8_decode(
		 			'Según oficio Nº ZMT 00449-07  del Departamento de Zona Marítima Terrestre con fecha del  28 de mayo del 2008;  me permito  indicarle según el Plan Regulador Vigente aprobado para la zona, esta propiedad pertenece al sector determinado por los siguientes términos: Zona  Residencial en Arriendo.' ),0,'J');
			$pdf->Ln(2);
			$pdf->MultiCell(190,5,utf8_decode(
		 			'Esta es la parte de la zona restringida que se dedica a las concesiones para uso residencial – recreativo de acuerdo a la ley 6043. Incluye tanto a aquellos lotes existentes y que cumplen con la Ley  6043, como los  que resultan del nuevo ordenamiento establecido por el Plan Regulador.' ),0,'J');
			

		 	$pdf->Ln(2);

			$pdf->MultiCell(190,5,utf8_decode(
		 			'Mojón 23 a mojón 24 (sector medio)' ),0,'J');
			$pdf->MultiCell(190,5,utf8_decode(
		 			'Mojón 19 + 140 mtrs a Mojón 20 + 30 mts' ),0,'J');
			$pdf->MultiCell(190,5,utf8_decode(
		 			'Mojón 17  + 40 mtrs a Mojón 19' ),0,'J');
			$pdf->MultiCell(190,5,utf8_decode(
		 			'Mojón 15 a Mojón 15+100 mtrs' ),0,'J');
			$pdf->MultiCell(190,5,utf8_decode(
		 			'Mojón 14 a Mojón 14 + 200 mtrs' ),0,'J');
			$pdf->MultiCell(190,5,utf8_decode(
		 			'Mojón 12 + 60 mtrs a Mojón 13+ 140 mtrs (sector anterior y posterior)' ),0,'J');
			$pdf->MultiCell(190,5,utf8_decode(
		 			'Mojón 5 + 70 mtrs  a Mojón  9' ),0,'J');
			$pdf->Ln(2);

			$pdf->MultiCell(190,5,utf8_decode(
		 			'Los usos permitidos  son los siguientes:' ),0,'J');
			$pdf->MultiCell(190,5,utf8_decode(
		 			'Viviendas, Ranchos, Deportes.' ),0,'J');
			$pdf->Ln(2);
			$pdf->MultiCell(190,5,utf8_decode(
		 			'Usos condicionales:' ),0,'J');
			$pdf->MultiCell(190,5,utf8_decode(
		 			'Cabinas, Comercio Turístico, Puesto de  frutas y  artesanía.' ),0,'J');
			$pdf->Ln(2);
			$pdf->MultiCell(190,5,utf8_decode(
		 			'Usos  prohibidos:' ),0,'J');
			$pdf->MultiCell(190,5,utf8_decode(
		 			'Industrias, Centro comerciales, Almacenes, Depósitos de materiales, Talleres o cualquier otro tipo de instalación que emita ruido, humo, vibración.' ),0,'J');

			$pdf->Ln(2);

			$pdf->MultiCell(190,5,utf8_decode(
		 			'Requisitos:' ),0,'J');
			$pdf->MultiCell(190,5,utf8_decode(
		 			'Superficie mínima    300 m²' ),0,'J');
			$pdf->MultiCell(190,5,utf8_decode(
		 			'Superficie máxima   200 m²' ),0,'J');
			$pdf->MultiCell(190,5,utf8_decode(
		 			'Frente mínimo          15 m² ' ),0,'J');
			$pdf->MultiCell(190,5,utf8_decode(
		 			'Frente máximo          30 m² ' ),0,'J');
			$pdf->MultiCell(190,5,utf8_decode(
		 			'Retiro frontal             5 m²' ),0,'J');
			$pdf->MultiCell(190,5,utf8_decode(
		 			'Retiro Lateral            3 m²' ),0,'J');
			$pdf->MultiCell(190,5,utf8_decode(
		 			'Cobertura máxima  60%' ),0,'J');
			$pdf->MultiCell(190,5,utf8_decode(
		 			'Altura máxima          10 m²' ),0,'J');
			
		 	$pdf->Ln(2);
		 	$pdf->Ln(2);
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(55,5,'> Uso Actual del Suelo',0,1,'J');
		 	//Muestra los usos del suelo actual
		 	while ($as = mysqli_fetch_array($rDesceg)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$as[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	// Fin suelo actual
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(55,5,"> Actividad a Desarrollar",0,1,'J');
		 	$pdf->Ln(2);
		 	//Muestra las actividades a desarrollar
		 	while ($adr = mysqli_fetch_array($rActdesRes)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$adr[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($ades = mysqli_fetch_array($rActdesEs)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$ades[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($adci = mysqli_fetch_array($rActdesComIn)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$adci[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($add = mysqli_fetch_array($rActdesDesa)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$add[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($adc = mysqli_fetch_array($rActdesCom)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$adc[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	//Fin Actividades
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,"Se concluye: ",0,1,'J');
		 	// Inicio Leyes
		 	while ($leyA = mysqli_fetch_array($rLeyesAccesos)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyA[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyPT = mysqli_fetch_array($rLeyesPatente)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyPT[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyAD = mysqli_fetch_array($rLeyesActividades)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyAD[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyAP = mysqli_fetch_array($rLeyesAreasPro)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyAP[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyRV = mysqli_fetch_array($rLeyesRedVial)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyRV[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyAB = mysqli_fetch_array($rLeyesAspectoBio)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyAB[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyDS = mysqli_fetch_array($rLeyesDesarroSect)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyDS[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyEG = mysqli_fetch_array($rLeyesEspacioGeo)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyEG[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leySD = mysqli_fetch_array($rleyesServi)){
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leySD[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
			// Fin leyes
		 	while ($obser = mysqli_fetch_array($robservacion)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($obser[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	$pdf->MultiCell(190,5,utf8_decode(
		 			'La validez de la presente certificación está sometida a toda la normativa correspondiente vigente y al cumplimiento de los requisitos solicitados por el Ministerio de Salud amparado a un dictamen favorable de esta institución. Sin perjuicio de lo anterior para todos estos casos las molestias deberán quedar absolutamente confinadas a los límites de la propiedad.' ),0,'J');
			$pdf->Ln(2);
			$pdf->MultiCell(190,5,utf8_decode(
		 		'Debiendo coordinar el permiso de corta de árboles existente en la propiedad ante el MINAE. La altura máxima y la cobertura deberán estar apegadas a lo dispuesto en la Ley de Planificación Urbana, Ley de Uso, Manejo y Conservación de Suelo N° 7779, Ley forestal N°7575 y demás Legislación Vigente. Si se realiza movimientos de Tierra se debe solicitar el permiso Respectivo ante el departamento de Control Constructivo.' ),0,'J');
			$pdf->Ln(2);
			$pdf->MultiCell(190,5,utf8_decode(
		 		'La altura máxima y la cobertura deberán estar apegadas a lo dispuesto en la Ley de Planificación Urbana, INVU, Ley  de Construcción y demás legislación vigente.' ),0,'J');
			$pdf->Ln(2);
			$pdf->MultiCell(190,5,utf8_decode(
		 		'Si en la propiedad se va construir, toda posible molestia debe quedar completamente confinada dentro del inmueble; así como se debe realizar todos los análisis para verificar la viabilidad ambiental, económico, vial, patrimonial, de afectaciones, de infraestructura, de mecánica de Suelos, de escorrentía, de riesgos naturales, de disponibilidad de servicios, de transporte público, etc., para conocer si realmente la propiedad en este caso privada es apta para la construcción de este tipo de proyecto.' ),0,'J');
			$pdf->Ln(2);
			$pdf->MultiCell(190,5,utf8_decode(
		 		'Por otra parte  según Secretaria Municipal mediante  oficio SM-004-01-2007, con fecha del 03 de enero del presente año manifiesta mediante ACUERDO Nº 19 de la sesión ordinaria Nº  034 del 18 de diciembre del 2006 QUE DICE: EL  CONSEJO MUNICIPAL EN FORMA UNÁNIME APRUEBA PARA QUE, mientras se aprueba un reglamento ambiental, los permisos de construcción que involucren áreas vulnerables desde el punto de vista ecológico, de la belleza escénica  o del recurso hídrico, de previo a aprobarse, deben de tener  la anuencia de las comisiones, Ambiental y de Obras, así  como el visto bueno del Departamento Legal.' ),0,'J');
			$pdf->Ln(2);
			while ($leyP = mysqli_fetch_array($rLeyesPlan)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyP[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'Nota: Al haber aprobado la Resolución de Ubicación Municipal eso implica que se está dado el permiso para movimiento de tierra, cortes, rellenos, construcción construcción, desfogue fluvial, todo lo relacionado con obras civiles por lo que deberan ser tramitado en el momento que se requiera dicho permiso y también si la Resolución Municipal (Uso de Suelo) es positivo, no obliga a la municipalidad a otorgar la respectiva pantente, esta debe ser solicitado de conformidad con la normativa establecido por esta institución para estos efectos.' ),0,'J');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(100,5,"Por tanto",0,0);
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(190,5,utf8_decode("Se ".$row[15]." la RESOLUCIÓN DE UBICACIÓN MUNICIPAL, mediante oficio DPU-".$cons[0]."-".$cons[1]."-".$cons[2].", para la Finca 5-".$row[7]." quedando sujeto a las disposiciones de la legislación vigente y en observaciones de nuestro ordenamiento jurídico, cualquier transgresión a las normas, producirá anulación del acto administrativo."),0,'J');
		 	}
		 	$pdf->Ln(1);
		 	
		 	$pdf->MultiCell(190,5,"Atentamente, ",0,1);
		 	$pdf->MultiCell(180,5,"Firma de Recibido",0,0);
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,"__________________________",0,0)	;
		 	$pdf->Ln(5);
		 	$pdf->MultiCell(190,5,utf8_decode('# Cédula: __________________________'),0,0,'R');
		 	$pdf->Ln(3);
		 	$pdf->MultiCell(190,5,utf8_decode('Fecha: __________________ Hora: __________________'),0,0,'R');
		 	$pdf->Ln(3);
		 	$pdf->MultiCell(60,5,"__________________________",0,1);
		 	$pdf->MultiCell(50,5,"Arq. Jonathan Soto Segura",0,1);
		 	$pdf->MultiCell(80,5,utf8_decode("Coordinador de Planificación Urbana"),0,1);
		 	$pdf->MultiCell(80,5,utf8_decode("Municipalidad de Nicoya"),0,1);
		 }
		 $pdf->Output();
	} catch(Exception $e){
		$pdf->Cell(30, 10, "Sin datos".$e, 0, 0, 'C');
		$pdf->Output();
	}
}

public function rZonaHotelera(){

	$this->zonahotelera 	 		= new classreporte();

	$this->constra 				= new classreporte();
	
	$this->actdes_res 	 		= new classreporte();
	$this->actdes_com 	 		= new classreporte();
	$this->actdes_com_in 		= new classreporte();
	$this->actdes_desa 	 		= new classreporte();
	$this->actdes_es 	 		= new classreporte();
	
	$this->desceg 		 		= new classreporte();
	
	$this->leyesAccesos 		= new classreporte();
	$this->leyesDesarroSect 	= new classreporte();
	$this->leyesEspacioGeo 		= new classreporte();
	$this->leyesActividades 	= new classreporte();
	$this->leyesAspectoBio 		= new classreporte();
	$this->leyesPatente 		= new classreporte();
	$this->leyesPlan 		 	= new classreporte();
	$this->leyesRedVial 		= new classreporte();
	$this->leyesAreasPro 		= new classreporte();
	$this->leyesServi			= new classreporte();
	
	$this->apro_dene 			= new classreporte();
	$this->observacion          = new classreporte();
	$this->datoszonahotelera     = new classreporte();
	$this->encabezadopatente	= new classreporte();
	$this->encabezadoconstruccion = new classreporte();

	

	$this->zonahotelera->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLista 			= $this->zonahotelera->listarzonahotelera();

	$this->datoszonahotelera->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$datos = $this->datoszonahotelera->listardatoszonahotelera();

	$this->desceg->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rDesceg 			= $this->desceg->listarDESCEG();
	$this->constra->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rConstra			= $this->constra->listarCons();

	$this->actdes_res->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesRes 		= $this->actdes_res->listarACTDESRES();
	$this->actdes_com->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesCom 		= $this->actdes_com->listarACTDESCOM();
	$this->actdes_com_in->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesComIn 		= $this->actdes_com_in->listarACTDESCOMIN();
	$this->actdes_desa->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesDesa 		= $this->actdes_desa->listarACTDESDESA();
	$this->actdes_es->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesEs 			= $this->actdes_es->listarACTDESES();

	$this->leyesAccesos->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAccesos 		= $this->leyesAccesos->listarLeyAccesos();
	$this->leyesDesarroSect->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesDesarroSect 	= $this->leyesDesarroSect->listarLeyDesarroSect();
	$this->leyesEspacioGeo->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesEspacioGeo 	= $this->leyesEspacioGeo->listarLeyEspacioGeo();
	$this->leyesActividades->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesActividades	= $this->leyesActividades->listarLeyActividades();
	$this->leyesAspectoBio->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAspectoBio 	= $this->leyesAspectoBio->listarLeyAspectoBio();
	$this->leyesPatente->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesPatente 		= $this->leyesPatente->listarLeyPatente();
	$this->leyesPlan->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesPlan 		= $this->leyesPlan->listarLeyPlan();
	$this->leyesRedVial->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesRedVial 		= $this->leyesRedVial->listarLeyRedVial();
	$this->leyesAreasPro->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAreasPro 	= $this->leyesAreasPro->listarLeyAreasPro();
	$this->leyesServi->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rleyesServi 		= $this->leyesServi->listarLeyServi();

	$this->apro_dene->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rApro_Dene 		= $this->apro_dene->listarR_APRO_DENE();

	$this->observacion->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$robservacion 		= $this->observacion->listarR_OBSERV_TRAMITE();

	$this->encabezadopatente->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rencabezadopatente = $this->encabezadopatente->listarencabezadoPatente();
	$this->encabezadoconstruccion->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rencabezadoconstruccion = $this->encabezadoconstruccion->listarencabezadoConstruccion();

	$pdf 				= new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFillColor(255,255,255);
	$pdf->SetFont('Arial','B',11);
	try
	{
		while ($rpantente = mysqli_fetch_array($rencabezadopatente) ) {
			$pdf->Cell(185, 5, utf8_decode($rpantente[0]), 0, 0, 'C');
		}
		while ($rconstruccion = mysqli_fetch_array($rencabezadoconstruccion) ) {
			$pdf->Cell(185, 5, utf8_decode($rconstruccion[0]), 0, 0, 'C');
		}

		$pdf->Ln(8);
		//Muestras los primeros datos que dan referencia a los nombres, planos, terrenos, numero de finca... etc
		while ($row = mysqli_fetch_array($rLista)) {
			$pdf->MultiCell(50,5,$row[0],0,1);
			while ($cons = mysqli_fetch_array($rConstra)) {
		 		$pdf->MultiCell(60,5,"DPU-".$cons[0]."-".$cons[1]."-".$cons[2],0,'L');
		 	$pdf->MultiCell(0,0,utf8_decode("Número de Trámite:"),0,0,'L');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(175,20,$row[1],0,0,'L');
		 	$pdf->MultiCell(100,5,utf8_decode("Señor(a):"));
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(100,5,utf8_decode($row[2]." ".$row[3]." ".$row[4]),0,1,'J');
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(40,5,utf8_decode("Cédula: ".$row[5]),0,1,'J');
		 	$pdf->MultiCell(23,10,"Presente",0,1,'J');
		 	$pdf->SetFont('Arial','B',10);
		 	$pdf->MultiCell(180,5,utf8_decode(
		 		"Se extiende RESOLUCIÓN MUNICIPAL DE UBICACIÓN DE USO para la Propiedad Plano G-".$row[6]." de la Finca 5-".$row[7].", Propiedad de ".$row[8]." ".$row[9]." ".$row[10].", Cédula/Jurídica ".$row[11].", Ubicada en ".$row[12].", ".$row[13].", Distrito ".$row[14].", Nicoya, indicando lo siguiente:" ),0,1,'J' );
		 	$pdf->MultiCell(190,5,utf8_decode(
		 			'La zona donde se encuentra esta propiedad es Zona Hotelera según el Plan Regulador Vigente del Cantón de Samara. ' ),0,'J');
			$pdf->Ln(2);
			
			

		 	$pdf->Ln(2);

		 	$pdf->MultiCell(190,5,utf8_decode(
		 			'Usos permitidos: Hotel, motel, cabinas, apartamentos, restaurante, cafetería, bar, deportes que cuenten con la aprobación del Ministerio de Economía, Industria y Comercio, Ministerio de Salud, Instituto Costarricense de Acueductos y Alcantarillados, Dirección de Urbanismo y Municipalidad, y cualquier otro organismo que deba dar su aprobación.' ),0,'J');
		 	$pdf->Ln(2);

		 	$pdf->MultiCell(190,5,utf8_decode(
		 			'Prohibiciones: Cualquier instalación que no sea estrictamente turística.' ),0,'J');

		 	$pdf->Ln(2);
		 	$pdf->MultiCell(55,5,'> Uso Actual del Suelo',0,1,'J');
		 	//Muestra los usos del suelo actual
		 	while ($as = mysqli_fetch_array($rDesceg)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$as[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	// Fin suelo actual
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(55,5,"> Actividad a Desarrollar",0,1,'J');
		 	$pdf->Ln(2);
		 	//Muestra las actividades a desarrollar
		 	while ($adr = mysqli_fetch_array($rActdesRes)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$adr[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($ades = mysqli_fetch_array($rActdesEs)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$ades[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($adci = mysqli_fetch_array($rActdesComIn)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$adci[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($add = mysqli_fetch_array($rActdesDesa)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$add[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($adc = mysqli_fetch_array($rActdesCom)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$adc[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	//Fin Actividades
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,"Se concluye: ",0,1,'J');
		 	$pdf->MultiCell(190,5,utf8_decode(
		 			'Uso Conforme de Resolución Municipal de Ubicación con el proyecto a realizar, debe de cumplir' ),0,'J');
		 	// Inicio Leyes
		 	while ($leyA = mysqli_fetch_array($rLeyesAccesos)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyA[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyPT = mysqli_fetch_array($rLeyesPatente)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyPT[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyAD = mysqli_fetch_array($rLeyesActividades)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyAD[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyAP = mysqli_fetch_array($rLeyesAreasPro)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyAP[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyRV = mysqli_fetch_array($rLeyesRedVial)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyRV[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyAB = mysqli_fetch_array($rLeyesAspectoBio)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyAB[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyDS = mysqli_fetch_array($rLeyesDesarroSect)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyDS[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyEG = mysqli_fetch_array($rLeyesEspacioGeo)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyEG[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leySD = mysqli_fetch_array($rleyesServi)){
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leySD[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
			// Fin leyes
		 	while ($obser = mysqli_fetch_array($robservacion)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($obser[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		
			$pdf->Ln(2);
			while ($leyP = mysqli_fetch_array($rLeyesPlan)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyP[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'Nota: Al haber aprobado la Resolución de Ubicación Municipal eso implica que se está dado el permiso para movimiento de tierra, cortes, rellenos, construcción construcción, desfogue fluvial, todo lo relacionado con obras civiles por lo que deberan ser tramitado en el momento que se requiera dicho permiso y también si la Resolución Municipal (Uso de Suelo) es positivo, no obliga a la municipalidad a otorgar la respectiva pantente, esta debe ser solicitado de conformidad con la normativa establecido por esta institución para estos efectos.' ),0,'J');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(100,5,"Por tanto",0,0);
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(190,5,utf8_decode("Se ".$row[15]." la RESOLUCIÓN DE UBICACIÓN MUNICIPAL, mediante oficio DPU-".$cons[0]."-".$cons[1]."-".$cons[2].", para la Finca 5-".$row[7]." quedando sujeto a las disposiciones de la legislación vigente y en observaciones de nuestro ordenamiento jurídico, cualquier transgresión a las normas, producirá anulación del acto administrativo."),0,'J');
		 	}
		 	$pdf->Ln(1);
		 	
		 	$pdf->MultiCell(190,5,"Atentamente, ",0,1);
		 	$pdf->MultiCell(180,5,"Firma de Recibido",0,0);
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,"__________________________",0,0)	;
		 	$pdf->Ln(5);
		 	$pdf->MultiCell(190,5,utf8_decode('# Cédula: __________________________'),0,0,'R');
		 	$pdf->Ln(3);
		 	$pdf->MultiCell(190,5,utf8_decode('Fecha: __________________ Hora: __________________'),0,0,'R');
		 	$pdf->Ln(3);
		 	$pdf->MultiCell(60,5,"__________________________",0,1);
		 	$pdf->MultiCell(50,5,"Arq. Jonathan Soto Segura",0,1);
		 	$pdf->MultiCell(80,5,utf8_decode("Coordinador de Planificación Urbana"),0,1);
		 	$pdf->MultiCell(80,5,utf8_decode("Municipalidad de Nicoya"),0,1);
		 }
		 $pdf->Output();
	} catch(Exception $e){
		$pdf->Cell(30, 10, "Sin datos".$e, 0, 0, 'C');
		$pdf->Output();
	}
}

//Fin Samara }

public function rFueraPlanRegulador(){
	$this->fueraplan   			= new classreporte();

	$this->constra 				= new classreporte();
	
	$this->actdes_res 	 		= new classreporte();
	$this->actdes_com 	 		= new classreporte();
	$this->actdes_com_in 		= new classreporte();
	$this->actdes_desa 	 		= new classreporte();
	$this->actdes_es 	 		= new classreporte();
	
	$this->desceg 		 		= new classreporte();
	
	$this->leyesAccesos 		= new classreporte();
	$this->leyesDesarroSect 	= new classreporte();
	$this->leyesEspacioGeo 		= new classreporte();
	$this->leyesActividades 	= new classreporte();
	$this->leyesAspectoBio 		= new classreporte();
	$this->leyesPatente 		= new classreporte();
	$this->leyesPlan 		 	= new classreporte();
	$this->leyesRedVial 		= new classreporte();
	$this->leyesAreasPro 		= new classreporte();
	$this->leyesServi			= new classreporte();
	
	$this->apro_dene 			= new classreporte();
	$this->observacion          = new classreporte();
	$this->fototramite 			= new classreporte();
	$this->datosresiprivada     = new classreporte();
	$this->observaResidencial   =new classreporte();
	$this->observaDesarrollo   =new classreporte();

	$this->encabezadopatente	= new classreporte();
	$this->encabezadoconstruccion = new classreporte();

	

	$this->fueraplan->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLista 			= $this->fueraplan->listarFueraPLan();

	$this->desceg->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rDesceg 			= $this->desceg->listarDESCEG();
	$this->constra->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rConstra			= $this->constra->listarCons();

	$this->actdes_res->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesRes 		= $this->actdes_res->listarACTDESRES();
	$this->actdes_com->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesCom 		= $this->actdes_com->listarACTDESCOM();
	$this->actdes_com_in->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesComIn 		= $this->actdes_com_in->listarACTDESCOMIN();
	$this->actdes_desa->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesDesa 		= $this->actdes_desa->listarACTDESDESA();
	$this->actdes_es->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesEs 			= $this->actdes_es->listarACTDESES();

	$this->leyesAccesos->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAccesos 		= $this->leyesAccesos->listarLeyAccesos();
	$this->leyesDesarroSect->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesDesarroSect 	= $this->leyesDesarroSect->listarLeyDesarroSect();
	$this->leyesEspacioGeo->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesEspacioGeo 	= $this->leyesEspacioGeo->listarLeyEspacioGeo();
	$this->leyesActividades->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesActividades	= $this->leyesActividades->listarLeyActividades();
	$this->leyesAspectoBio->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAspectoBio 	= $this->leyesAspectoBio->listarLeyAspectoBio();
	$this->leyesPatente->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesPatente 		= $this->leyesPatente->listarLeyPatente();
	$this->leyesPlan->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesPlan 		= $this->leyesPlan->listarLeyPlan();
	$this->leyesRedVial->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesRedVial 		= $this->leyesRedVial->listarLeyRedVial();
	$this->leyesAreasPro->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAreasPro 	= $this->leyesAreasPro->listarLeyAreasPro();
	$this->leyesServi->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rleyesServi 		= $this->leyesServi->listarLeyServi();

	$this->apro_dene->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rApro_Dene 		= $this->apro_dene->listarR_APRO_DENE();

	$this->observacion->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$robservacion 		= $this->observacion->listarR_OBSERV_TRAMITE();

	$this->fototramite->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rFoto				= $this->fototramite->listarFotoTramite();


	$this->observaResidencial->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rObservaResiden				= $this->observaResidencial->listar_ObserResidencial();

	$this->observaDesarrollo->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rObservaDesarrollo				= $this->observaDesarrollo->listar_ObserDesarrollo();


	$this->encabezadopatente->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rencabezadopatente = $this->encabezadopatente->listarencabezadoPatente();
	$this->encabezadoconstruccion->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rencabezadoconstruccion = $this->encabezadoconstruccion->listarencabezadoConstruccion();


	$pdf 				= new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFillColor(255,255,255);
	$pdf->SetFont('Arial','B',11);
	try
	{
		while ($rpantente = mysqli_fetch_array($rencabezadopatente) ) {
			$pdf->Cell(185, 5, utf8_decode($rpantente[0]), 0, 0, 'C');
		}
		while ($rconstruccion = mysqli_fetch_array($rencabezadoconstruccion) ) {
			$pdf->Cell(185, 5, utf8_decode($rconstruccion[0]), 0, 0, 'C');
		}
		$pdf->Ln(5);
		//Muestras los primeros datos que dan referencia a los nombres, planos, terrenos, numero de finca... etc
		while ($row = mysqli_fetch_array($rLista)) {
			$pdf->MultiCell(50,5,$row[0],0,1);
			// Inicio Consecutivo
			while ($cons = mysqli_fetch_array($rConstra)) {
		 		$pdf->MultiCell(60,5,"DPU-".$cons[0]."-".$cons[1]."-".$cons[2],0,'L');
		 	$pdf->MultiCell(0,0,utf8_decode("Número de Trámite:"),0,0,'L');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(175,20,$row[1],0,0,'L');
		 	$pdf->MultiCell(100,5,utf8_decode("Señor(a):"));
		 	$pdf->Ln(1);  
		 	$pdf->MultiCell(100,5,utf8_decode($row[2]." ".$row[3]." ".$row[4]),0,1,'J');
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(40,5,utf8_decode("Cédula: ".$row[5]),0,1,'J');
		 	$pdf->MultiCell(23,10,"Presente",0,1,'J');
		 	$pdf->SetFont('Arial','B',10);
		 	$pdf->MultiCell(180,5,utf8_decode(
		 		"Se extiende RESOLUCIÓN MUNICIPAL DE UBICACIÓN DE USO para la Propiedad Plano G-".$row[6]." de la Finca 5-".$row[7].", Propiedad de ".$row[8]." ".$row[9]." ".$row[10].", Cédula/Jurídica ".$row[11].", Ubicada en ".$row[12].", ".$row[13].", Distrito ".$row[14].", Nicoya; indicando lo siguiente:" ),0,1,'J' );
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'La zona donde se encuentra esta propiedad está fuera de los limites del Plan Regulador.' ),0,'J');
		 	$pdf->Ln(3);
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'Acatando la resolución de la Procuraduría General de la República bajo el dictamen C-312-2015 donde se manifiesta que el certificado de uso de suelo es de competencia municipal exista o no plan regulador.' ),0,'J');
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'* Cobertura máxima: Ver artículo V.I del Reglamento de Construcciones.' ),0,'J');
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'* Densidad máxima: Ver artículo VI.4 del Reglamento de Construcciones.' ),0,'J');
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'* Altura de la edificación: Ver artículo V.2 del Reglamento de Construcciones.' ),0,'J');
		 	$pdf->Ln(4);
		 	$pdf->MultiCell(55,5,'> Uso Actual del Suelo',0,1,'J');
		 	//Muestra los usos del suelo actual
		 	while ($as = mysqli_fetch_array($rDesceg)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$as[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	// Fin suelo actual
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(55,5,"> Actividad a Desarrollar",0,1,'J');
		 	$pdf->Ln(2);
		 	//Muestra las actividades a desarrollar
		 	while ($adr = mysqli_fetch_array($rActdesRes)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$adr[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($ades = mysqli_fetch_array($rActdesEs)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$ades[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($adci = mysqli_fetch_array($rActdesComIn)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$adci[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($add = mysqli_fetch_array($rActdesDesa)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$add[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($adc = mysqli_fetch_array($rActdesCom)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(100,5,utf8_decode("* ".$adc[0]."."),0,1,'J');
		 		$pdf->Ln(1);
		 	}
		 	while ($obserResi = mysqli_fetch_array($rObservaResiden)) {
		 		
		 		$pdf->MultiCell(190,5,utf8_decode($obserResi[0]),0,'J');
		 		
		 	}
		 	while ($obserDesarrollo = mysqli_fetch_array($rObservaDesarrollo)) {
		 		
		 		$pdf->MultiCell(190,5,utf8_decode($obserDesarrollo[0]),0,'J');
		 		
		 	}

		 	///
		 	
		 	//Fin Actividades
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,"Se concluye: ",0,1,'J');

		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'Uso de Suelo Conforme de Resolución Municipal de Ubicación con el proyecto a realizar, condicionado a contar con la disponibilidad de agua para el proyecto a realizar por parte de la entidad competente (Asada o AyA). Basado en el Decreto de Sequía N° 38642-MP-MAG.' ),0,'J');
		 	$pdf->Ln(1);
		 	///observaciones
		 	while ($obser = mysqli_fetch_array($robservacion)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($obser[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	/// fin de observaciones
		 	while ($leyA = mysqli_fetch_array($rLeyesAccesos)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyA[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'Si se realiza movimientos de Tierra se debe solicitar el permiso Respectivo ante el departamento de Control Constructivo.' ),0,'J');
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'De requerirse remodelar, ampliar, renovar o reparar la infraestructura , se requiere del trámite de la licencia municipal de construcción, para lo cual deberá sujetarse a las regulaciones estipuladas en el reglamento de construcciones, publicado en el diario oficial La Gaceta N°56, alcance N.º 17 del 11 de marzo de 1983 y sus reformas, así como lo indicado en la ley N°833 de noviembre de 1949 Ley de construcciones , así mismo,  cumplir con la normativa ambiental, sanitaria, urbanística y otras vigentes que regulen los procesos constructivos.' ),0,'J');
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'La altura máxima y la cobertura deberán estar apegadas a lo dispuesto en la Ley de Planificación Urbana, Ley de Uso, Manejo y Conservación de Suelo N° 7779, Ley forestal N°7575 y demás Legislación Vigente.' ),0,'J');
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'De previo a desarrollar el proyecto debe garantizar que toda posible molestia debe quedar completamente confinada dentro del inmueble; así como realizar todos los análisis para verificar la viabilidad ambiental, vial, patrimonial, de afectaciones de las aguas pluviales, de infraestructura, de mecánica de suelos, de escorrentía, de riesgos naturales, de disponibilidad de servicios, de transporte público, etc., para conocer si realmente la propiedad en este caso privada es apta para la construcción de este tipo de proyecto.' ),0,'J');
		 	$pdf->Ln(1);

		 	// Inicio Leyes
		 	
		 	while ($leyPT = mysqli_fetch_array($rLeyesPatente)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyPT[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyAD = mysqli_fetch_array($rLeyesActividades)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyAD[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyAP = mysqli_fetch_array($rLeyesAreasPro)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyAP[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyRV = mysqli_fetch_array($rLeyesRedVial)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyRV[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyAB = mysqli_fetch_array($rLeyesAspectoBio)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyAB[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyDS = mysqli_fetch_array($rLeyesDesarroSect)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyDS[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leyEG = mysqli_fetch_array($rLeyesEspacioGeo)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyEG[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	while ($leySD = mysqli_fetch_array($rleyesServi)){
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leySD[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
			// Fin leyes
		 	
			while ($leyP = mysqli_fetch_array($rLeyesPlan)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($leyP[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'Nota: Al haber aprobado la Resolución de Ubicación Municipal eso implica que se está dado el permiso para movimiento de tierra, cortes, rellenos, construcción construcción, desfogue fluvial, todo lo relacionado con obras civiles por lo que deberan ser tramitado en el momento que se requiera dicho permiso y también si la Resolución Municipal (Uso de Suelo) es positivo, no obliga a la municipalidad a otorgar la respectiva pantente, esta debe ser solicitado de conformidad con la normativa establecido por esta institución para estos efectos.' ),0,'J');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(100,5,"POR TANTO",0,0);
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(190,5,utf8_decode("Se ".$row[15]." la RESOLUCIÓN DE UBICACIÓN MUNICIPAL, mediante oficio DPU-".$cons[0]."-".$cons[1]."-".$cons[2].", para la Finca 5-".$row[7].", quedando sujeto a las disposiciones de la legislación vigente y en observaciones de nuestro ordenamiento jurídico, cualquier transgresión a las normas, producirá anulación del acto administrativo."),0,'J');
		 	}// Finaliza Consecutivo
		 	$pdf->Ln(1);
		 	
		 	$pdf->MultiCell(190,5,"Atentamente, ",0,1);
		 	$pdf->MultiCell(180,5,"Firma de Recibido",0,0);
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,"__________________________",0,0)	;
		 	$pdf->Ln(5);
		 	$pdf->MultiCell(190,5,utf8_decode('# Cédula: __________________________'),0,0,'R');
		 	$pdf->Ln(3);
		 	$pdf->MultiCell(190,5,utf8_decode('Fecha: __________________ Hora: __________________'),0,0,'R');
		 	$pdf->Ln(3);
		 	$pdf->MultiCell(60,5,"__________________________",0,1);
		 	$pdf->MultiCell(50,5,"Arq. Jonathan Soto Segura",0,1);
		 	$pdf->MultiCell(80,5,utf8_decode("Coordinador de Planificación Urbana"),0,1);
		 	$pdf->MultiCell(80,5,utf8_decode("Municipalidad de Nicoya"),0,1);
		 	/*while ($foto = mysqli_fetch_array($rFoto)) {
		 		$pdf->Ln();
		 		$pdf->MultiCell(100,5,$pdf->Image('ImagenIngresoTra/'.$foto[0], $pdf->GetX()+50, $pdf->GetY(), 100),0,'J');
		 		$pdf->Ln(10);
		 	}*/ //Man no es necesario poner otro ciclo, ya que el ciclo trae todas las imagenes que tiene ese reporte.
		 	$pdf->Ln(50);
		 	$pdf->Ln(50);
		 	$pdf->Ln(50);
		 	while ($foto = mysqli_fetch_array($rFoto)) {
		 		$pdf->Ln();
		 		$pdf->MultiCell(100,5,$pdf->Image('ImagenIngresoTra/'.$foto[0], $pdf->GetX()+50, $pdf->GetY(), 100),0,'J');
		 		$pdf->Ln(10);
		 	}
		 	$pdf->Ln(50);
		}
		$pdf->Output();
	} catch(Exception $e){
		$pdf->Cell(30, 10, "Sin datos".$e, 0, 0, 'C');
		$pdf->Output();
	}
}

public function rDarInta(){
	$this->DarInta   			= new classreporte();

	$this->constra 				= new classreporte();
	
	$this->actdes_res 	 		= new classreporte();
	$this->actdes_com 	 		= new classreporte();
	$this->actdes_com_in 		= new classreporte();
	$this->actdes_desa 	 		= new classreporte();
	$this->actdes_es 	 		= new classreporte();
	
	$this->desceg 		 		= new classreporte();
	
	$this->leyesAccesos 		= new classreporte();
	$this->leyesDesarroSect 	= new classreporte();
	$this->leyesEspacioGeo 		= new classreporte();
	$this->leyesActividades 	= new classreporte();
	$this->leyesAspectoBio 		= new classreporte();
	$this->leyesPatente 		= new classreporte();
	$this->leyesPlan 		 	= new classreporte();
	$this->leyesRedVial 		= new classreporte();
	$this->leyesAreasPro 		= new classreporte();
	$this->leyesServi			= new classreporte();
	
	$this->apro_dene 			= new classreporte();
	$this->observacion          = new classreporte();
	$this->datosresiprivada     = new classreporte();

	$this->DarInta->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLista 			= $this->DarInta->listarDarInta();

	$this->desceg->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rDesceg 			= $this->desceg->listarDESCEG();
	$this->constra->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rConstra			= $this->constra->listarCons();

	$this->actdes_res->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesRes 		= $this->actdes_res->listarACTDESRES();
	$this->actdes_com->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesCom 		= $this->actdes_com->listarACTDESCOM();
	$this->actdes_com_in->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesComIn 		= $this->actdes_com_in->listarACTDESCOMIN();
	$this->actdes_desa->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesDesa 		= $this->actdes_desa->listarACTDESDESA();
	$this->actdes_es->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesEs 			= $this->actdes_es->listarACTDESES();

	$this->leyesAccesos->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAccesos 		= $this->leyesAccesos->listarLeyAccesos();
	$this->leyesDesarroSect->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesDesarroSect 	= $this->leyesDesarroSect->listarLeyDesarroSect();
	$this->leyesEspacioGeo->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesEspacioGeo 	= $this->leyesEspacioGeo->listarLeyEspacioGeo();
	$this->leyesActividades->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesActividades	= $this->leyesActividades->listarLeyActividades();
	$this->leyesAspectoBio->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAspectoBio 	= $this->leyesAspectoBio->listarLeyAspectoBio();
	$this->leyesPatente->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesPatente 		= $this->leyesPatente->listarLeyPatente();
	$this->leyesPlan->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesPlan 		= $this->leyesPlan->listarLeyPlan();
	$this->leyesRedVial->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesRedVial 		= $this->leyesRedVial->listarLeyRedVial();
	$this->leyesAreasPro->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAreasPro 	= $this->leyesAreasPro->listarLeyAreasPro();
	$this->leyesServi->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rleyesServi 		= $this->leyesServi->listarLeyServi();

	$this->apro_dene->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rApro_Dene 		= $this->apro_dene->listarR_APRO_DENE();

	$this->observacion->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$robservacion 		= $this->observacion->listarR_OBSERV_TRAMITE();

	$pdf 				= new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFillColor(255,255,255);
	$pdf->SetFont('Arial','B',11);
	try
	{
		$pdf->Cell(185, 5, utf8_decode('DEPREVIO A RESOLVER'), 0, 0, 'C');
		$pdf->Ln(4);
		//Muestras los primeros datos que dan referencia a los nombres, planos, terrenos, numero de finca... etc
		while ($row = mysqli_fetch_array($rLista)) {
			$pdf->MultiCell(50,5,$row[0],0,1);
			// Inicio Consecutivo
			while ($cons = mysqli_fetch_array($rConstra)) {
		 		$pdf->MultiCell(60,5,utf8_decode("Nº OF-DPU-".$cons[0]."-".$cons[1]."-".$cons[2]),0,'L');
		 	$pdf->MultiCell(0,0,utf8_decode("Número de Trámite:"),0,0,'L');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(175,20,$row[1],0,0,'L');
		 	$pdf->MultiCell(100,5,utf8_decode("Señor(a):"));
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(100,5,utf8_decode($row[2]." ".$row[3]." ".$row[4]),0,1,'J');
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(40,5,utf8_decode("Cédula: ".$row[5]),0,1,'J');
		 	$pdf->MultiCell(23,10,"Presente",0,1,'J');
		 	$pdf->SetFont('Arial','B',10);
		 	$pdf->MultiCell(180,5,utf8_decode(
		 		"Se extiende RESOLUCIÓN MUNICIPAL DE UBICACIÓN DE USO para la Propiedad Plano G-".$row[6]." de la Finca 5-".$row[7].", Propiedad de ".$row[8]." ".$row[9]." ".$row[10].", Cédula/Jurídica ".$row[11].", Ubicada en ".$row[12].", ".$row[13].", Distrito ".$row[14].", Nicoya; indicando lo siguiente:" ),0,1,'J' );
		 	$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode('Basado en el Reglamento a la Ley de Uso, Manejo y Conservación de Suelos, en su  Artículo 58. En toda información posesoria o que se presente ante el IDA o ante los Tribunales de Justicia, con el fin de inscribir en el Registro Público de la Propiedad, el interesado, además de los requisitos que exige la normativa común, deberá de demostrar, con un estudio adecuado de suelos, que ha ejercido la posesión cumpliendo con el uso conforme del suelo para la actividad que realiza de acuerdo con la metodología aprobada, y ejecutándolas con las mejores prácticas de su manejo, según la mejor tecnología disponible en cumplimiento con lo dispuesto en los artículos 3, 6, 12, 13, 19, 26, 27, 41, 43 y 64 de la Ley Nº 7779 y este Reglamento.' ),0,'J');

		 	$pdf->Ln(2);
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(100,5,"Por lo tanto",0,0);
		 	$pdf->Ln(1);
		 	while ($obser = mysqli_fetch_array($robservacion)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($obser[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	
		 	}// Finaliza Consecutivo
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(190,5,utf8_decode(
		 		'Nota: De conformidad con lo dispuesto en el artículo 162 del código municipal, puede interponer los recursos de revocatoria con apelación en subsidio dentro del plazo de los cinco días hábiles contados a partir del día siguiente de la presente notificación, que resuelven el Departamento de Planificación Urbana en revocatoria y el Alcalde Municipal en apelación subsidiaria, ello en caso de que se decida interponer uno o ambos recursos. Una vez este proceso sea subsanado se deberá tramitar por medio de correspondencia adjuntando copia de este oficio y si todo se encuentra conforme, se procederá a brindar la Resolución de Ubicación de Usos de Suelo para la Actividad Deseada. Basado en el Artículo 6 de la ley 8220 se otorgará en plazo de 10 días avilés para presentar lo solicitado.' ),0,'J');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,"Atentamente, ",0,1);
		 	$pdf->MultiCell(180,5,"Firma de Recibido",0,0);
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,"__________________________",0,0)	;
		 	$pdf->Ln(5);
		 	$pdf->MultiCell(190,5,utf8_decode('# Cédula: __________________________'),0,0,'R');
		 	$pdf->Ln(3);
		 	$pdf->MultiCell(190,5,utf8_decode('Fecha: __________________ Hora: __________________'),0,0,'R');
		 	$pdf->Ln(3);
		 	$pdf->MultiCell(60,5,"__________________________",0,1);
		 	$pdf->MultiCell(50,5,"Arq. Jonathan Soto Segura",0,1);
		 	$pdf->MultiCell(80,5,utf8_decode("Coordinador de Planificación Urbana"),0,1);
		 	$pdf->MultiCell(80,5,utf8_decode("Municipalidad de Nicoya"),0,1);
		 }
		 $pdf->Output();
	} catch(Exception $e){
		$pdf->Cell(30, 10, "Sin datos".$e, 0, 0, 'C');
		$pdf->Output();
	}
}

public function rMINAEClaseVIII(){
	$this->MINAEClaseVIII   	= new classreporte();

	$this->constra 				= new classreporte();
	
	$this->actdes_res 	 		= new classreporte();
	$this->actdes_com 	 		= new classreporte();
	$this->actdes_com_in 		= new classreporte();
	$this->actdes_desa 	 		= new classreporte();
	$this->actdes_es 	 		= new classreporte();
	
	$this->desceg 		 		= new classreporte();
	
	$this->leyesAccesos 		= new classreporte();
	$this->leyesDesarroSect 	= new classreporte();
	$this->leyesEspacioGeo 		= new classreporte();
	$this->leyesActividades 	= new classreporte();
	$this->leyesAspectoBio 		= new classreporte();
	$this->leyesPatente 		= new classreporte();
	$this->leyesPlan 		 	= new classreporte();
	$this->leyesRedVial 		= new classreporte();
	$this->leyesAreasPro 		= new classreporte();
	$this->leyesServi			= new classreporte();
	
	$this->apro_dene 			= new classreporte();
	$this->observacion          = new classreporte();
	

	$this->MINAEClaseVIII->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLista = $this->MINAEClaseVIII->listarMINAEClaseVIII();

	$this->desceg->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rDesceg 			= $this->desceg->listarDESCEG();
	$this->constra->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rConstra			= $this->constra->listarCons();

	$this->actdes_res->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesRes 		= $this->actdes_res->listarACTDESRES();
	$this->actdes_com->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesCom 		= $this->actdes_com->listarACTDESCOM();
	$this->actdes_com_in->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesComIn 		= $this->actdes_com_in->listarACTDESCOMIN();
	$this->actdes_desa->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesDesa 		= $this->actdes_desa->listarACTDESDESA();
	$this->actdes_es->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesEs 			= $this->actdes_es->listarACTDESES();

	$this->leyesAccesos->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAccesos 		= $this->leyesAccesos->listarLeyAccesos();
	$this->leyesDesarroSect->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesDesarroSect 	= $this->leyesDesarroSect->listarLeyDesarroSect();
	$this->leyesEspacioGeo->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesEspacioGeo 	= $this->leyesEspacioGeo->listarLeyEspacioGeo();
	$this->leyesActividades->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesActividades	= $this->leyesActividades->listarLeyActividades();
	$this->leyesAspectoBio->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAspectoBio 	= $this->leyesAspectoBio->listarLeyAspectoBio();
	$this->leyesPatente->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesPatente 		= $this->leyesPatente->listarLeyPatente();
	$this->leyesPlan->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesPlan 		= $this->leyesPlan->listarLeyPlan();
	$this->leyesRedVial->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesRedVial 		= $this->leyesRedVial->listarLeyRedVial();
	$this->leyesAreasPro->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAreasPro 	= $this->leyesAreasPro->listarLeyAreasPro();
	$this->leyesServi->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rleyesServi 		= $this->leyesServi->listarLeyServi();

	$this->apro_dene->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rApro_Dene 		= $this->apro_dene->listarR_APRO_DENE();

	$this->observacion->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$robservacion 		= $this->observacion->listarR_OBSERV_TRAMITE();

	$pdf 				= new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFillColor(255,255,255);
	$pdf->SetFont('Arial','B',11);
	try
	{
		$pdf->Cell(185, 5, utf8_decode('DEPREVIO A RESOLVER'), 0, 0, 'C');
		$pdf->Ln(2);
		//Muestras los primeros datos que dan referencia a los nombres, planos, terrenos, numero de finca... etc
		while ($row = mysqli_fetch_array($rLista)) {
			$pdf->MultiCell(50,5,$row[0],0,1);
			// Inicio Consecutivo
			while ($cons = mysqli_fetch_array($rConstra)) {
		 		$pdf->MultiCell(60,5,utf8_decode("Nº OF-DPU-".$cons[0]."-".$cons[1]."-".$cons[2]),0,'L');
		 	$pdf->MultiCell(0,0,
		 		utf8_decode("Número de Trámite:"),0,0,'L');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(175,20,$row[1],0,0,'L');
		 	$pdf->MultiCell(100,5,
		 		utf8_decode("Señor(a):"));
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(100,5,
		 		utf8_decode($row[2]." ".$row[3]." ".$row[4]),0,1,'J');
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(40,5,
		 		utf8_decode("Cédula: ".$row[5]),0,1,'J');
		 	$pdf->MultiCell(23,10,"Presente",0,1,'J');
		 	$pdf->SetFont('Arial','B',10);
		 	$pdf->MultiCell(180,5,
		 		utf8_decode("Se extiende RESOLUCIÓN MUNICIPAL DE UBICACIÓN DE USO para la Propiedad Plano G-".$row[6]." de la Finca 5-".$row[7].", Propiedad de ".$row[8]." ".$row[9]." ".$row[10].", Cédula/Jurídica ".$row[11].", Ubicada en ".$row[12].", ".$row[13].", Distrito ".$row[14].", Nicoya; indicando lo siguiente:" ),0,1,'J' );
		 	$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,
		 			utf8_decode('La propiedad aparece en  el Mapa de  Capacidad de suelo en la clase VIII con la Aptitud del suelo de Zona de Protección Forestal por lo cual para realizar un cambio de actividad debe realizar lo expuesto en Reglamento a la Ley de Uso Manejo y conservación de suelos Ley N° 29375 en el CAPÍTULO V de la Planificación de Uso del Suelo y las Zonas Catastrales. Artículo 54.	Para los efectos de lo dispuesto en los artículos 7 inciso c) y 13 inciso a) de la Ley Nº 7779, en las zonas catastrales, el Catastro Nacional incluirá en sus mapas catastrales los mapas de uso del suelo y no autorizará segregaciones o inscripciones si no se cuenta con la autorización de cambio de uso del suelo emitida por el MAG y las demás instancias gubernamentales.' ),0,'J');
		 			$pdf->Ln(1);
		 	$pdf->MultiCell(190,5,
		 		utf8_decode('Artículo 55.	En los Planes Reguladores y Reglamentos de Zonificación que elabore el INVU y las Municipalidades, necesariamente en los distritos urbanos y rurales, se clasificarán y zonificarán los suelos agrarios, conforme lo disponen los incisos a) y b) del artículo 13 de la Ley de Planificación Urbana.' ),0,'J');
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(190,5,
		 		utf8_decode('Artículo 56.	Para autorizar el cambio de uso del suelo agrícola a otros tipos de uso, necesariamente deberá de contarse con la aprobación del MAG, quien atendiendo a los Planes Nacionales y Planes de Área, así como a las regulaciones establecidas por SETENA, y los criterios establecidos por los Comités de Uso, Manejo y Conservación de Suelos por Áreas, determinará su procedencia o no considerando su valor agronómico. Dado su valor agronómico, y su valor patrimonial como activo nacional, en el futuro, en la planificación del urbanismo, se respetarán y reservarán en lo posible los suelos agrícolas.' ),0,'J');
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(190,5,
		 		utf8_decode('Artículo 57.	En todo fraccionamiento y urbanización, deberán presentarse estudios de uso, manejo y conservación de suelos y aguas, para evitar la contaminación, degradación, erosión, sedimentación de embalses y obstrucción de alcantarillados.' ),0,'J');
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(190,5,
		 		utf8_decode('Basado en el oficio DST-213-2016 del 27 de octubre del 2016 firmado por el Ing. Agr. Renato Jiménez Zúñiga, MSC. Jefe del departamento de servicios técnicos del INTA. Donde delimita en el punto5: Finalmente, esta dependencia no tiene competencia legal ni técnica para definir si la propiedad de marras se encuentra o no en zona de bosque o con aptitud forestal, debido a que este tema es resorte exclusivo del Sistema Nacional de Áreas de Conservación ( SINAC), del Ministerio de Ambiente y Energía. ' ),0,'J');
		 	$pdf->Ln(2);
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(100,5,"Por lo tanto",0,0);
		 	$pdf->Ln(1);
		 	while ($obser = mysqli_fetch_array($robservacion)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($obser[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	
		 	}// Finaliza Consecutivo
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(190,5,
		 		utf8_decode('Nota: De conformidad con lo dispuesto en el artículo 162 del código municipal, puede interponer los recursos de revocatoria con apelación en subsidio dentro del plazo de los cinco días hábiles contados a partir del día siguiente de la presente notificación, que resuelven el Departamento de Planificación Urbana en revocatoria y el Alcalde Municipal en apelación subsidiaria, ello en caso de que se decida interponer uno o ambos recursos. Una vez este proceso sea subsanado se deberá tramitar por medio de correspondencia adjuntando copia de este oficio y si todo se encuentra conforme, se procederá a brindar la Resolución de Ubicación de Usos de Suelo para la Actividad Deseada. Basado en el Artículo 6 de la ley 8220 se otorgará en plazo de 10 días avilés para presentar lo solicitado.' ),0,'J');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,"Atentamente, ",0,1);
		 	$pdf->MultiCell(180,5,"Firma de Recibido",0,0);
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,"__________________________",0,0)	;
		 	$pdf->Ln(5);
		 	$pdf->MultiCell(190,5,
		 		utf8_decode('# Cédula: __________________________'),0,0,'R');
		 	$pdf->Ln(3);
		 	$pdf->MultiCell(190,5,
		 		utf8_decode('Fecha: __________________ Hora: __________________'),0,0,'R');
		 	$pdf->Ln(3);
		 	$pdf->MultiCell(60,5,"__________________________",0,1);
		 	$pdf->MultiCell(50,5,"Arq. Jonathan Soto Segura",0,1);
		 	$pdf->MultiCell(80,5,
		 		utf8_decode("Coordinador de Planificación Urbana"),0,1);
		 	$pdf->MultiCell(80,5,
		 		utf8_decode("Municipalidad de Nicoya"),0,1);
		 }
		 $pdf->Output();
	} catch(Exception $e){
		$pdf->Cell(30, 10, "Sin datos".$e, 0, 0, 'C');
		$pdf->Output();
	}
}

public function rDarDireccionAgua(){
	$this->DireccionAgua   	 	= new classreporte();
	$this->FechaRegTra			= new classreporte();

	$this->constra 				= new classreporte();
	
	$this->actdes_res 	 		= new classreporte();
	$this->actdes_com 	 		= new classreporte();
	$this->actdes_com_in 		= new classreporte();
	$this->actdes_desa 	 		= new classreporte();
	$this->actdes_es 	 		= new classreporte();
	
	$this->desceg 		 		= new classreporte();
	
	$this->leyesAccesos 		= new classreporte();
	$this->leyesDesarroSect 	= new classreporte();
	$this->leyesEspacioGeo 		= new classreporte();
	$this->leyesActividades 	= new classreporte();
	$this->leyesAspectoBio 		= new classreporte();
	$this->leyesPatente 		= new classreporte();
	$this->leyesPlan 		 	= new classreporte();
	$this->leyesRedVial 		= new classreporte();
	$this->leyesAreasPro 		= new classreporte();
	$this->leyesServi			= new classreporte();
	
	$this->apro_dene 			= new classreporte();
	$this->observacion          = new classreporte();
	

	$this->DireccionAgua->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLista = $this->DireccionAgua->listarDireccionAgua();
	$this->FechaRegTra->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rFecha = $this->FechaRegTra->listarFechaRegTra();

	$this->desceg->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rDesceg 			= $this->desceg->listarDESCEG();
	$this->constra->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rConstra			= $this->constra->listarCons();

	$this->actdes_res->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesRes 		= $this->actdes_res->listarACTDESRES();
	$this->actdes_com->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesCom 		= $this->actdes_com->listarACTDESCOM();
	$this->actdes_com_in->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesComIn 		= $this->actdes_com_in->listarACTDESCOMIN();
	$this->actdes_desa->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesDesa 		= $this->actdes_desa->listarACTDESDESA();
	$this->actdes_es->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesEs 			= $this->actdes_es->listarACTDESES();

	$this->leyesAccesos->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAccesos 		= $this->leyesAccesos->listarLeyAccesos();
	$this->leyesDesarroSect->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesDesarroSect 	= $this->leyesDesarroSect->listarLeyDesarroSect();
	$this->leyesEspacioGeo->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesEspacioGeo 	= $this->leyesEspacioGeo->listarLeyEspacioGeo();
	$this->leyesActividades->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesActividades	= $this->leyesActividades->listarLeyActividades();
	$this->leyesAspectoBio->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAspectoBio 	= $this->leyesAspectoBio->listarLeyAspectoBio();
	$this->leyesPatente->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesPatente 		= $this->leyesPatente->listarLeyPatente();
	$this->leyesPlan->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesPlan 		= $this->leyesPlan->listarLeyPlan();
	$this->leyesRedVial->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesRedVial 		= $this->leyesRedVial->listarLeyRedVial();
	$this->leyesAreasPro->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAreasPro 	= $this->leyesAreasPro->listarLeyAreasPro();
	$this->leyesServi->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rleyesServi 		= $this->leyesServi->listarLeyServi();

	$this->apro_dene->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rApro_Dene 		= $this->apro_dene->listarR_APRO_DENE();

	$this->observacion->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$robservacion 		= $this->observacion->listarR_OBSERV_TRAMITE();

	$pdf 				= new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFillColor(255,255,255);
	$pdf->SetFont('Arial','B',11);
	try
	{
		$pdf->Cell(185, 5, utf8_decode('DE PREVIO A RESOLVER'), 0, 0, 'C');
		$pdf->Ln(2);
		//Muestras los primeros datos que dan referencia a los nombres, planos, terrenos, numero de finca... etc...
		while ($row = mysqli_fetch_array($rLista)) {
			$pdf->MultiCell(50,5,$row[0],0,1);
			// Inicio Consecutivo...
			
			while ($cons = mysqli_fetch_array($rConstra)) {
		 		$pdf->MultiCell(60,5,
		 			utf8_decode("Nº OF-DPU-".$cons[0]."-".$cons[1]."-".$cons[2]),0,'L');
		 	$pdf->MultiCell(0,0,
		 		utf8_decode("Número de Trámite:"),0,0,'L');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(175,20,$row[1],0,0,'L');
		 	$pdf->MultiCell(100,5,
		 		utf8_decode("Señor(a):"));
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(100,5,
		 		utf8_decode($row[2]." ".$row[3]." ".$row[4]),0,1,'J');
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(40,5,
		 		utf8_decode("Cédula: ".$row[5]),0,1,'J');
		 	$pdf->MultiCell(23,10,"Presente",0,1,'J');
		 	$pdf->SetFont('Arial','B',10);
		 	$pdf->MultiCell(180,5,
		 		utf8_decode("Se extiende RESOLUCIÓN MUNICIPAL DE UBICACIÓN DE USO para la Propiedad Plano G-".$row[6]." de la Finca 5-".$row[7].", Propiedad de ".$row[8]." ".$row[9]." ".$row[10].", Cédula/Jurídica ".$row[11].", Ubicada en ".$row[12].", ".$row[13].", Distrito ".$row[14].", Nicoya; indicando lo siguiente:" ),0,1,'J' );
		 	$pdf->Ln(1);
		 	while ($fecreg = mysqli_fetch_array($rFecha)) {
		 		$pdf->MultiCell(190,5,
	 			utf8_decode("Basada en la inspección realizada el ".$fecreg[0].", la cual genero el informe de campo." ),0,'J');
		 	}
	 		$pdf->Ln(1);
		 	$pdf->MultiCell(190,5,
		 		utf8_decode('Según la investigación municipal se logra delimitar que la propiedad se encuentra parcialmente en zona de Inundación según el mapa de la CNE, además que está relativamente dentro del área de retiro según la base de datos del sistema municipal. ' ),0,'J');
		 	$pdf->Ln(2);
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(130,5,"POR LO TANTO DE PREVIO A RESOLVER:",0,0);
		 	$pdf->Ln(1);
		 	while ($obser = mysqli_fetch_array($robservacion)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($obser[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	
		 	}// Finaliza Consecutivo
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(190,5,
		 		utf8_decode('Nota: De conformidad con lo dispuesto en el artículo 162 del código municipal, puede interponer los recursos de revocatoria con apelación en subsidio dentro del plazo de los cinco días hábiles contados a partir del día siguiente de la presente notificación, que resuelven el Departamento de Planificación Urbana en revocatoria y el Alcalde Municipal en apelación subsidiaria, ello en caso de que se decida interponer uno o ambos recursos. Una vez este proceso sea subsanado se deberá tramitar por medio de correspondencia adjuntando copia de este oficio y si todo se encuentra conforme, se procederá a brindar la Resolución de Ubicación de Usos de Suelo para la Actividad Deseada. Basado en el Artículo 6 de la ley 8220 se otorgará en plazo de 10 días avilés para presentar lo solicitado.' ),0,'J');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,"Atentamente, ",0,1);
		 	$pdf->MultiCell(180,5,"Firma de Recibido",0,0);
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,"__________________________",0,0)	;
		 	$pdf->Ln(5);
		 	$pdf->MultiCell(190,5,
		 		utf8_decode('# Cédula: __________________________'),0,0,'R');
		 	$pdf->Ln(3);
		 	$pdf->MultiCell(190,5,
		 		utf8_decode('Fecha: __________________ Hora: __________________'),0,0,'R');
		 	$pdf->Ln(3);
		 	$pdf->MultiCell(60,5,"__________________________",0,1);
		 	$pdf->MultiCell(50,5,"Arq. Jonathan Soto Segura",0,1);
		 	$pdf->MultiCell(80,5,
		 		utf8_decode("Coordinador de Planificación Urbana"),0,1);
		 	$pdf->MultiCell(80,5,
		 		utf8_decode("Municipalidad de Nicoya")
		 		,0,1
		 	);
		 }
		 $pdf->Output();
	} catch(Exception $e){
		$pdf->Cell(30, 10, "Sin datos".$e, 0, 0, 'C');
		$pdf->Output();
	}
}
public function rDarAntecedentesDominio(){
	$this->AntecedentesDominio   	 	= new classreporte();
	$this->FechaRegTra			= new classreporte();

	$this->constra 				= new classreporte();
	
	$this->actdes_res 	 		= new classreporte();
	$this->actdes_com 	 		= new classreporte();
	$this->actdes_com_in 		= new classreporte();
	$this->actdes_desa 	 		= new classreporte();
	$this->actdes_es 	 		= new classreporte();
	
	$this->desceg 		 		= new classreporte();
	
	$this->leyesAccesos 		= new classreporte();
	$this->leyesDesarroSect 	= new classreporte();
	$this->leyesEspacioGeo 		= new classreporte();
	$this->leyesActividades 	= new classreporte();
	$this->leyesAspectoBio 		= new classreporte();
	$this->leyesPatente 		= new classreporte();
	$this->leyesPlan 		 	= new classreporte();
	$this->leyesRedVial 		= new classreporte();
	$this->leyesAreasPro 		= new classreporte();
	$this->leyesServi			= new classreporte();
	
	$this->apro_dene 			= new classreporte();
	$this->observacion          = new classreporte();
	

	$this->AntecedentesDominio->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLista = $this->AntecedentesDominio->listarAntecedentesDominio();
	$this->FechaRegTra->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rFecha = $this->FechaRegTra->listarFechaRegTra();

	$this->desceg->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rDesceg 			= $this->desceg->listarDESCEG();
	$this->constra->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rConstra			= $this->constra->listarCons();

	$this->actdes_res->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesRes 		= $this->actdes_res->listarACTDESRES();
	$this->actdes_com->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesCom 		= $this->actdes_com->listarACTDESCOM();
	$this->actdes_com_in->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesComIn 		= $this->actdes_com_in->listarACTDESCOMIN();
	$this->actdes_desa->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesDesa 		= $this->actdes_desa->listarACTDESDESA();
	$this->actdes_es->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rActdesEs 			= $this->actdes_es->listarACTDESES();

	$this->leyesAccesos->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAccesos 		= $this->leyesAccesos->listarLeyAccesos();
	$this->leyesDesarroSect->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesDesarroSect 	= $this->leyesDesarroSect->listarLeyDesarroSect();
	$this->leyesEspacioGeo->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesEspacioGeo 	= $this->leyesEspacioGeo->listarLeyEspacioGeo();
	$this->leyesActividades->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesActividades	= $this->leyesActividades->listarLeyActividades();
	$this->leyesAspectoBio->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAspectoBio 	= $this->leyesAspectoBio->listarLeyAspectoBio();
	$this->leyesPatente->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesPatente 		= $this->leyesPatente->listarLeyPatente();
	$this->leyesPlan->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesPlan 		= $this->leyesPlan->listarLeyPlan();
	$this->leyesRedVial->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesRedVial 		= $this->leyesRedVial->listarLeyRedVial();
	$this->leyesAreasPro->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rLeyesAreasPro 	= $this->leyesAreasPro->listarLeyAreasPro();
	$this->leyesServi->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rleyesServi 		= $this->leyesServi->listarLeyServi();

	$this->apro_dene->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$rApro_Dene 		= $this->apro_dene->listarR_APRO_DENE();

	$this->observacion->setAtributo('PU04IDTRA', $_REQUEST['id']);
	$robservacion 		= $this->observacion->listarR_OBSERV_TRAMITE();

	$pdf 				= new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFillColor(255,255,255);
	$pdf->SetFont('Arial','B',11);
	try
	{
		$pdf->Cell(185, 5, utf8_decode('DE PREVIO A RESOLVER'), 0, 0, 'C');
		$pdf->Ln(2);
		//Muestras los primeros datos que dan referencia a los nombres, planos, terrenos, numero de finca... etc.
		while ($row = mysqli_fetch_array($rLista)) {
			$pdf->MultiCell(50,5,$row[0],0,1);
			// Inicio Consecutivo
			while ($cons = mysqli_fetch_array($rConstra)) {
		 		$pdf->MultiCell(60,5,
		 			utf8_decode("Nº OF-DPU-".$cons[0]."-".$cons[1]."-".$cons[2]),0,'L');
		 	$pdf->MultiCell(0,0,
		 		utf8_decode("Número de Trámite:"),0,0,'L');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(175,20,$row[1],0,0,'L');
		 	$pdf->MultiCell(100,5,
		 		utf8_decode("Señor(a):"));
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(100,5,
		 		utf8_decode($row[2]." ".$row[3]." ".$row[4]),0,1,'J');
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(40,5,
		 		utf8_decode("Cédula: ".$row[5]),0,1,'J');
		 	$pdf->MultiCell(23,10,"Presente",0,1,'J');
		 	$pdf->SetFont('Arial','B',10);
		 	$pdf->MultiCell(180,5,
		 		utf8_decode("Se extiende RESOLUCIÓN MUNICIPAL DE UBICACIÓN DE USO para la Propiedad Plano G-".$row[6]." de la Finca 5-".$row[7].", Propiedad de ".$row[8]." ".$row[9]." ".$row[10].", Cédula/Jurídica ".$row[11].", Ubicada en ".$row[12].", ".$row[13].", Distrito ".$row[14].", Nicoya; indicando lo siguiente:" ),0,1,'J' );
		 	$pdf->Ln(1);
		 	while ($fecreg = mysqli_fetch_array($rFecha)) {
		 		$pdf->MultiCell(190,5,
	 			utf8_decode("Se realiza la búsqueda en el sistema municipal donde se logra delimitar que la propiedad se encuentra según el plan regulador de Nicoya Aprobado para el distrito primero que fue publicado en gaceta #18 del 26-01-1983. En Área Verde" ),0,'J');
		 	}
		 	$pdf->Ln(2);
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(130,5,"POR LO TANTO DE PREVIO A RESOLVER:",0,0);
		 	$pdf->Ln(1);
		 	while ($obser = mysqli_fetch_array($robservacion)) {
		 		$pdf->Ln(1);
		 		$pdf->MultiCell(190,5,utf8_decode($obser[0]),0,'J');
		 		$pdf->Ln(2);
		 	}
		 	}// Finaliza Consecutivo
		 	$pdf->Ln(1);
		 	$pdf->MultiCell(190,5,
		 		utf8_decode('Nota: De conformidad con lo dispuesto en el artículo 162 del código municipal, puede interponer los recursos de revocatoria con apelación en subsidio dentro del plazo de los cinco días hábiles contados a partir del día siguiente de la presente notificación, que resuelven el Departamento de Planificación Urbana en revocatoria y el Alcalde Municipal en apelación subsidiaria, ello en caso de que se decida interponer uno o ambos recursos. Una vez este proceso sea subsanado se deberá tramitar por medio de correspondencia adjuntando copia de este oficio y si todo se encuentra conforme, se procederá a brindar la Resolución de Ubicación de Usos de Suelo para la Actividad Deseada. Basado en el Artículo 6 de la ley 8220 se otorgará en plazo de 10 días avilés para presentar lo solicitado.' ),0,'J');
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,"Atentamente, ",0,1);
		 	$pdf->MultiCell(180,5,"Firma de Recibido",0,0);
		 	$pdf->Ln(2);
		 	$pdf->MultiCell(190,5,"__________________________",0,0)	;
		 	$pdf->Ln(5);
		 	$pdf->MultiCell(190,5,
		 		utf8_decode('# Cédula: __________________________'),0,0,'R');
		 	$pdf->Ln(3);
		 	$pdf->MultiCell(190,5,
		 		utf8_decode('Fecha: __________________ Hora: __________________'),0,0,'R');
		 	$pdf->Ln(3);
		 	$pdf->MultiCell(60,5,"__________________________",0,1);
		 	$pdf->MultiCell(50,5,"Arq. Jonathan Soto Segura",0,1);
		 	$pdf->MultiCell(80,5,
		 		utf8_decode("Coordinador de Planificación Urbana"),0,1);
		 	$pdf->MultiCell(80,5,
		 		utf8_decode("Municipalidad de Nicoya")
		 		,0,1
		 	);
		 }
		 $pdf->Output();
	} catch(Exception $e){
		$pdf->Cell(30, 10, "Sin datos".$e, 0, 0, 'C');
		$pdf->Output();
	}
}

}
?>