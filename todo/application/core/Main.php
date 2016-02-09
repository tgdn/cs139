<?php

session_start();

// get main config
$config = require_once 'application/core/config.php';

/* autoload classes */
spl_autoload_register(function ($classname) {
    global $config;

    foreach ($config['CLASS_LOADER_DIRS'] as $dir) {
        /* loop through each dir until the class is found */
        $class_file = $dir . $classname . '.php';
        if (file_exists($class_file)) {
            require_once($class_file);
            return;
        }
    }
    throw new Exception('Could not load ' . $classname);
});

$database = new Database();
$routes = require_once 'application/core/routes.php';

require_once 'application/core/utils.php';




$user = null;
$page = new $page_controller_class();

$csrf_token = NoCSRF::generate('csrf_token');
$csrf_token_input = '<input type="hidden" name="csrf_token" value="'. $csrf_token .'">';

?>
