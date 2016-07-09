<?php

require __DIR__.'/map_router.php';

$classes = get_declared_classes();

include $argv[1];

$router = new AceOugi\Router();

foreach (array_diff(get_declared_classes(), $classes) as $class)
    if (method_exists($class, '__map'))
        $class::__map($router);

echo json_encode($router->export());
