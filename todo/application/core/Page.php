<?php

/* session must have started */

class Page {

    private $post;
    private $get;
    private $session;

    protected $context = array();

    public function __construct() {
        $this->post = $_POST;
        $this->get = $_GET;
        $this->session = $_SESSION;

        $this->authenticate_user();
    }

    public function __get($name) {
        // we can now access properties
        return $this->$name;
    }

    public function authenticate_user() {
        global $user;

        if (is_null($user)) {
            $user = new User();
        }

        if (array_key_exists('uid', $_SESSION)) {
            $user = User::fromID($_SESSION['uid']);
        }

        //User::login('thomas', 'thomas123');
    }

    public function get_context_data() {
        return $this->context;
    }
}

?>
