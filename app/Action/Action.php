<?php

if (!headers_sent()) :
    header("Content-Type: application/json");
endif;

require_once "../Database/Database.php";
require_once "../Repository/PeopleRepository.php";

$peopleRepository = new PeopleRepository(new Database);

$params = [
    "id" => (!empty($_POST["id"]) ? strip_tags($_POST["id"]) : null),
    "name" => (!empty($_POST["name"]) ? strip_tags($_POST["name"]) : null),
    "username" => (!empty($_POST["username"]) ? strip_tags($_POST["username"]) : null),
    "password" => (!empty($_POST["password"]) ? strip_tags($_POST["password"]) : null),
    "mail" => (!empty($_POST["mail"]) ? filter_var($_POST["mail"], FILTER_SANITIZE_EMAIL) : null),
    "birthday" => (!empty($_POST["birthday"]) ? preg_replace("([^0-9/])", "", $_POST["birthday"]) : null),
    "state" => (!empty($_POST["state"]) ? strip_tags($_POST["state"]) : null),
    "address" => (!empty($_POST["address"]) ? strip_tags($_POST["address"]) : null),
    "genre" => (!empty($_POST["genre"]) ? strip_tags($_POST["genre"]) : null),
    "creditcard" => (!empty($_POST["creditcard"]) ? strip_tags($_POST["creditcard"]) : null),
    "action" => (!empty($_POST["action"]) ? strip_tags($_POST["action"]) : null),
];

switch ($params["action"]):

    case "insert":
        $peopleRepository->insert($params);
        break;

    case "update":
        $peopleRepository->update($params);
        break;

    case "delete":
        $peopleRepository->delete($params);
        break;

    case "fetchById":
        exit(json_encode($peopleRepository->fetchById($params)));
        break;

    case "fetchAll":
        exit(json_encode($peopleRepository->fetchAll()));
        break;

    case "auth":

        require_once "../Repository/UserRepository.php";
        require_once "../Service/Encrypt.php";
        require_once "../Service/AuthenticationService.php";

        $usersService = new AuthenticationService(new Encrypt);

        $usersService->setUsername($params["username"]);
        $usersService->setPassword($params["password"]);

        $authenticate = $usersService->authenticate(new UserRepository(new Database));

        exit(json_encode($authenticate));
        break;

endswitch;

header("Location: ../../index.php");
