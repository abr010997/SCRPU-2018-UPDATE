<?php 

require_once 'model/class40propietario.php';
class class40propietarioController
{
	private $class40propietario;
	function __construct()
	{
		$this->class40propietario = new class40propietario();
	}
	public function index()
	{
		require_once 'view/header.php';
		require_once 'view/class40propietario/index.php';
		require_once 'view/footer.php';
	}
	public function agregar()
	{
		if ($_POST) {
			$this->class40propietario->setAtributo('PU40CEDPROPIE',$_POST['PU40CEDPROPIE']);
			$this->class40propietario->setAtributo('PU40NOMPROPIE',$_POST['PU40NOMPROPIE']);
			$this->class40propietario->setAtributo('PU40APE1PROPIE',$_POST['PU40APE1PROPIE']);
			$this->class40propietario->setAtributo('PU40APE2PROPIE',$_POST['PU40APE2PROPIE']);
			
			$this->class40propietario->guardar();
			header('location:?c=class40propietario&m=index');
		}
		else{
			require_once 'view/header.php';
			require_once 'view/class40propietario/agregar.php';
			require_once 'view/footer.php';
		}
	}
	public function editar()
	{
		if ($_POST) {
			$this->class40propietario->setAtributo('PU40CEDPROPIE',$_POST['PU40CEDPROPIE']);
			$this->class40propietario->setAtributo('PU40NOMPROPIE',$_POST['PU40NOMPROPIE']);
			$this->class40propietario->setAtributo('PU40APE1PROPIE',$_POST['PU40APE1PROPIE']);
			$this->class40propietario->setAtributo('PU40APE2PROPIE',$_POST['PU40APE2PROPIE']);
			
			$this->class40propietario->actualizar();
			header('location:?c=class40propietario&m=index');
		}
		else{
			$this->class40propietario = $this->class40propietario->buscar($_REQUEST['id']);
			require_once 'view/header.php';
			require_once 'view/class40propietario/editar.php';
			require_once 'view/footer.php';
		}
	}

	public function eliminar()
	{
		$this->class40propietario->setAtributo('PU40CEDPROPIE',$_REQUEST['id']);
		$this->class40propietario->eliminar();
		header('location:?c=class40propietario&m=index');
	}

	public function ver()
	{
		$this->class40propietario = $this->class40propietario->buscar($_REQUEST['id']);
		require_once 'view/header.php';
		require_once 'view/class40propietario/ver.php';
		require_once 'view/footer.php';
	}
}
?>