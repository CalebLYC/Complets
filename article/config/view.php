<?php
    if(isset($_GET['p']) && !empty($_GET['p'])){
        $p = htmlspecialchars($_GET['p']);
    }else{
        $p = 'home';
    }
    $pages = ['home', 'article', 'myArticles', 'post', 'myAccount', 'about', 'historique', 'publishers'];
    $free_pages = array('home', 'about');

?>