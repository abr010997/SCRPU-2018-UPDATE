<?php 
require_once 'conexion.php';

class class0102usuarios extends Conexion
{
	private $PU01CEDUSU;
	private $PU01NOMUSU;
	private $PU01APE1USU;
	private $PU01APE2USU;
	private $PU02TELUSU;
	private $PU02CORUSU;
	private $PU03IDPUES;
	private $PU02USUARIO;
	private $PU02CLAVE;



	private $conexion;
	
	function __construct()
	{
		$this->conexion = new Conexion();
	}
	
	public function setAtributo($PU01NOMUSU, $valor)
	{
		$this->$PU01NOMUSU = ucfirst(strtolower($valor)); 
	}

	public function getAtributo($PU01NOMUSU)
	{
		return $this->$PU01NOMUSU;
	}

	public function buscar($PU01CEDUSU)
	{
		$sql = "CALL SP01_REGINFUSU_BUSCAR('".$PU01CEDUSU."')";
		$result = $this->conexion->consultaRetorno($sql);
		$class0102usuarios = $this->convertToclass0102usuarios($result);
		return $class0102usuarios;
	}

	public function listar()
	{
		$sql = "CALL SP01_REGINFUSU_MOSTRARTODO();";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function guardar()
	{
		$sql = "call SP01_REGINFUSU_GUARDAR('$this->PU01CEDUSU','$this->PU01NOMUSU','$this->PU01APE1USU','$this->PU01APE2USU',
	'$this->PU02TELUSU','$this->PU02CORUSU','$this->PU03IDPUES','$this->PU02USUARIO','$this->PU02CLAVE');";	

		$this->conexion->consultaSimple($sql);
	}

	public function actualizar()
	{
		$sql = "call SP01_REGINFUSU_ACTUALIZAR('$this->PU01CEDUSU','$this->PU01NOMUSU','$this->PU01APE1USU','$this->PU01APE2USU',
	'$this->PU02TELUSU','$this->PU02CORUSU','$this->PU03IDPUES')";	

		$this->conexion->consultaSimple($sql);
	}

	public function eliminar()
	{
		$sql = "call SP01_REGINFUSU_ELIMINAR('$this->PU01CEDUSU')";	
		$this->conexion->consultaSimple($sql);
	}

	public function convertToclass0102usuarios($result)
	{
		$class0102usuarios = new class0102usuarios();
		while ($row = mysqli_fetch_array($result)) {
			$class0102usuarios->setAtributo('PU01CEDUSU',$row[0]);
			$class0102usuarios->setAtributo('PU01NOMUSU',$row[1]);
			$class0102usuarios->setAtributo('PU01APE1USU',$row[2]);
			$class0102usuarios->setAtributo('PU01APE2USU',$row[3]);
			$class0102usuarios->setAtributo('PU02TELUSU',$row[4]);
			$class0102usuarios->setAtributo('PU02CORUSU',$row[5]);
			$class0102usuarios->setAtributo('PU03IDPUES',$row[6]);
		}
		return $class0102usuarios;
	}
}