<?php 
require_once 'model/class04oficina.php';
require_once 'model/class06actdes.php';
class class04oficinaController
{
	private $class04oficina;

	function __construct()
	{
		$this->class04oficina = new class04oficina();
	}
	public function index()
	{
		require_once 'view/header.php';
		require_once 'view/class04oficina/index.php';
		require_once 'view/footer.php';
	}
	public function index1()
	{
		require_once 'view/header.php';
		require_once 'view/class04oficina/index1.php';
		require_once 'view/footer.php';
	}
	public function index2()
	{
		require_once 'view/header.php';
		require_once 'view/class04oficina/index2.php';
		require_once 'view/footer.php';
	}
	public function index3()
	{
		require_once 'view/header.php';
		require_once 'view/class04oficina/index3.php';
		require_once 'view/footer.php';
	}
	public function index4()
	{
		require_once 'view/header.php';
		require_once 'view/class04oficina/index4.php';
		require_once 'view/footer.php';
	}
	public function index5()
	{
		require_once 'view/header.php';
		require_once 'view/class04oficina/index5.php';
		require_once 'view/footer.php';
	}
	public function index6()
	{
		require_once 'view/header.php';
		require_once 'view/class04oficina/index6.php';
		require_once 'view/footer.php';
	}
	public function agregar()
	{
		
		if ($_POST) {
			$this->class04oficina->setAtributo('PU04IDTRA',$_POST['PU04IDTRA']);
			$this->class04oficina->setAtributo('PU39CEDSOLICI',$_POST['PU39CEDSOLICI']);
			$this->class04oficina->setAtributo('PU40CEDPROPIE',$_POST['PU40CEDPROPIE']);
			$this->class04oficina->setAtributo('PU40NFINCA',$_POST['PU40NFINCA']);
			$this->class04oficina->guardar();
			header('location:?c=class04oficina&m=index4');

		}
		else{

			$this->class04oficina = $this->class04oficina->buscarTraIng($_REQUEST['id']);
			require_once 'view/header.php';
			require_once 'view/class04oficina/agregar.php';
			require_once 'view/footer.php';
		}
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////////
public function editar()
	{
		
		if ($_POST) {
			$this->class04oficina->setAtributo('PU04IDTRA',$_POST['PU04IDTRA']);
			$this->class04oficina->setAtributo('PU39CEDSOLICI',$_POST['PU39CEDSOLICI']);
			$this->class04oficina->setAtributo('PU40CEDPROPIE',$_POST['PU40CEDPROPIE']);
			$this->class04oficina->setAtributo('PU40NFINCA',$_POST['PU40NFINCA']);
			$this->class04oficina->editar();
			header('location:?c=class04oficina&m=index2');

		}
		else{

			$this->class04oficina = $this->class04oficina->buscar($_REQUEST['id']);
			require_once 'view/header.php';
			require_once 'view/class04oficina/editar.php';
			require_once 'view/footer.php';
		}
	}
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function editarActividades()
	{
		if($_POST){
			   $actividades = $this->class04oficina->getTodasActividades();
			    $this->class04oficina->eliminarActividades($_REQUEST['id']);
			    foreach ($actividades as $idactdes):
    				if( isset($_REQUEST['idactdes'.$idactdes['PU06IDACTDES']] ) )
      				$this->class04oficina->asignarActividades($_REQUEST['id'], $idactdes['PU06IDACTDES']);
  				endforeach;
				header('location:?c=class04oficina&m=editarActividades&id='.$_REQUEST['id']);
		}
		else{
			$this->class04oficina = $this->class04oficina->buscarTraIng($_REQUEST['id']);

			require_once 'view/header.php';
			require_once 'view/class04oficina/aplicarActividades.php';
			require_once 'view/footer.php';
		}
	}
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function revisarTra()
	{
		if ($_POST) {			
			header('location:?c=class04oficina&m=revisarTra&id='.$_REQUEST['id']);
		}
		else{
			$this->class04oficina = $this->class04oficina->buscar($_REQUEST['id']);

			$this->class04oficina1 = $this->class04oficina->buscarRegTramite($_REQUEST['id']);

			$auxClass04oficina = new class04oficina();
			$aux = new class04oficina();
			$auxNicoSama = new class04oficina();
			$auxAAP = new class04oficina();
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			$auxDEG = new class04oficina();
			$auxASPBIO = new class04oficina();
			$auxDESECTOR = new class04oficina();
			$auxTREDVIAL = new class04oficina();
			$auxPATENTES = new class04oficina();
			$auxACTRESIDENCIAL = new class04oficina();
			$auxACTDESARROLLO = new class04oficina();
			$auxACTCOMERCIAL = new class04oficina();
			$auxACTCOMERCIALINDUSTRIAL = new class04oficina();
			$auxACTESTACIONSERVICIOS = new class04oficina();


			$auxSERVIDUMBRES = new class04oficina();


				$auxPATENTESENCABEZADO = new class04oficina();


	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			$apartados = $auxClass04oficina->buscarIngresoTraAcceso($_REQUEST['id']);
			$traplanReg = $aux->buscarIngresoTraPlanReg($_REQUEST['id']);
			$nicosama = $auxNicoSama->buscarIngresoTraNicoSama($_REQUEST['id']);
			$aap = $auxAAP->buscarIngresoTraAAP($_REQUEST['id']);
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			


			$deg = $auxDEG->buscarIngresoTraEspacioGeo($_REQUEST['id']);
			$aspbio = $auxASPBIO->buscarIngresoTraAspBiofisicos($_REQUEST['id']);
			$desector = $auxDESECTOR->buscarIngresoTraDesarrolloSector($_REQUEST['id']);
			$tredvial = $auxTREDVIAL->buscarIngresoTraTipoRedVial($_REQUEST['id']);
			$patentes = $auxPATENTES->buscarIngresoTraPatentes($_REQUEST['id']);
			$actResidencial = $auxACTRESIDENCIAL->buscarIngresoTraActResidencial($_REQUEST['id']);
			$actDesarrollo = $auxACTDESARROLLO->buscarIngresoTraActDesarrollo($_REQUEST['id']);
			$actComercial = $auxACTCOMERCIAL->buscarIngresoTraActComercial($_REQUEST['id']);
	$actComercialIndustrial = $auxACTCOMERCIALINDUSTRIAL->buscarIngresoTraActComercialIndustrial($_REQUEST['id']);
	$actEstacionServicios = $auxACTESTACIONSERVICIOS->buscarIngresoTraActEstacionServicios($_REQUEST['id']);
	///////////////////////////////////////////////////////////////////////////////////////////////
//$patentesencabezado = $auxPATENTESENCABEZADO->buscarIngresoTraPatentes($_REQUEST['id']);
	//////////////////////
	$actservidumbre = $auxSERVIDUMBRES->buscarIngresoTraServidumbres($_REQUEST['id']);
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			 
			//$this->class04oficina2 = $this->class04oficina->buscarIngresoTraDeg($_REQUEST['id']);
			require_once 'view/header.php';
			require_once 'view/class04oficina/revisionTramite.php';
			require_once 'view/footer.php';
		}
	}
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*	public function revisarTra1()
	{
		if ($_POST) {			
			header('location:?c=class04oficina&m=revisarTra&id='.$_REQUEST['id']);
		}
		else{
			$this->class04oficina1 = $this->class04oficina->buscar($_REQUEST['id']);
			require_once 'view/header.php';
			require_once 'view/class04oficina/revisionTramite.php';
			require_once 'view/footer.php';
		}
	}

	public function eliminar()
	{
		$this->class04oficina->setAtributo('PU40APE1PROPIE',$_REQUEST['id']);
		$this->class04oficina->eliminar();
		header('location:?c=class04oficina&m=index');
	}

	public function ver()
	{
		$this->class04oficina = $this->class04oficina->buscar($_REQUEST['id']);
		require_once 'view/header.php';
		require_once 'view/class04oficina/ver.php';
		require_once 'view/footer.php';
	}*/
///////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function editarLeyes()
	{
		if($_POST){
			   $tipoley = $this->class04oficina->getTodasLeyes();
			    $this->class04oficina->eliminarLeyes($_REQUEST['id']);
			    foreach ($tipoley as $idtipoley):
    			if( isset($_REQUEST['idtipoley'.$idtipoley['pu45idley']] ) )
      			$this->class04oficina->asignarLeyes($_REQUEST['id'], $idtipoley['pu45idley']);
  				endforeach;
				header('location:?c=class04oficina&m=editarLeyes&id='.$_REQUEST['id']);
		}
		else{
			$this->class04oficina = $this->class04oficina->buscar($_REQUEST['id']);

			require_once 'view/header.php';
			require_once 'view/class04oficina/revisionTramite.php';
			require_once 'view/footer.php';
		}
	}

		public function guardarObservacionRevisionTramite()
	{
		if($_POST){
			$this->class04oficina->setAtributo('PU04IDTRA',$_POST['id']);
			$this->class04oficina->setAtributo('PU04OBSERVACIONESREVISIONTRA',$_POST['PU04OBSERVACIONESREVISIONTRA']);
			$this->class04oficina->guardarObservacionRevisionTramite();
			header('location:?c=class04oficina&m=revisarTra&id='.$_REQUEST['id']);
		}
		else{

			$this->class04oficina = $this->class04oficina->buscarTraIng($_REQUEST['id']);

		
			require_once 'view/header.php';
			require_once 'view/class04oficina/revisionTramite.php';
			require_once 'view/footer.php';
		}
	}

//////////////////////

	////////////////////////////////////////////////////////

public function guardarObservacionActdes()
	{
		if($_POST){
			$this->class04oficina->setAtributo('PU04IDTRA',$_POST['id']);
			$this->class04oficina->setAtributo('PU06OBSERVACIONES',$_POST['PU06OBSERVACIONES']);
			$this->class04oficina->guardarObservacionActdes();
			header('location:?c=class04oficina&m=guardarObservacionActdes&id='.$_REQUEST['id']);
		}
		else{

			$this->class04oficina = $this->class04oficina->buscarTraIng($_REQUEST['id']);

		
			require_once 'view/header.php';
			require_once 'view/class04oficina/agregar.php';
			require_once 'view/footer.php';
		}
	}
	///////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////

public function guardarObservacionComercial()
	{
		if($_POST){
			$this->class04oficina->setAtributo('PU04IDTRA',$_POST['id']);
			$this->class04oficina->setAtributo('PU06OBSERVACIONESCOMER',$_POST['PU06OBSERVACIONESCOMER']);
			$this->class04oficina->guardarObservacionComercial();
			header('location:?c=class04oficina&m=guardarObservacionComercial&id='.$_REQUEST['id']);
		}
		else{

			$this->class04oficina = $this->class04oficina->buscarTraIng($_REQUEST['id']);

		
			require_once 'view/header.php';
			require_once 'view/class04oficina/agregar.php';
			require_once 'view/footer.php';
		}
	}
	///////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////

public function guardarObservacionResidencial()
	{
		if($_POST){
			$this->class04oficina->setAtributo('PU04IDTRA',$_POST['id']);
			$this->class04oficina->setAtributo('PU06OBSERVACIONES',$_POST['PU06OBSERVACIONES']);
			$this->class04oficina->guardarObservacionResidencial();
			header('location:?c=class04oficina&m=guardarObservacionResidencial&id='.$_REQUEST['id']);
		}
		else{

			$this->class04oficina = $this->class04oficina->buscarTraIng($_REQUEST['id']);

		
			require_once 'view/header.php';
			require_once 'view/class04oficina/agregar.php';
			require_once 'view/footer.php';
		}
	}
	///////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////

public function guardarObservacionComercialIndustrial()
	{
		if($_POST){
			$this->class04oficina->setAtributo('PU04IDTRA',$_POST['id']);
			$this->class04oficina->setAtributo('PU06OBSERVACIONES',$_POST['PU06OBSERVACIONES']);
			$this->class04oficina->guardarObservacionComercialIndustrial();
			header('location:?c=class04oficina&m=guardarObservacionComercialIndustrial&id='.$_REQUEST['id']);
		}
		else{

			$this->class04oficina = $this->class04oficina->buscarTraIng($_REQUEST['id']);

		
			require_once 'view/header.php';
			require_once 'view/class04oficina/agregar.php';
			require_once 'view/footer.php';
		}
	}
	///////////////////////////////////////////////////////////////////////
	public function guardarObservacionEstacionDeServicios()
	{
		if($_POST){
			$this->class04oficina->setAtributo('PU04IDTRA',$_POST['id']);
			$this->class04oficina->setAtributo('PU06OBSERVACIONES',$_POST['PU06OBSERVACIONES']);
			$this->class04oficina->guardarObservacionEstacionDeServicios();
			header('location:?c=class04oficina&m=guardarObservacionEstacionDeServicios&id='.$_REQUEST['id']);
		}
		else{

			$this->class04oficina = $this->class04oficina->buscarTraIng($_REQUEST['id']);

		
			require_once 'view/header.php';
			require_once 'view/class04oficina/agregar.php';
			require_once 'view/footer.php';
		}
	}
	///////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////
	public function guardarObservacionPatentes()
	{
		if($_POST){
			$this->class04oficina->setAtributo('PU04IDTRA',$_POST['id']);
			$this->class04oficina->setAtributo('PU06OBSERVACIONES',$_POST['PU06OBSERVACIONES']);
			$this->class04oficina->guardarObservacionPatentes();
			header('location:?c=class04oficina&m=guardarObservacionPatentes&id='.$_REQUEST['id']);
		}
		else{

			$this->class04oficina = $this->class04oficina->buscarTraIng($_REQUEST['id']);

		
			require_once 'view/header.php';
			require_once 'view/class04oficina/agregar.php';
			require_once 'view/footer.php';
		}
	}
	///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function editarActividades2()
	{
		if($_POST){
			   $actividades2 = $this->class04oficina->getTodasActividadesDesarrollo();
			    $this->class04oficina->eliminarActividades2($_REQUEST['id']);
			    foreach ($actividades2 as $idactdes2):
    				if( isset($_REQUEST['idactdes2'.$idactdes2['PU06IDACTDES']] ) )
      				$this->class04oficina->asignarActividades2($_REQUEST['id'], $idactdes2['PU06IDACTDES']);
  				endforeach;
				header('location:?c=class04oficina&m=editarActividades2&id='.$_REQUEST['id']);
		}
		else{
			$this->class04oficina = $this->class04oficina->buscarTraIng($_REQUEST['id']);

			require_once 'view/header.php';
			require_once 'view/class04oficina/aplicarActividades.php';
			require_once 'view/footer.php';
		}
	}
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function editarActividades3()
	{
		if($_POST){
			   $actividades3 = $this->class04oficina->getTodasActividadesComercial();
			    $this->class04oficina->eliminarActividades3($_REQUEST['id']);
			    foreach ($actividades3 as $idactdes3):
    				if( isset($_REQUEST['idactdes3'.$idactdes3['PU06IDACTDES']] ) )
      				$this->class04oficina->asignarActividades3($_REQUEST['id'], $idactdes3['PU06IDACTDES']);
  				endforeach;
				header('location:?c=class04oficina&m=editarActividades3&id='.$_REQUEST['id']);
		}
		else{
			$this->class04oficina = $this->class04oficina->buscarTraIng($_REQUEST['id']);

			require_once 'view/header.php';
			require_once 'view/class04oficina/aplicarActividades.php';
			require_once 'view/footer.php';
		}
	}
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////
	public function editarActividades4()
	{
		if($_POST){
			   $actividades4 = $this->class04oficina->getTodasActividadesComercialIndustrial();
			    $this->class04oficina->eliminarActividades4($_REQUEST['id']);
			    foreach ($actividades4 as $idactdes4):
    				if( isset($_REQUEST['idactdes4'.$idactdes4['PU06IDACTDES']] ) )
      				$this->class04oficina->asignarActividades4($_REQUEST['id'], $idactdes4['PU06IDACTDES']);
  				endforeach;
				header('location:?c=class04oficina&m=editarActividades4&id='.$_REQUEST['id']);
		}
		else{
			$this->class04oficina = $this->class04oficina->buscarTraIng($_REQUEST['id']);

			require_once 'view/header.php';
			require_once 'view/class04oficina/aplicarActividades.php';
			require_once 'view/footer.php';
		}
	}
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	///////////////////////////////////////////////////////////////////
	public function editarActividades5()
	{
		if($_POST){
			   $actividades5 = $this->class04oficina->getTodasActividadesEstacionDeServicio();
			    $this->class04oficina->eliminarActividades5($_REQUEST['id']);
			    foreach ($actividades5 as $idactdes5):
    				if( isset($_REQUEST['idactdes5'.$idactdes5['PU06IDACTDES']] ) )
      				$this->class04oficina->asignarActividades5($_REQUEST['id'], $idactdes5['PU06IDACTDES']);
  				endforeach;
				header('location:?c=class04oficina&m=editarActividades5&id='.$_REQUEST['id']);
		}
		else{
			$this->class04oficina = $this->class04oficina->buscarTraIng($_REQUEST['id']);

			require_once 'view/header.php';
			require_once 'view/class04oficina/aplicarActividades.php';
			require_once 'view/footer.php';
		}
	}


	///////////////////////////////////

	///////////////////////////////////////////////////////////////////
	public function editarActividades00()
	{
		if($_POST){
			   $actividades00 = $this->class04oficina->getTododasEstados();
			    $this->class04oficina->eliminarActividades00($_REQUEST['id']);
			    foreach ($actividades00 as $idactdes00):
    				if( isset($_REQUEST['idactdes00'.$idactdes00['PU00IDAD']] ) )
      				$this->class04oficina->asignarActividades00($_REQUEST['id'], $idactdes00['PU00IDAD']);
  				endforeach;
				header('location:?c=class04oficina&m=index3&id='.$_REQUEST['id']);
		}
		else{
			$this->class04oficina = $this->class04oficina->buscarTraIng($_REQUEST['id']);

			require_once 'view/header.php';
			require_once 'view/class04oficina/aceptardenegarTramite.php';
			require_once 'view/footer.php';
		}
	}
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///
	public function asignarLeyAccesos()
	{
		if ($_POST) {
			$this->class04oficina->setAtributo('PU04IDTRA',$_POST['PU04IDTRA']);
			

			$this->class04oficina->guardarLeyes($_POST['ley']);
			header('location:?c=class04oficina&m=revisarTra&id='.$_REQUEST['id']);
		}
		else{



			$this->ley = new class04oficina();
			

			require_once 'view/header.php';
			require_once 'view/class04oficina/revisionprueba.php';
			require_once 'view/footer.php';
		}
	}

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	public function editarPatenteOf()
	{
		if($_POST){
			   $tipopatente = $this->class04oficina->getTodasPatenteOf();
			    $this->class04oficina->eliminarPatenteOf($_REQUEST['id']);
			    foreach ($tipopatente as $idtipopatente):
    			if( isset($_REQUEST['idtipopatente'.$idtipopatente['PU24IDINFR']] ) )
      			$this->class04oficina->asignarPatenteOf($_REQUEST['id'], $idtipopatente['PU24IDINFR']);
  				endforeach;
				header('location:?c=class04oficina&m=editarPatenteOf&id='.$_REQUEST['id']);
		}
		else{
			$this->class04oficina = $this->class04oficina->buscar($_REQUEST['id']);

			require_once 'view/header.php';
			require_once 'view/class04oficina/aplicarActividades.php';
			require_once 'view/footer.php';
		}
	}

	public function aplicarActividades()
	{
		
		if ($_POST) {
			//$this->class04oficina->setAtributo('PU04IDTRA',$_POST['PU04IDTRA']);
			//$this->class04oficina->guardar();
			header('location:?c=class04oficina&m=aplicarActividades&id='.$_REQUEST['id']);

		}
		else{

			$this->class04oficina = $this->class04oficina->buscarTraIng($_REQUEST['id']);
			require_once 'view/header.php';
			require_once 'view/class04oficina/aplicarActividades.php';
			require_once 'view/footer.php';
		}
	}

	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	public function editarLeyAccesos()
	{
		if($_POST){
			   $tipoleyAccesos = $this->class04oficina->getTodasLeyAccesos();
			    $this->class04oficina->eliminarLeyAccesos($_REQUEST['id']);
			    foreach ($tipoleyAccesos as $idtipoleyAccesos):
    			if( isset($_REQUEST['idtipoleyAccesos'.$idtipoleyAccesos['pu45idley']] ) )
      			$this->class04oficina->asignarLeyAccesos($_REQUEST['id'], $idtipoleyAccesos['pu45idley']);
  				endforeach;
				header('location:?c=class04oficina&m=revisarTra&id='.$_REQUEST['id']);
		}
		else{
			$auxClass04oficina = new class04oficina();
			$apartados = $auxClass04oficina->buscarIngresoTraAcceso($_REQUEST['id']);
			$this->class04oficina = $this->class04oficina->buscar($_REQUEST['id']);

			require_once 'view/header.php';
			require_once 'view/class04oficina/editarLeyAccesos.php';
			require_once 'view/footer.php';
		}
	}
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////editarLeyPlanregulador
	public function editarLeyPlanregulador()
	{
		if($_POST){
			   $tipoleyplan = $this->class04oficina->getTodasLeyPlanregulador();
			    $this->class04oficina->eliminarLeyPlanregulador($_REQUEST['id']);
			    foreach ($tipoleyplan as $idtipoleyplan):
    			if( isset($_REQUEST['idtipoleyplan'.$idtipoleyplan['pu45idley']] ) )
      			$this->class04oficina->asignarLeyPlanregulador($_REQUEST['id'], $idtipoleyplan['pu45idley']);
  				endforeach;
				header('location:?c=class04oficina&m=revisarTra&id='.$_REQUEST['id']);
		}
		else{
			$auxNicoSama = new class04oficina();
			$aux = new class04oficina();
			$nicosama = $auxNicoSama->buscarIngresoTraNicoSama($_REQUEST['id']);
			$traplanReg = $aux->buscarIngresoTraPlanReg($_REQUEST['id']);
			$this->class04oficina = $this->class04oficina->buscar($_REQUEST['id']);

			require_once 'view/header.php';
			require_once 'view/class04oficina/editarLeyPlanregulador.php';
			require_once 'view/footer.php';
		}
	}

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////editarLeyAreaspro
	public function editarLeyAreaspro()
	{
		if($_POST){
			   $tipoleyareas = $this->class04oficina->getTodasLeyAreaspro();
			    $this->class04oficina->eliminarLeyAreaspro($_REQUEST['id']);
			    foreach ($tipoleyareas as $idtipoleyareas):
    			if( isset($_REQUEST['idtipoleyareas'.$idtipoleyareas['pu45idley']] ) )
      			$this->class04oficina->asignarLeyAreaspro($_REQUEST['id'], $idtipoleyareas['pu45idley']);
  				endforeach;
				header('location:?c=class04oficina&m=revisarTra&id='.$_REQUEST['id']);
		}
		else{
			$auxAAP = new class04oficina();
			$aap = $auxAAP->buscarIngresoTraAAP($_REQUEST['id']);
			$this->class04oficina = $this->class04oficina->buscar($_REQUEST['id']);

			require_once 'view/header.php';
			require_once 'view/class04oficina/editarLeyAreaspro.php';
			require_once 'view/footer.php';
		}
	}
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////editarLeyEspaciosgeo
	public function editarLeyEspaciosgeo()
	{
		if($_POST){
			   $tipoleyespacio = $this->class04oficina->getTodasLeyEspaciosgeo();
			    $this->class04oficina->eliminarLeyEspaciosgeo($_REQUEST['id']);
			    foreach ($tipoleyespacio as $idtipoleyespacio):
    			if( isset($_REQUEST['idtipoleyespacio'.$idtipoleyespacio['pu45idley']] ) )
      			$this->class04oficina->asignarLeyEspaciosgeo($_REQUEST['id'], $idtipoleyespacio['pu45idley']);
  				endforeach;
				header('location:?c=class04oficina&m=revisarTra&id='.$_REQUEST['id']);
		}
		else{
			$auxDEG = new class04oficina();
			$deg = $auxDEG->buscarIngresoTraEspacioGeo($_REQUEST['id']);
			$this->class04oficina = $this->class04oficina->buscar($_REQUEST['id']);

			require_once 'view/header.php';
			require_once 'view/class04oficina/editarLeyEspaciosgeo.php';
			require_once 'view/footer.php';
		}
	}

	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////editarLeyAspectosbio
	public function editarLeyAspectosbio()
	{
		if($_POST){
			   $tipoleyaspectosbio = $this->class04oficina->getTodasLeyAspectosbio();
			    $this->class04oficina->eliminarLeyAspectosbio($_REQUEST['id']);
			    foreach ($tipoleyaspectosbio as $idtipoleyaspectosbio):
    			if( isset($_REQUEST['idtipoleyaspectosbio'.$idtipoleyaspectosbio['pu45idley']] ) )
      			$this->class04oficina->asignarLeyAspectosbio($_REQUEST['id'], $idtipoleyaspectosbio['pu45idley']);
  				endforeach;
				header('location:?c=class04oficina&m=revisarTra&id='.$_REQUEST['id']);
		}
		else{
			$auxASPBIO = new class04oficina();
			$aspbio = $auxASPBIO->buscarIngresoTraAspBiofisicos($_REQUEST['id']);
			$this->class04oficina = $this->class04oficina->buscar($_REQUEST['id']);

			require_once 'view/header.php';
			require_once 'view/class04oficina/editarLeyAspectosbio.php';
			require_once 'view/footer.php';
		}
	}
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////editarLeyAspectosbio
	public function editarLeyDesarrollosec()
	{
		if($_POST){
			   $tipoleydesarrollosec = $this->class04oficina->getTodasLeyDesarrollosec();
			    $this->class04oficina->eliminarLeyDesarrollosec($_REQUEST['id']);
			    foreach ($tipoleydesarrollosec as $idtipoleydesarrollosec):
    			if( isset($_REQUEST['idtipoleydesarrollosec'.$idtipoleydesarrollosec['pu45idley']] ) )
      			$this->class04oficina->asignarLeyDesarrollosec($_REQUEST['id'], $idtipoleydesarrollosec['pu45idley']);
  				endforeach;
				header('location:?c=class04oficina&m=revisarTra&id='.$_REQUEST['id']);
		}
		else{
			$auxDESECTOR = new class04oficina();
			$desector = $auxDESECTOR->buscarIngresoTraDesarrolloSector($_REQUEST['id']);
			$this->class04oficina = $this->class04oficina->buscar($_REQUEST['id']);

			require_once 'view/header.php';
			require_once 'view/class04oficina/editarLeyDesarrollosec.php';
			require_once 'view/footer.php';
		}
	}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////editarLeyAspectosbio
	public function editarLeyTipored()
	{
		if($_POST){
			   $tipoleytipored = $this->class04oficina->getTodasLeyTipored();
			    $this->class04oficina->eliminarLeyTipored($_REQUEST['id']);
			    foreach ($tipoleytipored  as $idtipoleytipored ):
    			if( isset($_REQUEST['idtipoleytipored'.$idtipoleytipored ['pu45idley']] ) )
      			$this->class04oficina->asignarLeyTipored($_REQUEST['id'], $idtipoleytipored ['pu45idley']);
  				endforeach;
				header('location:?c=class04oficina&m=revisarTra&id='.$_REQUEST['id']);
		}
		else{
			$auxTREDVIAL = new class04oficina();
			$tredvial = $auxTREDVIAL->buscarIngresoTraTipoRedVial($_REQUEST['id']);
			$this->class04oficina = $this->class04oficina->buscar($_REQUEST['id']);

			require_once 'view/header.php';
			require_once 'view/class04oficina/editarLeyTipored.php';
			require_once 'view/footer.php';
		}
	}

	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////editarLeyEspaciosgeo
	public function editarLeyPatentes()
	{
		if($_POST){
			   $tipoleypatentes = $this->class04oficina->getTodasLeyPatentes();
			    $this->class04oficina->eliminarLeyPatentes($_REQUEST['id']);
			    foreach ($tipoleypatentes as $idtipoleypatentes):
    			if( isset($_REQUEST['idtipoleypatentes'.$idtipoleypatentes['pu45idley']] ) )
      			$this->class04oficina->asignarLeyPatentes($_REQUEST['id'], $idtipoleypatentes['pu45idley']);
  				endforeach;
				header('location:?c=class04oficina&m=revisarTra&id='.$_REQUEST['id']);
		}
		else{
			$auxPATENTES = new class04oficina();
			$patentes = $auxPATENTES->buscarIngresoTraPatentes($_REQUEST['id']);
			$this->class04oficina = $this->class04oficina->buscar($_REQUEST['id']);

			require_once 'view/header.php';
			require_once 'view/class04oficina/editarLeyPatentes.php';
			require_once 'view/footer.php';
		}
	}

	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////editarLeyEspaciosgeo








///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////ENCABEZADO
	public function editarLeyPatentesencabezado()
	{
		if($_POST){
			   $tipoleypatentesencabezado = $this->class04oficina->getTodasLeyPatenteencabezado();
			    $this->class04oficina->eliminarLeyPatenteencabezado($_REQUEST['id']);
			    foreach ($tipoleypatentesencabezado as $idtipoleypatentesencabezado):
    			if( isset($_REQUEST['idtipoleypatentesencabezado'.$idtipoleypatentesencabezado['pu45idley']] ) )
      			$this->class04oficina->asignarLeyPatenteencabezado($_REQUEST['id'], $idtipoleypatentesencabezado['pu45idley']);
  				endforeach;
				header('location:?c=class04oficina&m=revisarTra&id='.$_REQUEST['id']);
		}
		else{
			//$auxPATENTESENCABEZADO = new class04oficina();
			//$patentesencabezado = $auxPATENTESENCABEZADO->buscarIngresoTraPatentes($_REQUEST['id']);
			$this->class04oficina = $this->class04oficina->buscar($_REQUEST['id']);

			require_once 'view/header.php';
			require_once 'view/class04oficina/editarLeyPatentesencabezado.php';
			require_once 'view/footer.php';
		}
	}

	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////ENCABEZADO












	public function editarLeyServidumbres()
	{
		if($_POST){
			   $tipoleyServidumbres  = $this->class04oficina->getTodasLeyServidumbres();
			    $this->class04oficina->eliminarLeyServidumbres($_REQUEST['id']);
			    foreach ($tipoleyServidumbres as $idtipoleyServidumbres):
    			if( isset($_REQUEST['idtipoleyServidumbres'.$idtipoleyServidumbres['pu45idley']] ) )
      			$this->class04oficina->asignarLeyServidumbres($_REQUEST['id'], $idtipoleyServidumbres['pu45idley']);
  				endforeach;
				header('location:?c=class04oficina&m=revisarTra&id='.$_REQUEST['id']);
		}
		else{
			
			
			$this->class04oficina = $this->class04oficina->buscar($_REQUEST['id']);

			require_once 'view/header.php';
			require_once 'view/class04oficina/editarLeyServidumbres.php';
			require_once 'view/footer.php';
		}
	}


//////////////////////////////////////////////////////////////

	/////////////////////////////////////////////////////////////////// AREAS DE PROTECCION ////
	public function editarareas()
	{
		if($_POST){
			   $actividades5 = $this->class04oficina->getTodasareas();
			    $this->class04oficina->eliminarareas($_REQUEST['id']);
			    foreach ($actividades5 as $idactdes5):
    				if( isset($_REQUEST['idactdes5'.$idactdes5['PU13IDAAP']] ) )
      				$this->class04oficina->asignarareas($_REQUEST['id'], $idactdes5['PU13IDAAP']);
  				endforeach;
				header('location:?c=class04oficina&m=editarActividades5&id='.$_REQUEST['id']);
		}
		else{
			$this->class04oficina = $this->class04oficina->buscarTraIng($_REQUEST['id']);

			require_once 'view/header.php';
			require_once 'view/class04oficina/aplicarActividades.php';
			require_once 'view/footer.php';
		}
	}
	///////////////////////////////////
	
public function guardarTipoTramite()
{
	if($_POST){
$this->class04oficina->setAtributo('PU04IDTRA',$_POST['id']);

if (isset($_POST['PU47IDTIPOTRAMITE'])) {
				
				if ($_POST['PU47IDTIPOTRAMITE'] == 'RMU') {
					$id = 0;
				}
				if ($_POST['PU47IDTIPOTRAMITE'] == 'DAR') {
					$id = 1;
				}
				if ($_POST['PU47IDTIPOTRAMITE'] == 'OFICIO') {
					$id = 2;
				}
}
$this->class04oficina->setAtributo('PU47IDTIPOTRAMITE',$id);

$this->class04oficina->setAtributo('CONSECUTIVOTRAMITE',$_POST['CONSECUTIVOTRAMITE']);
$this->class04oficina->guardarTipoTramite();

header('location:?c=class04oficina&m=revisarTra&id='.$_REQUEST['id']);
}
	else{

	$this->class04oficina = $this->class04oficina->buscarTraIng($_REQUEST['id']);

		
		require_once 'view/header.php';
		require_once 'view/class04oficina/revisionTramite.php';
		require_once 'view/footer.php';
	}
}
	///////////////////////////////////
	

	public function editarObservacionesgenerales()
	{
		if ($_POST) {
			$this->class04oficina->setAtributo('PU04IDTRA',$_POST['id']);
			$this->class04oficina->setAtributo('PU04OBSERVACIONESREVISIONTRA',$_POST['PU04OBSERVACIONESREVISIONTRA']);
			$this->class04oficina->editarObservacionesgenerales();
			header('location:?c=class04oficina&m=revisarTra&id='.$_REQUEST['id']);
		}
		else{
			$this->class04oficina = $this->class04oficina->buscarObservacionGeneral($_REQUEST['id']);
			require_once 'view/header.php';
			require_once 'view/class04oficina/editarObservacionesgenerales.php';
			require_once 'view/footer.php';
		}
	}

public function editartipotra()
	{
		
		if ($_POST) {
			$this->class04oficina->setAtributo('PU04IDTRA',$_POST['PU04IDTRA']);
			$this->class04oficina->setAtributo('PU04IDTIPOTRA',$_POST['PU04IDTIPOTRA']);
			$this->class04oficina->setAtributo('PU47IDCONSECUTIVO',$_POST['PU47IDCONSECUTIVO']);
			$this->class04oficina->editartipotra();
			header('location:?c=class04oficina&m=index3');

		}
		else{

			$this->class04oficina = $this->class04oficina->buscarTipotramite($_REQUEST['id']);
			require_once 'view/header.php';
			require_once 'view/class04oficina/editartipotra.php';
			require_once 'view/footer.php';
		}
	}

	/////////////////
	public function guardarImagen()
	{
		if ($_POST)
		{
			// upload directory
			$upload_dir = 'ImagenIngresoTra/';
			if (!file_exists($upload_dir)) {
				mkdir($upload_dir, 0777, true);
			}

			$imgFile = $_FILES['user_image']['name'];
			$tmp_dir = $_FILES['user_image']['tmp_name'];
			$imgSize = $_FILES['user_image']['size'];


			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image 

			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

			$userpic = rand(1000,1000000).".".$imgExt;

			if(in_array($imgExt, $valid_extensions)){			
				// Check file size '5MB'
				if($imgSize < 5000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$userpic);	
					$this->class04oficina->setAtributo('PU04IDTRA',$_POST['PU04IDTRA']);
					$this->class04oficina->setAtributo('PU04RUTAIMAGEN',$userpic);
					$this->class04oficina->guardarImagen();
			header('location:?c=class04oficina&m=index3');
				}
				else{
					$errMSG = "Lo siento. imagen demasiado grande";
				}
			}
			else{
				$errMSG = "Lo siento, Solo JPG, JPEG, PNG & GIF son archivos permitidos.";		
			}
		}
	}

