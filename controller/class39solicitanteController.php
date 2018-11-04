<?php 

require_once 'model/class39solicitante.php';
class class39solicitanteController
{
	private $class39solicitante;
	function __construct()
	{
		$this->class39solicitante = new class39solicitante();
	}
	public function index()
	{
		require_once 'view/header.php';
		require_once 'view/class39solicitante/index.php';
		require_once 'view/footer.php';
	}
	public function agregar()
	{
		if ($_POST) {
			$this->class39solicitante->setAtributo('PU39CEDSOLICI',$_POST['PU39CEDSOLICI']);
			$this->class39solicitante->setAtributo('PU39NOMSOLICI',$_POST['PU39NOMSOLICI']);
			$this->class39solicitante->setAtributo('PU39APE1SOLICI',$_POST['PU39APE1SOLICI']);
			$this->class39solicitante->setAtributo('PU39APE2SOLICI',$_POST['PU39APE2SOLICI']);
			
			$this->class39solicitante->guardar();
			header('location:?c=class39solicitante&m=index');
		}
		else{
			require_once 'view/header.php';
			require_once 'view/class39solicitante/agregar.php';
			require_once 'view/footer.php';
		}
	}
	public function editar()
	{
		if ($_POST) {
			$this->class39solicitante->setAtributo('PU39CEDSOLICI',$_POST['PU39CEDSOLICI']);
			$this->class39solicitante->setAtributo('PU39NOMSOLICI',$_POST['PU39NOMSOLICI']);
			$this->class39solicitante->setAtributo('PU39APE1SOLICI',$_POST['PU39APE1SOLICI']);
			$this->class39solicitante->setAtributo('PU39APE2SOLICI',$_POST['PU39APE2SOLICI']);
			
			$this->class39solicitante->actualizar();
			header('location:?c=class39solicitante&m=index');
		}
		else{
			$this->class39solicitante = $this->class39solicitante->buscar($_REQUEST['id']);
			require_once 'view/header.php';
			require_once 'view/class39solicitante/editar.php';
			require_once 'view/footer.php';
		}
	}

	public function eliminar()
	{
		$this->class39solicitante->setAtributo('PU39CEDSOLICI',$_REQUEST['id']);
		$this->class39solicitante->eliminar();
		header('location:?c=class39solicitante&m=index');
	}

	public function ver()
	{
		$this->class39solicitante = $this->class39solicitante->buscar($_REQUEST['id']);
		require_once 'view/header.php';
		require_once 'view/class39solicitante/ver.php';
		require_once 'view/footer.php';
	}
}
?>