<?php 
//`pu13aarep`
//`PU13IDAAP``PU13DESCAAP`
require_once 'model/class13aarep.php';
class class13aarepController
{
	private $class13aarep;
	function __construct()
	{
		$this->class13aarep = new class13aarep();
	}
	public function index()
	{
		require_once 'view/header.php';
		require_once 'view/class13aarep/index.php';
		require_once 'view/footer.php';
	}
	public function agregar()
	{
		
		if ($_POST) {
			$this->class13aarep->setAtributo('PU13IDAAP',$_POST['PU13IDAAP']);//afalta esto
			$this->class13aarep->setAtributo('PU13DESCAAP',$_POST['PU13DESCAAP']);
			$this->class13aarep->guardar();
			header('location:?c=class13aarep&m=index');
		}
		else{
			require_once 'view/header.php';
			require_once 'view/class13aarep/agregar.php';
			require_once 'view/header.php';
		}
	}
	public function editar()
	{
		if ($_POST) {
			$this->class13aarep->setAtributo('PU13IDAAP',$_POST['PU13IDAAP']);
			$this->class13aarep->setAtributo('PU13DESCAAP',$_POST['PU13DESCAAP']);
			$this->class13aarep->actualizar();
			header('location:?c=class13aarep&m=index');
		}
		else{
			$this->class13aarep = $this->class13aarep->buscar($_REQUEST['id']);
			require_once 'view/header.php';
			require_once 'view/class13aarep/editar.php';
			require_once 'view/footer.php';
		}
	}

	public function eliminar()
	{
		$this->class13aarep->setAtributo('PU13IDAAP',$_REQUEST['id']);
		$this->class13aarep->eliminar();
		header('location:?c=class13aarep&m=index');
	}

	public function ver()
	{
		$this->class13aarep = $this->class13aarep->buscar($_REQUEST['id']);
		require_once 'view/header.php';
		require_once 'view/class13aarep/ver.php';
		require_once 'view/footer.php';
	}
}
?>