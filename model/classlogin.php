<?php 
require_once 'conexion.php';
class classlogin extends Conexion
{
	//private $id;
	//private $puesto;
	private $usuario;
	private $clave;

	private $conexion;
	function __construct()
	{
		$this->conexion = new Conexion();
	}

	public function setAtributo($nombre, $valor){
		$this->$nombre = ucfirst(strtolower($valor));
	}

	public function getAtributo($nombre){
		return $this->$nombre;
	}

	public function buscar($id)
	{
		$sql = "CALL INGRESO_BUSCAR('".$this->id."');";
		$result = $this->conexion->consultaRetorno($sql);
		$classlogin = $this->convertToclasslogin($result);
		return $classlogin;
	}

	public function entrar($usuario, $clave){
		$sql = "CALL LOGIN('".$usuario."','".$clave."');";
		$result = $this->conexion->consultaRetorno($sql);
		if ( $fila = mysqli_fetch_row($result) ) {
			session_start();
			$_SESSION["usuario"] = $fila[0];
			$_SESSION["idpuesto"] = $fila[1];
			$_SESSION["puesto"] = $fila[2];
			return true;
		}
		return false;
	}

	public function listar()
	{
		$sql = "CALL INGRESO_MOSTRAR();";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function convertToclasslogin($result)
	{
		$classlogin = new classlogin();
		while ($row = mysqli_fetch_array($result)) {
			$classlogin->setAtributo('PU02USUARIO',$row[0]);
			$classlogin->setAtributo('PU02CLAVE',$row[1]);
		}
		return $classlogin;
	}
}
 ?>