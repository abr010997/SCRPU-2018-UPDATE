
<?php 
require_once 'model/classreporte.php';
require_once 'public/reporte/plantilla.php';
class classreporteController
{
	private $classreporte;
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
	private $resolusion;
	private $actdes;
	private $desceg;
	private $leyes;
	private $leyes1;
	private $leyes2;
	private $leyes3;
	private $leyes4;
	private $leyes5;

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
		else{
			$this->classreporte = $this->classreporte->buscar($_REQUEST['id']);
			require_once 'view/header.php';
			require_once 'view/classreporte/editar.php';
			require_once 'view/footer.php';		}
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
	
	public function reporte(){
		$this->classreporte->setAtributo('PU04IDTRA', $_REQUEST['id']);
		/*if ($this->classreporte->listarPRIN() == true) {
			$result = $this->classreporte->listarPRIN();
			if ($result == 4) {
				$this->RESI = new classreporte();
				$this->ACTDES = new classreporte();
				$this->DESCEG = new classreporte();
				$this->LEY = new classreporte();
				$this->RESI1 = new classreporte();

				$this->RESI->setAtributo('PU04IDTRA', $_REQUEST['id']);
				$result1 = $this->RESI->listarRESI();
				$this->RESI1->setAtributo('PU04IDTRA', $_REQUEST['id']);
				$resi = $this->RESI->listarRESI1();

				$this->DESCEG->setAtributo('PU04IDTRA', $_REQUEST['id']);
				$result2 = $this->DESCEG->listarDESCEG();
				$this->ACTDES->setAtributo('PU04IDTRA', $_REQUEST['id']);
				$result3 = $this->ACTDES->listarACTDES();
				$this->LEY->setAtributo('PU04IDTRA', $_REQUEST['id']);
				$result4 = $this->LEY->listarLey();

				$pdf = new PDF();
				$pdf->AliasNbPages();
				$pdf->AddPage();
				$pdf->SetFillColor(255,255,255);
				$pdf->SetFont('Arial','B',11);
				try
				{

					while ($row = mysqli_fetch_array($result1)) {
						$pdf->MultiCell(50,5,$row[0],0,1);
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
					 	$pdf->MultiCell(190,5,'El terreno evaluado es afectado por el Plan Regulador vigente del cantón de Nicoya. La Resolución Municipal de Ubicación corresponde a Zona Residencial.',0,1,'J');
					 	while ($fila = mysqli_fetch_array($resi)) {
					 		$pdf->Ln(1);
					 		$pdf->MultiCell(100,5,utf8_decode("* ".$fila[0]."."),0,1,'J');
					 		$pdf->Ln(1);
					 	}
					 	$pdf->MultiCell(190,5,'-Usos Permitidos: Todos los urbanos que tengan relación con la vivienda, sin que la perjudiquen. El tipo de comercio que se permite es el siguiente: tiendas de abarrotes, boticas, fuentes de soda, barberías, carnicerías oficinas profesionales, usos comunales y áreas verdes. La pequeña industria (artesanal Inofensiva) supermercados.',0,1,'J');
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(190,5,'-No se permiten: bodegas, aserraderos, talleres, industrias y usos similares a estos en cuanto a molestias (ruido, transito intenso, olor, etc.) que afectan la zona. También se exceptúan el comercio que produzca las molestias antes dichas como salas de baile, cantinas, etc.',0,1,'J');
					 	$pdf->MultiCell(190,5,'1.	SUPERFICIE DE LOTE: 155m2',0,1,'J');
					 	$pdf->MultiCell(190,5,'2.	FRENTE MÍNIMO DE LOTE: 8m2',0,1,'J');
					 	$pdf->MultiCell(190,5,'3.	RETIROS MÍNIMOS:',0,1,'J');
					 	$pdf->MultiCell(190,5,'-FRONTAL: 2,5m',0,1,'C');
					 	$pdf->MultiCell(190,5,'-LATERAL: NO HAY',0,1,'C');
					 	$pdf->MultiCell(190,5,'-POSTERIOR: 3m',0,1,'C');
					 	$pdf->MultiCell(190,5,'4.   COBERTURA DE EDIFICACIÓN MÁXIMA 60% DEL ÁREA DEL LOTE',0,1,'J');
					 	$pdf->MultiCell(190,5,'5.   ÁREA DE PISO MÁXIMA, TRES VECES LA COBERTURA MÁXIMA',0,1,'J');
					 	$pdf->MultiCell(190,5,'6.   ALTURA DE EDIFICACIÓN MÁXIMA 10m',0,1,'J');

					 	$pdf->Ln(2);

					 	$pdf->MultiCell(55,5,'> Uso Actual del Suelo',0,1,'J');

					 	while ($fila1 = mysqli_fetch_array($result2)) {
					 		$pdf->Ln(1);
					 		$pdf->MultiCell(100,5,utf8_decode("* ".$fila1[0]."."),0,1,'J');
					 		$pdf->Ln(1);
					 	}
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(55,5,"> Actividad a Desarrollar",0,1,'J');
					 	$pdf->Ln(2);
					 	while ($fila2 = mysqli_fetch_array($result3)) {
					 		$pdf->Ln(1);
					 		$pdf->MultiCell(100,5,utf8_decode("* ".$fila2[0]."."),0,1,'J');
					 		$pdf->Ln(1);
					 	}
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(190,5,"Se concluye: ",0,1,'J');
					 	/*while ($fila3 = mysqli_fetch_array($result4)) {
					 		$pdf->Ln(1);
					 		$pdf->MultiCell(190,5,utf8_decode($fila3[0]),0,'J');
					 		$pdf->Ln(2);
					 	}
					 	$pdf->MultiCell(100,5,"Por tanto",0,0);
					 	$pdf->Ln(1);
					 	$pdf->MultiCell(190,5,utf8_decode("Se ".$row[1]." la RESOLUCIÓN DE UBICACIÓN MUNICIPAL, mediante oficio DPU-RMU-".$row[1].", para la Finca 5-".$row[7]." quedando sujeto a las disposiciones de la legislación vigente y en observaciones de nuestro ordenamiento jurídico, cualquier transgresión a las normas, producirá anulación del acto administrativo."),0,'J');
					 	$pdf->Ln(1);
					 	$pdf->MultiCell(190,5,utf8_decode('Nota: Al haber aprobado la Resolución de Ubicación Municipal eso implica que se está dado el permiso para movimiento de tierra, cortes, rellenos, construcción construcción, desfogue fluvial, todo lo relacionado con obras civiles por lo que deberan ser tramitado en el momento que se requiera dicho permiso y también si la Resolución Municipal (Uso de Suelo) es positivo, no obliga a la municipalidad a otorgar la respectiva pantente, esta debe ser solicitado de conformidad con la normativa establecido por esta institución para estos efectos.'),0,'J');
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(190,5,"Atentamente, ",0,1);
					 	$pdf->MultiCell(180,5,"Firma de Recibido",0,0);
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(190,5,"__________________________",0,0)	;
					 	$pdf->Ln(3)	;
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
			} else {
				$this->RESO = new  classreporte();
				$this->ACTDES = new classreporte();
				$this->DESCEG = new classreporte();
				$this->LEY = new classreporte();

				$this->RESO->setAtributo('PU04IDTRA', $_REQUEST['id']);
				$result1 = $this->RESO->listarRESO();
				$this->DESCEG->setAtributo('PU04IDTRA', $_REQUEST['id']);
				$result2 = $this->DESCEG->listarDESCEG();
				$this->ACTDES->setAtributo('PU04IDTRA', $_REQUEST['id']);
				$result3 = $this->ACTDES->listarACTDES();
				$this->LEY->setAtributo('PU04IDTRA', $_REQUEST['id']);
				$result4 = $this->LEY->listarLey();

				$pdf = new PDF();
				$pdf->AliasNbPages();
				$pdf->AddPage();
				$pdf->SetFillColor(255,255,255);
				$pdf->SetFont('Arial','B',11);
				try
				{

					while ($row = mysqli_fetch_array($result1)) {
						$pdf->MultiCell(50,5,$row[0],0,1);
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
					 	$pdf->MultiCell(55,5,'> Uso Actual del Suelo',0,1,'J');

					 	while ($fila1 = mysqli_fetch_array($result2)) {
					 		$pdf->Ln(1);
					 		$pdf->MultiCell(100,5,utf8_decode("* ".$fila1[0]."."),0,1,'J');
					 		$pdf->Ln(1);
					 	}
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(55,5,"> Actividad a Desarrollar",0,1,'J');
					 	$pdf->Ln(2);
					 	while ($fila2 = mysqli_fetch_array($result3)) {
					 		$pdf->Ln(1);
					 		$pdf->MultiCell(100,5,utf8_decode("* ".$fila2[0]."."),0,1,'J');
					 		$pdf->Ln(1);
					 	}
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(190,5,"Se concluye: ",0,1,'J');
					 	/*while ($fila3 = mysqli_fetch_array($result4)) {
					 		$pdf->Ln(1);
					 		$pdf->MultiCell(190,5,utf8_decode($fila3[0]),0,'J');
					 		$pdf->Ln(2);
					 	}
					 	$pdf->MultiCell(100,5,"Por tanto",0,0);
					 	$pdf->Ln(1);
					 	$pdf->MultiCell(190,5,utf8_decode("Se ".$row[1]." la RESOLUCIÓN DE UBICACIÓN MUNICIPAL, mediante oficio DPU-RMU-".$row[1].", para la Finca 5-".$row[7]." quedando sujeto a las disposiciones de la legislación vigente y en observaciones de nuestro ordenamiento jurídico, cualquier transgresión a las normas, producirá anulación del acto administrativo."),0,'J');
					 	$pdf->Ln(1);
					 	$pdf->MultiCell(190,5,utf8_decode('Nota: Al haber aprobado la Resolución de Ubicación Municipal eso implica que se está dado el permiso para movimiento de tierra, cortes, rellenos, construcción construcción, desfogue fluvial, todo lo relacionado con obras civiles por lo que deberan ser tramitado en el momento que se requiera dicho permiso y también si la Resolución Municipal (Uso de Suelo) es positivo, no obliga a la municipalidad a otorgar la respectiva pantente, esta debe ser solicitado de conformidad con la normativa establecido por esta institución para estos efectos.'),0,'J');
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(190,5,"Atentamente, ",0,1);
					 	$pdf->MultiCell(180,5,"Firma de Recibido",0,0);
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(190,5,"__________________________",0,0)	;
					 	$pdf->Ln(3)	;
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
		}*/
		$this->RESO = new  classreporte();
		$this->ACTDES = new classreporte();
		$this->DESCEG = new classreporte();
		$this->leyes = new classreporte();
		$this->leyes1 = new classreporte();
		$this->leyes2 = new classreporte();
		$this->leyes3 = new classreporte();
		$this->leyes4 = new classreporte();
		$this->leyes5 = new classreporte();

		$this->RESO->setAtributo('PU04IDTRA', $_REQUEST['id']);
		$result1 = $this->RESO->listarRESO();
		$this->DESCEG->setAtributo('PU04IDTRA', $_REQUEST['id']);
		$result2 = $this->DESCEG->listarDESCEG();
		$this->ACTDES->setAtributo('PU04IDTRA', $_REQUEST['id']);
		$result3 = $this->ACTDES->listarACTDES();
		$this->leyes->setAtributo('PU04IDTRA', $_REQUEST['id']);
		$result4 = $this->leyes->listarLey();
		$this->leyes1->setAtributo('PU04IDTRA', $_REQUEST['id']);
		$result5 = $this->leyes1->listarLey1();
		$this->leyes2->setAtributo('PU04IDTRA', $_REQUEST['id']);
		$result6 = $this->leyes2->listarLey2();
		$this->leyes3->setAtributo('PU04IDTRA', $_REQUEST['id']);
		$result7 = $this->leyes3->listarLey3();
		$this->leyes4->setAtributo('PU04IDTRA', $_REQUEST['id']);
		$result8 = $this->leyes4->listarLey4();
		$this->leyes5->setAtributo('PU04IDTRA', $_REQUEST['id']);
		$result9 = $this->leyes5->listarLey5();

		$pdf = new PDF();
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetFillColor(255,255,255);
		$pdf->SetFont('Arial','B',11);
		try
		{

			while ($row = mysqli_fetch_array($result1)) {
				$pdf->MultiCell(50,5,$row[0],0,1);
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
			 	$pdf->MultiCell(55,5,'> Uso Actual del Suelo',0,1,'J');

			 	while ($fila1 = mysqli_fetch_array($result2)) {
			 		$pdf->Ln(1);
			 		$pdf->MultiCell(100,5,utf8_decode("* ".$fila1[0]."."),0,1,'J');
			 		$pdf->Ln(1);
			 	}
			 	$pdf->Ln(2);
			 	$pdf->MultiCell(55,5,"> Actividad a Desarrollar",0,1,'J');
			 	$pdf->Ln(2);
			 	while ($fila2 = mysqli_fetch_array($result3)) {
			 		$pdf->Ln(1);
			 		$pdf->MultiCell(100,5,utf8_decode("* ".$fila2[0]."."),0,1,'J');
			 		$pdf->Ln(1);
			 	}
			 	$pdf->Ln(2);
			 	$pdf->MultiCell(190,5,"Se concluye: ",0,1,'J');
			 	while ($fila3 = mysqli_fetch_array($result4)) {
			 		$pdf->Ln(1);
			 		$pdf->MultiCell(190,5,utf8_decode($fila3[0]),0,'J');
			 		$pdf->Ln(2);
			 	}
			 	while ($fila4 = mysqli_fetch_array($result5)) {
			 		$pdf->Ln(1);
			 		$pdf->MultiCell(190,5,utf8_decode($fila4[0]),0,'J');
			 		$pdf->Ln(2);
			 	}
			 	while ($fila5 = mysqli_fetch_array($result6)) {
			 		$pdf->Ln(1);
			 		$pdf->MultiCell(190,5,utf8_decode($fila5[0]),0,'J');
			 		$pdf->Ln(2);
			 	}
			 	while ($fila6 = mysqli_fetch_array($result7)) {
			 		$pdf->Ln(1);
			 		$pdf->MultiCell(190,5,utf8_decode($fila6[0]),0,'J');
			 		$pdf->Ln(2);
			 	}
			 	while ($fila7 = mysqli_fetch_array($result8)) {
			 		$pdf->Ln(1);
			 		$pdf->MultiCell(190,5,utf8_decode($fila7[0]),0,'J');
			 		$pdf->Ln(2);
			 	}
			 	while ($fila8 = mysqli_fetch_array($result9)) {
			 		$pdf->Ln(1);
			 		$pdf->MultiCell(190,5,utf8_decode($fila8[0]),0,'J');
			 		$pdf->Ln(2);
			 	}
			 	$pdf->MultiCell(100,5,"Por tanto",0,0);
			 	$pdf->Ln(1);
			 	$pdf->MultiCell(190,5,utf8_decode("Se ".$row[1]." la RESOLUCIÓN DE UBICACIÓN MUNICIPAL, mediante oficio DPU-RMU-".$row[1].", para la Finca 5-".$row[7]." quedando sujeto a las disposiciones de la legislación vigente y en observaciones de nuestro ordenamiento jurídico, cualquier transgresión a las normas, producirá anulación del acto administrativo."),0,'J');
			 	$pdf->Ln(1);
			 	$pdf->MultiCell(190,5,utf8_decode('Nota: Al haber aprobado la Resolución de Ubicación Municipal eso implica que se está dado el permiso para movimiento de tierra, cortes, rellenos, construcción construcción, desfogue fluvial, todo lo relacionado con obras civiles por lo que deberan ser tramitado en el momento que se requiera dicho permiso y también si la Resolución Municipal (Uso de Suelo) es positivo, no obliga a la municipalidad a otorgar la respectiva pantente, esta debe ser solicitado de conformidad con la normativa establecido por esta institución para estos efectos.'),0,'J');
			 	$pdf->Ln(2);
			 	$pdf->MultiCell(190,5,"Atentamente, ",0,1);
			 	$pdf->MultiCell(180,5,"Firma de Recibido",0,0);
			 	$pdf->Ln(2);
			 	$pdf->MultiCell(190,5,"__________________________",0,0)	;
			 	$pdf->Ln(3)	;
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

	public function rZonaVerde(){
		$this->zonaverde = new classreporte();
				$this->actdes = new classreporte();
				$this->desceg = new classreporte();
				$this->leyes = new classreporte();
				$this->datoszonaverde = new classreporte();

				$this->zonaverde->setAtributo('PU04IDTRA', $_REQUEST['id']);
				$result1 = $this->zonaverde->listarZonaVerde();
				$this->datoszonaverde->setAtributo('PU04IDTRA', $_REQUEST['id']);
				$datos = $this->datoszonaverde->listardatosZonaVerde();

				$this->desceg->setAtributo('PU04IDTRA', $_REQUEST['id']);
				$result2 = $this->desceg->listarDESCEG();
				$this->actdes->setAtributo('PU04IDTRA', $_REQUEST['id']);
				$result3 = $this->actdes->listarACTDES();
				$this->leyes->setAtributo('PU04IDTRA', $_REQUEST['id']);
				$result4 = $this->leyes->listarLey();

				$pdf = new PDF();
				$pdf->AliasNbPages();
				$pdf->AddPage();
				$pdf->SetFillColor(255,255,255);
				$pdf->SetFont('Arial','B',11);
				try
				{

					while ($row = mysqli_fetch_array($result1)) {
						$pdf->MultiCell(50,5,$row[0],0,1);
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
					 	$pdf->MultiCell(190,5,utf8_decode('El terreno evaluado es afectado por el Plan Regulador vigente del cantón de Nicoya. La Resolución Municipal de Ubicación corresponde a Zona:.'),0,1,'J');
					 	while ($fila = mysqli_fetch_array($datos)) {
					 		$pdf->Ln(1);
					 		$pdf->MultiCell(100,5,utf8_decode("* ".$fila[0]."."),0,1,'J');
					 		$pdf->Ln(1);
					 	}

					 	$pdf->Ln(2);

					 	$pdf->MultiCell(55,5,utf8_decode('> Uso Actual del Suelo'),0,1,'J');

					 	while ($fila1 = mysqli_fetch_array($result2)) {
					 		$pdf->Ln(1);
					 		$pdf->MultiCell(100,5,utf8_decode("* ".$fila1[0]."."),0,1,'J');
					 		$pdf->Ln(1);
					 	}
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(55,5,"> Actividad a Desarrollar",0,1,'J');
					 	$pdf->Ln(2);
					 	while ($fila2 = mysqli_fetch_array($result3)) {
					 		$pdf->Ln(1);
					 		$pdf->MultiCell(100,5,utf8_decode("* ".$fila2[0]."."),0,1,'J');
					 		$pdf->Ln(1);
					 	}
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(190,5,"Se concluye: ",0,1,'J');
					 	/*while ($fila3 = mysqli_fetch_array($result4)) {
					 		$pdf->Ln(1);
					 		$pdf->MultiCell(190,5,utf8_decode($fila3[0]),0,'J');
					 		$pdf->Ln(2);
					 	}*/
					 	$pdf->MultiCell(100,5,"Por tanto",0,0);
					 	$pdf->Ln(1);
					 	$pdf->MultiCell(190,5,utf8_decode("Se ".$row[1]." la RESOLUCIÓN DE UBICACIÓN MUNICIPAL, mediante oficio DPU-RMU-".$row[1].", para la Finca 5-".$row[7]." quedando sujeto a las disposiciones de la legislación vigente y en observaciones de nuestro ordenamiento jurídico, cualquier transgresión a las normas, producirá anulación del acto administrativo."),0,'J');
					 	$pdf->Ln(1);
					 	$pdf->MultiCell(190,5,utf8_decode('Nota: Al haber aprobado la Resolución de Ubicación Municipal eso implica que se está dado el permiso para movimiento de tierra, cortes, rellenos, construcción construcción, desfogue fluvial, todo lo relacionado con obras civiles por lo que deberan ser tramitado en el momento que se requiera dicho permiso y también si la Resolución Municipal (Uso de Suelo) es positivo, no obliga a la municipalidad a otorgar la respectiva pantente, esta debe ser solicitado de conformidad con la normativa establecido por esta institución para estos efectos.'),0,'J');
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(190,5,"Atentamente, ",0,1);
					 	$pdf->MultiCell(180,5,"Firma de Recibido",0,0);
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(190,5,"__________________________",0,0)	;
					 	$pdf->Ln(5);
					 	$pdf->MultiCell(190,5,utf8_decode('# Cedula: __________________________'),0,0,'R');
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
	}//listo

	public function rInstitucional(){
		$this->institucional = new classreporte();
				$this->actdes = new classreporte();
				$this->desceg = new classreporte();
				$this->leyes = new classreporte();
				$this->datosintitu = new classreporte();

				$this->institucional->setAtributo('PU04IDTRA', $_REQUEST['id']);
				$result1 = $this->institucional->listarInstitucional();
				$this->datosintitu->setAtributo('PU04IDTRA', $_REQUEST['id']);
				$datos = $this->datosintitu->listardatosInstitu();

				$this->desceg->setAtributo('PU04IDTRA', $_REQUEST['id']);
				$result2 = $this->desceg->listarDESCEG();
				$this->actdes->setAtributo('PU04IDTRA', $_REQUEST['id']);
				$result3 = $this->actdes->listarACTDES();
				$this->leyes->setAtributo('PU04IDTRA', $_REQUEST['id']);
				$result4 = $this->leyes->listarLey();

				$pdf = new PDF();
				$pdf->AliasNbPages();
				$pdf->AddPage();
				$pdf->SetFillColor(255,255,255);
				$pdf->SetFont('Arial','B',11);
				try
				{

					while ($row = mysqli_fetch_array($result1)) {
						$pdf->MultiCell(50,5,$row[0],0,1);
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
					 	$pdf->MultiCell(190,5,utf8_decode('El terreno evaluado es afectado por el Plan Regulador vigente del cantón de Nicoya. La Resolución Municipal de Ubicación corresponde a Zona Residencial.'),0,1,'J');
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
					 	$pdf->MultiCell(55,5,utf8_decode('> Uso Actual del Suelo'),0,1,'J');

					 	while ($fila1 = mysqli_fetch_array($result2)) {
					 		$pdf->Ln(1);
					 		$pdf->MultiCell(100,5,utf8_decode("* ".$fila1[0]."."),0,1,'J');
					 		$pdf->Ln(1);
					 	}
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(55,5,"> Actividad a Desarrollar",0,1,'J');
					 	$pdf->Ln(2);
					 	while ($fila2 = mysqli_fetch_array($result3)) {
					 		$pdf->Ln(1);
					 		$pdf->MultiCell(100,5,utf8_decode("* ".$fila2[0]."."),0,1,'J');
					 		$pdf->Ln(1);
					 	}
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(190,5,"Se concluye: ",0,1,'J');
					 	/*while ($fila3 = mysqli_fetch_array($result4)) {
					 		$pdf->Ln(1);
					 		$pdf->MultiCell(190,5,utf8_decode($fila3[0]),0,'J');
					 		$pdf->Ln(2);
					 	}*/
					 	$pdf->MultiCell(100,5,"Por tanto",0,0);
					 	$pdf->Ln(1);
					 	$pdf->MultiCell(190,5,utf8_decode("Se ".$row[1]." la RESOLUCIÓN DE UBICACIÓN MUNICIPAL, mediante oficio DPU-RMU-".$row[1].", para la Finca 5-".$row[7]." quedando sujeto a las disposiciones de la legislación vigente y en observaciones de nuestro ordenamiento jurídico, cualquier transgresión a las normas, producirá anulación del acto administrativo."),0,'J');
					 	$pdf->Ln(1);
					 	$pdf->MultiCell(190,5,utf8_decode('Nota: Al haber aprobado la Resolución de Ubicación Municipal eso implica que se está dado el permiso para movimiento de tierra, cortes, rellenos, construcción construcción, desfogue fluvial, todo lo relacionado con obras civiles por lo que deberan ser tramitado en el momento que se requiera dicho permiso y también si la Resolución Municipal (Uso de Suelo) es positivo, no obliga a la municipalidad a otorgar la respectiva pantente, esta debe ser solicitado de conformidad con la normativa establecido por esta institución para estos efectos.'),0,'J');
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(190,5,"Atentamente, ",0,1);
					 	$pdf->MultiCell(180,5,"Firma de Recibido",0,0);
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(190,5,"__________________________",0,0)	;
					 	$pdf->Ln(5);
					 	$pdf->MultiCell(190,5,utf8_decode('# Cedula: __________________________'),0,0,'R');
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
	}//listo

	public function rComercialCentral(){
		$this->comercialcentral = new classreporte();
				$this->actdes = new classreporte();
				$this->desceg = new classreporte();
				$this->leyes = new classreporte();
				$this->datoscomercentral = new classreporte();

				$this->comercialcentral->setAtributo('PU04IDTRA', $_REQUEST['id']);
				$result1 = $this->comercialcentral->listarComercialCentral();
				$this->datoscomercentral->setAtributo('PU04IDTRA', $_REQUEST['id']);
				$datos = $this->datoscomercentral->listardatosComerCentral();

				$this->desceg->setAtributo('PU04IDTRA', $_REQUEST['id']);
				$result2 = $this->desceg->listarDESCEG();
				$this->actdes->setAtributo('PU04IDTRA', $_REQUEST['id']);
				$result3 = $this->actdes->listarACTDES();
				$this->leyes->setAtributo('PU04IDTRA', $_REQUEST['id']);
				$result4 = $this->leyes->listarLey();

				$pdf = new PDF();
				$pdf->AliasNbPages();
				$pdf->AddPage();
				$pdf->SetFillColor(255,255,255);
				$pdf->SetFont('Arial','B',11);
				try
				{

					while ($row = mysqli_fetch_array($result1)) {
						$pdf->MultiCell(50,5,$row[0],0,1);
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
					 	$pdf->MultiCell(190,5,utf8_decode('El terreno evaluado es afectado por el Plan Regulador vigente del cantón de Nicoya. La Resolución Municipal de Ubicación corresponde zona'),0,1,'J');
					 	while ($fila = mysqli_fetch_array($datos)) {
					 		$pdf->Ln(1);
					 		$pdf->MultiCell(100,5,utf8_decode("* ".$fila[0]."."),0,1,'J');
					 		$pdf->Ln(1);
					 	}
					 	$pdf->MultiCell(190,5,utf8_decode('Zona Comercial Central'),0,1,'J');
					 	$pdf->MultiCell(190,5,utf8_decode('Usos permitidos: '),0,1,'J');
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(190,5,utf8_decode('•	Viviendas y apartamentos situados en pisos superiores al primero.'),0,1,'J');
					 	$pdf->MultiCell(190,5,utf8_decode('•	El resto de los usos urbanos a excepción de los indicados en usos condicionales de Comercio Central y los usos industriales.'),0,1,'J');
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(190,5,utf8_decode(' Usos Condicionales: '),0,1,'J');
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(190,5,utf8_decode('Previo cumplimiento de requisitos establecidos en este reglamento para los usos condicionales (artículo 2, inciso b, párrafo 3), se permitirá el uso de terreno y edificios para los fines indicados.'),0,1,'C');
					 	$pdf->MultiCell(190,5,utf8_decode('•	Venta por menor de materiales de construcción en locales cerrados.'),0,1,'C');
					 	$pdf->MultiCell(190,5,utf8_decode('•	Talleres de artesanía e industrias artesanales que no emplee mas de 5 empleados , así como reparación de artículos eléctricos, equipo oficina, utensilios domésticos, bicicletas y similares, siempre que su operación y el almacenamiento de materiales y equipo se haga  en un local completamente cerrado y  un área de piso no mayor de 200 metros cuadrados.'),0,1,'C');
					 	$pdf->MultiCell(190,5,utf8_decode('•	Cualquier otro servicio o negocio de características y efectos similares de los descritos  que además, de no ser perjudiciales a los usos vecinos, no produzcan  ruidos, vibraciones, humo, olores polvo suciedad, gases nocivos,  resplandor, calor y peligro de fuego, o explosión en mayor grado que normalmente producirán las indicadas actividades.'),0,1,'J');
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(190,5,utf8_decode('Requisitos:'),0,1,'J');
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(190,5,utf8_decode('•	La superficie del lote no será menor de 140 m2 para construcciones de hasta 2 pisos y de 280 m2, para las que exceden de 2 pisos.'),0,1,'J');
					 	$pdf->MultiCell(190,5,utf8_decode('•	Frente de lote no será menor a 8 m.'),0,1,'J');
					 	$pdf->MultiCell(190,5,utf8_decode('•	Retiros: '),0,1,'J');

					 	$pdf->MultiCell(190,5,utf8_decode('Frontal: 2.5 m, que se usará de antejardín, con la posibilidad de ser acera peatonal.'),0,1,'C');
					 	$pdf->MultiCell(190,5,utf8_decode('Posterior: 3 m.class0102usuariosController.php'),0,1,'C');

					 	$pdf->MultiCell(190,5,utf8_decode('•	Cobertura de las estructuras: se permitirá una cobertura del 80 % de la superficie del lote.'),0,1,'J');
					 	$pdf->MultiCell(190,5,utf8_decode('•	Área de piso no excederá del 80 % de la superficie del lote.'),0,1,'J');
					 	$pdf->MultiCell(190,5,utf8_decode('•	Altura de las estructuras: la altura de los edificios no excederá de 12 m o 4 pisos.'),0,1,'J');

					 	$pdf->Ln(2);

					 	$pdf->MultiCell(55,5,utf8_decode('> Uso Actual del Suelo'),0,1,'J');

					 	while ($fila1 = mysqli_fetch_array($result2)) {
					 		$pdf->Ln(1);
					 		$pdf->MultiCell(100,5,utf8_decode("* ".$fila1[0]."."),0,1,'J');
					 		$pdf->Ln(1);
					 	}
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(55,5,"> Actividad a Desarrollar",0,1,'J');
					 	$pdf->Ln(2);
					 	while ($fila2 = mysqli_fetch_array($result3)) {
					 		$pdf->Ln(1);
					 		$pdf->MultiCell(100,5,utf8_decode("* ".$fila2[0]."."),0,1,'J');
					 		$pdf->Ln(1);
					 	}
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(190,5,"Se concluye: ",0,1,'J');
					 	/*while ($fila3 = mysqli_fetch_array($result4)) {
					 		$pdf->Ln(1);
					 		$pdf->MultiCell(190,5,utf8_decode($fila3[0]),0,'J');
					 		$pdf->Ln(2);
					 	}*/
					 	$pdf->MultiCell(100,5,"Por tanto",0,0);
					 	$pdf->Ln(1);
					 	$pdf->MultiCell(190,5,utf8_decode("Se ".$row[1]." la RESOLUCIÓN DE UBICACIÓN MUNICIPAL, mediante oficio DPU-RMU-".$row[1].", para la Finca 5-".$row[7]." quedando sujeto a las disposiciones de la legislación vigente y en observaciones de nuestro ordenamiento jurídico, cualquier transgresión a las normas, producirá anulación del acto administrativo."),0,'J');
					 	$pdf->Ln(1);
					 	$pdf->MultiCell(190,5,utf8_decode('Nota: Al haber aprobado la Resolución de Ubicación Municipal eso implica que se está dado el permiso para movimiento de tierra, cortes, rellenos, construcción construcción, desfogue fluvial, todo lo relacionado con obras civiles por lo que deberan ser tramitado en el momento que se requiera dicho permiso y también si la Resolución Municipal (Uso de Suelo) es positivo, no obliga a la municipalidad a otorgar la respectiva pantente, esta debe ser solicitado de conformidad con la normativa establecido por esta institución para estos efectos.'),0,'J');
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(190,5,"Atentamente, ",0,1);
					 	$pdf->MultiCell(180,5,"Firma de Recibido",0,0);
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(190,5,"__________________________",0,0)	;
					 	$pdf->Ln(5);
					 	$pdf->MultiCell(190,5,utf8_decode('# Cedula: __________________________'),0,0,'R');
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
	}//listo

	public function rIndustrial(){
		$this->industrial = new classreporte();
				$this->actdes = new classreporte();
				$this->desceg = new classreporte();
				$this->leyes = new classreporte();
				$this->datosindustrial = new classreporte();

				$this->industrial->setAtributo('PU04IDTRA', $_REQUEST['id']);
				$result1 = $this->industrial->listarIndustrial();
				$this->datosindustrial->setAtributo('PU04IDTRA', $_REQUEST['id']);
				$datos = $this->datosindustrial->listardatosIndustrial();

				$this->desceg->setAtributo('PU04IDTRA', $_REQUEST['id']);
				$result2 = $this->desceg->listarDESCEG();
				$this->actdes->setAtributo('PU04IDTRA', $_REQUEST['id']);
				$result3 = $this->actdes->listarACTDES();
				$this->leyes->setAtributo('PU04IDTRA', $_REQUEST['id']);
				$result4 = $this->leyes->listarLey();

				$pdf = new PDF();
				$pdf->AliasNbPages();
				$pdf->AddPage();
				$pdf->SetFillColor(255,255,255);
				$pdf->SetFont('Arial','B',11);
				try
				{

					while ($row = mysqli_fetch_array($result1)) {
						$pdf->MultiCell(50,5,$row[0],0,1);
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
					 	$pdf->MultiCell(55,5,utf8_decode('> Uso Actual del Suelo'),0,1,'J');

					 	while ($fila1 = mysqli_fetch_array($result2)) {
					 		$pdf->Ln(1);
					 		$pdf->MultiCell(100,5,utf8_decode("* ".$fila1[0]."."),0,1,'J');
					 		$pdf->Ln(1);
					 	}
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(55,5,"> Actividad a Desarrollar",0,1,'J');
					 	$pdf->Ln(2);
					 	while ($fila2 = mysqli_fetch_array($result3)) {
					 		$pdf->Ln(1);
					 		$pdf->MultiCell(100,5,utf8_decode("* ".$fila2[0]."."),0,1,'J');
					 		$pdf->Ln(1);
					 	}
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(190,5,"Se concluye: ",0,1,'J');
					 	/*while ($fila3 = mysqli_fetch_array($result4)) {
					 		$pdf->Ln(1);
					 		$pdf->MultiCell(190,5,utf8_decode($fila3[0]),0,'J');
					 		$pdf->Ln(2);
					 	}*/
					 	$pdf->MultiCell(100,5,"Por tanto",0,0);
					 	$pdf->Ln(1);
					 	$pdf->MultiCell(190,5,utf8_decode("Se ".$row[1]." la RESOLUCIÓN DE UBICACIÓN MUNICIPAL, mediante oficio DPU-RMU-".$row[1].", para la Finca 5-".$row[7]." quedando sujeto a las disposiciones de la legislación vigente y en observaciones de nuestro ordenamiento jurídico, cualquier transgresión a las normas, producirá anulación del acto administrativo."),0,'J');
					 	$pdf->Ln(1);
					 	$pdf->MultiCell(190,5,utf8_decode('Nota: Al haber aprobado la Resolución de Ubicación Municipal eso implica que se está dado el permiso para movimiento de tierra, cortes, rellenos, construcción construcción, desfogue fluvial, todo lo relacionado con obras civiles por lo que deberan ser tramitado en el momento que se requiera dicho permiso y también si la Resolución Municipal (Uso de Suelo) es positivo, no obliga a la municipalidad a otorgar la respectiva pantente, esta debe ser solicitado de conformidad con la normativa establecido por esta institución para estos efectos.'),0,'J');
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(190,5,"Atentamente, ",0,1);
					 	$pdf->MultiCell(180,5,"Firma de Recibido",0,0);
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(190,5,"__________________________",0,0)	;
					 	$pdf->Ln(5);
					 	$pdf->MultiCell(190,5,utf8_decode('# Cedula: __________________________'),0,0,'R');
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
	}//listo
	
	public function rResidencialComercial(){
		$this->residencialcomercial = new classreporte();
				$this->actdes = new classreporte();
				$this->desceg = new classreporte();
				$this->leyes = new classreporte();
				$this->datosresicomercial = new classreporte();

				$this->residencialcomercial->setAtributo('PU04IDTRA', $_REQUEST['id']);
				$result1 = $this->residencialcomercial->listarResidencialComercial();
				$this->datosresicomercial->setAtributo('PU04IDTRA', $_REQUEST['id']);
				$datos = $this->datosresicomercial->listardatosResiComercial();

				$this->desceg->setAtributo('PU04IDTRA', $_REQUEST['id']);
				$result2 = $this->desceg->listarDESCEG();
				$this->actdes->setAtributo('PU04IDTRA', $_REQUEST['id']);
				$result3 = $this->actdes->listarACTDES();
				$this->leyes->setAtributo('PU04IDTRA', $_REQUEST['id']);
				$result4 = $this->leyes->listarLey();

				$pdf = new PDF();
				$pdf->AliasNbPages();
				$pdf->AddPage();
				$pdf->SetFillColor(255,255,255);
				$pdf->SetFont('Arial','B',11);
				try
				{

					while ($row = mysqli_fetch_array($result1)) {
						$pdf->MultiCell(50,5,$row[0],0,1);
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
					 	$pdf->MultiCell(190,5,utf8_decode('Usos permitidos:'),0,1,'J');
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(190,5,utf8_decode('Todos los urbanos, a excepción de las industrias, talleres, bodegas, aserraderos y usos similares a estos en cuanto a las molestias (ruido, tránsito intenso, olor, etc.) que provoquen en el vecindario. También se  exceptúa el comercio que produzca las molestias antes dichas.'),0,1,'J');
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(190,5,utf8_decode('Usos Condicionados'),0,1,'J');
					 	$pdf->Ln(2);
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
					 	$pdf->MultiCell(55,5,utf8_decode('> Uso Actual del Suelo'),0,1,'J');

					 	while ($fila1 = mysqli_fetch_array($result2)) {
					 		$pdf->Ln(1);
					 		$pdf->MultiCell(100,5,utf8_decode("* ".$fila1[0]."."),0,1,'J');
					 		$pdf->Ln(1);
					 	}
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(55,5,"> Actividad a Desarrollar",0,1,'J');
					 	$pdf->Ln(2);
					 	while ($fila2 = mysqli_fetch_array($result3)) {
					 		$pdf->Ln(1);
					 		$pdf->MultiCell(100,5,utf8_decode("* ".$fila2[0]."."),0,1,'J');
					 		$pdf->Ln(1);
					 	}
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(190,5,"Se concluye: ",0,1,'J');
					 	/*while ($fila3 = mysqli_fetch_array($result4)) {
					 		$pdf->Ln(1);
					 		$pdf->MultiCell(190,5,utf8_decode($fila3[0]),0,'J');
					 		$pdf->Ln(2);
					 	}*/
					 	$pdf->MultiCell(100,5,"Por tanto",0,0);
					 	$pdf->Ln(1);
					 	$pdf->MultiCell(190,5,utf8_decode("Se ".$row[1]." la RESOLUCIÓN DE UBICACIÓN MUNICIPAL, mediante oficio DPU-RMU-".$row[1].", para la Finca 5-".$row[7]." quedando sujeto a las disposiciones de la legislación vigente y en observaciones de nuestro ordenamiento jurídico, cualquier transgresión a las normas, producirá anulación del acto administrativo."),0,'J');
					 	$pdf->Ln(1);
					 	$pdf->MultiCell(190,5,utf8_decode('Nota: Al haber aprobado la Resolución de Ubicación Municipal eso implica que se está dado el permiso para movimiento de tierra, cortes, rellenos, construcción construcción, desfogue fluvial, todo lo relacionado con obras civiles por lo que deberan ser tramitado en el momento que se requiera dicho permiso y también si la Resolución Municipal (Uso de Suelo) es positivo, no obliga a la municipalidad a otorgar la respectiva pantente, esta debe ser solicitado de conformidad con la normativa establecido por esta institución para estos efectos.'),0,'J');
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(190,5,"Atentamente, ",0,1);
					 	$pdf->MultiCell(180,5,"Firma de Recibido",0,0);
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(190,5,"__________________________",0,0)	;
					 	$pdf->Ln(5);
					 	$pdf->MultiCell(190,5,utf8_decode('# Cedula: __________________________'),0,0,'R');
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
	}//listp
	
	public function rResidencial(){
				$this->residecial = new classreporte();
				$this->actdes = new classreporte();
				$this->desceg = new classreporte();
				$this->leyes = new classreporte();
				$this->datosresidencial = new classreporte();

				$this->residecial->setAtributo('PU04IDTRA', $_REQUEST['id']);
				$result1 = $this->residecial->listarRESI();
				$this->datosresidencial->setAtributo('PU04IDTRA', $_REQUEST['id']);
				$datos = $this->datosresidencial->listarDatosResi();

				$this->desceg->setAtributo('PU04IDTRA', $_REQUEST['id']);
				$result2 = $this->desceg->listarDESCEG();
				$this->actdes->setAtributo('PU04IDTRA', $_REQUEST['id']);
				$result3 = $this->actdes->listarACTDES();
				$this->leyes->setAtributo('PU04IDTRA', $_REQUEST['id']);
				$result4 = $this->leyes->listarLey();

				$pdf = new PDF();
				$pdf->AliasNbPages();
				$pdf->AddPage();
				$pdf->SetFillColor(255,255,255);
				$pdf->SetFont('Arial','B',11);
				try
				{

					while ($row = mysqli_fetch_array($result1)) {
						$pdf->MultiCell(50,5,$row[0],0,1);
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

					 	$pdf->MultiCell(55,5,utf8_decode('> Uso Actual del Suelo'),0,1,'J');

					 	while ($fila1 = mysqli_fetch_array($result2)) {
					 		$pdf->Ln(1);
					 		$pdf->MultiCell(100,5,utf8_decode("* ".$fila1[0]."."),0,1,'J');
					 		$pdf->Ln(1);
					 	}
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(55,5,"> Actividad a Desarrollar",0,1,'J');
					 	$pdf->Ln(2);
					 	while ($fila2 = mysqli_fetch_array($result3)) {
					 		$pdf->Ln(1);
					 		$pdf->MultiCell(100,5,utf8_decode("* ".$fila2[0]."."),0,1,'J');
					 		$pdf->Ln(1);
					 	}
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(190,5,"Se concluye: ",0,1,'J');
					 	/*while ($fila3 = mysqli_fetch_array($result4)) {
					 		$pdf->Ln(1);
					 		$pdf->MultiCell(190,5,utf8_decode($fila3[0]),0,'J');
					 		$pdf->Ln(2);
					 	}*/
					 	$pdf->MultiCell(100,5,"Por tanto",0,0);
					 	$pdf->Ln(1);
					 	$pdf->MultiCell(190,5,utf8_decode("Se ".$row[1]." la RESOLUCIÓN DE UBICACIÓN MUNICIPAL, mediante oficio DPU-RMU-".$row[1].", para la Finca 5-".$row[7]." quedando sujeto a las disposiciones de la legislación vigente y en observaciones de nuestro ordenamiento jurídico, cualquier transgresión a las normas, producirá anulación del acto administrativo."),0,'J');
					 	$pdf->Ln(1);
					 	$pdf->MultiCell(190,5,utf8_decode('Nota: Al haber aprobado la Resolución de Ubicación Municipal eso implica que se está dado el permiso para movimiento de tierra, cortes, rellenos, construcción construcción, desfogue fluvial, todo lo relacionado con obras civiles por lo que deberan ser tramitado en el momento que se requiera dicho permiso y también si la Resolución Municipal (Uso de Suelo) es positivo, no obliga a la municipalidad a otorgar la respectiva pantente, esta debe ser solicitado de conformidad con la normativa establecido por esta institución para estos efectos.'),0,'J');
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(190,5,"Atentamente, ",0,1);
					 	$pdf->MultiCell(180,5,"Firma de Recibido",0,0);
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(190,5,"__________________________",0,0)	;
					 	$pdf->Ln(5);
					 	$pdf->MultiCell(190,5,utf8_decode('# Cedula: __________________________'),0,0,'R');
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
	}//listo
	
	public function rTuristicoComercial(){
		$this->turisticocomercial = new classreporte();
				$this->actdes = new classreporte();
				$this->desceg = new classreporte();
				$this->leyes = new classreporte();
				$this->datosturistico = new classreporte();

				$this->turisticocomercial->setAtributo('PU04IDTRA', $_REQUEST['id']);
				$result1 = $this->turisticocomercial->listarTuristicoComercial();
				$this->datosturistico->setAtributo('PU04IDTRA', $_REQUEST['id']);
				$datos = $this->datosturistico->listarTuristicoComercial();

				$this->desceg->setAtributo('PU04IDTRA', $_REQUEST['id']);
				$result2 = $this->desceg->listarDESCEG();
				$this->actdes->setAtributo('PU04IDTRA', $_REQUEST['id']);
				$result3 = $this->actdes->listarACTDES();
				$this->leyes->setAtributo('PU04IDTRA', $_REQUEST['id']);
				$result4 = $this->leyes->listarLey();

				$pdf = new PDF();
				$pdf->AliasNbPages();
				$pdf->AddPage();
				$pdf->SetFillColor(255,255,255);
				$pdf->SetFont('Arial','B',11);
				try
				{

					while ($row = mysqli_fetch_array($result1)) {
						$pdf->MultiCell(50,5,$row[0],0,1);
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
					 	$pdf->MultiCell(190,5,utf8_decode('La zona donde se encuentra esta propiedad corresponde a Comercial-Turístico, según el Plan Regulador Vigente del Cantón de Nicoya.'),0,1,'J');
					 	while ($fila = mysqli_fetch_array($datos)) {
					 		$pdf->Ln(1);
					 		$pdf->MultiCell(100,5,utf8_decode("* ".$fila[0]."."),0,1,'J');
					 		$pdf->Ln(1);
					 	}
					 	$pdf->MultiCell(190,5,utf8_decode('Usos permitidos: '),0,1,'J');
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(190,5,utf8_decode('•	Viviendas y apartamentos situados en pisos superiores al primero.'),0,1,'J');
					 	$pdf->MultiCell(190,5,utf8_decode('•	El resto de los usos urbanos a excepción de los indicados en usos condicionales de Comercio Central y los usos industriales.'),0,1,'J');
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(190,5,utf8_decode(' Usos Condicionales: '),0,1,'J');
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(190,5,utf8_decode('Previo cumplimiento de requisitos establecidos en este reglamento para los usos condicionales (artículo 2, inciso b, párrafo 3), se permitirá el uso de terreno y edificios para los fines indicados.'),0,1,'J');
					 	$pdf->MultiCell(190,5,utf8_decode('3.	RETIROS MÍNIMOS:'),0,1,'J');
					 	$pdf->MultiCell(190,5,utf8_decode('•	Venta por menor de materiales de construcción en locales cerrados.'),0,1,'J');
					 	$pdf->MultiCell(190,5,utf8_decode('•	Talleres de artesanía e industrias artesanales que no emplee mas de 5 empleados , así como reparación de artículos eléctricos, equipo oficina, utensilios domésticos, bicicletas y similares, siempre que su operación y el almacenamiento de materiales y equipo se haga  en un local completamente cerrado y  un área de piso no mayor de 200 metros cuadrados.'),0,1,'J');
					 	$pdf->MultiCell(190,5,utf8_decode('•	Cualquier otro servicio o negocio de características y efectos similares de los descritos  que además, de no ser perjudiciales a los usos vecinos, no produzcan  ruidos, vibraciones, humo, olores polvo suciedad, gases nocivos,  resplandor, calor y peligro de fuego, o explosión en mayor grado que normalmente producirán las indicadas actividades.'),0,1,'J');
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(190,5,utf8_decode('Requisitos:'),0,1,'J');
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(190,5,utf8_decode('•	La superficie del lote no será menor de 140 m2 para construcciones de hasta 2 pisos y de 280 m2, para las que exceden de 2 pisos.'),0,1,'J');
					 	$pdf->MultiCell(190,5,utf8_decode('•	Frente de lote no será menor a 8 m.'),0,1,'J');
					 	$pdf->MultiCell(190,5,utf8_decode('•	Retiros: '),0,1,'J');
					 	$pdf->MultiCell(190,5,utf8_decode('Frontal: 2.5 m, que se usará de antejardín, con la posibilidad de ser acera peatonal.'),0,1,'J');
					 	$pdf->MultiCell(190,5,utf8_decode('Posterior: 3 m.'),0,1,'J');
					 	$pdf->MultiCell(190,5,utf8_decode('•	Cobertura de las estructuras: se permitirá una cobertura del 80 % de la superficie del lote.'),0,1,'J');
					 	$pdf->MultiCell(190,5,utf8_decode('•	Área de piso no excederá del 80 % de la superficie del lote.'),0,1,'J');
					 	$pdf->MultiCell(190,5,utf8_decode('•	Altura de las estructuras: la altura de los edificios no excederá de 12 m o 4 pisos.'),0,1,'J');

					 	$pdf->Ln(2);

					 	$pdf->MultiCell(55,5,utf8_decode('> Uso Actual del Suelo'),0,1,'J');

					 	while ($fila1 = mysqli_fetch_array($result2)) {
					 		$pdf->Ln(1);
					 		$pdf->MultiCell(100,5,utf8_decode("* ".$fila1[0]."."),0,1,'J');
					 		$pdf->Ln(1);
					 	}
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(55,5,"> Actividad a Desarrollar",0,1,'J');
					 	$pdf->Ln(2);
					 	while ($fila2 = mysqli_fetch_array($result3)) {
					 		$pdf->Ln(1);
					 		$pdf->MultiCell(100,5,utf8_decode("* ".$fila2[0]."."),0,1,'J');
					 		$pdf->Ln(1);
					 	}
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(190,5,"Se concluye: ",0,1,'J');
					 	/*while ($fila3 = mysqli_fetch_array($result4)) {
					 		$pdf->Ln(1);
					 		$pdf->MultiCell(190,5,utf8_decode($fila3[0]),0,'J');
					 		$pdf->Ln(2);
					 	}*/
					 	$pdf->MultiCell(100,5,"Por tanto",0,0);
					 	$pdf->Ln(1);
					 	$pdf->MultiCell(190,5,utf8_decode("Se ".$row[1]." la RESOLUCIÓN DE UBICACIÓN MUNICIPAL, mediante oficio DPU-RMU-".$row[1].", para la Finca 5-".$row[7]." quedando sujeto a las disposiciones de la legislación vigente y en observaciones de nuestro ordenamiento jurídico, cualquier transgresión a las normas, producirá anulación del acto administrativo."),0,'J');
					 	$pdf->Ln(1);
					 	$pdf->MultiCell(190,5,utf8_decode('Nota: Al haber aprobado la Resolución de Ubicación Municipal eso implica que se está dado el permiso para movimiento de tierra, cortes, rellenos, construcción construcción, desfogue fluvial, todo lo relacionado con obras civiles por lo que deberan ser tramitado en el momento que se requiera dicho permiso y también si la Resolución Municipal (Uso de Suelo) es positivo, no obliga a la municipalidad a otorgar la respectiva pantente, esta debe ser solicitado de conformidad con la normativa establecido por esta institución para estos efectos.'),0,'J');
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(190,5,"Atentamente, ",0,1);
					 	$pdf->MultiCell(180,5,"Firma de Recibido",0,0);
					 	$pdf->Ln(2);
					 	$pdf->MultiCell(190,5,"__________________________",0,0)	;
					 	$pdf->Ln(5);
					 	$pdf->MultiCell(190,5,utf8_decode('# Cedula: __________________________'),0,0,'R');
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
	}//listo
}
?>