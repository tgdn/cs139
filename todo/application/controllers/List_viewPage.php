<?php

class List_viewPage extends Page {

    protected $list = null;

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
                $this->list = $list;
            } else
                $redirect = true;
        } else
            $redirect = true;

        if ($redirect)
            header('Location: ' . $routes['lists']);
    }
}

?>
