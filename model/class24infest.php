<?php 
require_once 'conexion.php';
//`pu09desceg`
//`PU24IDINFR``PU24DESCINF`
class class24infest  extends Conexion
{
	
	private $PU24IDINFRR;
	private $PU24DESCINF;

	private $conexion;
	
	function __construct()
	{
		$this->conexion = new Conexion();
	}
	//Manda un atributo convertido en minuscula, o ya sea solamente el primer caracter
	public function setAtributo($salida, $entrada)
	{
		$this->$salida = ucfirst(strtolower($entrada));//Cualquier data al introducir en Mayuscula sera convertido en minuscula
	}

	public function getAtributo($salida)
	{
		return $this->$salida;
	}

	public function buscar($PU24IDINFR)
	{
		$sql = "call SP24_INFEST_BUSCAR('".$PU24IDINFR."');";
		$result = $this->conexion->ConsultaRetorno($sql);
		$class24infest = $this->convertToclass24infest($result);
		return $class24infest;
	}

	public function listar()
	{
		$sql = "call SP24_INFEST_MOSTRAR();";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function guardar()
	{
		$sql = "call SP24_INFEST_GUARDAR('$this->PU24IDINFR','$this->PU24DESCINF')";
		$this->conexion->ConsultaSimple($sql);
	}

	public function actualizar()
	{
		$sql = "call SP24_INFEST_ACTUALIZAR('$this->PU24IDINFR','$this->PU24DESCINF')";
		$this->conexion->ConsultaSimple($sql);
	}

	public function eliminar()
	{
		$sql = "call SP24_INFEST_ELIMINAR('$this->PU24IDINFR')";
		$this->conexion->ConsultaSimple($sql);
	}

	public function convertToclass24infest($result)
	{
		$class24infest = new class24infest();
		while ($row = mysqli_fetch_array($result)) {
			$class24infest->setAtributo('PU24IDINFR',$row[0]);
			$class24infest->setAtributo('PU24DESCINF',$row[1]);
	
		}
		return $class24infest;
	}
}
 ?>