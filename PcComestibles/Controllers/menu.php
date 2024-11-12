<?php

include_once("Config/parameters.php");

class menu{
    public function showMenu(){
        $view = "Views/main/menuPage.php";
        $header = defauldHeader;
        $footer = defauldFooter;
        $title = "Menu";

        include_once("Views/main.php");
    }
}