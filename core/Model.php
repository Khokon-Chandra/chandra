<?php

namespace core;

abstract class Model
{
    private Database $db;
    private string $conditionString = '';
    private $statement;

    private $relationName;

    private $belongsTo;
    private $foreign_key;
    private $owner_key;

    protected  $table;

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
        $tablename = $this->table;
        $statement = $this->db->prepare("SELECT * FROM $tablename");
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_OBJ);
    }

    public function get()
    {
        if(!empty($this->setBelongsTo())){
            return $this->setBelongsTo();
        }
        $this->statement->execute();
        return $this->statement->fetchAll(\PDO::FETCH_OBJ);
    }

    public function first()
    {
        if ($this->statement === null) {
            $tablename = $this->table;
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
        $tablename = $this->table;
        $this->statement = $this->db->prepare("SELECT $placeholders FROM $tablename");
        return $this;
    }



    public function create(array $data)
    {
        if (empty($data)) {
            throw new \Exception('record given empty');
        }
        $tablename    = $this->table;
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
        $tablename    = $this->table;
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
        $tablename    = $this->table;

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
        $tablename    = $this->table;
        $statement = $this->db->prepare("DELETE FROM $tablename WHERE $this->conditionString");
        $statement->execute();
        return true;
    }

    private function setBelongsTo()
    {
        if(is_null($this->belongsTo)) return false;

        $tablename = $this->table;
        $sql = "SELECT * FROM $tablename";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        $childmodel = $statement->fetchAll(\PDO::FETCH_OBJ);

        $id = [];
        foreach($childmodel as $child){
            $id[] = $child->{$this->foreign_key};
        }
        $id = implode(',',$id);
        $parentTable = $this->belongsTo->table;
        $sql = "SELECT * FROM $parentTable WHERE $this->owner_key IN ($id)";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        $parentmodel = $statement->fetchAll(\PDO::FETCH_OBJ);

        $model = [];
        foreach($childmodel as $child){
            foreach($parentmodel as $parent){
                if($child->{$this->foreign_key} == $parent->{$this->owner_key}){
                    $child->{$this->relationName} = $parent;
                }
            }
           $model[] = $child;
        }

        return $model;
        
    }


    public function with($relation)
    {
        $this->relationName = $relation;
        $className          = get_called_class();
        $model              = new $className;
        $relationInfo       = $model->$relation();
        $this->belongsTo    = $relationInfo["belongsTo"];
        $this->foreign_key  = $relationInfo["foreign_key"];
        $this->owner_key    = $relationInfo["owner_key"];
        return $this;
    }

    public function belongsTo($Model, $foreign_key, $owner_key)
    {
        return [
            "belongsTo" => new $Model(),
            "foreign_key"=> $foreign_key,
            "owner_key" => $owner_key,
        ];
    }

}
