<?php
namespace Payroll\Classes\Database;

use Payroll\Classes\Database\ServerConnect;
/**
 * 
 */
class Controller
{
	private $pdo;
	private $pdoConn;

	public function __construct(){
		//$this->pdo = new ServerConnect('localhost', 'id16108944_leonil1993', '1993_LimaBravoOscar_08', 'id16108944_nigerianpayroll_db');
		$this->pdo = new ServerConnect('localhost', 'root', '', 'nigerian_db');
		$this->pdoConn = $this->pdo->connect();
	}
	public function select($sql, $array){

		$stmt = $this->pdoConn->prepare($sql);
		$stmt->execute(array_values($array));

		return $stmt->fetchAll();
		
	}
	public function create(){

	}
	public function update($sql, $array){

		$stmt = $this->pdoConn->prepare($sql);

		return $stmt->execute(array_values($array));

	}
	public function delete($sql, $array){

		$stmt = $this->pdoConn->prepare($sql);

		return $stmt->execute(array_values($array));
	
	}			
	public function insert($sql, $array){

		$stmt = $this->pdoConn->prepare($sql);

		return $stmt->execute(array_values($array));

	}

	public function __destruct(){
		$this->pdo = null;
	}
}