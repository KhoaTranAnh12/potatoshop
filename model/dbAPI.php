<?php
class db{
    private $serverName="localhost";
    private $userName="root";
    private $password="";
    private $db="potatoshop";
    public $conn;
    public function connect(){
        
        try {
            $this->conn = new PDO("mysql:host=$this->serverName; dbname=$this->db; charset=utf8", $this->userName, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        } 
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
?>