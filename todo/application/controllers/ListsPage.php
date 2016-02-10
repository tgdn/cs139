<?php

class ListsPage extends Page {

    protected $lists = null;

    protected function before_action() {
        Utils::login_required();
    }

    protected function get() {
        global $user;

        $this->lists = ListModel::get_for_user_id($user->pk);

    }
}

?>
