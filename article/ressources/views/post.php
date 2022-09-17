<div class="post">
    <h1>Publier un nouvel article</h1>
    <form action="../http/post.ajax.php" method="POST" enctype="multipart/form-data" id="post-form">
        <div class="post-title post-item">
            <label for="title">Titre de l'article</label>
            <input type="text" name="title" id="title">
        </div>
        <div class="post-description post-item">
            <label for="description">Categorie</label>
            <input type="text" name="category" id="category">
        </div>
        <hr>

        <textarea name="content" id="content" cols="30" rows="10"></textarea>
        <hr>


        <div class="post-img post-item">
            <div class="imageContainer"></div>
            <p id="post-image-link"><a href="#">Ajouter une image</a></p>
            <input type="file" name="image" id="choose-image" hidden>
        </div>
        <hr>
        <input type="submit" name="submit" id="submit" value="Publier">
    </form>
</div>

<?php
    !isset($p) ? require '../../config/error_config.php' : ' ';
?>