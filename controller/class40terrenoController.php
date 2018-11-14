<?php 

require_once 'model/class40terreno.php';
class class40terrenoController
{
	private $class40terreno;
	function __construct()
	{
		$this->class40terreno = new class40terreno();
	}
	public function index()
	{
		require_once 'view/header.php';
		require_once 'view/class40terreno/index.php';
		require_once 'view/footer.php';
	}
	public function agregar()
	{
		if ($_POST) {
			$this->class40terreno->setAtributo('PU40NFINCA',$_POST['PU40NFINCA']);
			$this->class40terreno->setAtributo('PU40NCATASTRO',$_POST['PU40NCATASTRO']);

if (isset($_POST['PU04IDDISTRITO'])) {
				
				if ($_POST['PU04IDDISTRITO'] == 'Seleccione') {
					$id = 0;
				}
				if ($_POST['PU04IDDISTRITO'] == 'Nicoya') {
					$id = 1;
				}
				if ($_POST['PU04IDDISTRITO'] == 'Masión') {
					$id = 2;
				}
				if ($_POST['PU04IDDISTRITO'] == 'San Antonio') {
					$id = 3;
				}
				if ($_POST['PU04IDDISTRITO'] == 'Quebrada Honda') {
					$id = 4;
				}
				if ($_POST['PU04IDDISTRITO'] == 'Sámara') {
					$id = 5;
				}
				if ($_POST['PU04IDDISTRITO'] == 'Nosara') {
					$id = 6;
				}
				if ($_POST['PU04IDDISTRITO'] == 'Belén') {
					$id = 7;
				}
			}

			
			$this->class40terreno->setAtributo('PU04IDDISTRITO',$id);
			$this->class40terreno->setAtributo('PU39BARRIO',$_POST['PU39BARRIO']);
			$this->class40terreno->setAtributo('PU39DIRECCION',$_POST['PU39DIRECCION']);

			
			$this->class40terreno->guardar();
			header('location:?c=class40terreno&m=index');
		}
		else{
			require_once 'view/header.php';
			require_once 'view/class40terreno/agregar.php';
			require_once 'view/footer.php';
		}
	}
	public function editar()
	{
		if ($_POST) {
			$this->class40terreno->setAtributo('PU40NFINCA',$_POST['PU40NFINCA']);
			$this->class40terreno->setAtributo('PU40NCATASTRO',$_POST['PU40NCATASTRO']);
			$this->class40terreno->setAtributo('PU04IDDISTRITO',$_POST['PU04IDDISTRITO']);
			$this->class40terreno->setAtributo('PU39BARRIO',$_POST['PU39BARRIO']);
			$this->class40terreno->setAtributo('PU39DIRECCION',$_POST['PU39DIRECCION']);
			
			$this->class40terreno->actualizar();
			header('location:?c=class40terreno&m=index');
		}
		else{
			$this->class40terreno = $this->class40terreno->buscar($_REQUEST['id']);
			require_once 'view/header.php';
			require_once 'view/class40terreno/editar.php';
			require_once 'view/footer.php';
		}
	}

	public function eliminar()
	{
		$this->class40terreno->setAtributo('PU40NFINCA',$_REQUEST['id']);
		$this->class40terreno->eliminar();
		header('location:?c=class40terreno&m=index');
	}

	public function ver()
	{
		$this->class40terreno = $this->class40terreno->buscar($_REQUEST['id']);
		require_once 'view/header.php';
		require_once 'view/class40terreno/ver.php';
		require_once 'view/footer.php';
	}
}
?>