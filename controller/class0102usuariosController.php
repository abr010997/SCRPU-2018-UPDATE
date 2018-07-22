<?php 

require_once 'model/class0102usuarios.php';
class class0102usuariosController
{
	private $class0102usuarios;
	function __construct()
	{
		$this->class0102usuarios = new class0102usuarios();
	}
	public function index()
	{
		require_once 'view/header.php';
		require_once 'view/class0102usuarios/index.php';
		require_once 'view/footer.php';
	}
	public function agregar()
	{
		if ($_POST) {
			$this->class0102usuarios->setAtributo('PU01CEDUSU',$_POST['PU01CEDUSU']);
			$this->class0102usuarios->setAtributo('PU01NOMUSU',$_POST['PU01NOMUSU']);
			$this->class0102usuarios->setAtributo('PU01APE1USU',$_POST['PU01APE1USU']);
			$this->class0102usuarios->setAtributo('PU01APE2USU',$_POST['PU01APE2USU']);
			$this->class0102usuarios->setAtributo('PU02TELUSU',$_POST['PU02TELUSU']);
			$this->class0102usuarios->setAtributo('PU02CORUSU',$_POST['PU02CORUSU']);
			$this->class0102usuarios->setAtributo('PU03IDPUES',$_POST['PU03IDPUES']);
			$this->class0102usuarios->setAtributo('PU02USUARIO',$_POST['PU02USUARIO']);
			$this->class0102usuarios->setAtributo('PU02CLAVE',$_POST['PU02CLAVE']);
			$this->class0102usuarios->guardar();
			header('location:?c=class0102usuarios&m=index');
		}
		else{
			require_once 'view/header.php';
			require_once 'view/class0102usuarios/agregar.php';
			require_once 'view/footer.php';
		}
	}
	public function editar()
	{
		if ($_POST) {
			$this->class0102usuarios->setAtributo('PU01CEDUSU',$_POST['PU01CEDUSU']);
			$this->class0102usuarios->setAtributo('PU01NOMUSU',$_POST['PU01NOMUSU']);
			$this->class0102usuarios->setAtributo('PU01APE1USU',$_POST['PU01APE1USU']);
			$this->class0102usuarios->setAtributo('PU01APE2USU',$_POST['PU01APE2USU']);
			$this->class0102usuarios->setAtributo('PU02TELUSU',$_POST['PU02TELUSU']);
			$this->class0102usuarios->setAtributo('PU02CORUSU',$_POST['PU02CORUSU']);
			$this->class0102usuarios->setAtributo('PU03IDPUES',$_POST['PU03IDPUES']);
			$this->class0102usuarios->actualizar();
			header('location:?c=class0102usuarios&m=index');
		}
		else{
			$this->class0102usuarios = $this->class0102usuarios->buscar($_REQUEST['id']);
			require_once 'view/header.php';
			require_once 'view/class0102usuarios/editar.php';
			require_once 'view/footer.php';
		}
	}

	public function eliminar()
	{
		$this->class0102usuarios->setAtributo('PU01CEDUSU',$_REQUEST['id']);
		$this->class0102usuarios->eliminar();
		header('location:?c=class0102usuarios&m=index');
	}

	public function ver()
	{
		$this->class0102usuarios = $this->class0102usuarios->buscar($_REQUEST['id']);
		require_once 'view/header.php';
		require_once 'view/class0102usuarios/ver.php';
		require_once 'view/footer.php';
	}
}
?>