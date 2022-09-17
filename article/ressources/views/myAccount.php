<?php
    $user = $db->prepare('SELECT * FROM users WHERE id=?', array($user_id), 'App\Tables\User', true);
    $image = $db->prepare('SELECT * FROM users_images WHERE user_id=?', array($user_id), 'App\Tables\User', true)
?>

<div class="account">
    <div class="infos">
        <img src="<?= $image->url?>" alt="photo de profil"> <br>
        <a href="#">Changer ma photo de profil</a>
        <p>Nom de profil: <a href="#"><?= $user->username?></a></p>
        <p>Email: <?= $user->email?></p>
    </div>
    <a href="#">Modifier les informations de mon compte</a>
</div>

<?php
    !isset($p) ? require '../../config/error_config.php' : ' ';
?>