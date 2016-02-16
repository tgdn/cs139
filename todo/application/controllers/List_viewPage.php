<?php

class List_viewPage extends Page {

    protected $list = null;
    protected $items = null;

    protected function before_action() {
        Utils::login_required();
    }

    protected function get() {
        global $user, $routes;

        $redirect = false;

        if (isset($_GET['id'])) {
            $result = ListModel::get_from_id($_GET['id']);
            $list = $result->fetchArray(SQLITE3_ASSOC);

            /* check if result exists */
            if ($list && gettype($list) == 'array') {

                /* check that list is owned by user */
                $list_user = ListModel::get_from_id_and_user_id($list['id'], $user->pk)->fetchArray(SQLITE3_ASSOC);;

                if ($list_user && gettype($list_user) == 'array') {
                    $this->list = $list;
                    $this->items = ItemModel::get_for_list_id($list['id']);
                } else {
                    $redirect = true;
                }
            } else
                $redirect = true;
        } else
            $redirect = true;

        if ($redirect)
            header('Location: ' . $routes['lists']);
    }

    protected function after_action() {

    }
}

?>
