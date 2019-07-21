<?php
include_once('Crud.class.php');
class Categories{
    private $table="category";
    private $category_id;
    private $category_name;
    private $conn;

    public function __construct(){
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function viewAllCategories(){
        return Crud::readAll($this->conn,$this->table,"1");
    }



}
?>