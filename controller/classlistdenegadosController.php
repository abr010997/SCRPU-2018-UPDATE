<?php 
require_once 'model/classlistdenegados.php';
class classlistdenegadosController
{
	private $classlistdenegados;
	function __construct()
	{
		$this->classlistdenegados = new classlistdenegados();
	}

	public function listarDenegados(){
		require_once 'view/classlistdenegados/denegados.php';
	}

	// public function index()
	// {
	// 	require_once 'view/header.php';
	// 	require_once 'view/classlistdenegados/index.php';
	// 	require_once 'view/footer.php';
	// }
}
?>