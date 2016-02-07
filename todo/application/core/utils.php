<?php
spl_autoload_register(function ($classname) {
    $req_file = 'application/controllers/' . $classname . '.php';

    if (!file_exists($req_file)) {
        $req_file = 'application/models/' . $classname . '.php';

        if (!file_exists($req_file)) {
            $req_file = 'application/core/' . $classname . '.php';
            
            if (!file_exists($req_file)) {
                throw new Exception('Could not load ' . $classname);
            }
        }
    }

    require_once($req_file);
});

?>
