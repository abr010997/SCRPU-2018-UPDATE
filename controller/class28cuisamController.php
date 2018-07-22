<?php 
//ActividadDesarrollar
require_once 'model/class28cuisam.php';
class class28cuisamController
{
	private $class28cuisam;
	function __construct()
	{
		$this->class28cuisam = new class28cuisam();
	}
	public function index()
	{
		require_once 'view/header.php';
		require_once 'view/class28cuisam/index.php';
		require_once 'view/footer.php';
	}
	public function agregar()
	{
		
		if ($_POST) {
			$this->class28cuisam->setAtributo('PU28IDUBIC',$_POST['PU28IDUBIC']);//afalta esto
			$this->class28cuisam->setAtributo('PU28DSCUBIC',$_POST['PU28DSCUBIC']);
			$this->class28cuisam->guardar();
			header('location:?c=class28cuisam&m=index');
		}
		else{
			require_once 'view/header.php';
			require_once 'view/class28cuisam/agregar.php';
			require_once 'view/footer.php';
		}
	}
	public function editar()
	{
		if ($_POST) {
			$this->class28cuisam->setAtributo('PU28IDUBIC',$_POST['PU28IDUBIC']);
			$this->class28cuisam->setAtributo('PU28DSCUBIC',$_POST['PU28DSCUBIC']);
			$this->class28cuisam->actualizar();
			header('location:?c=class28cuisam&m=index');
		}
		else{
			$this->class28cuisam = $this->class28cuisam->buscar($_REQUEST['id']);
			require_once 'view/header.php';
			require_once 'view/class28cuisam/editar.php';
			require_once 'view/footer.php';
		}
	}

	public function eliminar()
	{
		$this->class28cuisam->setAtributo('PU28IDUBIC',$_REQUEST['id']);
		$this->class28cuisam->eliminar();
		header('location:?c=class28cuisam&m=index');
	}

	public function ver()
	{
		$this->class28cuisam = $this->class28cuisam->buscar($_REQUEST['id']);
		require_once 'view/header.php';
		require_once 'view/class28cuisam/ver.php';
		require_once 'view/footer.php';
	}
}
?>