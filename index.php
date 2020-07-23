<?php
// Routeur principal
session_start();

// Autoloader
spl_autoload_register(function ($class) {
    $files = ["controller/$class.php", "model/$class.php"];

    foreach ($files as $file) {
        if (file_exists($file)) {
            require_once $file;
        }
    }
});

// On instancie le(s) controller(s)
$frontend = new FrontendController;

if (isset($_GET['action'])) {
    if (isset($_GET['action']) == 'home') {
        $frontend->home();
    }
    // elseif (isset($_GET['action']) == 'single') {
    //     $frontend->single();
    // }
} else {
    $frontend->home();
}
