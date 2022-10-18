<?php

class Database
{

    private string $hostname = "localhost";
    private string $username = "root";
    private string $password = "";
    private string $database = "catolica";
    private int $port = 3306;
    private $connection;

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {

        try {

            $this->connection = new PDO('mysql:host=' . $this->hostname . ';port=' . $this->port . ';dbname=' . $this->database, $this->username, $this->password);

        } catch (\PDOException $e) {
            echo $e->getMessage();
        }

    }

    public function getConnect()
    {
        return $this->connection;
    }

}
