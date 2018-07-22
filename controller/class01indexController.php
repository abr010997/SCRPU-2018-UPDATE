<?php 
//solo para pruebas
require_once 'model/class01index.php';
class class01indexController
{
	private $class01index;
	function __construct()
	{
		$this->class01index = new class01index();
	}
	public function index()
	{
		//quire_once 'view/header.php';
		require_once 'view/Pruebas.php';
		//quire_once 'view/footer.php';
	}
	public function agregar()
	{
		if ($_POST) {
			$this->class01index->setAtributo('PU03IDPUES',$_POST['PU03IDPUES']);
			$this->class01index->setAtributo('PU03PUESTO',$_POST['PU03PUESTO']);
			$this->class01index->guardar();
			header('location:?c=class01index&m=index');
		}
		else{
			require_once 'view/header.php';
			require_once 'view/class01index/agregar.php';
			require_once 'view/footer.php';
		}
	}
	public function editar()
	{
		if ($_POST) {
			$this->class01index->setAtributo('PU03IDPUES',$_POST['PU03IDPUES']);
			$this->class01index->setAtributo('PU03PUESTO',$_POST['PU03PUESTO']);
			$this->class01index->actualizar();
			header('location:?c=class01index&m=index');
		}
		else{
			$this->class01index = $this->class01index->buscar($_REQUEST['id']);
			require_once 'view/header.php';
			require_once 'view/class01index/editar.php';
			require_once 'view/footer.php';		}
		}

	public function eliminar()
	{
		$this->class01index->setAtributo('PU03IDPUES',$_REQUEST['id']);
		$this->class01index->eliminar();
		header('location:?c=class01index&m=index');
	}

	public function ver()
	{
		$this->class01index = $this->class01index->buscar($_REQUEST['id']);
		require_once 'view/header.php';
		require_once 'view/class01index/ver.php';
		require_once 'view/footer.php';
	}
}
?>