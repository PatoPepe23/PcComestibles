<?php

class catError{
    public function error404(){
        $view = 'Views/main/error.php';
        $error = 404;

        include_once("Views/main.php");
    }
}