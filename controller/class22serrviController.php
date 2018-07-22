<?php 
require_once 'model/class22serrvi.php';
class class22serrviController
{
	private $class22serrvi;
	function __construct()
	{
		$this->class22serrvi = new class22serrvi();
	}
	public function index()
	{
		require_once 'view/header.php';
		require_once 'view/class22serrvi/index.php';
		require_once 'view/footer.php';	
	}
	public function agregar()
	{
		
		if ($_POST) {
			$this->class22serrvi->setAtributo('PU22IDREDVI',$_POST['PU22IDREDVI']);//afalta esto
			$this->class22serrvi->setAtributo('PU22DESSVI',$_POST['PU22DESSVI']);
			$this->class22serrvi->guardar();
			header('location:?c=class22serrvi&m=index');
		}
		else{
			require_once 'view/header.php';
			require_once 'view/class22serrvi/agregar.php';
			require_once 'view/footer.php';
		}
	}
	public function editar()
	{
		if ($_POST) {
			$this->class22serrvi->setAtributo('PU22IDREDVI',$_POST['PU22IDREDVI']);
			$this->class22serrvi->setAtributo('PU22DESSVI',$_POST['PU22DESSVI']);
			$this->class22serrvi->actualizar();
			header('location:?c=class22serrvi&m=index');
		}
		else{
			$this->class22serrvi = $this->class22serrvi->buscar($_REQUEST['id']);
			require_once 'view/header.php';
			require_once 'view/class22serrvi/editar.php';
			require_once 'view/footer.php';
		}
	}

	public function eliminar()
	{
		$this->class22serrvi->setAtributo('PU22IDREDVI',$_REQUEST['id']);
		$this->class22serrvi->eliminar();
		header('location:?c=class22serrvi&m=index');
	}

	public function ver()
	{
		$this->class22serrvi = $this->class22serrvi->buscar($_REQUEST['id']);
		require_once 'view/header.php';
		require_once 'view/class22serrvi/ver.php';
		require_once 'view/footer.php';
	}
}
 ?>