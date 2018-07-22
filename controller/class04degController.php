<?php 
require_once 'model/class04_DEG.php';

class class04degController
{
	private $class04deg;

 
	function __construct()
	{
		$this->class04deg= new class04_DEG();
	}

	public function index()
	{
		require_once 'view/header.php';
		require_once 'view/class04_DEG/index.php';
		require_once 'view/footer.php';
	}

	public function agregar_DEG()
	{
		if($_POST){
			$this->class04deg->setAtributo('PU04IDTRA',$_POST['PU04IDTRA']);
			
			
			$this->class04deg->guardar_DEG($_POST['class04deg']);
			header('location:?c=class04deg&m=index');
		}
		else{
			//$this->class04_deg= new class04_DEG();

			//require_once 'view/header.php';
			require_once 'view/class04_DEG/agregar.php';
			//require_once 'view/footer.php';
		}
	}

	public function listar(){
		require_once 'view/class04_DEG/agregar.php';
	}

	
}
?>