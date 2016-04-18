<?php
namespace models;

include_once (ROOT."/models/ORModel.php");

class News extends ORModel
{
    function __construct()
    {
        $this->setTable("news");
    }
}