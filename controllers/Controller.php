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
    protected function denyAccessUnlessGranted($role)
    {
        //TODO check if current user is logged in

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
}