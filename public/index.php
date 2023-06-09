<?php

use Symfony\Component\Dotenv\Dotenv;

require_once "../vendor/autoload.php";


$dotenv = new Dotenv();


$dotenv->load(__DIR__.'\..\.env');


$app = new \khokonc\mvc\Application();


$app->init();


require_once "../routes/web.php";


echo $app->run();