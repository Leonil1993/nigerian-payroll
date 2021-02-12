<?php
namespace Payroll\Classes\Database;
use PDO;

class ServerConnect{
    private $serverName;
    private $userName;
    private $password;
    private $databaseName;

    public function __construct($serverName, $userName, $password, $databaseName){
        $this->serverName = $serverName;
        $this->userName = $userName;
        $this->password = $password;
        $this->databaseName = $databaseName;
    }

    public function connect(){
        try {
            // set the PDO ATTR options
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8",
                PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => TRUE,
                PDO::MYSQL_ATTR_LOCAL_INFILE => TRUE,
                PDO::MYSQL_ATTR_USE_BUFFERED_QUERY
            ];
            $conn = new PDO("mysql:host=$this->serverName;dbname=$this->databaseName", $this->userName,
            $this->password, $options);
            return $conn;
            
        }catch(PDOException $e){
            return false;
        }
    }
}

