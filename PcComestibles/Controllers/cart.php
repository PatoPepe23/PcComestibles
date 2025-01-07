<?php

include_once("Config/parameters.php");

class Cart{

    public function cart(){
        include_once('Models/DAO.php');

        //session_start();
        //$user_ID = $_SESSION['user_ID'];

        $view = "Views/main/cartPage.php";
        $header = loginHeader;
        $footer = defauldFooter;
        $title = "Cart";
        $result = 0;
        $discount = 1;
        $type = 0;

        if (!empty($_POST['discount'])) {
            $code = $_POST['discount'];

            $result = DAO::discounts($code);

            if ($result != null) {
                $array_discount = $result->fetch_assoc();
                $discount_value = $array_discount['discount'];
                $discount_type = $array_discount['discount_type'];

                $type = $discount_type;

                if ($type == 0) {
                    $discount_tmp = ($discount_value/100)-1;
                    $discount = abs($discount_tmp);
                }else{
                    $discount = $discount_value;
                }
                
            }
        }

        $products = DAO::createProducts();
        
        include_once("Views/main.php");
    }

    public function sendDirectionView() {
        $view = "Views/main/sendDirectionCart.php";
        $header = loginHeader;
        $footer = defauldFooter;
        $title = "sendCart";
        $result = 0;
        $discount = 1;
        $type = 0;
        
        session_start();
        
        if (!empty($_POST['totalPrice'])) {
            $price = $_POST['totalPrice'];
        }

        if (isset($_SESSION['totalPrice']) && $_SESSION['totalPrice'] != $_POST['totalPrice']) {
            $_SESSION['totalPrice'] = $_POST['totalPrice'];
        }

        include_once("Views/main.php");
    }

    public function add(){
        include_once('Models/DAO.php');

        session_start();

        $product_ID = $_POST['productID'];
        $user_ID = $_SESSION['user_ID'];
        $URL = $_POST['page'];

        DAO::modifyToCart($user_ID, $product_ID, 'plus');

        $carrito = DAo::getCart($user_ID, 1);
        $_SESSION['cart'] = $carrito;

        header("location: $URL");
    }

    public function decrease($product_ID){
        include_once('Models/DAO.php');

        session_start();

        $product_ID = $_POST['productID'];
        $user_ID = $_SESSION['user_ID'];
        $URL = $_POST['page'];

        DAO::modifyToCart($user_ID, $product_ID, 'less');

        $carrito = DAo::getCart($user_ID, 1);
        $_SESSION['cart'] = $carrito;

        header("location: $URL");
    }

    public function remove(){
        include_once('Models/DAO.php');

        session_start();

        $product_ID = $_POST['productID'];
        $user_ID = $_SESSION['user_ID'];
        $URL = $_POST['page'];

        DAO::modifyToCart($user_ID, $product_ID, 'remove');

        $carrito = DAO::getCart($user_ID, 1);
        $_SESSION['cart'] = $carrito;

        header("location: $URL");
    }

    public function discount(){
        include_once('Models/DAO.php');

        $URL = $_POST['page'];
        $code = $_POST['discount'];

        $result = DAO::discounts($code);

        /*if ($result != null) {
            $discount_value = $result['discount'];
            $discount_type = $result['discount_type'];
        }*/

        $discount = 0.5;

        header("location: $URL");
    }

    public function addDirection(){
        $view = "Views/main/addDirection.php";
        $header = loginHeader;
        $footer = defauldFooter;
        $title = "addDirection";

        include_once("Views/main.php");
    }

    public function  addNewDirection(){
        include_once('Models/DAO.php');

        session_start();

        $URL = $_POST['page'];

        $user_ID = $_SESSION['user_ID'];
        $nombre = $_POST['name'];
        $apellidos = $_POST['surname'];
        $calle = $_POST['address'];
        $ciudad = $_POST['city'];
        $codigoPostal = $_POST['postalCode'];
        $estado = $_POST['state'];
        $pais = $_POST['country'];

        $result = DAO::addDirection($user_ID, $calle, $ciudad, $estado, $codigoPostal, $pais, $nombre, $apellidos);

        $_SESSION['directions'] = DAO::getDirections($user_ID);

        header("location: /sendDirection");
    }

    public function ticketView(){
        include_once('Models/DAO.php');

        session_start();

        $direction = $_POST['direction_ID'];

        $view = "Views/main/ticketView.php";
        $header = loginHeader;
        $footer = defauldFooter;
        $title = "ticketPage";

        $user_ID = $_SESSION['user_ID'];
        foreach ($_SESSION['directions'] as $key) {
            if ($key['direccion_ID'] == $direction) {
                $final_direction = $key;
            }
        }

        $_SESSION['cart'] = DAO::getCart($user_ID, 1);

        include_once("Views/main.php");
    }

    public function makeOrder(){
        include_once('Models/DAO.php');

        session_start();

        $total = $_SESSION['totalPrice'];

        $result = DAO::makeOrder($_SESSION['user_ID'], $total, $_POST['direction_ID'], $_SESSION['carContent']);
        if ($result != 0) {
            $user_ID = $_SESSION['user_ID'];
            echo "User ID: ". $user_ID;
            $result = DAO::clearCart($user_ID);
            if ($result != 0) {
                $_SESSION['cart'] = DAO::getCart($_SESSION['user_ID'], 1);
            } else {
                throw new Exception("Error al procesar la solicitud", 1);
            }
            
            $_SESSION['totalPrice'] = 0;
        }

        header("location: /");
    }
}