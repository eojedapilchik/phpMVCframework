<?php

/**
 * Front controller

*/

require '../Core/Router.php';

$router = new Router();

echo get_class($router);

echo 'Requested URL 1 = "'.$_SERVER['QUERY_STRING'].'"';

?>
