<section class="articles">
<?php
 foreach($db->prepare('SELECT * FROM articles WHERE user_id=?', array($user_id), 'App\Tables\Article') as $article):
    $image = $db->prepare('SELECT * FROM articles_images WHERE id=?', array($article->image_id), 'App\Tables\Article', true);
 ?>
        <article class="article">
            <div class="article-title"><a href="<?= $article->url?>"><?= $article->title?></a></div>
            <div class="article-image"><img src="<?= $image->url?>" alt="image de l'article" width="300" height="300"></div>
            <div class="article-extrait">
                <?= $article->extrait?>
            </div>
            <div class="article-references"><a href="#">Aimé par 48 personnes</a></div>
            <div class="article-bottom">
                <a href="<?= $article->url?>" class="article-link">Voir plus</a>
                <a href="#" class="article-link article-update">Modifier</a>
                <a href="#" class="article-link article-delete">Supprimer</a>
            </div>
        </article>
    <?php endforeach?>
</section>

<?php
    !isset($p) ? require '../../config/error_config.php' : ' ';
?>