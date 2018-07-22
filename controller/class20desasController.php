<?php 
require_once 'model/class20desas.php';
class class20desasController
{
	private $class20desas;
	function __construct()
	{
		$this->class20desas = new class20desas();
	}
	public function index()
	{
		require_once 'view/header.php';
		require_once 'view/class20desas/index.php';
		require_once 'view/footer.php';
	}
	public function agregar()
	{
		
		if ($_POST) {
			$this->class20desas->setAtributo('PU20IDDESAS',$_POST['PU20IDDESAS']);//afalta esto
			$this->class20desas->setAtributo('PU20DESCS',$_POST['PU20DESCS']);
			$this->class20desas->guardar();
			header('location:?c=class20desas&m=index');
		}
		else{
			require_once 'view/header.php';
			require_once 'view/class20desas/agregar.php';
			require_once 'view/footer.php';
		}
	}
	public function editar()
	{
		if ($_POST) {
			$this->class20desas->setAtributo('PU20IDDESAS',$_POST['PU20IDDESAS']);
			$this->class20desas->setAtributo('PU20DESCS',$_POST['PU20DESCS']);
			$this->class20desas->actualizar();
			header('location:?c=class20desas&m=index');
		}
		else{
			$this->class20desas = $this->class20desas->buscar($_REQUEST['id']);
			require_once 'view/header.php';
			require_once 'view/class20desas/editar.php';
			require_once 'view/footer.php';
		}
	}

	public function eliminar()
	{
		$this->class20desas->setAtributo('PU20IDDESAS',$_REQUEST['id']);
		$this->class20desas->eliminar();
		header('location:?c=class20desas&m=index');
	}

	public function ver()
	{
		$this->class20desas = $this->class20desas->buscar($_REQUEST['id']);
		require_once 'view/header.php';
		require_once 'view/class20desas/ver.php';
		require_once 'view/footer.php';
	}
}
 ?>