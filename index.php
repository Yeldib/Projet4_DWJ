<?php session_start();

// Autoloader
spl_autoload_register(function ($class) {
    $files = [
        "controller/$class.php",
        "model/$class.php",
        "services/$class.php"
    ];

    foreach ($files as $file) {
        if (file_exists($file)) {
            require_once $file;
        }
    }
});

// On instancie le(s) controller(s) 
$frontend = new FrontendController;
$backend = new BackendController;

if (isset($_GET['action'])) {

    if ($_GET['action'] == 'home') {
        $frontend->home();
    } elseif ($_GET['action'] == 'single') {
        $frontend->single();
    } elseif ($_GET['action'] == 'register') {
        $frontend->register();
    } elseif ($_GET['action'] == 'connexion') {
        $frontend->connexion();
    } elseif ($_GET['action'] == 'biography') {
        $frontend->biography();
    } elseif ($_GET['action'] == 'contact-webmaster') {
        $frontend->contactDev();
    } elseif ($_GET['action'] == 'contact-auteur') {
        $frontend->contactAuthor();
    } elseif ($_GET['action'] == 'panel') {
        $backend->panel();
    } elseif ($_GET['action'] == 'create') {
        $backend->create();
    } elseif ($_GET['action'] == 'update') {
        $backend->update();
    } else {
        $frontend->error404();
    }
} else {
    $frontend->home();
}
