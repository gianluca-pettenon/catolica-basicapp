<?php

require_once "./app/Service/SessionService.php";
require_once "./app/Session.php";

$sessionService = new SessionService(new Session);

$sessionService->destroy();

header("Location: index.php");
