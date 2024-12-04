<?php

class DataBase{
    public static function connect($host, $user, $pwd, $db){
        $con = new mysqli($host, $user, $pwd, $db);
        
        if ($con == false) {
            die("DATABASE ERROR");
        }else{
            return $con;
        }
        
    }
}