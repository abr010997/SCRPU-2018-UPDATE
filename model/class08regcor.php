<?php 
require_once 'conexion.php';

class class08regcor  extends Conexion
{
	private $PU08IDGPS;
	private $PU08NORTE;
	private $PU08ESTE;
	private $PU08ALTITUD;

	private $conexion;
	
	function __construct()
	{
		$this->conexion = new Conexion();
	}
	//Manda un atributo convertido en minuscula, o ya sea solamente el primer caracter
	public function setAtributo($PU08NORTE, $valor)
	{
		$this->$PU08NORTE = ucfirst(strtolower($valor));//Cualquier data al introducir en Mayuscula sera convertido en minuscula
	}

	public function getAtributo($PU08NORTE)
	{
		return $this->$PU08NORTE;
	}

	public function buscar($PU08IDGPS)
	{
		$sql = "CALL SP08_REGCOR_BUSCAR  ('".$PU08IDGPS."');";
		$result = $this->conexion->consultaRetorno($sql);
		$class08regcor = $this->convertToclass08regcor($result);
		return $class08regcor;
	}

	public function listar()
	{
		$sql = "CALL SP08_REGCOR_MOSTRAR();";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function guardar()
	{
		$sql = "CALL SP08_REGCOR_GUARDAR ('$this->PU08IDGPS','$this->PU08NORTE','$this->PU08ESTE','$this->PU08ALTITUD')";	
		$this->conexion->consultaSimple($sql);
	}

	public function actualizar()
	{

		$sql = "CALL SP08_REGCOR_ACTUALIZAR ('$this->PU08IDGPS','$this->PU08NORTE','$this->PU08ESTE','$this->PU08ALTITUD')";	
		$this->conexion->consultaSimple($sql);
	}

	public function eliminar()
	{
		$sql = "CALL SP08_REGCOR_ELIMINAR ('$this->PU08IDGPS');";
		$this->conexion->consultaSimple($sql);
	}

	public function convertToclass08regcor($result)
	{
		$class08regcor = new class08regcor();
		while ($row = mysqli_fetch_array($result)) {
			$class08regcor->setAtributo('PU08IDGPS',$row[0]);
			$class08regcor->setAtributo('PU08NORTE',$row[1]);
			$class08regcor->setAtributo('PU08ESTE',$row[2]);
			$class08regcor->setAtributo('PU08ALTITUD',$row[3]);
		}
		return $class08regcor;
	}
}
 ?>