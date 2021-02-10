<?php


namespace Core;

use Exception;

class Router 
{
    protected $routes = [
        'GET' => [],

        'PODT' => []
    ];


    public static function load($file)
    {
        $router = new static;

        require $file;
        
        return $router;
    }


    public function get($uri, $controller)
    {

        $this->routes['GET'][$uri] = $controller;
    }


    public function post($uri, $controller)
    {

        $this->routes['POST'][$uri] = $controller;
    }


    public function direct($uri, $requestType)
    {
        if (array_key_exists($uri, $this->routes[$requestType])) {
            
            return $this->callAction(
                ... explode('@', $this->routes[$requestType][$uri])
            );

        }

        view()->render('error',[
            'errorCode' => 404,
            'errorMessage' => 'Page not found'
            ]); 
    }


    protected function callAction($controller, $action)
    {
        $controllerName = "Controllers\\{$controller}";

        $controller = new $controllerName;

        if (! method_exists($controller, $action)) {
            throw new Exception("{$controllerName} dos not response {$action} action");
        }

        return $controller->$action();
    }
}
