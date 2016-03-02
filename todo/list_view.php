<?php
    $page_controller_class = ucfirst(basename(__FILE__, '.php')) . 'Page';
    require_once 'application/core/Main.php';
?>

<?php require('includes/doctype.php'); ?>
<?php require('includes/meta.php'); ?>
<?php require('includes/static.php'); ?>
<?php /* add extra scripts below */ ?>

<title>TODO</title>
</head>
<body>

<?php
    require('includes/header.php');
    require('includes/navbar-auth.php');

    // next comes content
?>

<?php
/* define variable */
$list = $page->list
?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3 class="text-left">
                <?php echo Utils::escape($list['name']) ?>
            </h3>
            <h5>Categories</h5>
            <p>
                <!--Food, Supermarket-->
            </p>
            <a href="<?php echo $routes['add_item'] . '?id=' . Utils::escape($list['id']) ?>" class="btn btn-t-contrast">+ Add item</a>
            <a href="<?php echo $routes['list_delete'] . '?id=' . Utils::escape($list['id']) ?>" class="btn btn-t-plain">- Delete List</a>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <ul class="list-container lead list-unstyled" id="todolist" data-id="<?php echo $list['id'] ?>">
                <?php while ($item = $page->items->fetchArray(SQLITE3_ASSOC)) { ?>
                <li data-id="<?php echo $item['id'] ?>" <?php echo $item['completed'] == 1 ? 'class="completed"' : '' ?>>
                    <input type="checkbox" <?php echo $item['completed'] == 1 ? 'checked' : '' ?>>
                    &nbsp;
                    <input type="text" value="<?php echo Utils::escape($item['content']) ?>">
                    &nbsp;
                    <a href="#">Remove</a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>

<?php require('includes/scripts.php'); ?>
<script src="static/js/list_view.js" type="text/javascript"></script>
</body>
</html>
