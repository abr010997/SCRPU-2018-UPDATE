<?php 
//ActividadDesarrollar
require_once 'model/class32capuso.php';
class class32capusoController
{
	private $class32capuso;
	function __construct()
	{
		$this->class32capuso = new class32capuso();
	}
	public function index()
	{
		require_once 'view/header.php';
		require_once 'view/class32capuso/index.php';
		require_once 'view/footer.php';
	}
	public function agregar()
	{
		
		if ($_POST) {
			$this->class32capuso->setAtributo('PU32IDCUSO',$_POST['PU32IDCUSO']);//afalta esto
			$this->class32capuso->setAtributo('PU32DESUSO',$_POST['PU32DESUSO']);
			$this->class32capuso->guardar();
			header('location:?c=class32capuso&m=index');
		}
		else{
			require_once 'view/header.php';
			require_once 'view/class32capuso/agregar.php';
			require_once 'view/footer.php';
		}
	}
	public function editar()
	{
		if ($_POST) {
			$this->class32capuso->setAtributo('PU32IDCUSO',$_POST['PU32IDCUSO']);
			$this->class32capuso->setAtributo('PU32DESUSO',$_POST['PU32DESUSO']);
			$this->class32capuso->actualizar();
			header('location:?c=class32capuso&m=index');
		}
		else{
			$this->class32capuso = $this->class32capuso->buscar($_REQUEST['id']);
			require_once 'view/header.php';
			require_once 'view/class32capuso/editar.php';
			require_once 'view/footer.php';
		}
	}

	public function eliminar()
	{
		$this->class32capuso->setAtributo('PU32IDCUSO',$_REQUEST['id']);
		$this->class32capuso->eliminar();
		header('location:?c=class32capuso&m=index');
	}

	public function ver()
	{
		$this->class32capuso = $this->class32capuso->buscar($_REQUEST['id']);
		require_once 'view/header.php';
		require_once 'view/class32capuso/ver.php';
		require_once 'view/footer.php';
	}
}
?>