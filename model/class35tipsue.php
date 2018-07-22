<?php 
require_once 'conexion.php';

class class35tipsue  extends Conexion
{
	private $PU35IDTIPS;
	private $PU35DESTIP;


	private $conexion;
	
	function __construct()
	{
		$this->conexion = new Conexion();
	}
	//Manda un atributo convertido en minuscula, o ya sea solamente el primer caracter
	public function setAtributo($PU35DESTIP, $valor)
	{
		$this->$PU35DESTIP = ucfirst(strtolower($valor));//Cualquier data al introducir en Mayuscula sera convertido en minuscula
	}

	public function getAtributo($PU35DESTIP)
	{
		return $this->$PU35DESTIP;
	}

	public function buscar($PU35IDTIPS)
	{
		$sql = "CALL SP35_TIPSUE_BUSCAR('".$PU35IDTIPS."');";
		$result = $this->conexion->consultaRetorno($sql);
		$class35tipsue = $this->convertToclass35tipsue($result);
		return $class35tipsue;
	}

	public function listar()
	{
		$sql = "Call SP35_TIPSUE_MOSTRAR();";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function guardar()
	{
		$sql = "CALL SP35_TIPSUE_GUARDAR('$this->PU35IDTIPS','$this->PU35DESTIP')";
		$this->conexion->consultaSimple($sql);
	}

	public function actualizar()
	{
		$sql = "CALL SP35_TIPSUE_ACTUALIZAR('$this->PU35IDTIPS','$this->PU35DESTIP')";
		$this->conexion->consultaSimple($sql);
	}

	public function eliminar()
	{
		$sql = "CALL SP35_TIPSUE_ELIMINAR('$this->PU35IDTIPS')";
		$this->conexion->consultaSimple($sql);
	}

	public function convertToclass35tipsue($result)
	{
		$class35tipsue = new class35tipsue();
		while ($row = mysqli_fetch_array($result)) {
			$class35tipsue->setAtributo('PU35IDTIPS',$row[0]);
			$class35tipsue->setAtributo('PU35DESTIP',$row[1]);
		
		}
		return $class35tipsue;
	}
}
 ?>