<?php

include_once("Config/parameters.php");

class menu{
    public function showMenu(){
        include_once('Models/DAO.php');

        $view = "Views/main/menuPage.php";
        $header = defauldHeader;
        $footer = defauldFooter;
        $title = "Home";
        $result = 0;

        $products = [];

        $products = DataBase::createProducts();

        include_once("Views/main.php");
    }
}