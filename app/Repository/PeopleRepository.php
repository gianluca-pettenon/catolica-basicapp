<?php

class PeopleRepository
{

    public function __construct(Database $database)
    {
        $this->database = $database->getConnect();
    }

    /**
     * Metodo responsavel por retornar todas as pessoas cadastradas
     * @return array
     */

    public function fetchAll(): array
    {
        $query = "SELECT
                      people.id,
                      people.name,
                      people.mail,
                      people.birthday,
                      people.state,
                      people.address,
                      people.genre,
                      people.creditcard,
                      CASE WHEN people.genre = 'M' THEN 'Masculino' ELSE 'Feminino' END AS namegenre,
                      state.name namestate
                    FROM
                        people
                        LEFT OUTER JOIN state ON state.initials = people.state";

        return $this->database->query($query)->fetchAll();
    }

    /**
     * Metodo responsavel por retornar uma pessoa conforme argumento informado
     * @return array
     */

    public function fetchById(array $params): array
    {
        $query = "SELECT
                      people.id,
                      people.name,
                      people.mail,
                      people.birthday,
                      people.state,
                      people.address,
                      people.genre,
                      people.creditcard,
                      CASE WHEN people.genre = 'M' THEN 'Masculino' ELSE 'Feminino' END AS namegenre,
                      state.name namestate
                    FROM
                        people
                        LEFT OUTER JOIN state ON state.initials = people.state
                    WHERE
                         people.id = :id";

        $statement = $this->database->prepare($query);

        $statement->bindValue(":id", $params["id"], PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }

    /**
     * Metodo responsavel por cadastrar uma pessoa
     * @param array $params
     */

    public function insert(array $params)
    {
        $query = "INSERT INTO
                            people
                                (
                                    name,
                                    mail,
                                    birthday,
                                    state,
                                    address,
                                    genre,
                                    creditcard
                                )
                            VALUES (
                                    :name,
                                    :mail,
                                    :birthday,
                                    :state,
                                    :address,
                                    :genre,
                                    :creditcard
                                )";

        $statement = $this->database->prepare($query);

        $statement->bindValue(":name", strtoupper($params["name"]), PDO::PARAM_STR);
        $statement->bindValue(":mail", strtolower($params["mail"]), PDO::PARAM_STR);
        $statement->bindValue(":birthday", $params["birthday"], PDO::PARAM_STR);
        $statement->bindValue(":state", $params["state"], PDO::PARAM_STR);
        $statement->bindValue(":address", strtoupper($params["address"]), PDO::PARAM_STR);
        $statement->bindValue(":genre", $params["genre"], PDO::PARAM_STR);
        $statement->bindValue(":creditcard", $params["creditcard"], PDO::PARAM_STR);

        $statement->execute();
    }

    /**
     * Metodo responsavel por excluir uma pessoa
     * @param array $params
     */

    public function delete(array $params)
    {
        $query = "DELETE FROM people WHERE id = :id";

        $statement = $this->database->prepare($query);

        $statement->bindParam(":id", $params["id"], PDO::PARAM_INT);

        $statement->execute();
    }

    /**
     * Metodo responsavel por editar uma pessoa
     * @param array $params
     */

    public function update(array $params): void
    {
        $query = "UPDATE
                      people
                    SET
                        name = :name,
                        mail = :mail,
                        birthday = :birthday,
                        state = :state,
                        address = :address,
                        genre = :genre,
                        creditcard = :creditcard
                    WHERE
                        id = :id";

        $statement = $this->database->prepare($query);

        $statement->bindValue(":id", $params["id"], PDO::PARAM_INT);

        $statement->bindValue(":name", strtoupper($params["name"]), PDO::PARAM_STR);
        $statement->bindValue(":mail", strtolower($params["mail"]), PDO::PARAM_STR);
        $statement->bindValue(":birthday", $params["birthday"], PDO::PARAM_STR);
        $statement->bindValue(":state", $params["state"], PDO::PARAM_STR);
        $statement->bindValue(":address", strtoupper($params["address"]), PDO::PARAM_STR);
        $statement->bindValue(":genre", $params["genre"], PDO::PARAM_STR);
        $statement->bindValue(":creditcard", $params["creditcard"], PDO::PARAM_STR);

        $statement->execute();
    }

}
