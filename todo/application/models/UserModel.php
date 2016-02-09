<?php

class UserModel {

    public static function get_user($uid) {
        global $database;

        $sql = <<<'EOD'
select
id, username, full_name, email, created_at, last_login
from user where id=:id
EOD;

        $st = $database->prepare($sql);

        $st->bindValue(':id', $uid, SQLITE3_INTEGER);
        $st = $st->execute();

        return $st->fetchArray(SQLITE3_ASSOC);
    }

    public static function update_login_date() {
        global $database, $user;

        $sql = "update user set last_login=date('now') where id=:id";
        $st = $database->prepare($sql);
        $st->bindValue(':id', $user->pk, SQLITE3_INTEGER);

        // return bool
        return $st->execute();
    }

}

?>
