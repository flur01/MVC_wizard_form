<?php

namespace Core;

use \Twig\Loader\FilesystemLoader as FilesystemLoader;
use \Twig\Environment as Environment;

class View extends FilesystemLoader
{

    
    public function render($file, $data = [])
    {
        $twig = new Environment($this);
        $file = $file.'.view.html';
        echo $twig->render($file, $data);
    }
}