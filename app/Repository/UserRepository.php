<?php

class UserRepository
{
    /**
     * @var $database
     */
    private $database;

    public function __construct(Database $database)
    {
        $this->database = $database->getConnect();
    }

    /**
     * Metodo responsavel por retornar uma pessoa conforme argumento informado
     * @param string $username
     * @return array|bool
     */

    public function fetchByUsername(string $username): array|bool
    {
        $query = "SELECT
                        users.*
                    FROM
                        users
                    WHERE
                        users.username = :username";

        $statement = $this->database->prepare($query);

        $statement->bindValue(":username", $username, PDO::PARAM_STR);

        $statement->execute();

        return $statement->fetch();
    }

}
