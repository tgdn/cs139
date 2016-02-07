<?php

    $page_controller_class = 'Page';
    //require_once('application/core/Main.php');

    require('../includes/doctype.php');
    echo '<head>';
    require('../includes/meta.php');
    require('../includes/static.php');

    // add extra scripts below
?>

    <title>TODO</title>
</head>
<body>

<?php
    require('../includes/header.php');
    require('../includes/navbar.php');

    // next comes content
?>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2 class="text-left">
                    Server Error
                </h2>
                <hr>

            </div>
        </div>
    </div>

<?php require('../includes/scripts.php'); ?>
</body>
</html>
