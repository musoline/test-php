<?php


class Database
{
    private string $servername = "localhost";
    private string $username = "root";
    private string $password = "";
    private PDO $connection;


    private function connect()
    {
        try {
            $this->connection = new PDO("mysql:host=$this->servername;dbname=test-php", $this->username, $this->password);;

            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function insertData($tableName, $text)
    {
        $this->connect();
        try {

            $stmt = $this->connection->prepare("INSERT INTO $tableName (data) VALUES (:data)");
            $stmt->bindParam(':data', $text);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function __destruct()
    {
        $this->connection = null;
    }
}
