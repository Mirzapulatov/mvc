<?php
namespace models;

include_once (ROOT."/models/ORModel.php");

class Comments extends ORModel
{
    function __construct()
    {
        $this->setTable("bcomments");
    }
}