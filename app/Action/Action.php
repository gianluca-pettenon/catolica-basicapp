<?php

if (!headers_sent()) :
    header("Content-Type: application/json");
endif;

require_once "../Database/Database.php";

$conn = new Database;
$conn = $conn->getConnect();

$data = [
    "id" => (!empty($_POST["id"]) ? strip_tags($_POST["id"]) : null),
    "name" => (!empty($_POST["name"]) ? strip_tags($_POST["name"]) : null),
    "mail" => (!empty($_POST["mail"]) ? filter_var($_POST["mail"], FILTER_SANITIZE_EMAIL) : null),
    "birthday" => (!empty($_POST["birthday"]) ? preg_replace("([^0-9/])", "", $_POST["birthday"]) : null),
    "state" => (!empty($_POST["state"]) ? strip_tags($_POST["state"]) : null),
    "address" => (!empty($_POST["address"]) ? strip_tags($_POST["address"]) : null),
    "genre" => (!empty($_POST["genre"]) ? strip_tags($_POST["genre"]) : null),
    "creditcard" => (!empty($_POST["creditcard"]) ? strip_tags($_POST["creditcard"]) : null),
];

switch ($_POST["action"]):

    case "insert":

        $query = "INSERT INTO
                            users
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

        $statement = $conn->prepare($query);

        $statement->bindValue(":name", strtoupper($data["name"]), PDO::PARAM_STR);
        $statement->bindValue(":mail", strtolower($data["mail"]), PDO::PARAM_STR);
        $statement->bindValue(":birthday", $data["birthday"], PDO::PARAM_STR);
        $statement->bindValue(":state", $data["state"], PDO::PARAM_STR);
        $statement->bindValue(":address", strtoupper($data["address"]), PDO::PARAM_STR);
        $statement->bindValue(":genre", $data["genre"], PDO::PARAM_STR);
        $statement->bindValue(":creditcard", $data["creditcard"], PDO::PARAM_STR);

        $statement->execute();

        break;

    case "update":

        $query = "UPDATE
                        users
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

        $statement = $conn->prepare($query);

        $statement->bindValue(":id", $data["id"], PDO::PARAM_INT);

        $statement->bindValue(":name", strtoupper($data["name"]), PDO::PARAM_STR);
        $statement->bindValue(":mail", strtolower($data["mail"]), PDO::PARAM_STR);
        $statement->bindValue(":birthday", $data["birthday"], PDO::PARAM_STR);
        $statement->bindValue(":state", $data["state"], PDO::PARAM_STR);
        $statement->bindValue(":address", strtoupper($data["address"]), PDO::PARAM_STR);
        $statement->bindValue(":genre", $data["genre"], PDO::PARAM_STR);
        $statement->bindValue(":creditcard", $data["creditcard"], PDO::PARAM_STR);

        $statement->execute();

        break;

    case "delete":

        $statement = $conn->prepare("DELETE FROM users WHERE id = :id");

        $statement->bindParam(":id", $data["id"], PDO::PARAM_INT);

        $statement->execute();

        break;

    case "fetch":

        $query = "SELECT
                        users.*,
                        state.name namestate
                    FROM
                        users
                    LEFT OUTER JOIN state ON state.initials = users.state
                    WHERE
                        users.id = :id";

        $statement = $conn->prepare($query);
        $statement->bindValue(":id", $data["id"], PDO::PARAM_STR);
        $statement->execute();

        $data = $statement->fetch();

        exit(json_encode($data));

        break;

endswitch;

header("Location: ../../index.php");
