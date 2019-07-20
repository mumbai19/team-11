<?php
// ob_start();
class Helper{
    public static function redirect($url){
        header("Location: {$url}");
    }
}
?>