<?php
namespace models;

include_once (ROOT."/models/ORModel.php");

class Contacts extends ORModel
{
    function __construct()
    {
        $this->table = "contacts";
    }
}