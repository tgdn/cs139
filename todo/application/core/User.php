<?php


class BaseUser {

    private $pk = null;
    private $username = null;
    private $full_name = null;
    private $email = null;
    private $created_at = null;
    private $last_login = null;

    public function __get($name) {
        return $this->$name;
    }

    public static function fromID($uid) {
        $instance = new self();
        $instance->loadFromID($uid);
        return $instance;
    }

    protected function loadFromID($uid) {
        $db_query = UserModel::get_user($uid);

        $this->pk = $uid;

        // set instance variables here
    }

    public function is_authenticated() {
        global $user;
        if (array_key_exists('uid', $_SESSION) && !is_null($user)) {
            return ($_SESSION['uid'] == $user->pk);
        }
        return false;
    }

    public function is_anonymous() {
        return !$this->is_authenticated();
    }

    protected function hash_password($password) {
        return $password;
    }

}


class User extends BaseUser {

    public static function login($username, $raw_password) {
        global $database, $user;

        if ($user->is_authenticated()) {
            return true;
        }
        $password = $user->hash_password($raw_password);

        $sql = 'select id from user where username=:username and password=:password limit 1';
        $st = $database->prepare($sql);
        $st->bindValue(':username', $username, SQLITE3_TEXT);
        $st->bindValue(':password', $password, SQLITE3_TEXT);
        $st = $st->execute();
        $result = $st->fetchArray(SQLITE3_ASSOC);

        if ($result && gettype($result) == 'array') {
            // correct !
            $uid = $result['id'];
            $user->loadFromID($uid);
            $_SESSION['uid'] = $uid;

            return true;
        }

        return false;
    }

    public static function register($username, $email, $name, $raw_password) {
        global $user;

        if ($user->is_authenticated()) {
            return false;
        }

        // do db stuff here
        $password = $user->hash_password($raw_password);
        $r = UserModel::register($username, $email, $name, $password);

        // finally login user
        self::login($username, $raw_password);

        return true;
    }

}

?>
