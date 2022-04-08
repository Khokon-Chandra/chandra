<?php

require_once "../config.php";

require_once "../vendor/autoload.php";

require_once "../vendor/khokonc/mvc-core/Helpers.php";

require_once "../routes/web.php";


echo $route->run();
