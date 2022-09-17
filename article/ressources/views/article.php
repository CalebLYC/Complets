<?php
    !isset($p) ? require '../../config/error_config.php' : ' ';

    if(isset($_GET['id']) && !empty($_GET['id'])){
        $article_id = $_GET['id'];
    }else{
        header('location: index.php?p=home');
    }
    $article = $db->prepare('SELECT * FROM articles WHERE id=?', [$article_id], 'App\Tables\Article', true);
    $image = $db->prepare('SELECT * FROM articles_images WHERE id=?', array($article->image_id), 'App\Tables\Article', true);
    $user = $db->prepare('SELECT * FROM users WHERE id=?', array($user_id), 'App\Tables\User', true);
    $user_image = $db->prepare('SELECT * FROM users_images WHERE user_id=?', array($user_id), 'App\Tables\User', true)
?>

<article class="article">
    <div class="article-title"><?= $article->title?></div>
    <div class="article-author">
        Auteur :<a href="#"><?= $user->username?></a>
        <img src="<?= $user_image->url?>" alt="Auteur" width="50" height="50">
    </div>
    <div class="article-image"><img src="<?= $image->url?>" alt="<?= $image->name?>" width="700" height="700"></div>
    <div class="article-body">
        <?= $article->content?>
    </div>
    <div class="article-references">
        <a href="#">Aimé par 48 personnes</a>
        <div class="like">Avez-vous aimé cet article? <button class="btn" id="like-btn">Oui</button> <button class="btn" id="dislike-btn">Non</button></div>
        <a href="#">Suivre l'auteur de cet article</a>
    </div>
</article>