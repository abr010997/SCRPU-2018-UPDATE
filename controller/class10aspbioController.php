<?php 
//`pu10aspbio`
//`PU10IDASBIO``PU10DESCABIO`class10aspbio
require_once 'model/class10aspbio.php';
class class10aspbioController
{
	private $class10aspbio;
	function __construct()
	{
		$this->class10aspbio = new class10aspbio();
	}
	public function index()
	{
		require_once 'view/header.php';
		require_once 'view/class10aspbio/index.php';
		require_once 'view/footer.php';
	}
	public function agregar()
	{
		
		if ($_POST) {
			$this->class10aspbio->setAtributo('PU10IDASBIO',$_POST['PU10IDASBIO']);
			$this->class10aspbio->setAtributo('PU10DESCABIO',$_POST['PU10DESCABIO']);
			$this->class10aspbio->guardar();
			header('location:?c=class10aspbio&m=index');
		}
		else{
			require_once 'view/header.php';
			require_once 'view/class10aspbio/agregar.php';
			require_once 'view/footer.php';
		}
	}
	public function editar()
	{
		if ($_POST) {
			$this->class10aspbio->setAtributo('PU10IDASBIO',$_POST['PU10IDASBIO']);
			$this->class10aspbio->setAtributo('PU10DESCABIO',$_POST['PU10DESCABIO']);
			$this->class10aspbio->actualizar();
			header('location:?c=class10aspbio&m=index');
		}
		else{
			$this->class10aspbio = $this->class10aspbio->buscar($_REQUEST['id']);
			require_once 'view/header.php';
			require_once 'view/class10aspbio/editar.php';
			require_once 'view/footer.php';
		}
	}

	public function eliminar()
	{
		$this->class10aspbio->setAtributo('PU10IDASBIO',$_REQUEST['id']);
		$this->class10aspbio->eliminar();
		header('location:?c=class10aspbio&m=index');
	}

	public function ver()
	{
		$this->class10aspbio = $this->class10aspbio->buscar($_REQUEST['id']);
		require_once 'view/header.php';
		require_once 'view/class10aspbio/ver.php';
		require_once 'view/footer.php';
	}
}
?>