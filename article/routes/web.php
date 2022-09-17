<?php
    require '../config/error_config.php';
    require '../config/authentification.php';
    
    if(in_array($p, $pages)){
        require '../ressources/views/'.$p.'.php';
    }else{
        require '../ressource/views/home.php';
    }
?>