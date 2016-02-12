<?php

class IndexPage extends Page {

    protected $login_errors = array();

    protected function before_action() {
        Utils::anonymous_required();
    }

    protected function get() {
        NoCSRF::generate('csrf_token');
    }

    protected function post() {
        $this->validate_login();
    }

    protected function validate_login() {
        global $user;

        $username = $_POST['username'];
        $raw_pass = $_POST['password'];

        if (empty($username) || empty($raw_pass)) {
            array_push($this->login_errors, 'All fields are required');
            return;
        }

        // try to log user in
        $r = User::login($username, $raw_pass);

        if (!$r) {
            array_push($this->login_errors, "Incorrect username or password");
        }

    }

    protected function after_action() {
        // automatically redirect after login
        Utils::anonymous_required();
    }
}

?>
