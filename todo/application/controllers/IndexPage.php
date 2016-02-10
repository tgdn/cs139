<?php

class IndexPage extends Page {

    private $form = array();
    private $fields = array('username','password');

    protected function before_action() {
        Utils::anonymous_required();
    }

    protected function get() {
        NoCSRF::generate('csrf_token');
    }

    protected function post() {
        $this->form['errors'] = array();

        foreach ($this->fields as $field) {
            $this->form[$field] = array(
                'value' => $_POST[$field],
                'errors' => array()
            );
        }

        $this->validate_form();
    }

    protected function validate_field($value) {
        if (empty($value)) {
            return false;
        }
        return true;
    }

    protected function validate_form() {
        global $user;

        // try to log user in
        User::login($form['username']['value'], $form['password']['value']);

        if (!$user->is_authenticated()) {
            array_push($this->form['errors'], "Incorrect username or password");
        }

    }

    protected function after_action() {
        // automatically redirect after login
        Utils::anonymous_required();
    }
}

?>
