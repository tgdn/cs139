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
                Delete list <b><?php echo Utils::escape($list['name']) ?></b> ?
            </h3>
            <form method="post" action="">
                <input type="submit" class="btn btn-t-contrast" value="Yes">
                <a href="<?php echo $routes['list_view'] . '?id=' . Utils::escape($list['id']) ?>" class="btn btn-t-plain">Cancel</a>
            </form>
            <hr>
        </div>
    </div>
</div>

<?php require('includes/scripts.php'); ?>
</body>
</html>
