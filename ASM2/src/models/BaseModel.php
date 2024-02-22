<?php

namespace App\models;

use App\core\interfaces\CrudInterface;
use App\core\Database;
use App\core\QueryBuilder;
use PDO;
use Exception;

abstract class BaseModel implements CrudInterface
{
    use QueryBuilder;

    private $_conn;

    public function __construct()
    {
        $this->_conn = new Database();
    }

    abstract function tableFill();

    abstract function fieldFill();

    abstract function primaryKey();

    protected function getTable()
    {
        return '';
    }

    public function getAll()
    {
        $tableName = $this->tableFill();
        $fieldSelect = $this->fieldFill();
        if (empty($fieldSelect)) {
            $fieldSelect = '*';
        }
        $sql = "SELECT $fieldSelect FROM $tableName";
        $query = $this->_conn->query($sql);
        if (!empty($query)) return $query->fetchAll(PDO::FETCH_ASSOC);
        return false;
    }

    public function getOne($id)
    {
        $tableName = $this->tableFill();
        $fieldSelect = $this->fieldFill();
        $primaryKey = $this->primaryKey();
        if (empty($fieldSelect)) {
            $fieldSelect = '*';
        }
        $sql = "SELECT $fieldSelect FROM $tableName WHERE $primaryKey = $id";
        $query = $this->_conn->query($sql);
        if (!empty($query)) return $query->fetch(PDO::FETCH_ASSOC);
        return false;
    }

    public function create($table, $data)
    {
        if (!empty($data)) {
            $fielStr = '';
            $valueStr = '';
            foreach ($data as $key => $value) {
                $fielStr .= $key . ',';
                $valueStr .= "'" . $value . "',";
            }

            $fielStr = rtrim($fielStr, ',');
            $valueStr = rtrim($valueStr, ',');
            $sql = "INSERT INTO  $table($fielStr) VALUES ($valueStr)";
            $status = $this->_conn->query($sql);
            if (!$status) return false;
        }
        return true;
    }

    public function update($table, $data, $condition = '')
    {
        if (!empty($data)) {
            $updateStr = '';
            foreach ($data as $key => $value) {
                $updateStr .= "$key='$value',";
            }
            $updateStr = rtrim($updateStr, ',');
            $sql = "UPDATE $table SET $updateStr";
            if (!empty($condition)) {
                $sql = "UPDATE $table SET $updateStr WHERE $condition";
            }
            $status = $this->_conn->query($sql);
            if (!$status) return false;
        }
        return true;
    }

    public function remove($table, $condition = ''): bool
    {
        $sql = 'DELETE FROM ' . $table;
        if (!empty($condition)) {
            $sql = 'DELETE FROM ' . $table . ' WHERE ' . $condition;
        }
        $status = $this->_conn->query($sql);
        if (!$status) return false;
        return true;
    }


    public function lastInsertId()
    {
        return  $this->_conn->PDO()->lastInsertId();
    }

    public function query($sql)
    {
        try {
            $statement =  $this->_conn->PDO()->prepare($sql);
            $statement->execute();
            return $statement;
        } catch (Exception $ex) {
            $mess = $ex->getMessage();
            echo $mess;
            die();
        }
    }
}
