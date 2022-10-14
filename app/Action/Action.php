<?php

if (!headers_sent()) :
    header("Content-Type: application/json");
endif;

require_once "../Database/Database.php";
require_once "../Repository/PeopleRepository.php";

$conn = new Database;
$conn = $conn->getConnect();

$repository = new PeopleRepository($conn);

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
        $repository->insert($data);
        break;

    case "update":
        $repository->update($data);
        break;

    case "delete":
        $repository->delete($data);
        break;

    case "fetchById":
        exit(json_encode($repository->fetchById($data)));
        break;

    case "fetchAll":
        exit(json_encode($repository->fetchAll()));
        break;

endswitch;

header("Location: ../../index.php");
