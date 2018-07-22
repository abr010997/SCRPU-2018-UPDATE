<?php 
require_once 'conexion.php';
/**
* Existencia de casas frente a calle publica
*/
class class21servicios extends Conexion
{
	private $PU21IDSERVICIO;
	private $PU21DESCSERVICIO;

	private $conexion;
	function __construct()
	{
		$this->conexion = new Conexion();
	}
	//Manda un atributo convertido en minuscula, o ya sea solamente el primer caracter
	public function setAtributo($PU21DESCSERVICIO,$valor){
		$this->$PU21DESCSERVICIO = ucfirst(strtolower($valor));
	}

	public function getAtributo($PU21DESCSERVICIO){
		return $this->$PU21DESCSERVICIO;
	}

	/*public function buscar($PU21IDSERVICIO){
		$sql = "CALL SP22_SERRVI_BUSCAR('".$PU21IDSERVICIO."');";
		$result = $this->conexion->ConsultaRetorno($sql);
		$class21servicios = $this->convertToclass21servicios($result);
		return $class21servicios;
	}*/

	public function listar(){
		$sql = " CALL SP21_SERVICIOS_MOSTRAR();";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	/*public function guardar(){
		$sql = "CALL SP22_SERRVI_GUARDAR('$this->PU21IDSERVICIO','$this->PU21DESCSERVICIO');";
		$this->conexion->ConsultaSimple($sql);
	}

	public function actualizar(){
		$sql = "CALL SP22_SERRVI_ACTUALIZAR('$this->PU21IDSERVICIO','$this->PU21DESCSERVICIO');";
		$this->conexion->ConsultaSimple($sql);
	}

	public function eliminar(){
		$sql = "CALL SP22_SERRVI_ELIMINAR('$this->PU21IDSERVICIO');";
		$this->conexion->ConsultaSimple($sql);
	}*/

	public function convertToclass21servicios($result){
		$class21servicios = new class21servicios();
		while ($row = mysqli_fetch_array($result)) {
			$class21servicios->setAtributo('PU21IDSERVICIO',$row[0]);
			$class21servicios->setAtributo('PU21DESCSERVICIO',$row[1]);
		}
		return $class21servicios;
	}
}
 ?>