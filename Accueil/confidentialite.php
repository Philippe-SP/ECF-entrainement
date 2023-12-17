<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S.Nutrition</title>
    <link rel="stylesheet" href="styleConfidentialite.css">
</head>
<body>
    <div id="nav">
        <img src="../logo.png" width="140px" height="140px">
        <h1>Sandrine nutrition</h1>
        <div id="nav-link">
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="../Recettes/recettes.php">Recettes</a></li>
                <li><a href="contact.php">Contact</a></li>
                <?php if(isset($_SESSION['nom']) && $_SESSION['role'] === 2): ?>
                    <li><a href="admin.php">Admin</a></li>
                <?php endif; ?>
            </ul>
        </div>
        <?php if(!isset($_SESSION['nom'])):?>
        <div class="connexion">
            <a href="../Connexion/connexion.php">Connexion</a>
        </div>
        <?php else: ?>
            <div class="connexion">
            <a href="../Connexion/connexion.php?logout=1">Déconnexion</a>
        </div>
        <?php endif; ?> 
        <div id="icons"></div>
    </div>
    <div class="header">
        <div class="confi">
            <h1>Politique de confidentialité</h1>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                Pharetra convallis posuere morbi leo. Ac tortor vitae purus faucibus ornare suspendisse sed nisi. Morbi blandit cursus 
                risus at ultrices mi tempus imperdiet nulla. Vel fringilla est ullamcorper eget nulla. Non consectetur a erat nam at 
                lectus. Vulputate mi sit amet mauris commodo. Faucibus nisl tincidunt eget nullam non nisi est sit amet. Tellus mauris 
                a diam maecenas. In metus vulputate eu scelerisque felis imperdiet. At elementum eu facilisis sed odio morbi.
                Turpis egestas maecenas pharetra convallis posuere morbi leo urna. Id diam vel quam elementum pulvinar etiam non quam 
                lacus. Urna porttitor rhoncus dolor purus non enim. At consectetur lorem donec massa sapien. Fringilla urna porttitor 
                rhoncus dolor purus non. Vestibulum sed arcu non odio euismod lacinia. Adipiscing elit pellentesque habitant morbi 
                tristique senectus et netus et. Consectetur adipiscing elit ut aliquam purus sit amet luctus. At elementum eu facilisis 
                sed odio. Morbi leo urna molestie at.
            </p>
            <p>
                Nunc mattis enim ut tellus elementum sagittis vitae. Malesuada nunc vel risus commodo viverra maecenas. Interdum varius 
                sit amet mattis vulputate. Et malesuada fames ac turpis egestas maecenas. Amet nisl purus in mollis nunc sed id semper. 
                Sed risus pretium quam vulputate dignissim suspendisse. Semper eget duis at tellus at urna condimentum mattis. Tempor orci 
                dapibus ultrices in iaculis nunc sed augue. Id semper risus in hendrerit gravida rutrum quisque non. In fermentum posuere 
                urna nec tincidunt. Eu feugiat pretium nibh ipsum consequat nisl. Velit aliquet sagittis id consectetur. In pellentesque 
                massa placerat duis ultricies lacus sed turpis. Ipsum faucibus vitae aliquet nec ullamcorper sit.
                Suspendisse ultrices gravida dictum fusce ut placerat. Malesuada fames ac turpis egestas maecenas. Ipsum consequat nisl 
                vel pretium lectus quam id leo in. Lorem donec massa sapien faucibus et molestie ac. Curabitur vitae nunc sed velit 
                dignissim sodales ut eu. Aenean sed adipiscing diam donec adipiscing tristique risus. Ultricies lacus sed turpis tincidunt 
                id. Aliquam etiam erat velit scelerisque in dictum non consectetur. Tellus in hac habitasse platea. Duis tristique 
                sollicitudin nibh sit amet commodo nulla. Amet facilisis magna etiam tempor orci eu lobortis. Sit amet risus nullam 
                eget felis eget. Ipsum a arcu cursus vitae congue mauris. Vel orci porta non pulvinar neque laoreet suspendisse interdum. 
                Arcu dui vivamus arcu felis. Sem integer vitae justo eget magna. Libero id faucibus nisl tincidunt. Rhoncus mattis rhoncus 
                urna neque viverra.
            </p>
            <p>
                Egestas quis ipsum suspendisse ultrices gravida. Fermentum posuere urna nec tincidunt praesent. Eget gravida cum sociis 
                natoque penatibus et. Neque egestas congue quisque egestas diam. Enim nunc faucibus a pellentesque sit amet porttitor eget. 
                Nisi quis eleifend quam adipiscing vitae proin sagittis nisl. Dolor sit amet consectetur adipiscing elit ut. Accumsan lacus 
                vel facilisis volutpat est velit egestas. Elit at imperdiet dui accumsan sit. Sit amet porttitor eget dolor morbi. Tincidunt 
                tortor aliquam nulla facilisi cras fermentum odio eu feugiat. Turpis massa tincidunt dui ut.
                Adipiscing elit duis tristique sollicitudin nibh. Sollicitudin nibh sit amet commodo nulla. Commodo nulla facilisi nullam 
                vehicula ipsum a. Diam donec adipiscing tristique risus. Sagittis eu volutpat odio facilisis mauris sit amet massa vitae. 
                Consequat nisl vel pretium lectus quam id leo in vitae. Nisl nunc mi ipsum faucibus vitae aliquet nec. Ornare lectus sit 
                amet est placerat.
            </p>
        </div>
    </div>
    <div class="footer">
        <ul>
            <li><a href="index.php">Acceuil</a></li>
            <li><a href="../Recettes/recettes.php">Recettes</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="mentionLegale.php">Mentions légales</a></li>
            <li><a href="confidentialite.php">Politique de confidentialité</a></li>
        </ul>
        <ul>
            <li><a href="#" class="gg-instagram"></a></li>
            <li><a href="#" class="gg-facebook"></a></li>
            <li><a href="#" class="gg-twitter"></a></li>
        </ul>
        <p>© Copyright 2023P.Pinheiro</p>
    </div>
    <script src="script.js"></script>
</body>
</html>