<?php 
//`pu09desceg`
//`PU24IDINFR``PU24DESCINF`
require_once 'model/class24infest.php';
class class24infestController
{
	private $class24infest;
	function __construct()
	{
		$this->class24infest = new class24infest();
	}
	public function index()
	{
		require_once 'view/header.php';
		require_once 'view/class24infest/index.php';
		require_once 'view/footer.php';
	}
	public function agregar()
	{
		
		if ($_POST) {
			$this->class24infest->setAtributo('PU24IDINFR',$_POST['PU24IDINFR']);//afalta esto
			$this->class24infest->setAtributo('PU24DESCINF',$_POST['PU24DESCINF']);
			$this->class24infest->guardar();
			header('location:?c=class24infest&m=index');
		}
		else{
			require_once 'view/header.php';
			require_once 'view/class24infest/agregar.php';
			require_once 'view/footer.php';
		}
	}
	public function editar()
	{
		if ($_POST) {
			$this->class24infest->setAtributo('PU24IDINFR',$_POST['PU24IDINFR']);
			$this->class24infest->setAtributo('PU24DESCINF',$_POST['PU24DESCINF']);
			$this->class24infest->actualizar();
			header('location:?c=class24infest&m=index');
		}
		else{
			$this->class24infest = $this->class24infest->buscar($_REQUEST['id']);
			require_once 'view/header.php';
			require_once 'view/class24infest/editar.php';
			require_once 'view/footer.php';
		}
	}

	public function eliminar()
	{
		$this->class24infest->setAtributo('PU24IDINFR',$_REQUEST['id']);
		$this->class24infest->eliminar();
		header('location:?c=class24infest&m=index');
	}

	public function ver()
	{
		$this->class24infest = $this->class24infest->buscar($_REQUEST['id']);
		require_once 'view/header.php';
		require_once 'view/class24infest/ver.php';
		require_once 'view/footer.php';
	}
}
?>