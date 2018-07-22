<?php 
//ActividadDesarrollar
require_once 'model/class34clases.php';
class class34clasesController
{
	private $class34clases;
	function __construct()
	{
		$this->class34clases = new class34clases();
	}
	public function index()
	{
		require_once 'view/header.php';
		require_once 'view/class34clases/index.php';
		require_once 'view/footer.php';
	}
	public function agregar()
	{
		
		if ($_POST) {
			$this->class34clases->setAtributo('PU34IDCLAS',$_POST['PU34IDCLAS']);//afalta esto
			$this->class34clases->setAtributo('PU34DESCLA',$_POST['PU34DESCLA']);
			$this->class34clases->guardar();
			header('location:?c=class34clases&m=index');
		}
		else{
			require_once 'view/header.php';
			require_once 'view/class34clases/agregar.php';
			require_once 'view/footer.php';
		}
	}
	public function editar()
	{
		if ($_POST) {
			$this->class34clases->setAtributo('PU34IDCLAS',$_POST['PU34IDCLAS']);
			$this->class34clases->setAtributo('PU34DESCLA',$_POST['PU34DESCLA']);
			$this->class34clases->actualizar();
			header('location:?c=class34clases&m=index');
		}
		else{
			$this->class34clases = $this->class34clases->buscar($_REQUEST['id']);
			require_once 'view/header.php';
			require_once 'view/class34clases/editar.php';
			require_once 'view/footer.php';
		}
	}

	public function eliminar()
	{
		$this->class34clases->setAtributo('PU34IDCLAS',$_REQUEST['id']);
		$this->class34clases->eliminar();
		header('location:?c=class34clases&m=index');
	}

	public function ver()
	{
		$this->class34clases = $this->class34clases->buscar($_REQUEST['id']);
		require_once 'view/header.php';
		require_once 'view/class34clases/ver.php';
		require_once 'view/footer.php';
	}
}
?>