	//////////////////////////////////////////////////////////////////////////////////////
	public function agregarTrausutra()
	{
		if($_POST){
			$this->class04oficina->setAtributo('PU04IDTRA',$_POST['PU04IDTRA']);
			$this->class04oficina->setAtributo('PU01CEDUSU',$_POST['PU01CEDUSU']);
			$puesto = $this->class04oficina->listarPuesto($_POST['PU01CEDUSU']);
			//session_start();
			if ($_SESSION['idpuesto'] = $puesto[0]) {
				$this->class04oficina->setAtributo('PU04IDTRA',$_POST['PU04IDTRA']);
				$this->class04oficina->setAtributo('PU01CEDUSU',$_POST['PU01CEDUSU']);
				
				
				$this->class04oficina->agregarTrainpe();
				header('location:?c=class04oficina&m=index6');
			} else {
				?>
				<script>
					alert('Usuario no existe o no coresponde a la sesion!');
					location.href = "?c=class04ingresotramite&m=index2";
				</script>
				<?php
			}
			/*$this->pu04inspeccion->setAtributo('PU04IDTRA',$_POST['PU04IDTRA']);
			$this->pu04inspeccion->setAtributo('PU01CEDUSU',$_POST['PU01CEDUSU']);
			
			
			$this->pu04inspeccion->agregarTrainpe();
			header('location:?c=class04inspeccion&m=agregarTra&id='.$_REQUEST['id']);*/
		}
		else{

			$this->class04oficina = $this->class04oficina->buscarTraIng($_REQUEST['id']);

		
			require_once 'view/header.php';
			require_once 'view/class04oficina/agregarTrausutra.php';
			require_once 'view/footer.php';
		}
	}
	
	/////////////////////////////////////////////////////////////////////////////


}
?>