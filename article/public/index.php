<?php

use App\Autoloader;
use App\Database;
use App\Tables\Article;
use App\Tables\Image;
session_start();

    require '../config/view.php';

    //Autoloading
    require '../app/Autoloader.php';
    Autoloader::register();

    //Initialisation des objets
    $db = new Database('projetarticle');

    ob_start();
    require '../routes/web.php';
    $content = ob_get_clean();

    require '../Template/layout.php';
?>