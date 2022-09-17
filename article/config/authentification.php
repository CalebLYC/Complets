<?php
    if(in_array($p, $free_pages)){
        require '../ressources/views/connexion.php';
    }else{
        if($_SESSION['username']){
            $user_id = $_SESSION['id'];
        }else{
            header('location: index.php?p=home');
        }
    }
?>