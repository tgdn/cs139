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
    require('includes/navbar.php');

    // next comes content
?>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3 class="text-left">
                    <strong>TODO</strong>, an app that puts you in control of what you need to do.
                </h3>
                <hr>
                <p class="lead text-justify">
                    <a href="<?php echo Utils::url('register'); ?>">Register now</a>, and never forget your tasks.
                </p>
                <p class="lead text-justify">
                    Already have an account? Log In below.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <form action="" method="post" name="login-form">
                    <!-- <?php echo $csrf_token_input; ?> -->
                    <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
                    <?php echo var_dump($_SESSION) ?>

                    <div class="form-group form-group-lg">
                        <label for="id_username" class="control-label">Email</label>
                        <input autocomplete="off" class="form-control" id="id_username" name="username" maxlength="50" value="" placeholder="Username or email" type="text">
                    </div>
                    <div class="form-group form-group-lg">
                        <label for="id_password" class="control-label">Password</label>
                        <input autocomplete="off" class="form-control" id="id_password" name="password" placeholder="Password" type="password">
                    </div>

                    <div class="form-group form-group-lg">
                        <p class="help-block">
                            <a href="forgot_password.html">Forgot password?</a>
                        </p>
                    </div>
                    <div class="form-group form-group-lg">
                        <input type="submit" class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 btn btn-lg btn-t-plain" value="Enter">
                        <div class="clear"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php require('includes/scripts.php'); ?>
</body>
</html>
