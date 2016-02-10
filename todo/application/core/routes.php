<?php

global $config;

return array(

    'login' => $config['LOGIN_URL'],
    'register' => $config['REGISTER_URL'],
    'logout' => BASE_DIR . '/logout.php',
    'forgot_password' => BASE_DIR . '/forgot_password.php',

    'lists' => BASE_DIR . '/lists.php',
    'list_view' => BASE_DIR . '/list_view.php',
    'list_delete' => BASE_DIR . '/list_delete.php',
    'add_list' => BASE_DIR . '/add_list.php'

);

?>
