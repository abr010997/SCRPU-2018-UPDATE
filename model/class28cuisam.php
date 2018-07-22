<?php 
require_once 'conexion.php';

class class28cuisam  extends Conexion
{
	private $PU28IDUBIC;
	private $PU28DSCUBIC;


	private $conexion;
	
	function __construct()
	{
		$this->conexion = new Conexion();
	}
	//Manda un atributo convertido en minuscula, o ya sea solamente el primer caracter
	public function setAtributo($PU28DSCUBIC, $valor)
	{
		$this->$PU28DSCUBIC = ucfirst(strtolower($valor));//Cualquier data al introducir en Mayuscula sera convertido en minuscula
	}

	public function getAtributo($PU28DSCUBIC)
	{
		return $this->$PU28DSCUBIC;
	}

	public function buscar($PU28IDUBIC)
	{
		$sql = "SELECT * FROM pu28cuisam WHERE PU28IDUBIC ='". $PU28IDUBIC ."';";
		$result = $this->conexion->consultaRetorno($sql);
		$class28cuisam = $this->convertToclass28cuisam($result);
		return $class28cuisam;
	}

	public function listar()
	{
		$sql = "SELECT * FROM pu28cuisam ;";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function guardar()
	{
		$sql = "CALL SP28_CUISAM_GUARDAR('$this->PU28IDUBIC','$this->PU28DSCUBIC')";
		$this->conexion->consultaSimple($sql);
	}

	public function actualizar()
	{
		$sql = "CALL SP28_CUISAM_ACTUALIZAR('$this->PU28IDUBIC','$this->PU28DSCUBIC')";
		$this->conexion->consultaSimple($sql);
	}

	public function eliminar()
	{
		$sql = "CALL SP28_CUISAM_ELIMINAR('$this->PU28IDUBIC')";
		$this->conexion->consultaSimple($sql);
	}

	public function convertToclass28cuisam($result)
	{
		$class28cuisam = new class28cuisam();
		while ($row = mysqli_fetch_array($result)) {
			$class28cuisam->setAtributo('PU28IDUBIC',$row[0]);
			$class28cuisam->setAtributo('PU28DSCUBIC',$row[1]);
		
		}
		return $class28cuisam;
	}
}
 ?>