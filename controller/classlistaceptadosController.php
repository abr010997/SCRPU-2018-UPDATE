<?php 
require_once 'model/classlistaceptados.php';
class classlistaceptadosController
{
	private $classlistaceptados;
	function __construct()
	{
		$this->classlistaceptados = new classlistaceptados();
	}

	public function listarAceptados(){
		require_once 'view/classlistaceptados/aceptados.php';
	}

	// public function index()
	// {
	// 	require_once 'view/header.php';
	// 	require_once 'view/classlistaceptados/index.php';
	// 	require_once 'view/footer.php';
	// }
}
?>