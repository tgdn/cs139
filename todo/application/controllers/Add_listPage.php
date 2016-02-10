<?php

class Add_listPage extends Page {

    protected function before_action() {
        Utils::login_required();
    }

    protected function post() {
        global $user, $routes;
        $name = $_POST['name'];

        if (isset($name) && !empty($name)) {
            $list_list = ListModel::add($user->pk, $_POST['name']);

            header('Location: ' . $routes['lists']);
        }

        // otherwise show form
    }
}

?>
