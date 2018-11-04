<?php 
require_once 'conexion.php';

class class40terreno extends Conexion
{
	private $PU40NFINCA;
	private $PU40NCATASTRO;
	private $PU04IDDISTRITO;
	private $PU39BARRIO;
	private $PU39DIRECCION;



	private $conexion;
	
	function __construct()
	{
		$this->conexion = new Conexion();
	}
	
	public function setAtributo($PU40NCATASTRO, $valor)
	{
		$this->$PU40NCATASTRO = ucfirst(strtolower($valor)); 
	}

	public function getAtributo($PU40NCATASTRO)
	{
		return $this->$PU40NCATASTRO;
	}

	public function buscar($PU40NFINCA)
	{
		$sql = "CALL SP40_TERRENO_BUSCAR('".$PU40NFINCA."')";
		$result = $this->conexion->consultaRetorno($sql);
		$class40terreno = $this->convertToclass40terreno($result);
		return $class40terreno;
	}

	public function listar()
	{
		$sql = "CALL SP40_TERRENO_MOSTRAR();";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function guardar()
	{
		$sql = "CALL SP40_TERRENO_GUARDAR('$this->PU40NFINCA','$this->PU40NCATASTRO','$this->PU04IDDISTRITO','$this->PU39BARRIO','$this->PU39DIRECCION');";	

		$this->conexion->consultaSimple($sql);
	}

	public function actualizar()
	{
		$sql = "call SP40_TERRENO_ACTUALIZAR('$this->PU40NFINCA','$this->PU40NCATASTRO','$this->PU04IDDISTRITO','$this->PU39BARRIO','$this->PU39DIRECCION')";	

		$this->conexion->consultaSimple($sql);
	}

	public function eliminar()
	{
		$sql = "call SP40_TERRENO_ELIMINAR('$this->PU40NFINCA')";	
		$this->conexion->consultaSimple($sql);
	}

	public function convertToclass40terreno($result)
	{
		$class40terreno = new class40terreno();
		while ($row = mysqli_fetch_array($result)) {
			$class40terreno->setAtributo('PU40NFINCA',$row[0]);
			$class40terreno->setAtributo('PU40NCATASTRO',$row[1]);
			$class40terreno->setAtributo('PU04IDDISTRITO',$row[2]);
			$class40terreno->setAtributo('PU39BARRIO',$row[3]);
			$class40terreno->setAtributo('PU39DIRECCION',$row[4]);
			
		}
		return $class40terreno;
	}
}