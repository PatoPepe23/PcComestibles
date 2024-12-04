<?php

include_once("Config/parameters.php");

class Router{

    static $routerUrls = [
        '/' => ['controller' => 'main', 'action' => 'index'],
        '/menu' => ['controller' => 'menu', 'action' => 'showMenu'],
        '/error' => ['controller' => 'catError', 'action' => 'error404'],
        '/login' => ['controller' => 'login', 'action' => 'loginView'],
        '/login/revision' => ['controller' => 'login', 'action' => 'login']
    ];

    public static function getView($url, $method){
        $splitUrl = parse_url($url);

        $urlPath = null;
        if (isset(self::$routerUrls[$splitUrl['path']])) { 
            $urlPath = self::$routerUrls[$splitUrl['path']];
        } else{
            echo('location: Views/main/error.php');
        }

        $query = [];
        if (isset($splitUrl['query'])) {
            parse_str($splitUrl['query'], $query);
        }

        return [$urlPath, $query];
    }

    public static function searchPage($viewRute, $query = []){
        
        if($viewRute == null)
         {
            echo "View is null";
         }


        if (!isset($viewRute['controller'])) 
        {   
            header('location:'.defauld_url."/catError");
        } 
        else
        {
            $controllerName = $viewRute['controller'];

            include_once("Controllers/$controllerName.php");

            if (class_exists($controllerName))
            {                
                $controller = new $controllerName();

                if (isset($viewRute['action']) && method_exists($controller, $viewRute['action'])) {
                    $action = $viewRute['action'];
                }else{
                    $action = defauld_url;
                }

                if(count($query) == 2){
                    $action = 'calc';
                }

                $controller->$action($query);
                
            }
        }
    }
}