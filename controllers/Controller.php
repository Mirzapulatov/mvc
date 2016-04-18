<?php
/**
 * Created by PhpStorm.
 * User: eirlie
 * Date: 15.04.16
 * Time: 15:34
 */
namespace controllers;


abstract class Controller
{
    public function accessAdmin()
    {
        if(!isset($_SESSION['Admin']))
        {
            header("Location: /");
            exit();
        }
    }
    public static function checkAdmin()
    {
        return isset($_SESSION['Admin']);
    }

    /**
     * @param string     $name
     * @param mixed|null $defaultValue
     *
     * @return mixed
     */
    protected function getQueryParameter($name, $defaultValue = null)
    {
        return $_GET[$name] ? $_GET[$name] : $defaultValue;
    }

    public function show($view)
    {
        $path = ROOT.'/views/'.$view.'.php';
        if(is_readable($path)) {
            include_once $path;
        }
    }
}