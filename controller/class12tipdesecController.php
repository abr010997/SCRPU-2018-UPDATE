<?php 
//`pu12tipdesec`
//`PU12IDTDESEC``PU12TIPODES`
require_once 'model/class12tipdesec.php';
class class12tipdesecController
{
	private $class12tipdesec;
	function __construct()
	{
		$this->class12tipdesec = new class12tipdesec();
	}
	public function index()
	{
		require_once 'view/header.php';
		require_once 'view/class12tipdesec/index.php';
		require_once 'view/footer.php';
	}
	public function agregar()
	{
		
		if ($_POST) {
			$this->class12tipdesec->setAtributo('PU12IDTDESEC',$_POST['PU12IDTDESEC']);//afalta esto
			$this->class12tipdesec->setAtributo('PU12TIPODES',$_POST['PU12TIPODES']);
			$this->class12tipdesec->guardar();
			header('location:?c=class12tipdesec&m=index');
		}
		else{
			require_once 'view/header.php';
			require_once 'view/class12tipdesec/agregar.php';
			require_once 'view/footer.php';
		}
	}
	public function editar()
	{
		if ($_POST) {
			$this->class12tipdesec->setAtributo('PU12IDTDESEC',$_POST['PU12IDTDESEC']);
			$this->class12tipdesec->setAtributo('PU12TIPODES',$_POST['PU12TIPODES']);
			$this->class12tipdesec->actualizar();
			header('location:?c=class12tipdesec&m=index');
		}
		else{
			$this->class12tipdesec = $this->class12tipdesec->buscar($_REQUEST['id']);
			require_once 'view/header.php';
			require_once 'view/class12tipdesec/editar.php';
			require_once 'view/footer.php';
		}
	}

	public function eliminar()
	{
		$this->class12tipdesec->setAtributo('PU12IDTDESEC',$_REQUEST['id']);
		$this->class12tipdesec->eliminar();
		header('location:?c=class12tipdesec&m=index');
	}

	public function ver()
	{
		$this->class12tipdesec = $this->class12tipdesec->buscar($_REQUEST['id']);
		require_once 'view/header.php';
		require_once 'view/class12tipdesec/ver.php';
		require_once 'view/footer.php';
	}
}
?>