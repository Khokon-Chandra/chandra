<?php

require_once "../config.php";

require_once "../vendor/autoload.php";

$app = new \khokonc\mvc\Application();

$app->init();


require_once "../routes/web.php";


echo $app->run();