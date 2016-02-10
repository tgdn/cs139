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
            <a href="add_item.html" class="btn btn-t-contrast">+ Add item</a>
            <a href="<?php echo $routes['list_delete'] . '?id=' . Utils::escape($list['id']) ?>" class="btn btn-t-plain">- Delete List</a>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <ul class="list-container lead list-unstyled">
                <!--
                <li>
                    <input type="checkbox">
                    &nbsp;
                    <input type="text" value="Bread">
                    &nbsp;
                    <a href="#">Remove</a>
                </li>
                <li>
                    <input type="checkbox">
                    &nbsp;
                    <input type="text" value="Chocolate">
                    &nbsp;
                    <a href="#">Remove</a>
                </li>
                <li>
                    <input type="checkbox">
                    &nbsp;
                    <input type="text" value="Butter">
                    &nbsp;
                    <a href="#">Remove</a>
                </li>
                <li>
                    <input type="checkbox">
                    &nbsp;
                    <input type="text" value="Tomatoes">
                    &nbsp;
                    <a href="#">Remove</a>
                </li>
                <li>
                    <input type="checkbox">
                    &nbsp;
                    <input type="text" value="Apples">
                    &nbsp;
                    <a href="#">Remove</a>
                </li>
                <li>
                    <input type="checkbox">
                    &nbsp;
                    <input type="text" value="Peanuts">
                    &nbsp;
                    <a href="#">Remove</a>
                </li>
                <li>
                    <input type="checkbox">
                    &nbsp;
                    <input type="text" value="Courgettes">
                    &nbsp;
                    <a href="#">Remove</a>
                </li>-->
            </ul>
        </div>
    </div>
</div>

<?php require('includes/scripts.php'); ?>
</body>
</html>
