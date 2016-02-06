<?php

/* session must have started */

$user = null;
$page = null;

class Page {

    private $post;
    private $get;
    private $session;

    function __construct() {
        $this->post = $_POST;
        $this->get = $_GET;
        $this->session = $_SESSION;

        $this->get_user();
    }

    function get_user() {
        if (array_key_exists('uid', $this->session)) {
            $user = User::authenticate_user_from_uid($this->session['uid']);
        } else {
            $user = new User;
        }
    }
}

$page = new Page;

?>
