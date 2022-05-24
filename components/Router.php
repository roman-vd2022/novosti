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
       foreach ($this->routes as $uriPattern => $Path) {//'news' => 'news/index'
            if (preg_match("~$uriPattern~", $uri)) {//news, news
                $segments = explode('/', $Path);//array([0]=>news [1]=>index)
                
                //'news/([a-z]+)/([0-9]+)' *** news/sport/115
               
                //Получаем внутренний путь из внешнего согласно правилу
                $internalRoute = preg_replace("~$uriPattern~", $Path, $uri);
                //news/view/sport/65
                
                //Определить контроллер, action, параметры
                $segments = explode('/', $internalRoute);
                //array([0]=>news,[2]=>view,[1]=>sport,[1]=>65,)
                
                $controllerName = ucfirst(array_shift($segments)).'Controller';
                //NewsController
                $actionName = 'Action'.ucfirst(array_shift($segments));
                //ActionIndex
                
                $parameters = $segments;
                
                $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';
                //C:\OpenServer\domains\vesti/controllers/NewsController.php
                
                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }
                
                $controllerObject = new $controllerName;
                
                $result = call_user_func_array(array($controllerObject,$actionName), $parameters);
                if ($result = !null) {
                    break;
                }
           }
       }
    }
}
