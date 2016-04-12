<?php
/**
 * Class DB
 * connections data base
 */
class DB
{
    public static function run()
    {
        try {
            include (ROOT."/config/DB.php");
            $db = new PDO("pgsql:host=$host;dbname=$dbname;", $dbuser, $dbpass);
            return $db;
        }catch (PDOException $e){
            die("Connection error: ".$e->getMessage());
        }
    }
}
