<?php 
require_once 'conexion.php';
/**
* Existencia de casas frente a calle publica
*/
class class20desas extends Conexion
{
	private $PU20IDDESAS;
	private $PU20DESCS;

	private $conexion;
	function __construct()
	{
		$this->conexion = new Conexion();
	}
	//Manda un atributo convertido en minuscula, o ya sea solamente el primer caracter
	public function setAtributo($PU20DESCS,$valor){
		$this->$PU20DESCS = ucfirst(strtolower($valor));
	}

	public function getAtributo($PU20DESCS){
		return $this->$PU20DESCS;
	}

	public function buscar($PU20IDDESAS){
		$sql = "CALL SP20_DESAS_BUSCAR('".$PU20IDDESAS."');";
		$result = $this->conexion->ConsultaRetorno($sql);
		$class20desas = $this->convertToclass20desas($result);
		return $class20desas;
	}

	public function listar(){
		$sql = " CALL SP20_DESAS_MOSTRAR();";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function guardar(){
		$sql = "CALL SP20_DESAS_GUARDAR('$this->PU20IDDESAS','$this->PU20DESCS');";
		$this->conexion->ConsultaSimple($sql);
	}

	public function actualizar(){
		$sql = "CALL SP20_DESAS_ACTUALIZAR('$this->PU20IDDESAS','$this->PU20DESCS');";
		$this->conexion->ConsultaSimple($sql);
	}

	public function eliminar(){
		$sql = "CALL SP20_DESAS_ELIMINAR('$this->PU20IDDESAS');";
		$this->conexion->ConsultaSimple($sql);
	}

	public function convertToclass20desas($result){
		$class20desas = new class20desas();
		while ($row = mysqli_fetch_array($result)) {
			$class20desas->setAtributo('PU20IDDESAS',$row[0]);
			$class20desas->setAtributo('PU20DESCS',$row[1]);
		}
		return $class20desas;
	}
}
 ?>