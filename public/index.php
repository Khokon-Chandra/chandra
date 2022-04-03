<?php

require_once "../config.php";

require_once "../autoload.php";

require_once "../core/Helpers.php";

require_once "../routes/web.php";


echo $route->run();
