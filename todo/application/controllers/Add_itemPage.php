<?php

class Add_itemPage extends List_viewPage {

    public function post() {
        global $user, $routes;
        parent::get();

        $content = $_POST['content'];

        if (isset($content) && !empty($content)) {
            ItemModel::add($this->list['id'], $content);

            header('Location: ' . $routes['list_view'] . '?id=' . $this->list['id']);
        }

    }

}
?>
