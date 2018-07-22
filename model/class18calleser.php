<?php 
require_once 'conexion.php';

class class18calleser  extends Conexion
{
	private $PU18IDCSCLS;
	private $PU18DESCS;

	private $conexion;
	
	function __construct()
	{
		$this->conexion = new Conexion();
	}
	//Manda un atributo convertido en minuscula, o ya sea solamente el primer caracter
	public function setAtributo($PU18DESCS, $valor)
	{
		$this->$PU18DESCS = ucfirst(strtolower($valor));//Cualquier data al introducir en Mayuscula sera convertido en minuscula
	}

	public function getAtributo($PU18DESCS)
	{
		return $this->$PU18DESCS;
	}

	public function buscar($PU18IDCSCLS)
	{
		$sql = "CALL SP18_CALLESER_BUSCAR('".$PU18IDCSCLS."');";
		$result = $this->conexion->ConsultaRetorno($sql);
		$class18calleser = $this->convertToclass18calleser($result);
		return $class18calleser;
	}

	public function listar()
	{
		$sql = "CALL SP18_CALLESER_MOSTRAR();";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function guardar()
	{
		$sql = "call SP18_CALLESER_GUARDAR('$this->PU18IDCSCLS','$this->PU18DESCS');";
		$this->conexion->ConsultaSimple($sql);
	}

	public function actualizar()
	{
		$sql = "call SP18_CALLESER_ACTUALIZAR('$this->PU18IDCSCLS','$this->PU18DESCS');";
		$this->conexion->ConsultaSimple($sql);
	}

	public function eliminar()
	{
		$sql = "call SP18_CALLESER_ELIMINAR('$this->PU18IDCSCLS');";
		$this->conexion->ConsultaSimple($sql);
	}

	public function convertToclass18calleser($result)
	{
		$class18calleser = new class18calleser();
		while ($row = mysqli_fetch_array($result)) {
			$class18calleser->setAtributo('PU18IDCSCLS',$row[0]);
			$class18calleser->setAtributo('PU18DESCS',$row[1]);
	
		}
		return $class18calleser;
	}
}
 ?>