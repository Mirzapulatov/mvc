<?php
namespace models;

include_once (ROOT."/models/ORModel.php");

class Blog extends ORModel
{
    function __construct()
    {
        $this->table = "blog";
    }
}