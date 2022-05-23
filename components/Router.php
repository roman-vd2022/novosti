<?php

class Router {
   
    private $routes;
    
    public function __construct() 
    {
       $routerPath = ROOT.'/config/routes.php';
       $this->routes = include($routerPath);
    }
    private function getURI()
    {
       if (!empty ($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/'); 
        }
    }
    public function run()
    {
        //Получить строку запроса
        //Проверить наличие такого запроса в routes.php
        //Если есть совпадение, определить какой контроллер и action 
        //обрабатывают запрос
        //Подключить файл класса - контроллера
        //Создать объект, вызвать метод (action)
       $uri = $this->getUri();
       foreach ($this->routes as $uriPattern => $Path) {
            if (preg_match("~$uriPattern~", $uri)) {
                $segments = explode('/', $Path);
                
                $controllerName = ucfirst(array_shift($segments)).'Controller';
                $actionName = 'Action'.ucfirst(array_shift($segments));
                
                $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';
                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }
                
                $controllerObject = new $controllerName;
                $result = $controllerObject -> $actionName();
                if ($result = !null) {
                    break;
                }
           }
       }
    }
}
