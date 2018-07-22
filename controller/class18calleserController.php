<?php 
require_once 'model/class18calleser.php';
class class18calleserController
{
	private $class18calleser;
	function __construct()
	{
		$this->class18calleser = new class18calleser();
	}
	public function index()
	{
		require_once 'view/header.php';
		require_once 'view/class18calleser/index.php';
		require_once 'view/footer.php';
	}
	public function agregar()
	{
		
		if ($_POST) {
			$this->class18calleser->setAtributo('PU18IDCSCLS',$_POST['PU18IDCSCLS']);//afalta esto
			$this->class18calleser->setAtributo('PU18DESCS',$_POST['PU18DESCS']);
			$this->class18calleser->guardar();
			header('location:?c=class18calleser&m=index');
		}
		else{
			require_once 'view/header.php';
			require_once 'view/class18calleser/agregar.php';
			require_once 'view/footer.php';
		}
	}
	public function editar()
	{
		if ($_POST) {
			$this->class18calleser->setAtributo('PU18IDCSCLS',$_POST['PU18IDCSCLS']);
			$this->class18calleser->setAtributo('PU18DESCS',$_POST['PU18DESCS']);
			$this->class18calleser->actualizar();
			header('location:?c=class18calleser&m=index');
		}
		else{
			$this->class18calleser = $this->class18calleser->buscar($_REQUEST['id']);
			require_once 'view/header.php';
			require_once 'view/class18calleser/editar.php';
			require_once 'view/footer.php';
		}
	}

	public function eliminar()
	{
		$this->class18calleser->setAtributo('PU18IDCSCLS',$_REQUEST['id']);
		$this->class18calleser->eliminar();
		header('location:?c=class18calleser&m=index');
	}

	public function ver()
	{
		$this->class18calleser = $this->class18calleser->buscar($_REQUEST['id']);
		require_once 'view/header.php';
		require_once 'view/class18calleser/ver.php';
		require_once 'view/footer.php';
	}
}
 ?>