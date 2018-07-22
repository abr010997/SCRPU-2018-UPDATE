<?php 

require_once 'model/class03puestos.php';
class class03puestosController
{
	private $class03puestos;
	function __construct()
	{
		$this->class03puestos = new class03puestos();
	}
	public function index()
	{
		require_once 'view/header.php';
		require_once 'view/class03puestos/index.php';
		require_once 'view/footer.php';
	}
	public function agregar()
	{
		if ($_POST) {
			$this->class03puestos->setAtributo('PU03IDPUES',$_POST['PU03IDPUES']);
			$this->class03puestos->setAtributo('PU03PUESTO',$_POST['PU03PUESTO']);
			$this->class03puestos->guardar();
			header('location:?c=class03puestos&m=index');
		}
		else{
			require_once 'view/header.php';
			require_once 'view/class03puestos/agregar.php';
			require_once 'view/footer.php';
		}
	}
	public function editar()
	{
		if ($_POST) {
			$this->class03puestos->setAtributo('PU03IDPUES',$_POST['PU03IDPUES']);
			$this->class03puestos->setAtributo('PU03PUESTO',$_POST['PU03PUESTO']);
			$this->class03puestos->actualizar();
			header('location:?c=class03puestos&m=index');
		}
		else{
			$this->class03puestos = $this->class03puestos->buscar($_REQUEST['id']);
			require_once 'view/header.php';
			require_once 'view/class03puestos/editar.php';
			require_once 'view/footer.php';		}
		}

	public function eliminar()
	{
		$this->class03puestos->setAtributo('PU03IDPUES',$_REQUEST['id']);
		$this->class03puestos->eliminar();
		header('location:?c=class03puestos&m=index');
	}

	public function ver()
	{
		$this->class03puestos = $this->class03puestos->buscar($_REQUEST['id']);
		require_once 'view/header.php';
		require_once 'view/class03puestos/ver.php';
		require_once 'view/footer.php';
	}
}
?>