<?php

class UserModel {

    public static function get_user($uid) {
        global $database;

        $sql = 'select
            id, username, full_name, email, created_at, last_login
            from user where id = :id';

        $st = $database->prepare($sql);

        $st->bindValue(':id', $uid, SQLITE3_INTEGER);
        $st = $st->execute();

        return $st->fetchArray(SQLITE3_ASSOC);
    }

    public static function update_login_date() {
        global $database, $user;

        $sql = "update user set last_login=datetime('now') where id=:id";
        $st = $database->prepare($sql);
        $st->bindValue(':id', $user->pk, SQLITE3_INTEGER);

        // return bool
        return $st->execute();
    }

    public static function get_by_username($username) {
        global $database;

        $sql = 'select
        id, username, email, full_name, created_at, last_login, password
        from user where username = :username limit 1';
        $st = $database->prepare($sql);
        $st->bindValue(':username', $username, SQLITE3_TEXT);

        return $st->execute();
    }

    public static function get_by_email($email) {
        global $database;

        $sql = 'select
        id, username, email, full_name, created_at, last_login, password
        from user where email = :email limit 1';
        $st = $database->prepare($sql);
        $st->bindValue(':email', $email, SQLITE3_TEXT);

        return $st->execute();
    }

    public static function register($username, $email, $name, $password) {
        global $database;

        $database->query($sql);

        $sql = 'insert into user
        (username, full_name, email, password, created_at, last_login)
        values
        (:username, :full_name, :email, :password, datetime("now"), datetime("now"))';
        $st = $database->prepare($sql);

        $st->bindValue(':username', $username, SQLITE3_TEXT);
        $st->bindValue(':full_name', $name, SQLITE3_TEXT);
        $st->bindValue(':email', $email, SQLITE3_TEXT);
        $st->bindValue(':password', $password, SQLITE3_TEXT);

        return $st->execute();
    }

}

?>
