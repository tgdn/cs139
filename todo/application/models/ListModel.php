<?php

class ListModel {

    public static function get_from_id($list_id) {
        global $database;

        $sql = 'select * from list
        where list.id = :list_id limit 1';

        $st = $database->prepare($sql);
        $st->bindValue(':list_id', $list_id, SQLITE3_INTEGER);

        return $st->execute();
    }

    public static function get_for_user_id($uid) {
        global $database;

        $sql = 'select
        list.id, list.name, list.created_at, list.modified_at
        from list
        inner join user_list
            on list.id = user_list.list_id
        where user_list.user_id = :user_id';

        $st = $database->prepare($sql);
        $st->bindValue(':user_id', $uid, SQLITE3_INTEGER);

        return $st->execute();

    }

    public static function get_users_for_list_id($list_id) {
        global $database;

        $sql = 'select
        user.id, user.username, user.full_name, user.email
        from user
        inner join user_list
            on user.id = user_list.user_id
        where user_list.list_id = :list_id';

        $st = $database->prepare($sql);
        $st->bindValue(':list_id', $list_id, SQLITE3_INTEGER);

        return $st->execute();
    }

    public static function add($uid, $name) {
        global $database;

        /* insert list */
        $sql = 'insert into list (name, created_at, modified_at)
        values (:name, datetime("now"), datetime("now"))';

        $st = $database->prepare($sql);
        $st->bindValue(':name', $name, SQLITE3_TEXT);

        $result = $st->execute();

        /* get list id from result */
        $list_id = $database->get_db()->lastInsertRowID();

        $sql = null;
        $st = null;

        /* create relation between user and list */
        $sql = 'insert into user_list
        values (:user_id, :list_id)';

        $st = $database->prepare($sql);
        $st->bindValue(':user_id', $uid, SQLITE3_INTEGER);
        $st->bindValue(':list_id', $list_id, SQLITE3_INTEGER);

        $st = $st->execute();

        //return $list_id;
    }

    public static function delete($list_id) {
        /* should confirm delete in view */
        global $database;

        /* delete relation */
        $sql = 'delete from user_list where list_id = :list_id';
        $st = $database->prepare($sql);
        $st->bindValue(':list_id', $list_id, SQLITE3_INTEGER);
        $st->execute();

        /* delete list */
        $sql = 'delete from list where id = :list_id';
        $st = $database->prepare($sql);
        $st->bindValue(':list_id', $list_id, SQLITE3_INTEGER);
        return $st->execute();
    }

}

?>
