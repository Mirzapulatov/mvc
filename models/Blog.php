<?php
namespace models;

include_once(ROOT . "/models/ORModel.php");

class Blog extends ORModel
{
    /** @var  int */
    private $id;

    function __construct()
    {
        $this->setTable("blog");
    }
}