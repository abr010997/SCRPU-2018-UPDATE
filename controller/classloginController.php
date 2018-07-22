<?php 
require_once 'model/classlogin.php';
class classloginController
{
	private $classlogin;
	function __construct()
	{
		$this->classlogin =  new classlogin();
	}

	public function index(){
		require_once 'view/login.php';
	}

	public function sesion(){
		if (isset($_POST["submit"])) {
			try{
				if (empty($_POST["usuario"] || $_POST["clave"])) {
					throw new Exception("Usuario y Clave son incorrectos");
				} else {
					if ($_POST) {
						$this->classlogin->setAtributo('usuario',$_POST['usuario']);
						$this->classlogin->setAtributo('clave',$_POST['clave']);
						//$this->classlogin->entrar($_POST['usuario'],$_POST['clave']);
						if ($this->classlogin->entrar($_POST['usuario'],$_POST['clave']) == true) {
							session_start();
							if ($_SESSION['idpuesto'] == 1) {
								header("Location: ?c=classprincipal&m=index");	
							} else if ($_SESSION['idpuesto'] == 2){
								header("Location: ?c=classprincipal&m=index");
							} else  if ($_SESSION['idpuesto'] == 3) {
								header("Location: ?c=classprincipal&m=index");								
							} else if ($_SESSION['idpuesto'] == 4) {
								header("Location: ?c=classprincipal&m=index");
							} else {
								header("Location: ?c=class03puestos&m=index");
							}
						} else {
							?>
							<script>
								alert("Usuario y Clave son incorrectos");
								location.href = "?c=classlogin&m=index";
							</script>
							<?php
						}
					} else {
						require_once 'view/login.php';
					}
				}
			}
			catch (Exception $e) {
				?>
				<script>
					alert("Usuario y Clave son incorrectos");
					location.href = "?c=classlogin&m=index";
				</script>
				<?php
		    }
		}

	}
}
 ?>