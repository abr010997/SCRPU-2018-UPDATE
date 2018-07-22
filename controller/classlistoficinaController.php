<?php 
require_once 'model/classlistoficina.php';
class classlistoficinaController
{
	private $classlistoficina;
	function __construct()
	{
		$this->classlistoficina = new classlistoficina();
	}

	public function listarOficina(){
		require_once 'view/classlistoficina/oficina.php';
	}
}
?>