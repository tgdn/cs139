<?php

class RegisterPage extends Page {

    protected $register_errors = array();

    protected function before_action() {
        Utils::anonymous_required();
    }

    protected function get() {
        NoCSRF::generate('csrf_token');
    }

    protected function post() {
        $this->validate_register();
    }

    protected function validate_register() {
        $errors = false;

        $form = array(
            'username' => $username = $_POST['username'],
            'email' => $email = $_POST['email'],
            'fn' => $fn = $_POST['fn'],
            'password' => $raw_pass = $_POST['password']
        );

        /* do not query db if empty */
        foreach ($form as $key => $val) {
            if (empty($val)) {
                array_push($this->register_errors, 'All fields are required');
                return;
            }
        }

        /* at this point we have all fields */

        /* check uniqueness of username */
        if (!$this->validate_username($form['username'])) {
            array_push($this->register_errors, 'This username is already taken');
            $errors = true;
        }

        /* validate email */
        if (!$this->validate_email($form['email'])) {
            $errors = true;
        }

        if ($errors) {
            return;
        }

        /* do register */
        User::register(
            $form['username'], $form['email'],
            $form['fn'], $form['password']
        );

    }

    protected function validate_username($username) {
        $r = UserModel::get_by_username($username)->fetchArray(SQLITE3_ASSOC);

        if ($r && gettype($r) == 'array') {
            /* already exists */
            return false;
        }
        return true;
    }

    protected function validate_email($email) {

        /* check if true email */
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($this->register_errors, 'Please provide a valid email address');
            return false;
        }

        /* check if exists */
        $r = UserModel::get_by_email($email)->fetchArray(SQLITE3_ASSOC);

        if ($r && gettype($r) == 'array') {
            /* already exists */
            array_push($this->register_errors, 'This email address is already in use');
            return false;
        }
        return true;
    }

    protected function after_action() {
        // automatically redirect after login
        Utils::anonymous_required();
    }
}

?>
