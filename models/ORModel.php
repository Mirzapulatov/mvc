<?php
namespace models;

abstract class ORModel
{
    //TODO save property correspondence

    /** @var  string */
    private $table; //TODO rename to tableName

    /**
     * @return mixed
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @param mixed $table
     */
    public function setTable($table)
    {
        //TODO validate is string
        $this->table = $table;
    }

    /**
     * previous list data
     *
     * @param int         $listCount
     * @param int         $pagex
     * @param string|null $condition
     *
     * @return \PDOStatement
     */
    public function listRecord($listCount, $pagex, $condition = null)
    {
        if ($condition) {
            $this->table = sprintf('%s WHERE %s', $this->table, $condition);
        }
        $query = sprintf(
            "SELECT * FROM %s ORDER BY id DESC LIMIT %s OFFSET %s",
            $this->table,
            $listCount,
            ($pagex * $listCount)
        );

        return DB::run()->query($query);
    }

    /**
     * return total data
     *
     * @param null string $id
     *
     * @return int
     */
    public function total($id = null)
    {
        $query = sprintf("SELECT id FROM %s", $this->table);
        if ($id) {
            $query = sprintf('%s', $query, $id);
        }

        return DB::run()->query($query)->rowCount();
    }

    /**
     * return one record
     *
     * @param int $id
     *
     * @return \PDOStatement
     */
    public function getOne($id)
    {
        return DB::run()->query("SELECT * FROM $this->table WHERE id = $id");
    }

    /**
     * @param int $id
     *
     * @return int
     */
    public function exist($id)
    {
        $query = DB::run()->query("SELECT * FROM $this->table WHERE id = $id");

        return $query->rowCount();
    }

    /**
     * create record from table
     *
     * @param array $field
     * @param array $values
     */
    public function create(array $field, array $values)// TODO pass model object
    {
        $colField = trim(str_pad("", (count($field) * 2), "?,"), ",");
        $add = DB::run()->prepare("INSERT INTO $this->table (" . implode(",", $field) . ") VALUES ($colField)");
        $add->execute($values);
    }

    /**
     * update record of table
     *
     * @param array  $field
     * @param array  $parameter
     * @param string $where
     */
    public function update(array $field, array $parameter, $where)
    {
        $query = sprintf("UPDATE %s SET %s WHERE %s", $this->table, implode("= ? ,", $field) . ' = ?', $where);
        $add = DB::run()->prepare($query);
        $add->execute($parameter);
    }

    /**
     * delete record of table
     *
     * @param int $id
     */
    public function delete($id)
    {
        DB::run()->query("DELETE FROM $this->table WHERE id = $id");
    }

    /**
     * increase of field
     *
     * @param array  $field
     * @param int    $parameter
     * @param string $operation
     * @param string $where
     */
    public function increase(array $field, $parameter, $operation, $where) //TODO move to child
    {
        $query = "";
        for ($i = 0; $i < count($field); $i++) {
            $query = sprintf("%s, %s = %s %s %s", $query, $field[$i], $field[$i], $operation, $parameter);
        }
        $query = trim($query, ",");
        $query = sprintf("UPDATE %s SET %s WHERE %s", $this->table, $query, $where);
        DB::run()->query($query);

    }
}