<?php

require '../config/dev.php';

require '../vendor/autoload.php';

$router = new App\config\Router();
$router->run();


require '../templates/default.php';