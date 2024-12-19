<?php

include_once("Config/parameters.php");

class login{
    
    public function loginView(){

        $view = "Views/main/login.php";
        $header = loginHeader;
        $footer = loginFooter;
        $title = "Login";

        include_once("Views/main.php");
    }

    public function login(){
        include_once('Models/DAO.php');

        $user = $_POST['user'];
        $password = $_POST['password'];

        $result = DAO::getuser($user);
        
        $view = "Views/main/mainPage.php";
        $header = defauldHeader;
        $footer = defauldFooter;
        $title = "Login";
        $found = False;

        if ($result != null) {
            if (password_verify($password, $result['password']) && $result['username'] === $user) {
                if (isset($_SESSION)) {
                    session_destroy();
                }
                session_start();
                
                $user_ID = $result['user_ID'];

                $carrito = DAO::getCart($user_ID, 1);

                $_SESSION['username'] = $user;
                $_SESSION['user_ID'] = $user_ID;
                $_SESSION['range'] = $result['rango'];
                $_SESSION['cart'] = $carrito;
                
                $result = 'El usuario existe';
                
                header("location: /");
            } else {
                $found = True;
                $view = "Views/main/login.php";
                $header = loginHeader;
                $footer = loginFooter;
                $result = 'El usuario no existe';
            }
        } else {
            $found = True;
            $view = "Views/main/login.php";
            $header = loginHeader;
            $footer = loginFooter;
            $result = 'El usuario no existe: ERROR';
        }

        include_once("Views/main.php");
        
    }
    
    public function registerView(){
        
        $view = "Views/main/register.php";
        $header = loginHeader;
        $footer = loginFooter;
        $title = "Login";

        include_once("Views/main.php");
    }

    public function register(){

        include_once('Models/DAO.php');

        $result;
        $user = $_POST['user'];
        $password = $_POST['password'];
        $verify_password = $_POST['password-verify'];

        $found = False;
        $no_match = False;
        $result = DAO::getuser($user);
        
        $view = "Views/main/login.php";
        $header = loginHeader;
        $footer = loginFooter;
        $title = "register";

        echo gettype($result);

        if ($result != Null) {
            
            $found = True;

            $view = "Views/main/register.php";
            $header = defauldHeader;
            $footer = defauldFooter;
            $title = "register";

        } else{

            if ($password === $verify_password) {
                $result = DAO::registerUser($user, $password);
            }else{
                $no_match = True;

                $view = "Views/main/register.php";
                $header = defauldHeader;
                $footer = defauldFooter;
                $title = "register";
            }
            
        }

        
        include_once("Views/main.php");
    }

    public function logout(){
        include_once('Models/DAO.php');

        session_start();
        session_unset();
        session_destroy();

        $view = "Views/main/mainpage.php";
        $header = defauldHeader;
        $footer = defauldFooter;
        $title = "Home";
        $result = 0;

        $products = [];

        $products = DAO::createProducts();

        header("location: /");
        include_once("Views/main.php");
    }
}
