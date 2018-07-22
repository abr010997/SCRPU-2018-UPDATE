<?php 
require_once 'model/classlistnuevos.php';
class classlistnuevosController
{
	private $classlistnuevos;
	function __construct()
	{
		$this->classlistnuevos = new classlistnuevos();
	}

	public function listarNuevo(){
		require_once 'view/classlistnuevos/nuevos.php';
	}

	// public function index()
	// {
	// 	require_once 'view/header.php';
	// 	require_once 'view/classlistnuevos/index.php';
	// 	require_once 'view/footer.php';
	// }
}
?>