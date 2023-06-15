<?php
class Content
{
    private string $tableName = "contents";
    private Database $dataBase;

    public function create($data)
    {
        $this->dataBase = new Database;
        $this->dataBase->insertData($this->tableName, $data);
    }
}
