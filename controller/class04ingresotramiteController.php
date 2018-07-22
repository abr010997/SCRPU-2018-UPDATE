<?php 
require_once 'model/class38servidumbres.php';
require_once 'model/class26planreg.php';
require_once 'model/class04ingresotramite.php';
require_once 'model/class13aarep.php';


class class04ingresotramiteController
{
	private $class04ingresotramite;
	private $pu38servi;
	private $pu26planreg;
	private $pu26planreg1;
	private $pu13aap;

	function __construct()
	{
		$this->class04ingresotramite = new class04ingresotramite();
	}
	public function index()
	{
		require_once 'view/header.php';
		require_once 'view/class04ingresotramite/index.php';
		require_once 'view/footer.php';
	}
	public function agregar()
	{
		if ($_POST) {
			$this->class04ingresotramite->setAtributo('PU04IDTRA',$_POST['PU04IDTRA']);
			$this->class04ingresotramite->setAtributo('PU04FETRA',$_POST['PU04FETRA']);
			if (isset($_POST['PU04IDDISTRITO'])) {
				
				if ($_POST['PU04IDDISTRITO'] == 'Seleccione') {
					$id = 0;
				}
				if ($_POST['PU04IDDISTRITO'] == 'Nicoya') {
					$id = 1;
				}
				if ($_POST['PU04IDDISTRITO'] == 'Masión') {
					$id = 2;
				}
				if ($_POST['PU04IDDISTRITO'] == 'San Antonio') {
					$id = 3;
				}
				if ($_POST['PU04IDDISTRITO'] == 'Quebrada Honda') {
					$id = 4;
				}
				if ($_POST['PU04IDDISTRITO'] == 'Sámara') {
					$id = 5;
				}
				if ($_POST['PU04IDDISTRITO'] == 'Nosara') {
					$id = 6;
				}
				if ($_POST['PU04IDDISTRITO'] == 'Belén') {
					$id = 7;
				}
			}
			$this->class04ingresotramite->setAtributo('PU04IDDISTRITO',$id);
			
			$this->guardarImagen();
			
			$this->class04ingresotramite->guardar($_POST['pu38servi'],$_POST['pu26planreg'],
				$_POST['pu26planreg1'],$_POST['pu13aap']);

			header('location:?c=class04ingresotramite&m=index');
		}
		else{

			$this->pu38servi = new class38servidumbres();
			$this->pu26planreg = new class26planreg();
			$this->pu26planreg1 = new class26planreg();
			$this->pu26planreg2 = new class26planreg();
			$this->pu13aap = new class13aarep();

			require_once 'view/header.php';
			require_once 'view/class04ingresotramite/agregar.php';
			require_once 'view/footer.php';
		}
	}
	//////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////
	
			public function editarServidumbres()
	{
		if($_POST){
			   $servidumbre = $this->class04ingresotramite->getTodasServidumbres();
			    $this->class04ingresotramite->eliminarServidumbres($_REQUEST['id']);
			    foreach ($servidumbre as $idservi):
    			if( isset($_REQUEST['idservi'.$idservi['PU38IDSERVIDUMBRE']] ) )
      			$this->class04ingresotramite->asignarServidumbres($_REQUEST['id'], $idservi['PU38IDSERVIDUMBRE']);
  				endforeach;
				header('location:?c=class04ingresotramite&m=editarServidumbres&id='.$_REQUEST['id']);
		}
		else{
			//$this->class04ingresotramite = $this->class04ingresotramite->buscar($_REQUEST['id']);

			require_once 'view/header.php';
			require_once 'view/class04ingresotramite/agregarAccesosServidumbre.php';
			require_once 'view/footer.php';
		}
	}

	/////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////
	public function editar()
	{
		if ($_POST) {
			$this->class04ingresotramite->setAtributo('PU04IDTRA',$_POST['PU04IDTRA']);
			$this->class04ingresotramite->setAtributo('PU04DESCRIPCIONLUGAR',$_POST['PU04DESCRIPCIONLUGAR']);
			$this->class04ingresotramite->actualizar();
			header('location:?c=class04ingresotramite&m=index');
		}
		else{
			$this->class04ingresotramite = $this->class04ingresotramite->buscar($_REQUEST['id']);
			require_once 'view/header.php';
			require_once 'view/class04ingresotramite/editar.php';
			require_once 'view/footer.php';		}
		}

	public function eliminar()
	{
		$this->class04ingresotramite->setAtributo('PU04IDTRA',$_REQUEST['id']);
		$this->class04ingresotramite->eliminar();
		header('location:?c=class04ingresotramite&m=index');
	}

	public function ver()
	{
		$this->class04ingresotramite = $this->class04ingresotramite->buscar($_REQUEST['id']);
		require_once 'view/header.php';
		require_once 'view/class04ingresotramite/ver.php';
		require_once 'view/footer.php';
	}
	//////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////
		public function graficoBarras()
	{
		require_once 'view/header.php';
		require_once 'view/class04ingresotramite/graficos/graficoBarras.php';
		require_once 'view/footer.php';
	}
		public function Barras()
	{
		require_once 'view/header.php';
		require_once 'view/class04ingresotramite/graficos/Barras.php';
		require_once 'view/footer.php';
	}

	public function guardarImagen()
	{
		if ($_POST)
		{

		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];

		$upload_dir = 'ImagenIngresoTra/'; // upload directory

		$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image 

		$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

		$userpic = rand(1000,1000000).".".$imgExt;

		if(in_array($imgExt, $valid_extensions)){			
				// Check file size '5MB'
				if($imgSize < 5000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$userpic);	
					$this->class04ingresotramite->setAtributo('PU04IDTRA',$_POST['PU04IDTRA']);
					$this->class04ingresotramite->setAtributo('PU04RUTAIMAGEN',$userpic);
					$this->class04ingresotramite->guardarImagen();
				}
				else{
					$errMSG = "Sorry, your file is too large.";
				}
			}
			else{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}
			//$this->class04ingresotramite->guardarImagen($_REQUEST['PU04IDTRA'], $_REQUEST['userpic']);
			//header('location:?c=class04ingresotramite&m=index');
		}
		/*
		else{
			$this->class04ingresotramite = $this->class04ingresotramite->buscar($_REQUEST['id']);
			require_once 'view/header.php';
			require_once 'view/class04ingresotramite/agregar.php';
			require_once 'view/footer.php';		}*/
		}

}
?>