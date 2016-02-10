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
                Create List
            </h3>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <form action="" method="post">
                <div class="form-group form-group-lg">
                    <label for="id_name" class="control-label">Name</label>
                    <input autocomplete="off" class="form-control" id="id_name" name="name" maxlength="50" value="" placeholder="Name" type="text">
                </div>
                <!--
                <div class="form-group form-group-lg">
                    <label class="control-label">Categories </label>
                    <div>
                        <ul class="list-unstyled col-sm-offset-1">
                            <li><input type="checkbox"> <label>Food</label></li>
                            <li><input type="checkbox"> <label>Supermarket</label></li>
                            <li><input type="checkbox"> <label>Work</label></li>
                            <li><input type="checkbox"> <label>Home</label></li>
                        </ul>
                    </div>
                </div>
                -->

                <div class="form-group form-group-lg">
                    <input type="submit" class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 btn btn-lg btn-t-plain" value="Create">
                    <div class="clear"></div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require('includes/scripts.php'); ?>
</body>
</html>
