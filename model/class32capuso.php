
<?php 
require_once 'conexion.php';

class class32capuso  extends Conexion
{
	private $PU32IDCUSO;
	private $PU32DESUSO;


	private $conexion;
	
	function __construct()
	{
		$this->conexion = new Conexion();
	}
	//Manda un atributo convertido en minuscula, o ya sea solamente el primer caracter
	public function setAtributo($PU32DESUSO, $valor)
	{
		$this->$PU32DESUSO = ucfirst(strtolower($valor));//Cualquier data al introducir en Mayuscula sera convertido en minuscula
	}

	public function getAtributo($PU32DESUSO)
	{
		return $this->$PU32DESUSO;
	}

	public function buscar($PU32IDCUSO)
	{
		$sql = "CALL SP32_CAPUSO_BUSCAR('".$PU32IDCUSO."');";
		$result = $this->conexion->consultaRetorno($sql);
		$class32capuso = $this->convertToclass32capuso($result);
		return $class32capuso;
	}

	public function listar()
	{
		$sql = "call SP32_CAPUSO_MOSTRAR();";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function guardar()
	{
		$sql = "CALL SP32_CAPUSO_GUARDAR('$this->PU32IDCUSO','$this->PU32DESUSO')";
		$this->conexion->consultaSimple($sql);
	}

	public function actualizar()
	{
		$sql = "CALL SP32_CAPUSO_ACTUALIZAR('$this->PU32IDCUSO','$this->PU32DESUSO')";
		$this->conexion->consultaSimple($sql);
	}

	public function eliminar()
	{
		$sql = "CALL SP32_CAPUSO_ELIMINAR('$this->PU32IDCUSO')";
		$this->conexion->consultaSimple($sql);
	}

	public function convertToclass32capuso($result)
	{
		$class32capuso = new class32capuso();
		while ($row = mysqli_fetch_array($result)) {
			$class32capuso->setAtributo('PU32IDCUSO',$row[0]);
			$class32capuso->setAtributo('PU32DESUSO',$row[1]);
		
		}
		return $class32capuso;
	}
}
 ?>