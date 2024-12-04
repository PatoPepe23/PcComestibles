<?php
include_once("router.php");

$url = Router::getView($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
Router::searchPage($url[0], $url[1]);