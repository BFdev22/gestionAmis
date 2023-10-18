<?php global $base_url; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Amis - <?= $titre ?></title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="<?= $base_url ?>">Accueil</a></li>
                <?php if ($GLOBALS['isConnected']) { ?>
                    <li><a href="<?= $base_url ?>?page=logout">Logout</a></li>
                <?php } else { ?>
                    <li><a href="<?= $base_url ?>?page=login">Login</a></li>
                    <li><a href="<?= $base_url ?>?page=register">Register</a></li>
                <?php } ?>
            </ul>
            <?php if ($GLOBALS['isConnected']) { ?>
                <p>Bonjour <?= $_SESSION["user"]["username"] ?></p>
            <?php } ?>
        </nav>
    </header>
    <main>
        <h1><?= $titre ?></h1>
        <div class="content">

            <?= $content ?>
        </div>
    </main>
</body>

</html>