<?php

require_once "../config.php";

require_once "../vendor/autoload.php";

require_once "../vendor/khokonc/mvc-core/Helpers.php";

$app = new \khokonc\mvc\Application();

new \khokonc\mvc\Routing\Route($app);

require_once "../routes/web.php";


echo $app->run();