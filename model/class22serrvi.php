<?php 
require_once 'conexion.php';
/**
* Existencia de casas frente a calle publica
*/
class class22serrvi extends Conexion
{
	private $PU22IDREDVI;
	private $PU22DESSVI;

	private $conexion;
	function __construct()
	{
		$this->conexion = new Conexion();
	}
	//Manda un atributo convertido en minuscula, o ya sea solamente el primer caracter
	public function setAtributo($PU22DESSVI,$valor){
		$this->$PU22DESSVI = ucfirst(strtolower($valor));
	}

	public function getAtributo($PU22DESSVI){
		return $this->$PU22DESSVI;
	}

	public function buscar($PU22IDREDVI){
		$sql = "CALL SP22_SERRVI_BUSCAR('".$PU22IDREDVI."');";
		$result = $this->conexion->ConsultaRetorno($sql);
		$class22serrvi = $this->convertToclass22serrvi($result);
		return $class22serrvi;
	}

	public function listar(){
		$sql = " CALL SP22_SERRVI_MOSTRAR();";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function guardar(){
		$sql = "CALL SP22_SERRVI_GUARDAR('$this->PU22IDREDVI','$this->PU22DESSVI');";
		$this->conexion->ConsultaSimple($sql);
	}

	public function actualizar(){
		$sql = "CALL SP22_SERRVI_ACTUALIZAR('$this->PU22IDREDVI','$this->PU22DESSVI');";
		$this->conexion->ConsultaSimple($sql);
	}

	public function eliminar(){
		$sql = "CALL SP22_SERRVI_ELIMINAR('$this->PU22IDREDVI');";
		$this->conexion->ConsultaSimple($sql);
	}

	public function convertToclass22serrvi($result){
		$class22serrvi = new class22serrvi();
		while ($row = mysqli_fetch_array($result)) {
			$class22serrvi->setAtributo('PU22IDREDVI',$row[0]);
			$class22serrvi->setAtributo('PU22DESSVI',$row[1]);
		}
		return $class22serrvi;
	}
}
 ?>