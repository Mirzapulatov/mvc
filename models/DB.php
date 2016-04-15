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
            if(self::$db==NULL)
            self::$db = new \PDO("pgsql:host=".\Registry::getConfig('host').";dbname=".\Registry::getConfig('dbname').";",
                \Registry::getConfig('dbuser'), \Registry::getConfig('dbpass'));
            return self::$db;
        }catch (PDOException $e){
            die("Connection error: ".$e->getMessage());
        }
    }
}
