<?php
namespace models;
abstract class ORModel
{
    protected $table;

    public function listRecord($listCount, $pagex, $id = NULL)
    {
        if($id) { $this->table = sprintf('%s WHERE %s', $this->table, $id);}
        $query = sprintf("SELECT * FROM %s ORDER BY id DESC LIMIT %s OFFSET %s",$this->table,$listCount,($pagex*$listCount));
        return \DB::run()->query($query);
    }

    public function total($id=NULL)
    {
        $query = sprintf("SELECT id FROM %s",$this->table);
        if($id) { $query = sprintf('%s', $query, $id); }
        return \DB::run()->query($query)->rowCount();
    }

    public function getOne($id)
    {
        return \DB::run()->query("SELECT * FROM $this->table WHERE id = $id");
    }

    public function exist($id)
    {
        $query = \DB::run()->query("SELECT * FROM $this->table WHERE id = $id");
        return $query->rowCount();
    }

    public function create(array $field , array $parametr)
    {
        $colField = trim(str_pad("", (count($field)*2),"?,"),",");
        $add = \DB::run()->prepare("INSERT INTO $this->table (".implode(",",$field).") VALUES ($colField)");
        $add->execute($parametr);
    }

    public function update(array $field , array $parametr, $where)
    {
        $query = sprintf("UPDATE %s SET %s WHERE %s", $this->table, implode("= ? ,", $field).' = ?', $where);
        $add = \DB::run()->prepare($query);
        $add->execute($parametr);
    }

    public function delete($id)
    {
        \DB::run()->query("DELETE FROM $this->table WHERE id = $id");
    }

    public function increase(array $field , $parametr, $operation , $where)
    {
        $query = "";
        for($i=0;$i<count($field);$i++){
            $query = sprintf("%s, %s = %s %s %s", $query, $field[$i], $field[$i], $operation, $parametr);
        }
        $query = trim($query,",");
        $query = sprintf("UPDATE %s SET %s WHERE %s", $this->table, $query, $where);
        \DB::run()->query($query);

    }
}