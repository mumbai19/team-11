<?php
include_once('Crud.class.php');
include_once('Database.class.php');
include_once('Helper.class.php');

class Products{
    private $table = "products";
    private $product_name;
    private $product_image;
    private $category_id;
    private $team_id;
    private $count_purchased;
    private $quantity;
    private $cost;
    private $tax;
    private $is_deleted;
    private $created_by;
    private $updated_by;
    private $deleted_by;
    private $created_at;
    private $updated_at;
    private $conn;
    public function __construct(){
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function getAllProducts(){
        $data = Crud::readAll($this->conn,$this->table,"is_deleted=0 AND quantity>0");
        return $data;
    }

    function viewProduct($product_id){
        $data = Crud::read($this->conn,$this->table,"product_id=$product_id");
        return $data['result'];
    }

    function viewAllProducts($condition){
        $result = Crud::readAll($this->conn,$this->table,"is_deleted=0 AND quantity>0 ".$condition);
        return $result;
    }
    function viewProductsBySearch($keywords,$condition){
        $result = Crud::readAll($this->conn,$this->table,"product_name LIKE '%{$keywords}%' OR cost LIKE '%{$keywords}%' $condition");
        return $result;
    }

    function viewProductsByCategory($condition){
        $result = Crud::readAll($this->conn,$this->table,$condition);
        return $result;
    }

    function viewTopProducts(){
        $sql = "SELECT * FROM {$this->table} ORDER BY count_purchased DESC"; 
        $statement = $this->conn->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }

}

?>
