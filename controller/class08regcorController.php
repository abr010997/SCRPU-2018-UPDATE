<?php 

require_once 'model/class08regcor.php';
class class08regcorController
{
	private $class08regcor;
	function __construct()
	{
		$this->class08regcor = new class08regcor();
	}
	public function index()
	{
		require_once 'view/header.php';
		require_once 'view/class08regcor/index.php';
		require_once 'view/footer.php';
	}
	public function agregar()
	{
		if ($_POST) {
			$this->class08regcor->setAtributo('PU08IDGPS',$_POST['PU08IDGPS']);
			$this->class08regcor->setAtributo('PU08NORTE',$_POST['PU08NORTE']);
			$this->class08regcor->setAtributo('PU08ESTE',$_POST['PU08ESTE']);
			$this->class08regcor->setAtributo('PU08ALTITUD',$_POST['PU08ALTITUD']);
			$this->class08regcor->guardar();
			header('location:?c=class08regcor&m=index');
		}
		else{
			require_once 'view/header.php';
			require_once 'view/class08regcor/agregar.php';
			require_once 'view/footer.php';
		}
	}
	public function editar()
	{
		if ($_POST) {
			$this->class08regcor->setAtributo('PU08IDGPS',$_POST['PU08IDGPS']);
			$this->class08regcor->setAtributo('PU08NORTE',$_POST['PU08NORTE']);
			$this->class08regcor->setAtributo('PU08ESTE',$_POST['PU08ESTE']);
			$this->class08regcor->setAtributo('PU08ALTITUD',$_POST['PU08ALTITUD']);
			$this->class08regcor->actualizar();
			header('location:?c=class08regcor&m=index');
		}
		else{
			$this->class08regcor = $this->class08regcor->buscar($_REQUEST['id']);
			require_once 'view/header.php';
			require_once 'view/class08regcor/editar.php';
			require_once 'view/footer.php';
		}
	}

	public function eliminar()
	{
		$this->class08regcor->setAtributo('PU08IDGPS',$_REQUEST['id']);
		$this->class08regcor->eliminar();
		header('location:?c=class08regcor&m=index');
	}

	public function ver()
	{
		$this->class08regcor = $this->class08regcor->buscar($_REQUEST['id']);
		require_once 'view/header.php';
		require_once 'view/class08regcor/ver.php';
		require_once 'view/footer.php';
	}
}
?>