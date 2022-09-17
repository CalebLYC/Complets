<?php

use App\Database;

    session_start();
    $_SESSION = array();
    session_destroy();
    //(new Database('projetarticle'))->prepare('UPDATE deconnexions SET disconnect_date=? WHERE user_id=?', array(date('d-m-y h:i:s'), $_SESSION['id']), true);
    header('location: ../public/');
?>