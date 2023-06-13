<?php
class Content
{
    private $tableName = "contents";
    private $dataBase;

    public function create($data)
    {
        $this->dataBase = new Database;
        $this->dataBase->insertData($this->tableName,$data);
    }
}
