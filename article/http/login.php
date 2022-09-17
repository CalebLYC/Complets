<?php

use App\Autoloader;
use App\Database;
use App\HTTP\Ajax;
use App\Login;
session_start();

    //Autoloading
    require '../app/Autoloader.php';
    Autoloader::register();

    $ajax = new Ajax($_POST);
    $result = ' ';

    if($user = new Login($_POST)){
        if(!$user->isEmpty()){
            if($user->login()){
                $ajax->setMsg($user->error);
                $ajax->setSuccess(true);
                $_SESSION['username'] = $user->username;
                $_SESSION['id'] = $user->id;
                //header('location: ../public/index.php?p=home');
                $result = (new Database('projetarticle'))->query('SELECT * FROM users', 'App\Tables\User');
            }
            else{
                $ajax->setMsg($user->error);
            }
        } else{
            $ajax->setMsg($user->error);
        }
    }else{
        $ajax->setMsg($user->error);
    }

    $ajax->answer($result);
    
?>