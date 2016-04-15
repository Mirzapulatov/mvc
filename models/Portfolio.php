<?php
namespace models;

include_once(ROOT . "/models/ORModel.php");

class Portfolio extends ORModel
{
    function __construct()
    {
        $this->table = "portfolio";
    }
    /**
     * previous of current record
     * @param int $id
     * @return mixed
     */
    function previous($id)
    {
        return \DB::run()->query("SELECT id FROM portfolio WHERE id<$id ORDER BY id DESC LIMIT 1")->fetch();
    }
    /**
     * next of current record
     * @param int $id
     * @return mixed
     */
    function next($id)
    {
        return \DB::run()->query("SELECT id FROM portfolio WHERE id>$id ORDER BY id ASC LIMIT 1")->fetch();

    }
    /**
     * first record of table
     * @return mixed
     */
    function first()
    {
        return \DB::run()->query("SELECT id FROM portfolio ORDER BY id DESC LIMIT 1")->fetch();
    }
    /**
     * last record of table
     * @return mixed
     */
    function last()
    {
        return \DB::run()->query("SELECT id FROM portfolio ORDER BY id ASC LIMIT 1")->fetch();
    }
}