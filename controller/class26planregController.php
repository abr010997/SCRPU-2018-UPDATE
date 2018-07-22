<?php 
//ActividadDesarrollar
require_once 'model/class26planreg.php';
class class26planregController
{
	private $class26planreg;
	function __construct()
	{
		$this->class26planreg = new class26planreg();
	}
	public function index()
	{
		require_once 'view/header.php';
		require_once 'view/class26planreg/index.php';
		require_once 'view/footer.php';
	}
	public function agregar()
	{
		
		if ($_POST) {
			$this->class26planreg->setAtributo('PU26IDPLAN',$_POST['PU26IDPLAN']);//afalta esto
			$this->class26planreg->setAtributo('PU26PLNDESC',$_POST['PU26PLNDESC']);
			$this->class26planreg->guardar();
			header('location:?c=class26planreg&m=index');
		}
		else{
			require_once 'view/header.php';
			require_once 'view/class26planreg/agregar.php';
			require_once 'view/footer.php';
		}
	}
	public function editar()
	{
		if ($_POST) {
			$this->class26planreg->setAtributo('PU26IDPLAN',$_POST['PU26IDPLAN']);
			$this->class26planreg->setAtributo('PU26PLNDESC',$_POST['PU26PLNDESC']);
			$this->class26planreg->actualizar();
			header('location:?c=class26planreg&m=index');
		}
		else{
			$this->class26planreg = $this->class26planreg->buscar($_REQUEST['id']);
			require_once 'view/header.php';
			require_once 'view/class26planreg/editar.php';
			require_once 'view/footer.php';
		}
	}

	public function eliminar()
	{
		$this->class26planreg->setAtributo('PU26IDPLAN',$_REQUEST['id']);
		$this->class26planreg->eliminar();
		header('location:?c=class26planreg&m=index');
	}

	public function ver()
	{
		$this->class26planreg = $this->class26planreg->buscar($_REQUEST['id']);
		require_once 'view/header.php';
		require_once 'view/class26planreg/ver.php';
		require_once 'view/footer.php';
	}
}
?>