<?php 

namespace Juanjo;

use \PDO as PDO;
use \PDOException as PDOException;

class ConnectionDB {
    private $host;
    private $dbname;
    private $user;
    private $password;
    public $conn;


    public  function __construct() {
        $this->host='localhost';
        $this->dbname='icb0006_uf4_pr01';
        $this->user='root';
        $this->password='';
    }


    public function connect() {
        $this->conn = null;
        try {
            $this->conn= new PDO('mysql:host='.$this->host.';dbname='.$this->dbname,$this->user,$this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e) {
            echo "Connection failed $e";
        }
        return $this->conn;
    }
}

?>