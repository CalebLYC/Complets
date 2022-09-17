<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= in_array($p, $pages)? $p : 'home';?></title>

    <link rel="stylesheet" href="css/ajax.css">
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="css/connexion.css">

    <link rel="stylesheet" href="css/<?= in_array($p, $pages)? $p : 'home';?>.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../ressources/js/jquery-3.6.1.min.js"></script>
</head>

<body>
    <header>
        <nav>
            <div class="logo"><a href="#">UpArticle</a></div>
            <div class="menu show" hidden>
                <a href="index.php?p=home" class="<?= $p=='home' ? 'active' : ''; ?>">Home</a>
                <a href="index.php?p=post" class="<?= $p=='post' ? 'active' : ''; ?>">Publier un article</a>
                <a href="index.php?p=myArticles" class="<?= $p=='myArticles' ? 'active' : ''; ?>">Mes articles</a>
                <a href="index.php?p=myAccount" class="<?= $p=='myAccount' ? 'active' : ''; ?>">Mon compte</a>
                <a href="index.php?p=about" class="<?= $p=='about' ? 'active' : ''; ?>">A propos</a>
            </div>
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <button class="btnForm" id="displayForm">Se connecter</button>
            <a href="../config/deconnexion.php">
                <button class="btnForm" id="displayDisconnect">Deconnexion</button>
            </a>
        </nav>
    </header>

    <div class="container">
        <section class="sidebar">
            <nav>
                <a href="index.php?p=post">Publier</a>
                <a href="index.php?p=myArticles">Mes articles</a>
                <a href="index.php?p=historique">Historique</a>
                <a href="index.php?p=publishers">Suivre un publicateur</a>
            </nav>
            <button id="nightModeButton">Mode nuit</button>
            <input type="search" placeholder="Recherche..." name="search" id="search">
            <input type="submit" name="submit" id="submit" value="Go">
        </section>

        <?= $content;?>

    </div>

    <footer>
        Lorem ipsum dolor sit, <a href="#">amet consectetur adipisicing elit</a>. Nisi minima pariatur suscipit. Libero enim ea nesciunt assumenda provident, iste nulla aut laboriosam iusto. Numquam totam possimus natus incidunt eius. Fugiat.
    </footer>

    <script src="js/layout.js"></script>
    <script src="js/connexion.js"></script>
    <script src="js/ajax.js"></script>
    <script src="js/<?= in_array($p, $pages)? $p : 'home';?>.js"></script>
    <?php
        if(isset($_SESSION['username'])){?>
            <script src="js/session.js"></script><?php
        }else{?>
            <script src="js/deconnexion.js"></script><?php
        }
    ?>
</body>

</html>