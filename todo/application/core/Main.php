<?php

// get main config
$config = require_once 'application/core/config.php';

session_name($config['SESSION_NAME']);
if (session_status() == PHP_SESSION_NONE)
    session_start();

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

require_once 'application/core/nocsrf.php';
require_once 'application/core/utils.php';


$user = null;
$page = new $page_controller_class();

if (array_key_exists('csrf_csrf_token', $_SESSION)) {
    $csrf_token_input = '<input type="hidden" name="csrf_token" value="'. $_SESSION['csrf_csrf_token'] .'">';
}

?>
