<?php

namespace core;

abstract class Model
{
    private Database $db;
    private Request $request;
    private string $conditionString = '';
    private $statement;

    private $relationName;

    private $belongsTo;
    private $foreign_key;
    private $owner_key;

    private $sql = '';

    protected  $table;

    public function __construct()
    {
        $this->db = Route::$app->db;
        $this->request = Route::$app->request;
    }


    public function where($columnName, $operator = null, $value = null)
    {
        if (func_num_args() === 2) {
            $value    = $operator;
            $operator = "=";
        }
        $string = "$columnName $operator " . "'$value'";
        if (!empty($this->conditionString)) {
            $this->conditionString .= " AND " . $string;
        } else {

            $this->conditionString = $string;
        }
        return $this;
    }

    public function orWhere($columnName, $operator = null, $value = null)
    {
        if (func_num_args() === 2) {
            $value    = $operator;
            $operator = "=";
        }

        if (empty($this->conditionString)) {
            throw new \Exception('Invalid orWhere() clouser', 500);
        }
        $string = "$columnName $operator " . "'$value'";
        $this->conditionString .= " OR " . $string;
        return $this;
    }


    public function all()
    {
        $this->table = $this->table;
        $statement  = $this->db->prepare("SELECT * FROM $this->table");
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_OBJ);
    }

    public function get()
    {
        if (!empty($this->setBelongsTo())) {
            return $this->setBelongsTo();
        }
        $this->statement->execute();
        return $this->statement->fetchAll(\PDO::FETCH_OBJ);
    }

    public function first()
    {
        if ($this->statement === null) {
            $this->table = $this->table;
            $sql       = "SELECT * FROM $this->table";
            if (!empty($this->conditionString)) {
                $sql = "SELECT * FROM $this->table WHERE $this->conditionString";
            }
            $this->statement = $this->db->prepare($sql);
        }

        $this->statement->execute();
        return $this->statement->fetchObject();
    }

    public function select(...$fields)
    {
        $placeholders = implode(',', $fields);
        $this->table = $this->table;
        $this->statement = $this->db->prepare("SELECT $placeholders FROM $this->table");
        return $this;
    }


    public function paginate($limit = 10)
    {
        $pageCount = $this->request->page ?? 0;
        $offset    = $pageCount > 0 ? (intval($pageCount) - 1) * $limit : 0;
        $limitSql  = " LIMIT $offset, $limit";

        if (!empty($this->conditionString)) {
            $sql = "SELECT * FROM $this->table WHERE $this->conditionString " . $limitSql;
            $aggregateSql = "SELECT COUNT(*) as aggregate FROM $this->table WHERE $this->conditionString";
        } else {
            $sql = "SELECT * FROM $this->table" . $limitSql;
            $aggregateSql = "SELECT COUNT(*) as aggregate FROM $this->table";
        }


        $this->statement = $this->db->prepare($sql);
        $this->statement->execute();
        $data = $this->statement->fetchAll(\PDO::FETCH_OBJ);

        $stmp = $this->db->prepare($aggregateSql);
        $stmp->execute();
        $aggregate = $stmp->fetchObject()->aggregate;
        $paginate = new Paginate([
            "limit"       => $limit,
            "aggregate"   => $aggregate,
            "data"        => $data,
            "currentPage" => $this->request->page ?? 1,
            "path"        => APP_URL . $this->request->getPath(),
        ]);

        return $paginate;
    }



    public function create(array $data)
    {
        if (empty($data)) {
            throw new \Exception('record given empty');
        }
        $fields       = implode(',', array_keys($data));
        $placeholders = implode(',', array_map(fn ($attr) => ":$attr", array_keys($data)));
        $sql          = "INSERT INTO $this->table($fields) VALUES($placeholders)";
        $statement    = $this->db->prepare($sql);
        foreach ($data as $key => $value) {
            $statement->bindValue(":$key", $value);
        }
        $statement->execute();
        return $this->where('id', $this->db->lastInsertId())->first();
    }


    public function insert($data = [])
    {
        if (empty($data)) {
            throw new \Exception('record given empty');
        }
        $array_keys   = array_keys($data[0]);
        $fields       = implode(',', $array_keys);
        $arrayOfPlaceholder = [];
        foreach ($data as $row) {
            $arrayOfPlaceholder[] = implode(',', array_map(fn ($attr) => ":$attr", $array_keys));
        }
        $placeholders = "(" . implode("),(", $arrayOfPlaceholder) . ")";
        $sql          = "INSERT INTO $this->table($fields) VALUES $placeholders";
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

        $placeholders = implode(', ', array_map(fn ($attr) => "$attr=:$attr", array_keys($data)));
        $sql          = "UPDATE $this->table SET $placeholders WHERE $this->conditionString ";
        $statement    = $this->db->prepare($sql);
        foreach ($data as $key => $value) {
            $statement->bindValue(":$key", $value);
        }
        $statement->execute();
        return true;
    }



    public function delete()
    {
        $statement = $this->db->prepare("DELETE FROM $this->table WHERE $this->conditionString");
        $statement->execute();
        return true;
    }



    private function setBelongsTo()
    {
        if (is_null($this->belongsTo)) return false;

        $this->table = $this->table;
        $sql = "SELECT * FROM $this->table";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        $childmodel = $statement->fetchAll(\PDO::FETCH_OBJ);

        $id = [];
        foreach ($childmodel as $child) {
            $id[] = $child->{$this->foreign_key};
        }
        $id = implode(',', $id);
        $parentTable = $this->belongsTo->table;
        $sql = "SELECT * FROM $parentTable WHERE $this->owner_key IN ($id)";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        $parentmodel = $statement->fetchAll(\PDO::FETCH_OBJ);

        $model = [];
        foreach ($childmodel as $child) {
            foreach ($parentmodel as $parent) {
                if ($child->{$this->foreign_key} == $parent->{$this->owner_key}) {
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
            "foreign_key" => $foreign_key,
            "owner_key" => $owner_key,
        ];
    }


    protected function when($status, $callback)
    {
        if ($status) {
            call_user_func($callback, ...[$this, $status]);
        }
        return $this;
    }
}
