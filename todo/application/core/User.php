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
        UserModel::update_login_date($uid);
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

    protected function verify_password($raw, $hash) {
        return password_verify($raw, $hash);
    }

    protected function hash_password($password) {
        return password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);
    }
}


class User extends BaseUser {

    public static function login($username, $raw_password) {
        global $database, $user;

        if ($user->is_authenticated()) {
            return true;
        }

        //$password = $user->hash_password($raw_password);

        $sql = 'select id, password from user where username = :username limit 1';
        $st = $database->prepare($sql);
        $st->bindValue(':username', $username, SQLITE3_TEXT);
        $st = $st->execute();
        $result = $st->fetchArray(SQLITE3_ASSOC);

        if ($result && gettype($result) == 'array') {
            // found a match

            if ($user->verify_password($raw_password, $result['password'])) {
                /* passwords match */
                $uid = $result['id'];
                $user->loadFromID($uid);
                $_SESSION['uid'] = $uid;

                return true;
            }
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
