<?php

include_once("Config/parameters.php");

class main{
    
    public function index(){
        include_once('Models/DAO.php');

        $view = "Views/main/mainpage.php";
        $header = defauldHeader;
        $footer = defauldFooter;
        $title = "Home";
        $result = 0;

        $products = DataBase::createProducts();

        include_once("Views/main.php");
    }

    public function calc($query){
        $view = "Views/main/mainpage.php";
        $header = defauldHeader;
        $footer = defauldFooter;

        $result = $query['num1'] + $query['num2'];

        include_once("Views/main.php");
    }

}