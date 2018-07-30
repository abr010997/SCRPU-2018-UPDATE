<?php 
require_once 'model/classlistinspeccion2.php';
class classlistinspeccion2Controller
{
	private $classlistinspeccion2;
	function __construct()
	{
		$this->classlistinspeccion2 = new classlistinspeccion2();
	}

	public function listarInspeccion2(){
		require_once 'view/classlistinspeccion2/inspeccion.php';
	}

	// public function index()
	// {
	// 	require_once 'view/header.php';
	// 	require_once 'view/classlistinspeccion/index.php';
	// 	require_once 'view/footer.php';
	// }
}
?>