<?php 
require_once 'model/classlistinspeccion.php';
class classlistinspeccionController
{
	private $classlistinspeccion;
	function __construct()
	{
		$this->classlistinspeccion = new classlistinspeccion();
	}

	public function listarInspeccion(){
		require_once 'view/classlistinspeccion/inspeccion.php';
	}

	// public function index()
	// {
	// 	require_once 'view/header.php';
	// 	require_once 'view/classlistinspeccion/index.php';
	// 	require_once 'view/footer.php';
	// }
}
?>