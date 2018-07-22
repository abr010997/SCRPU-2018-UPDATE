<?php 
require_once 'model/class04tramite.php';
class class04tramiteController
{
	private $class04tramite;
	function __construct()
	{
		$this->class04tramite = new class04tramite();
	}

	public function index()
	{
		require_once 'view/header.php';
		require_once 'view/class04tramite/index.php';
		require_once 'view/footer.php';
	}

}
?>