<?php

require_once "../config.php";

require_once "../vendor/autoload.php";

require_once "../core/Helpers.php";

require_once "../routes/web.php";


echo $route->run();
