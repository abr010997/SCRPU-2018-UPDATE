<?php 
require_once 'model/classlistretrasados.php';
class classlistretrasadosController
{
	private $classlistretrasados;
	function __construct()
	{
		$this->classlistretrasados = new classlistretrasados();
	}

	public function listarRetrasado(){
		require_once 'view/classlistretrasados/retrasados.php';
	}

	// public function index()
	// {
	// 	require_once 'view/header.php';
	// 	require_once 'view/classlistretrasados/index.php';
	// 	require_once 'view/footer.php';
	// }
}
?>