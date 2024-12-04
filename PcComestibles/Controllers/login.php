<?php

include_once("Config/parameters.php");

class login{
    
    public function loginView(){

        $view = "Views/main/login.php";
        $header = defauldHeader;
        $footer = defauldFooter;
        $title = "Login";

        include_once("Views/main.php");
    }

    public function login(){
        include_once('Models/DAO.php');

        $user = $_POST['user'];
        $password = $_POST['password'];


        $result = Database::getuser($user);

        $result = mysqli_fetch_assoc($result);

        if ($result != null) {
            if (isset($_SESSION)) {
                session_destroy();
            }
            
            if ($result['password'] === $password && $result['username'] === $user) {
                session_start();

                $_SESSION['username'] = $user;

                $result = 'El usuario existe';
            } else {
                $result = 'El usuario no existe';
            }
        } else {
            $result = 'El usuario no existe';
        }


        $view = "Views/main/login.php";
        $header = defauldHeader;
        $footer = defauldFooter;
        $title = "Login";

        include_once("Views/main.php");
        
    }
}