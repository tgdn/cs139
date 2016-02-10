<?php

class List_deletePage extends List_viewPage {

    protected function post() {
        global $routes;
        /* get list or nothing */
        parent::get();

        ListModel::delete($this->list['id']);

        header('Location: '. $routes['lists']);
    }

}

?>
