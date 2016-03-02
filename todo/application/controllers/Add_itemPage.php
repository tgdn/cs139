<?php

class Add_itemPage extends List_viewPage {

    protected $is_json = false;

    public function post() {
        global $user, $routes;
        parent::get();

        $content = $_POST['content'];
        $this->is_json = isset($_GET['json']);

        if (isset($content) && !empty($content)) {
            ItemModel::add($this->list['id'], $content);

            if (!$this->is_json) {
                header('Location: ' . $routes['list_view'] . '?id=' . $this->list['id']);
            } else {
                $r = array(
                    'success' => true,
                    'item_name' => $content,
                    'list_id' => $this->list['id']
                );
                header('Content-Type: application/json');
                echo json_encode($r);
            }
        }

    }

}
?>
