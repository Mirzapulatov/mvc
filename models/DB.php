<?php
namespace models;
/**
 * Class DB
 * connections data base
 */
class DB
{
    private static $db;
    public static function run()
    {
        try {
            include (ROOT."/config/DB.php");
            if(self::$db==NULL)
            self::$db = new \PDO("pgsql:host=$host;dbname=$dbname;", $dbuser, $dbpass);
            return self::$db;
        }catch (PDOException $e){
            die("Connection error: ".$e->getMessage());
        }
    }
}
