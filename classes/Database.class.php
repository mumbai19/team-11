<?php
class Database{
    private $host = "localhost";
    private $db_name = "trishul";
    private $username= "root";
    private $password = "";
    private $conn = null;
    
    public function __construct(){
        try{
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}",$this->username, $this->password);
        }catch(PDOException $e){
            die("Issue : " . $e->getMessage());
        }
    }
    
    public function getConnection(){
        return $this->conn;
    }
}
?>