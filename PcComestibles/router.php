<?php

include_once("Config/parameters.php");

class Router{

    static $routerUrls = [
        '/' => ['controller' => 'main', 'action' => 'index'],
        '/menu' => ['controller' => 'menu', 'action' => 'showMenu'],
        '/error' => ['controller' => 'catError', 'action' => 'error404'],
        '/login' => ['controller' => 'login', 'action' => 'loginView'],
        '/login/revision' => ['controller' => 'login', 'action' => 'login'],
        '/register' => ['controller' => 'login', 'action' => 'registerView'],
        '/register/register' => ['controller' => 'login', 'action' => 'register'],
        '/logout' => ['controller' => 'login', 'action' => 'logout'],
        '/cartAdd' => ['controller' => 'cart', 'action' => 'add'],
        '/cartDecrease' => ['controller' => 'cart', 'action' => 'decrease'],
        '/cartRemove' => ['controller' => 'cart', 'action' => 'remove'],
        '/cart' => ['controller' => 'cart', 'action' => 'cart'],
        '/discount' => ['controller' => 'cart', 'action' => 'discount'],
        '/adminMenu' => ['controller' => 'main', 'action' => 'adminView'],
        '/sendDirection' => ['controller' => 'cart', 'action' => 'sendDirectionView'],
        '/addDirection' => ['controller' => 'cart', 'action' => 'addDirection'],
        '/addNewDirection' => ['controller' => 'cart', 'action' => 'addNewDirection'],
        '/makeTicket' => ['controller' => 'cart', 'action' => 'ticketView'],
        '/makeOrder' => ['controller' => 'cart', 'action' => 'makeOrder'],
        '/popUp' => ['controller' => 'admin', 'action' => 'popUp']
    ];

    /**
     * Coje los parametros de la vista y de la query de la URL.
     *
     * @param string $url Es la URL con la que trabajara el enrutador.
     * @return array Devuelve una array que contiene los parametros de la vista y la query.
     */
    public static function getView($url){
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

    /**
     * Busca y carga la pagina que se le indica segun la url y la query.
     *
     * @param array $query Devuelve la query para poder trabajar con ella en caso de necesitarlo.
     */
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

                if(isset($query['key1']) && isset($query['key2'])){
                    $action = 'calc';
                }

                if (is_callable([$controller, $action])) {
                    $controller->$action($query);
                } else {
                    header('location:'.defauld_url."/catError");
                }
                
            }
        }
    }
}