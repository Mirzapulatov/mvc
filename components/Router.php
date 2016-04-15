<?php

/**
 * Class Router
 */
class Router
{
    /** @var array */
    private $routes;
    /**
     * TODO rename
     * @var string
     */
    private $uri;

    public function __construct()
    {
        $this->routes = include(ROOT . '/config/routs.php'); //TODO rename routs.php to routes.php
        if (!empty($_SERVER['REQUEST_URI'])) {
            $this->uri = trim($_SERVER['REQUEST_URI'], "/");// define URI
        }

    }

    public function map()
    {
        foreach ($this->routes as $uriPattern => $path) {
            //TODO replace # with something else because of hash misunderstanding
            if (preg_match("#$uriPattern#", $this->uri)) { //search uri in routs

                $internalRoute = preg_replace("#$uriPattern#", $path, $this->uri);
                $segments = explode('/', $internalRoute);
                $controllerName = sprintf(
                    'controllers\%sController',
                    ucfirst(array_shift($segments))
                ); // Name controller
                $actionsName = sprintf('action%s', ucfirst(array_shift($segments))); // name action
                $parameters = $segments;

                //TODO weird staff
                $controllerFile = sprintf('%s/controllers/%s.php', ROOT, $controllerName); //path of control class

                if (file_exists($controllerFile)) { //TODO rewrite
                    //include_once ($controllerFile);
                } else {
                    //include_once(ROOT . '/views/404.php');
                }
                $_SERVER['REQUEST_URI'] = $this->uri;
                $controllerObject = new $controllerName();
                $result = call_user_func_array([$controllerObject, $actionsName], $parameters);
                if ($result == null) {
                    break;
                }

            }
        }

    }
}