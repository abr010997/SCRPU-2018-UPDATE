<?php 
//`pu09desceg`
//`PU09IDDEG``PU09DESCREG`
require_once 'model/class09desceg.php';
class class09descegController
{
	private $class09desceg;
	function __construct()
	{
		$this->class09desceg = new class09desceg();
	}
	public function index()
	{
		require_once 'view/header.php';
		require_once 'view/class09desceg/index.php';
		require_once 'view/footer.php';
	}
	public function agregar()
	{
		
		if ($_POST) {
			$this->class09desceg->setAtributo('PU09IDDEG',$_POST['PU09IDDEG']);//afalta esto
			$this->class09desceg->setAtributo('PU09DESCREG',$_POST['PU09DESCREG']);
			$this->class09desceg->guardar();
			header('location:?c=class09desceg&m=index');
		}
		else{
			require_once 'view/header.php';
			require_once 'view/class09desceg/agregar.php';
			require_once 'view/footer.php';
		}
	}
	public function editar()
	{
		if ($_POST) {
			$this->class09desceg->setAtributo('PU09IDDEG',$_POST['PU09IDDEG']);
			$this->class09desceg->setAtributo('PU09DESCREG',$_POST['PU09DESCREG']);
			$this->class09desceg->actualizar();
			header('location:?c=class09desceg&m=index');
		}
		else{
			$this->class09desceg = $this->class09desceg->buscar($_REQUEST['id']);
			require_once 'view/header.php';
			require_once 'view/class09desceg/editar.php';
			require_once 'view/footer.php';
		}
	}

	public function eliminar()
	{
		$this->class09desceg->setAtributo('PU09IDDEG',$_REQUEST['id']);
		$this->class09desceg->eliminar();
		header('location:?c=class09desceg&m=index');
	}

	public function ver()
	{
		$this->class09desceg = $this->class09desceg->buscar($_REQUEST['id']);
		require_once 'view/header.php';
		require_once 'view/class09desceg/ver.php';
		require_once 'view/footer.php';
	}
}
?>