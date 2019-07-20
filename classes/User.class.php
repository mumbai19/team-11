<?php

include_once('Database.class.php');
include_once('Crud.class.php');
include_once('Helper.class.php');
include_once('Cipher.class.php');


class User{
    private $table="users";
    private $user_name;
    private $user_phone_number;
    private $email;
    private $is_email_verified;
    private $is_phone_verified;
    private $password;
    private $user_role_id;
    private $created_at;
    private $updated_at;
    private $conn;

    public function __construct(){
        $db = new Database();
        $this->conn = $db->getConnection();   
    }


    function register($data){
        $username = $data["user_name"];
        $email = $data["email"];
        $phone = $data["phone"];
        $password = password_hash($data["password"],PASSWORD_DEFAULT);
        // $data["user_role_id"] = 2;
        $sql = "INSERT INTO users (user_name,user_phone_number,email,password,user_role_id,created_at,updated_at) VALUES ('$username','$phone','$email','$password',2,now(),now())";
        $data = Crud::sqlString($this->conn,$sql);
        if($data){
            echo "Login";
            // Helper::redirect("login.php");
        }else{
            // Helper::redirect("register.php");
            echo "Register";
        }    
    }

    public function login($data,$signed_in){
        $user_email = $data["email"];
        $user_password =  $data["password"];
        $condition = "email='$user_email'";
        // echo $condition;
        $user_data = Crud::read($this->conn,$this->table,$condition);
        $password=$data["password"];
        // $user_data;
        if($user_data){
            $keys = $user_data["keys"];
            $result = $user_data["result"];
            for($i=0;$i<count($keys);$i++){
                $this->{$keys[$i]} = $result[$keys[$i]];
            }
            session_start();
            $_SESSION["user_id"] = $this->user_id; 
            $this->setCookies($this->user_id,$signed_in);
            if(password_verify($password,$this->password)){
                // echo "Here";
                Helper::redirect("category.php");
            }else{
                //Set toastr here and redirect to login 
                echo "Password";    
                // Helper::redirect("index.php");
            }
        }else{
            echo "Module";
            // Helper::redirect("index.php");
        }        
    }
    
    private function setCookies($user_id,$signed_in){
        if($signed_in){
            $cookie_name = "Trishul";
            $cookie_content = Cipher::encrypt_decrypt('encrypt', $user_id);
            $cookie_time = time() + 86400 * 30;
            $path = "/";
            setcookie($cookie_name, $cookie_content, $cookie_time, $path);
        }else{

            $cookie_name = "Trishul";  
            $cookie_content = Cipher::encrypt_decrypt('encrypt', $user_id);
            $cookie_time = time() + 3600;
            $path = "/";
            setcookie($cookie_name, $cookie_content, $cookie_time, $path);
        }
    }

    public function deleteCookies(){
        $cookie_name = "Trishul";
        $user_id_to_logout = $_SESSION['user_id'];  
        $cookie_content = $user_id_to_logout;
        $cookie_time = time() - 86400 * 30;
        $path = "/";
        setcookie($cookie_name, $cookie_content, $cookie_time, $path);
    }

    public function isCookieSet(){
        global $database;
        if(isset($_COOKIE["Trishul"])){
            $user_id = Cipher::encrypt_decrypt('decrypt', $_COOKIE["Trishul"]);

            print_r($user_id);
            $condition = "user_id='$user_id'";
            $data = Crud::read($this->conn,$this->table,$condition);
            $result = $data["result"];
            
            if(isset($result["user_phone_number"])){
                Session::startSession($user_id);
                return true;
            }            
        }else{
            return false;
        }
    }

    public function logout(){
        $this->deleteCookies();
        Session::destroySession();
    }
} 
?>