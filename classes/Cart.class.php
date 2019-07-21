<?php
include_once('Crud.class.php');
include_once('Helper.class.php');
include_once('Database.class.php');    
class Cart{
    private $table="cart";
    private $cart_id;
    private $user_id;
    private $product_id;
    private $quantity;
    private $is_ordered;
    private $created_at;
    private $updated_at;
    private $conn;
    function __construct(){
        $db = new Database();
        $this->conn = $db->getConnection();
        session_start();
    }

    function addToCart($product_id,$quantity){
        if(isset($_SESSION['user_id'])){
            $data['product_id'] = $product_id;
            $data['user_id'] = $_SESSION['user_id'];
            $data['quantity']=$quantity;
            $data['created_at'] = date("Y-m-d h:i:sa");
            $cart_product = $this->productAlreadyExists($data['user_id'],$data['product_id']);
            if($cart_product){
                $updated_quantity = $_SESSION['quantity'] + $cart_product['quantity'];
                return $this->updateCartProductQuantity($cart_product['cart_id'],$updated_quantity);
            }else{
                $cart_id = Crud::create($this->conn,$this->table,$data);
                return $cart_id;
            }    
        }   
    }

    function viewCart(){
        if(isset($_SESSION['user_id'])){
            $user_id=$_SESSION['user_id'];
            $data = Crud::readAll($this->conn,$this->table,"user_id=$user_id AND quantity<>0 AND is_ordered=0 AND is_deleted=0");
            // print_r($data);
            return $data;
        }
    }

    function productAlreadyExists($user_id,$product_id){
        $cart_product = Crud::read($this->conn,$this->table,"user_id=$user_id AND product_id=$product_id AND is_ordered=0 AND is_deleted=0");
        if($cart_product){
            return $cart_product["result"];
        }else{
            return false;
        }
    }

    function updateCartProductQuantity($cart_id,$quantity){
        $data['quantity'] = $quantity;
        $data['updated_at'] = date("Y-m-d h:i:sa");
        if(Crud::update($this->conn,$this->table,$data,"cart_id=$cart_id")){
            Helper::redirect('cart.php');
        }
    }

    function deleteProductFromCart($cart_id){
        $data['is_deleted'] = 1;
        $data['updated_at'] = date("Y-m-d h:i:sa");
        if(Crud::update($this->conn,$this->table,$data,"cart_id=$cart_id")){
            Helper::redirect('cart.php');
        }
    }
}
?>