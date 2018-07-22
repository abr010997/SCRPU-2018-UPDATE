<?php 
//ActividadDesarrollar
require_once 'model/class27cuinic.php';
class class27cuinicController
{
	private $class27cuinic;
	function __construct()
	{
		$this->class27cuinic = new class27cuinic();
	}
	public function index()
	{
		require_once 'view/header.php';
		require_once 'view/class27cuinic/index.php';
		require_once 'view/footer.php';
	}
	public function agregar()
	{
		
		if ($_POST) {
			$this->class27cuinic->setAtributo('PU27IDUBIC',$_POST['PU27IDUBIC']);//afalta esto
			$this->class27cuinic->setAtributo('PU27DSCUBIC',$_POST['PU27DSCUBIC']);
			$this->class27cuinic->guardar();
			header('location:?c=class27cuinic&m=index');
		}
		else{
			require_once 'view/header.php';
			require_once 'view/class27cuinic/agregar.php';
			require_once 'view/footer.php';
		}
	}
	public function editar()
	{
		if ($_POST) {
			$this->class27cuinic->setAtributo('PU27IDUBIC',$_POST['PU27IDUBIC']);
			$this->class27cuinic->setAtributo('PU27DSCUBIC',$_POST['PU27DSCUBIC']);
			$this->class27cuinic->actualizar();
			header('location:?c=class27cuinic&m=index');
		}
		else{
			$this->class27cuinic = $this->class27cuinic->buscar($_REQUEST['id']);
			require_once 'view/header.php';
			require_once 'view/class27cuinic/editar.php';
			require_once 'view/footer.php';
		}
	}

	public function eliminar()
	{
		$this->class27cuinic->setAtributo('PU27IDUBIC',$_REQUEST['id']);
		$this->class27cuinic->eliminar();
		header('location:?c=class27cuinic&m=index');
	}

	public function ver()
	{
		$this->class27cuinic = $this->class27cuinic->buscar($_REQUEST['id']);
		require_once 'view/header.php';
		require_once 'view/class27cuinic/ver.php';
		require_once 'view/footer.php';
	}
}
?>