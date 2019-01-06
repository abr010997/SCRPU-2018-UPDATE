<?php
// Controlador para los Distritos 1,2,3,4
require_once 'model/classlistinspeccion1.php';
class classlistinspeccion1Controller
{
	private $classlistinspeccion1;
	function __construct()
	{
		$this->classlistinspeccion1 = new classlistinspeccion1();
	}

	public function listarInspeccion1(){
		require_once 'view/header.php';
		require_once 'view/classlistinspeccion1/inspeccion.php';
		require_once 'view/footer.php';
	}

	// public function index()
	// {
	// 	require_once 'view/header.php';
	// 	require_once 'view/classlistinspeccion/index.php';
	// 	require_once 'view/footer.php';
	// }
}
?>
