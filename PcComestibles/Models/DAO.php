<?php
include_once("Config/dataBase.php");
class DAO{
    private static $products = [];

    public static function createProducts(){

        include_once("premade.php");

        $con = DataBase::connect();

        $result = mysqli_query($con, 'select * from Productos');

        if (!self::$products) {
            while ($row = mysqli_fetch_assoc($result)) {
                $product = new Premade($row['producto_ID'], $row['name'], $row['type'], $row['price'], $row['old_price'], $row['promo'], $row['image']);
                self::$products[] = $product;
            }
        }

        return self::$products;
    }

    public static function getUser($user){
        $con = DataBase::connect();

        $result = mysqli_query($con, 'select * from Users where username = \''.$user.'\'');
        $result = mysqli_fetch_assoc($result);


        return $result;
    }

    public static function registerUser($user, $password){
        $con = Database::connect();

        $password = password_hash($password, PASSWORD_DEFAULT);

        $result = mysqli_query($con, "insert into Users(username, password, rango) values('".$user."', '".$password."', 0)");

        $con->close();
        return $result;
    }

    public static function modiFyToCart($user_ID, $product_ID, $action){
        $con = Database::connect();

        $stmt = $con->prepare("select * from carrito where user_ID = ? and productos = ?");
        $stmt->bind_param('ii', $user_ID, $product_ID);
        $stmt->execute();

        $exist = $stmt->get_result();

        if ($exist->num_rows <= 0) {
            $stmt = $con->prepare("INSERT INTO carrito (user_ID, productos, cantidad) VALUES (?, ?, 0)");
            $stmt->bind_param('ii', $user_ID, $product_ID);
            $stmt->execute();

            if($stmt->affected_rows > 0){
                $exist = True;
            }
        } else{
            $cuantity = $exist->fetch_assoc()['cantidad'];
    
            $exist = True;
        }

        if ($exist) {
            switch ($action){
                case 'plus':
                    $stmt = $con->prepare( "update carrito set cantidad = cantidad + 1 where user_ID = ? and productos = ?");
                    break;
                case 'less':
                    if ($cuantity == 1) {
                        $stmt = $con->prepare( "delete from carrito where user_ID = ? and productos = ?");
                    }else{
                        $stmt = $con->prepare( "update carrito set cantidad = cantidad - 1 where user_ID = ? and productos = ?");
                    }
                    break;
                case 'remove':
                    $stmt = $con->prepare( "delete from carrito where user_ID = ? and productos = ?");
                    break;
            }
            

            $stmt->bind_param('ii', $user_ID, $product_ID);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                $result = True;
            }else{
                $result = False;
            }
        }

        $stmt->close();
        $con->close();
        return $result;
    }

    public static function getCart($user_ID, $method){
        $con = Database::connect();

        if ($method == 1) {
            DAO::createProducts();
        }

        $stmt = $con->prepare("select productos, cantidad from carrito where user_ID = ?");
        $stmt->bind_param('i', $user_ID);
        $stmt->execute();

        $result = $stmt->get_result();

        $final = [];

        while ($row = $result->fetch_assoc()) {
            $final[] = ['product' =>  self::$products[$row['productos']-1], 'cuantity' => $row['cantidad']];
        }
        
        return $final;
       
    }

    public static function discounts($code){
        $con = Database::connect();

        $stmt = $con->prepare("select * from discounts where discount_code = ?");
        $stmt->bind_param('s', $code);
        $stmt->execute();

        $result = $stmt->get_result();

        return $result;

        /*if ($result != null) {
            $discount_value = $result['discount'];
            $discount_type = $result['discount_type'];

            return 
        }*/
    }
}