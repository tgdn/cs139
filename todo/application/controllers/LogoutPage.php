<?php

class LogoutPage extends Page {

    protected function before_action() {
        Utils::login_required();
    }

    protected function get() {
        global $user, $config;

        // destroy session and current user
        $user = null;
        session_destroy();

        // redirect
        header('Location: ' . $config['LOGIN_URL']);
    }
}

?>
