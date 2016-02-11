<?php

class ItemModel {

    public static function get_from_id($item_id) {
        global $database;

        $sql = 'select * from list_item where id = :item_id';
        $st = $database->prepare($sql);
        $st->bindValue(':item_id', $item_id, SQLITE3_INTEGER);

        return $st->execute();
    }

    public static function get_for_list_id($list_id) {
        global $database;

        $sql = 'select *
        from list_item where list_id = :list_id';
        $st = $database->prepare($sql);
        $st->bindValue(':list_id', $list_id, SQLITE3_INTEGER);

        return $st->execute();
    }

    public static function mark_completed($item_id, $yes) {
        global $database;

        $sql = 'update list_item
        set completed = :completed
        where id = :item_id';
        $st = $database->prepare($sql);
        $st->bindValue(':completed', $yes ? 1 : 0, SQLITE3_INTEGER);
        $st->bindValue(':item_id', $item_id, SQLITE3_INTEGER);

        return $st->execute();
    }

    public static function delete($item_id) {
        global $database;

        $sql = 'delete from list_item where id = :item_id';
        $st = $database->prepare($sql);
        $st->bindValue(':item_id', $item_id, SQLITE3_INTEGER);

        return $st->execute();
    }

}

?>
