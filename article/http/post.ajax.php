<?php

use App\Article;
use App\Autoloader;
use App\Database;
use App\HTTP\Ajax;
use App\Tables\Image;

    //Autoloading
    require '../app/Autoloader.php';
    Autoloader::register();

    $ajax = new Ajax($_POST);
    $result = ' ';
    if(
        isset($_POST['title']) && isset($_POST['category']) && isset($_POST['content']) && isset($_FILES['image'])
    ){
        if(
            !empty($_POST['title']) && !empty($_POST['category']) && !empty($_POST['content']) && !empty($_FILES['image'])
        ){
            $article = new Article($_POST, 'projetarticle');

            $image = new Image($_FILES['image'], 'projetarticle', 'articles_images');
            $image->setDestination('../uploads/articles_images/');
            $image->verify('article');
            echo $image->insert();

            echo $article->insert($image->getId());

            $ajax->setMsg('Publication effectuée avec succès');
            $ajax->setSuccess(true);
            header('location: ../public/index.php?p=myArticles');
        }else{
            $ajax->setMsg('Champs vides');
        }   
    }

    $ajax->answer($result);
?>