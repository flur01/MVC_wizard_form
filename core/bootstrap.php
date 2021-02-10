<?php


use Core\{View, App};


App::bind('config', require 'config.php');

if (!App::get('config')['viewDir']) {
    App::add('config', 'viewDir', '../views/');
}

function view () {
    $view = new View(App::get('config')['viewDir']);
    return $view;
}

function redirect ($path) {
    header("Location: /{$path}");
}
