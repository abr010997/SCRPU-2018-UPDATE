<?php 
//ActividadDesarrollar
require_once 'model/class06actdes.php';
class class06actdesController
{
	private $class06actdes;
	function __construct()
	{
		$this->class06actdes = new class06actdes();
	}
	public function index()
	{
		require_once 'view/header.php';
		require_once 'view/class06actdes/index.php';
		require_once 'view/footer.php';
	}
	public function agregar()
	{
		
		if ($_POST) {
			$this->class06actdes->setAtributo('PU06IDACTDES',$_POST['PU06IDACTDES']);//afalta esto
			$this->class06actdes->setAtributo('PU06DESAD',$_POST['PU06DESAD']);
			$this->class06actdes->guardar();
			header('location:?c=class06actdes&m=index');
		}
		else{
			require_once 'view/header.php';
			require_once 'view/class06actdes/agregar.php';
			require_once 'view/footer.php';
		}
	}
	public function editar()
	{
		if ($_POST) {
			$this->class06actdes->setAtributo('PU06IDACTDES',$_POST['PU06IDACTDES']);
			$this->class06actdes->setAtributo('PU06DESAD',$_POST['PU06DESAD']);
			$this->class06actdes->actualizar();
			header('location:?c=class06actdes&m=index');
		}
		else{
			$this->class06actdes = $this->class06actdes->buscar($_REQUEST['id']);
			require_once 'view/header.php';
			require_once 'view/class06actdes/editar.php';
			require_once 'view/footer.php';
		}
	}

	public function eliminar()
	{
		$this->class06actdes->setAtributo('PU06IDACTDES',$_REQUEST['id']);
		$this->class06actdes->eliminar();
		header('location:?c=class06actdes&m=index');
	}

	public function ver()
	{
		$this->class06actdes = $this->class06actdes->buscar($_REQUEST['id']);
		require_once 'view/header.php';
		require_once 'view/class06actdes/ver.php';
		require_once 'view/footer.php';
	}
}
?>