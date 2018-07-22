<?php 
//`pu16servae`class16servae
//`PU16IDSAE`
//`PU16DESCAE`
require_once 'model/class16servae.php';
class class16servaeController
{
	private $class16servae;
	function __construct()
	{
		$this->class16servae = new class16servae();
	}
	public function index()
	{
		require_once 'view/header.php';
		require_once 'view/class16servae/index.php';
		require_once 'view/footer.php';
	}
	public function agregar()
	{
		
		if ($_POST) {
			$this->class16servae->setAtributo('PU16IDSAE',$_POST['PU16IDSAE']);//afalta esto
			$this->class16servae->setAtributo('PU16DESCAE',$_POST['PU16DESCAE']);
			$this->class16servae->guardar();
			header('location:?c=class16servae&m=index');
		}
		else{
			require_once 'view/header.php';
			require_once 'view/class16servae/agregar.php';
			require_once 'view/footer.php';
		}
	}
	public function editar()
	{
		if ($_POST) {
			$this->class16servae->setAtributo('PU16IDSAE',$_POST['PU16IDSAE']);
			$this->class16servae->setAtributo('PU16DESCAE',$_POST['PU16DESCAE']);
			$this->class16servae->actualizar();
			header('location:?c=class16servae&m=index');
		}
		else{
			$this->class16servae = $this->class16servae->buscar($_REQUEST['id']);
			require_once 'view/header.php';
			require_once 'view/class16servae/editar.php';
			require_once 'view/footer.php';
		}
	}

	public function eliminar()
	{
		$this->class16servae->setAtributo('PU16IDSAE',$_REQUEST['id']);
		$this->class16servae->eliminar();
		header('location:?c=class16servae&m=index');
	}

	public function ver()
	{
		$this->class16servae = $this->class16servae->buscar($_REQUEST['id']);
		require_once 'view/header.php';
		require_once 'view/class16servae/ver.php';
		require_once 'view/footer.php';
	}
}
?>