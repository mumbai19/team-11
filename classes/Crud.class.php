<?php

class Crud
{   
    public static function sqlString($conn,$sql){
        // echo $sql;
        $ps = $conn->prepare($sql);
        
        $result = $ps->execute();
        
        if($result){
            return $conn->lastInsertId();
        }else{
            return false;
        }   
    } 
    
    public static function create($conn,$table,$data){
        $keys = array_keys($data);
        $columnString = implode(",",array_keys($data));
        $valueString = "'".$data[$keys[0]]."'";
        for($i=1; $i<count($keys); $i++){
            $valueString .= ", '".$data[$keys[$i]]."'"; 
        }
        $sql = "INSERT INTO {$table} ({$columnString}) VALUES ({$valueString})";
        // echo $sql;
        $ps = $conn->prepare($sql);
        
        $result = $ps->execute($data);
        
        if($result){
            return $conn->lastInsertId();
        }else{
            return false;
        }
    }
    
    public static function update($conn,$table,$data,$condition){
        $i=0;
        $columnValueSet = "";
        foreach($data as $key=>$value){
            $comma = ($i<count($data)-1?", ":"");
            $columnValueSet.=$key."='".$value."'".$comma;
            $i++;
        }
        $sql = "UPDATE $table SET $columnValueSet WHERE $condition";
        // echo $sql;
        $ps =  $conn->prepare($sql);
        
        $result = $ps->execute();
        if($result){
            return $ps->rowCount();
        }else{
            return false;
        }
    }
    
    public static function readAll($conn,$table,$condition){
        $sql = "SELECT * FROM {$table} WHERE $condition";
        // echo $sql;
        $statement = $conn->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }

    public static function read($conn,$table,$condition){
       $sql = "SELECT * FROM $table WHERE $condition"; 
       $statement = $conn->prepare($sql);
       $statement->execute();
       $result = $statement->fetch(PDO::FETCH_ASSOC);
       if($result){ 
        //    print_r($result);
            $keys = array_keys($result);
            $data["keys"] = $keys;
            $data["result"]=$result; 
            return $data;
       }else{
           return false;
       }
    }

    public static function count($conn,$table){
        $sql = "SELECT COUNT(*) FROM {$table}";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $result = $statement->fetchColumn();
        return $result;
    }

    function readAllForColumns($conn,$table,$columnString,$condition){
        $sql ="SELECT $columnString FROM $table WHERE $condition"; 
        $statement = $this->conn->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }
}