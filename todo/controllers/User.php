<?php

class BaseUser {

    private $pk = null;
    private $username = null;
    private $full_name = null;
    private $email = null;
    private $created_at = null;
    private $last_login = null;

    private $is_authenticated;

    public function is_authenticated() {
        return false;
    }

    public function is_anonymous() {
        return true;
    }

    protected function hash_password($password) {
        return "";
    }

    public function username() {

    }

    public function full_name() {
        
    }

}


class User extends BaseUser {

    public static login($username, $password) {
        return false;
    }

    public static register($username, $email, $name, $password) {
        return false;
    }

    public static authenticate_user_from_uid(uid) {
        // TODO do database stuff

        // or simply return user
        return new self;
    }

}

?>
