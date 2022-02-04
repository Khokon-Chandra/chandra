<?php

namespace core;

abstract class Model
{
    private Database $db;
    private string $conditionString = '';
    private $statement;

    abstract protected function tablename(): string;

    public function __construct()
    {
        $this->db = Route::$app->db;
    }


    public function where($columnName, $operator = null, $value = null)
    {
       if(func_num_args() === 2){
            $value = $operator;
            $operator = "=";
       }
        $string = $columnName .$operator."'$value'";
        if (!empty($this->conditionString)) {
            $this->conditionString .= " AND " . $string;
            return $this;
        } 
        $this->conditionString = $string;
        return $this;
    }

    public function all()
    {
        $tablename = $this->tablename();
        $statement = $this->db->prepare("SELECT * FROM $tablename");
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_OBJ);
    }

    public function get()
    {
        $this->statement->execute();
        return $this->statement->fetchAll(\PDO::FETCH_OBJ);
    }

    public function first()
    {
        if ($this->statement === null) {
            $tablename = $this->tablename();
            $sql       = "SELECT * FROM $tablename";
            if(!empty($this->conditionString)){
                $sql = "SELECT * FROM $tablename WHERE $this->conditionString";
            }
            $this->statement = $this->db->prepare($sql);
        }

        // dd($this->statement);
      
        $this->statement->execute();
        return $this->statement->fetchObject();
    }

    public function select(...$fields)
    {
        $placeholders = implode(',', $fields);
        $tablename = $this->tablename();
        $this->statement = $this->db->prepare("SELECT $placeholders FROM $tablename");
        return $this;
    }



    public function create(array $data)
    {
        if (empty($data)) {
            throw new \Exception('record given empty');
        }
        $tablename    = $this->tablename();
        $fields       = implode(',', array_keys($data));
        $placeholders = implode(',', array_map(fn ($attr) => ":$attr", array_keys($data)));
        $sql          = "INSERT INTO $tablename($fields) VALUES($placeholders)";
        $statement    = $this->db->prepare($sql);
        foreach ($data as $key => $value) {
            $statement->bindValue(":$key", $value);
        }
        $statement->execute();
        return true;
    }



    public function insert($data = [])
    {
        if (empty($data)) {
            throw new \Exception('record given empty');
        }
        $tablename    = $this->tablename();
        $array_keys   = array_keys($data[0]);
        $fields       = implode(',', $array_keys);
        $arrayOfPlaceholder = [];
        foreach ($data as $row) {
            $arrayOfPlaceholder[] = implode(',', array_map(fn ($attr) => ":$attr", $array_keys));
        }
        $placeholders = "(" . implode("),(", $arrayOfPlaceholder) . ")";
        $sql          = "INSERT INTO $tablename($fields) VALUES $placeholders";
        $statement    = $this->db->prepare($sql);
        foreach ($data as $row) {
            foreach ($row as $key => $value) {
                $statement->bindValue(":$key", $value);
            }
        }
        $statement->execute();
        return true;
    }


    public function update($data = [])
    {
        if (empty($data)) {
            throw new \Exception('record given empty');
        }
        $tablename    = $this->tablename();

        $placeholders = implode(', ', array_map(fn ($attr) => "$attr=:$attr", array_keys($data)));
        $sql          = "UPDATE $tablename SET $placeholders WHERE $this->conditionString ";
        $statement    = $this->db->prepare($sql);
        foreach ($data as $key => $value) {
            $statement->bindValue(":$key", $value);
        }
        $statement->execute();
        return true;
    }



    public function delete()
    {
        $tablename    = $this->tablename();
        $statement = $this->db->prepare("DELETE FROM $tablename WHERE $this->conditionString");
        $statement->execute();
        return true;
    }
}
