<?php 
//ActividadDesarrollar
require_once 'model/class07terrft.php';
class class07terrftController
{
	private $class07terrft;
	function __construct()
	{
		$this->class07terrft = new class07terrft();
	}
	public function index()
	{
		require_once 'view/header.php';
		require_once 'view/class07terrft/index.php';
		require_once 'view/footer.php';
	}
	public function agregar()
	{
		
		if ($_POST) {
			$this->class07terrft->setAtributo('PU07IDTFR',$_POST['PU07IDTFR']);
			$this->class07terrft->setAtributo('PU07NOMTFR',$_POST['PU07NOMTFR']);
			$this->class07terrft->guardar();
			header('location:?c=class07terrft&m=index');
		}
		else{
			require_once 'view/header.php';
			require_once 'view/class07terrft/agregar.php';
			require_once 'view/footer.php';
		}
	}
	public function editar()
	{
		if ($_POST) {
			$this->class07terrft->setAtributo('PU07IDTFR',$_POST['PU07IDTFR']);
			$this->class07terrft->setAtributo('PU07NOMTFR',$_POST['PU07NOMTFR']);
			$this->class07terrft->actualizar();
			header('location:?c=class07terrft&m=index');
		}
		else{
			$this->class07terrft = $this->class07terrft->buscar($_REQUEST['id']);
			require_once 'view/header.php';
			require_once 'view/class07terrft/editar.php';
			require_once 'view/footer.php';
		}
	}

	public function eliminar()
	{
		$this->class07terrft->setAtributo('PU07IDTFR',$_REQUEST['id']);
		$this->class07terrft->eliminar();
		header('location:?c=class07terrft&m=index');
	}

	public function ver()
	{
		$this->class07terrft = $this->class07terrft->buscar($_REQUEST['id']);
		require_once 'view/header.php';
		require_once 'view/class07terrft/ver.php';
		require_once 'view/footer.php';
	}
}
?>