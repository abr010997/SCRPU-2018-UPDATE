<?php 
require_once 'conexion.php';

class class04ingresotramite  extends Conexion
{
	private $PU04IDTRA;
	private $PU04DESCRIPCIONLUGAR;
	private $PU04FETRA;
	private $PU04IDDISTRITO;
	private $PU04RUTAIMAGEN;

	private $conexion;
	
	function __construct()
	{
		$this->conexion = new Conexion();
	}
	
	public function setAtributo($PU04DESCRIPCIONLUGAR, $valor)
	{
		$this->$PU04DESCRIPCIONLUGAR = ucfirst(strtolower($valor)); 
	}

	public function getAtributo($PU04DESCRIPCIONLUGAR)
	{
		return $this->$PU04DESCRIPCIONLUGAR;
	}

	public function buscar($PU04IDTRA)
	{
		$sql = "CALL SP04_REGTRAMITEINFO_BUSCAR ('".$PU04IDTRA."');";
		$result = $this->conexion->consultaRetorno($sql);
		$cliente = $this->convertToclass04ingresotramite($result);
		return $cliente;
	}

	public function listar()
	{
		$sql = "CALL SP00_LISTAR_INGRESO_TRAMITE();";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}






	public function guardar($pu38servidumbre,$pu26planregId,$actnicosama,$pu13aap)
	{
		$sql = "CALL SP04_REGTRAMITEINFO_GUARDAR ('$this->PU04IDTRA','$this->PU04FETRA','$this->PU04IDDISTRITO');";
		$this->conexion->consultaSimple($sql);

		foreach ($pu38servidumbre as $traservi) {			
			$sql2 = "call SP38_SERVIDUMBRES_TRA_GUARDAR('$this->PU04IDTRA','$traservi');";
			$this->conexion->consultaSimple($sql2);
		}
		foreach ($pu26planregId as $planregId) {			
			$sql3 = "call SP26_PLANREGULADOR_TRA_GUARDAR('$this->PU04IDTRA','$planregId');";
			$this->conexion->consultaSimple($sql3);
		}
		foreach ($actnicosama as $activId) {			
			$sql3 = "call SP26_TRAPLAN_TRA_GUARDAR('$this->PU04IDTRA','$activId');";
			$this->conexion->consultaSimple($sql3);
		}
			foreach ($pu13aap as $pu13aapId) {			
			$sql4 = "CALL SP13_AAREP_TRA_GUARDAR('$this->PU04IDTRA','$pu13aapId');";
			$this->conexion->consultaSimple($sql4);
		}
	}








	public function actualizar()
	{
		$sql = "CALL SP04_REGTRAMITEINFO_ACTUALIZAR ('$this->PU04IDTRA','$this->PU04DESCRIPCIONLUGAR');";
		$this->conexion->consultaSimple($sql);
	}

	public function eliminar()
	{
		$sql = "CALL SP04_REGTRAMITEINFO_ELIMINAR('$this->PU04IDTRA');";
		$this->conexion->consultaSimple($sql);
	}

	public function convertToclass04ingresotramite($result)
	{
		$class04ingresotramite = new class04ingresotramite();
		while ($row = mysqli_fetch_array($result)) {
			$class04ingresotramite->setAtributo('PU04IDTRA',$row[0]);
			$class04ingresotramite->setAtributo('PU04DESCRIPCIONLUGAR',$row[1]);
		}
		return $class04ingresotramite;
	}

	//////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////
	public function eliminarServidumbres($idtramite)
	{
		$sql30 = "DELETE FROM pu38traservidumbres WHERE PU04IDTRA = '".$idtramite."';";	
		$this->conexion->consultaSimple($sql30);		
	}

	public function asignarServidumbres($idtramite, $idservi)
	{
		$sql31 = "INSERT INTO pu38traservidumbres VALUES ('".$idtramite."','".$idservi."');";
		$this->conexion->consultaSimple($sql31);	
	}

	public function tieneServidumbres($idtramite, $idservi)
	{
		
		$sql32 = "SELECT COUNT(*) AS tota130 FROM pu38traservidumbres WHERE PU04IDTRA='".$idtramite."' AND PU38IDSERVIDUMBRE='".$idservi."';";
		$result24 = $this->conexion->consultaRetorno($sql32);
		$row = mysqli_fetch_array($result24);		
		return $row;

	
	}
	public function getTodasServidumbres()
	{
		$sql8 = "SELECT * FROM pu38servidumbres";
		$result = $this->conexion->consultaRetorno($sql8);
		return $result;
	}


	public function guardarImagen()
	{
		//$sql40 = "INSERT INTO pu04fototerreno VALUES ('".$idtramite."','".$rutaimagen."');";
		//$this->conexion->consultaSimple($sql40);	
		$sql40 = "CALL SP04_RUTAIMAGEN_GUARDAR ('$this->PU04IDTRA','$this->PU04RUTAIMAGEN');";
		$this->conexion->consultaSimple($sql40);
	}
}
 ?>