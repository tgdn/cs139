<?php

/* session must have started */

class Page {

    public function __construct() {

        // authenticate user
        $this->authenticate_user();
        // call an action before controller
        $this->before_action();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->handle_post();
        } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->handle_get();
        }

        // call action after controller
        $this->after_action();
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

    protected function handle_get() {
        // this should not be overriden
        error_log('GET - ' . $_SERVER['REQUEST_URI']);
        $this->get();
    }

    protected function handle_post() {
        // this should not be overriden
        error_log('POST - ' . $_SERVER['REQUEST_URI']);

        /* check CSRF protection */
        /*try {
            NoCSRF::check('csrf_token', $_POST, true);
            // only carry on with post if CSRF check succeeded
            $this->post();
        } catch (Exception $e) {
            header('HTTP/1.0 403 Forbidden');
            die($e->getMessage());
            $this->get();
        }*/
        $this->post();
    }

    /* these should be overriden */
    protected function get() {}
    protected function post() {}
    protected function before_action() {}
    protected function after_action() {}

}

?>
