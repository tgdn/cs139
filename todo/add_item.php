<?php
    $page_controller_class = ucfirst(basename(__FILE__, '.php')) . 'Page';
    require_once 'application/core/Main.php';
?>

<?php if (!$page->is_json): ?>

<?php require('includes/doctype.php'); ?>
<?php require('includes/meta.php'); ?>
<?php require('includes/static.php'); ?>
<?php /* add extra scripts below */ ?>

<title>TODO - Add item</title>
</head>
<body>

<?php
    require('includes/header.php');
    require('includes/navbar.php');

    // next comes content
?>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3 class="text-left">
                    Create Item
                </h3>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <form action="" method="post" id="create-form">
                    <div class="form-group form-group-lg">
                        <label for="id_content" class="control-label">Content</label>
                        <input autocomplete="off" class="form-control" id="id_content" name="content" maxlength="100" value="" placeholder="Content" type="text">
                    </div>

                    <div class="form-group form-group-lg">
                        <input type="submit" class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 btn btn-lg btn-t-plain" value="Create">
                        <div class="clear"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php require('includes/scripts.php'); ?>
<script src="static/js/create-form.js" type="text/javascript"></script>
</body>
</html>
<?php endif; ?>
