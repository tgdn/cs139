<?php

session_start();

require_once 'application/core/utils.php';

// get main config
$config = require_once 'application/core/config.php';
$database = new Database;
$user = null;
$page = new $page_controller_class();

?>
