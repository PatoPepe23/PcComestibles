<?php

include_once("Config/parameters.php");

class Admin{

    public function popUp(){

        $view = "Views/main/admin/overlayTMP.php";
        $header = loginHeader;
        $footer = defauldFooter;
        $title = "popUo";
        $result = 0;

        include_once("Views/main.php");
    }
}