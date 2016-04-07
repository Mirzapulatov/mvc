<?php

class Router
{
    private $routes;
    public function __construct()
    {
        $this->routes = include (ROOT.'/config/routs.php');
    }

    private function getUri()
    {
        if(!empty($_SERVER['REQUEST_URI']));
            return trim($_SERVER['REQUEST_URI'],"/");
    }

    public function run()
    {
        $uri = $this->getUri();

        foreach($this->routes as $uriPattern => $path) {
            if(preg_match("#$uriPattern#",$uri)){


                $internalRoute = preg_replace("#$uriPattern#", $path, $uri);
                $segments = explode('/', $internalRoute);
                $controllerName = sprintf('%sController', ucfirst(array_shift($segments)));
                $actionsName = sprintf('action%s',  ucfirst(array_shift($segments)));
                $parameters = $segments;

                $controllerFile = sprintf('%s/controllers/%s.php', ROOT, $controllerName);

                if(file_exists($controllerFile)) {
                    include_once ($controllerFile);
                    }

                $controllerObject = new $controllerName;
                $result = call_user_func_array(array($controllerObject, $actionsName),$parameters);
                if($result==NULL)
                {
                    break;
                }

            }
        }

    }
}