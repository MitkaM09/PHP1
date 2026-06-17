<?php

namespace App\Core;

use PDO;
use PDOException;

class Database
{
    private string $host = "localhost";
    private string $db_name = "device_manager"; 
    private string $username = "root";
    private string $password = "";
    private string $charset = "utf8";

    public $conn;

    public function spojenie(){
        $this->conn = null;

        try {
            
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name};charset={$this->charset}", $this->username, $this->password);
            
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        } catch(PDOException $e){
            echo $e->getMessage();
        }
        return $this->conn;
    }
}

?>