<?php

include_once("Config/parameters.php");

class Cart{


    public function add(){
        include_once('Models/DAO.php');

        session_start();

        $product_ID = $_POST['productID'];
        $user_ID = $_SESSION['user_ID'];

        DataBase::insertToCart($user_ID, $product_ID, 'plus');

        $carrito = Database::getCart($user_ID, 1);
        $_SESSION['cart'] = $carrito;

        header('location: /');
    }

    public function remove(){
        
    }


}