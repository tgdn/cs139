<?php
    $page_controller_class = ucfirst(basename(__FILE__, '.php')) . 'Page';
    require_once 'application/core/Main.php';
?>

<?php require('includes/doctype.php'); ?>
<?php require('includes/meta.php'); ?>
<?php require('includes/static.php'); ?>
<?php /* add extra scripts below */ ?>

<title>TODO - Register</title>
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
                    Register
                </h3>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <form action="" method="post">
                    <div class="form-group form-group-lg">
                        <label for="id_username" class="control-label">Username</label>
                        <input autocomplete="off" class="form-control" id="id_username" name="username" maxlength="50" value="" placeholder="Username" type="text">
                    </div>
                    <div class="form-group form-group-lg">
                        <label for="id_email" class="control-label">Email</label>
                        <input autocomplete="off" class="form-control" id="id_email" name="email" maxlength="50" value="" placeholder="Email" type="email">
                    </div>
                    <div class="form-group form-group-lg">
                        <label for="id_fn" class="control-label">Full Name</label>
                        <input autocomplete="off" class="form-control" id="id_fn" name="fn" maxlength="100" value="" placeholder="Full name" type="text">
                    </div>
                    <div class="form-group form-group-lg">
                        <label for="id_passsword" class="control-label">Password</label>
                        <input autocomplete="off" class="form-control" id="id_password" name="password" placeholder="Password" type="password">
                    </div>

                    <?php foreach ($page->register_errors as $error) { ?>
                    <div class="form-group has-error">
                        <span class="help-block"><?php echo $error ?></span>
                    </div>
                    <?php } ?>

                    <div class="form-group form-group-lg">
                        <input type="submit" class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 btn btn-lg btn-t-default" value="Register">
                        <div class="clear"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php require('includes/scripts.php'); ?>
</body>
</html>
