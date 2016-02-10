<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

define('PROJECT_DIR', realpath( '' . dirname(__FILE__) . '/../../' ));
define('BASE_DIR', substr(PROJECT_DIR, strlen($_SERVER["DOCUMENT_ROOT"])));

return array(

    'SESSION_NAME' => 'todo_sess',

    'DB_FILE' => 'db/todo.db',
    'DB_CHARSET' => 'utf8',

    'LOGIN_REDIRECT_URL' => BASE_DIR . '/lists.php',
    'LOGIN_URL' => BASE_DIR . '/',
    'REGISTER_URL' => BASE_DIR . '/register.php',

    'CLASS_LOADER_DIRS' => array(
        'application/core/',
        'application/controllers/',
        'application/models/'

        /* add class locations here */
    )
)

?>
