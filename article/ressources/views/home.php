<section class="articles">
    <h2 class="articles-title"><a href="#">Fil d'actualité</a></h2>
    <?php foreach($db->query('SELECT * FROM articles', 'App\Tables\Article') as $article): ?>
        <article class="article">
            <h2 class="article-title"><a href="<?= $article->url?>"><?= $article->title?></a></h2>
            <div class="article-extrait"><?= $article->extrait; ?></div>
            <a href="<?= $article->url?>" class="article-link">Voir plus</a>
        </article>
        <hr>
        <hr>    
    <?php endforeach ?>
</section>

<?php
    !isset($p) ? require '../../config/error_config.php' : ' ';
?>