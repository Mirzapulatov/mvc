<?php
namespace models;

include_once(ROOT . "/models/ORModel.php");

class Portfolio extends ORModel
{
    function __construct()
    {
        $this->table = "portfolio";
    }

    function previous($id)
    {
        return \DB::run()->query("SELECT id FROM portfolio WHERE id<$id ORDER BY id DESC LIMIT 1")->fetch();
    }

    function next($id)
    {
        return \DB::run()->query("SELECT id FROM portfolio WHERE id>$id ORDER BY id ASC LIMIT 1")->fetch();

    }

    function first()
    {
        return \DB::run()->query("SELECT id FROM portfolio ORDER BY id DESC LIMIT 1")->fetch();
    }



    function last()
    {
        return \DB::run()->query("SELECT id FROM portfolio ORDER BY id ASC LIMIT 1")->fetch();
    }
}