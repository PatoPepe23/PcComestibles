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


}