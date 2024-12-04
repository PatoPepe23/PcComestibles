<?php
class DataBase{
    public static function connect($host = "127.0.0.1", $user="root", $pass="root", $database="PcComestibles_BBDD", $port= 3307){
        $con = new mysqli($host, $user, $pass, $database, $port);
        
        if ($con === false) {
            die("ERROR". $con->connect_error);
        }

        return $con;
    }

    public static function createProducts(){

        include_once("premade.php");

        $con = DataBase::connect();

        $result = mysqli_query($con, 'select * from Productos');

        $products = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $product = new Premade($row['producto_ID'], $row['name'], $row['type'], $row['price'], $row['old_price'], $row['promo'], $row['image']);
            $products[] = $product;
        }

        return $products;
    }

    public static function getUser($user){
        $con = DataBase::connect();

        $result = mysqli_query($con, 'select * from Users where username = \''.$user.'\'');

        return $result;
    }
}