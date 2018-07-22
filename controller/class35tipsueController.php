<?php 
//ActividadDesarrollar
require_once 'model/class35tipsue.php';
class class35tipsueController
{
	private $class35tipsue;
	function __construct()
	{
		$this->class35tipsue = new class35tipsue();
	}
	public function index()
	{
		require_once 'view/header.php';
		require_once 'view/class35tipsue/index.php';
		require_once 'view/footer.php';
	}
	public function agregar()
	{
		
		if ($_POST) {
			$this->class35tipsue->setAtributo('PU35IDTIPS',$_POST['PU35IDTIPS']);//afalta esto
			$this->class35tipsue->setAtributo('PU35DESTIP',$_POST['PU35DESTIP']);
			$this->class35tipsue->guardar();
			header('location:?c=class35tipsue&m=index');
		}
		else{
			require_once 'view/header.php';
			require_once 'view/class35tipsue/agregar.php';
			require_once 'view/footer.php';
		}
	}
	public function editar()
	{
		if ($_POST) {
			$this->class35tipsue->setAtributo('PU35IDTIPS',$_POST['PU35IDTIPS']);
			$this->class35tipsue->setAtributo('PU35DESTIP',$_POST['PU35DESTIP']);
			$this->class35tipsue->actualizar();
			header('location:?c=class35tipsue&m=index');
		}
		else{
			$this->class35tipsue = $this->class35tipsue->buscar($_REQUEST['id']);
			require_once 'view/header.php';
			require_once 'view/class35tipsue/editar.php';
			require_once 'view/footer.php';
		}
	}

	public function eliminar()
	{
		$this->class35tipsue->setAtributo('PU35IDTIPS',$_REQUEST['id']);
		$this->class35tipsue->eliminar();
		header('location:?c=class35tipsue&m=index');
	}

	public function ver()
	{
		$this->class35tipsue = $this->class35tipsue->buscar($_REQUEST['id']);
		require_once 'view/header.php';
		require_once 'view/class35tipsue/ver.php';
		require_once 'view/footer.php';
	}
}
?>