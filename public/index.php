<?php

set_include_path('..');

session_start();

require('vendor/autoload.php');

require('core/bootstrap.php');

use Core\Router;

use Core\Request;

Router::load('routes.php') 
        
        ->direct(Request::uri(), Request::method());
