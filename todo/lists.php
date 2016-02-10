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

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3 class="text-left">
                Your Lists
            </h3>
            <a href="<?php echo $routes['add_list']; ?>" class="btn btn-t-contrast">+ Add List</a>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <ul class="lead list-unstyled">
                <?php while ($list = $page->lists->fetchArray(SQLITE3_ASSOC)) { ?>
                    <li><a href="<?php echo $routes['list_view'] . '?id=' . Utils::escape($list['id']) ?>"><?php echo Utils::escape($list['name']) ?></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>

<?php require('includes/scripts.php'); ?>
</body>
</html>
