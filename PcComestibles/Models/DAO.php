<?php
class DataBase{
    public static $products = [];

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

        

        while ($row = mysqli_fetch_assoc($result)) {
            $product = new Premade($row['producto_ID'], $row['name'], $row['type'], $row['price'], $row['old_price'], $row['promo'], $row['image']);
            self::$products[] = $product;
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

    public static function insertToCart($user_ID, $product_ID, $action){
        $con = Database::connect();

        /*$carrito = Database::getCart($user_ID, 0);
        
        if ($carrito == "") {
            $carrito = $product_ID.',1;';
        }else{
            $splited_cart = explode(';', $carrito);
            $exist = False;
            foreach ($splited_cart as $cart_product) {
                if (intval($cart_product[0]) == $product_ID) {
                    $exist = True;
                    $original = $cart_product;
                    $tmp = intval($cart_product[2], 10);
                    $tmp++;
                    $cart_product[2] = strval($tmp);
                    $new_cart = str_replace($original, $cart_product, $carrito);
                }
            }
            if (!$exist) {
                $carrito .= $product_ID.',1;';
            } else{
                $carrito = $new_cart;
            }
        }

        $result = mysqli_query($con, "update carrito set productos = '".$carrito."' where user_ID = ".$user_ID."");*/

        $stmt = $con->prepare("select productos from carrito where user_ID = ? and productos = ?");
        $stmt->bind_param('ii', $user_ID, $product_ID);
        $stmt->execute();

        $exist = $stmt->get_result();

        if ($exist->num_rows > 0) {
            $stmt = $con->prepare( "isnert into carrito (user_ID, productos, cantidad) values (?, ?, 0");
            $stmt->bind_param('ii', $user_ID, $product_ID);
            $stmt->execute();

            if($stmt->affected_rows > 0){
                $exist = True;
            }
        }

        if ($exist) {
            switch ($action){
                case 'plus':
                    $stmt = $con->prepare( "update carrito set cantidad = cantidad + 1 where user_ID = ? and productos = ?");
                    break;
                case 'less':
                    $stmt = $con->prepare( "update carrito set cantidad = cantidad - 1 where user_ID = ? and productos = ?");
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

        DataBase::createProducts();

        $result = mysqli_query($con, "select productos, cantidad from carrito where user_ID = ".$user_ID."");

        $row = mysqli_fetch_assoc($result);
        
        if ($method == 0) {
            return $row['productos'];
        } else{

            $split = explode(';', $row['productos']);

            $final = [];

            foreach ($split as $value) {
                if ($value[0] == Null) {
                    continue;
                }
                $reSplited = explode(',', $value);
                $final[] = ['product' =>  self::$products[$reSplited[0]-1], 'cuantity' => $reSplited[1]];
            }

            return $final;
        }
    }
}