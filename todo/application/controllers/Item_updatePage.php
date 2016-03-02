<?php

class Item_updatePage extends List_viewPage {

    protected $is_json = true;
    protected $errors = array();
    protected $context = array();

    public function post() {
        global $user, $routes;
        parent::get();

        $item_id = isset($_POST['item_id']) ? $_POST['item_id'] : null;
        $is_checked = isset($_POST['checked']) ? $_POST['checked'] : null;

        if (!empty($item_id) && !empty($is_checked)) {

            ItemModel::mark_completed($item_id, $is_checked == 1 ? true : false);

            $this->context['success'] = true;
        }

    }

    protected function render() {
        array_merge($this->context, $this->errors);
        header('Content-Type: application/json');
        echo json_encode();
    }

}
?>
