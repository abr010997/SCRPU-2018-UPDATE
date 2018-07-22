<?php 
/**
* Clase que establece la comunicación con la base de datos
*/
class Conexion
{
	private $dbInfo = array('host' => 'localhost',
							'user' => 'root',
							'pass' => '',
							'db' => 'pu_ingenieria' );
	private $database;

	function __construct()
	{		
		
		$this->database = new mysqli($this->dbInfo['host'],$this->dbInfo['user'],
			$this->dbInfo['pass'],$this->dbInfo['db'] );

		if ($this->database->connect_errno) {
		 	
		 	echo $this->database->connect_error;
		 } 	 
	}
	/**
	* Retorna FALSE en caso de error. 
	* Para otras consultas exitosas de mysqli_query() retornará TRUE.
	*/
	public function ConsultaSimple($sql)
	{
		$this->database->query($sql);
		//$this->database->close();
	}
	/**
	*	Si es exitosa, mysqli_query() retornará un objeto mysqli_result.
	*/
	public function ConsultaRetorno($sql)
	{
		$result = $this->database->query($sql);
	    //$this->database->close();
		return $result;
	}
}


 ?>