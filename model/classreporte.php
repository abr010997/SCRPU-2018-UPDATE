<?php 
require_once 'conexion.php';

class classreporte  extends Conexion
{
	private $PU04IDTRA;

	private $conexion;
	
	function __construct()
	{
		$this->conexion = new Conexion();
	}
	
	public function setAtributo($nombre, $valor)
	{
		$this->$nombre = ucfirst(strtolower($valor)); 
	}

	public function getAtributo($nombre)
	{
		return $this->$nombre;
	}

	public function buscar($PU04IDTRA)
	{
		$sql = "CALL SP03_PUESTOS_BUSCAR ('".$PU04IDTRA."');";
		$result = $this->conexion->consultaRetorno($sql);
		$cliente = $this->convertToclassreporte($result);
		return $cliente;
	}

	public function listarPRIN(){
		$sql = "CALL R_PRINCIPAL('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

//
	public function listarZonaVerde()
	{
		$sql = "CALL R_RESI('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function listardatosZonaVerde()
	{
		$sql = "CALL R_RESI1('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}
//

//
	public function listarInstitucional()
	{
		$sql = "CALL R_RESI('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function listardatosInstitu()
	{
		$sql = "CALL R_RESI1('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}
//

//
	public function listarComercialCentral()
	{
		$sql = "CALL R_RESI('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function listardatosComerCentral()
	{
		$sql = "CALL R_RESI1('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}
//

//
	public function listarIndustrial()
	{
		$sql = "CALL R_RESI('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function listardatosIndustrial()
	{
		$sql = "CALL R_RESI1('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}
//

//
	public function listarResidencialComercial()
	{
		$sql = "CALL R_RESI('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function listardatosResiComercial()
	{
		$sql = "CALL R_RESI1('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}
//

//
	public function listarResi()
	{
		$sql = "CALL R_RESI('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function listardatosResi()
	{
		$sql = "CALL R_RESI1('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}
//

//
	public function listarTuristicoComercial()
	{
		$sql = "CALL R_RESI('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function listardatosTuristico()
	{
		$sql = "CALL R_RESI1('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}
//
	public function listarReso()
	{
		$sql = "CALL R_RESOLUCION('$this->PU04IDTRA');";
		$result = $this->conexion->ConsultaRetorno($sql);
		return $result;
	}

	public function listarDESCEG()
	{
		$sql = "CALL R_DESCEG('$this->PU04IDTRA');";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function listarACTDES()
	{
		$sql = "CALL R_ACTDES('$this->PU04IDTRA');";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function listarLey()
	{
		$sql = "CALL R_LEYES('$this->PU04IDTRA');";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function listarLey1()
	{
		$sql = "CALL R_LEYES1('$this->PU04IDTRA');";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function listarLey2()
	{
		$sql = "CALL R_LEYES2('$this->PU04IDTRA');";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function listarLey3()
	{
		$sql = "CALL R_LEYES3('$this->PU04IDTRA');";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function listarLey4()
	{
		$sql = "CALL R_LEYES4('$this->PU04IDTRA');";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function listarLey5()
	{
		$sql = "CALL R_LEYES5('$this->PU04IDTRA');";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function convertToclassreporte($result)
	{
		$classreporte = new classreporte();
		while ($row = mysqli_fetch_array($result)) {
			$classreporte->setAtributo('PU04IDTRA',$row[0]);
		}
		return $classreporte;
	}
}
 ?>