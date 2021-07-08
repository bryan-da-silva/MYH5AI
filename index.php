<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="script.js"></script>
    <title>MY H5AI</title>
</head>
<body>
    <header>
        <nav class='inline'>
            <img src="./assets/search.png" width="50px" height="50px" class='search'>
            <form action="#" method="GET" class='inline' style="display: none;">
                <input type='search' name='search'>
            </form>
            <ul class='inline'>
                <li class='inline content'></li>
            </ul>
        </nav>
    </header>
    <main>
        <?php isset($_GET['search']) && !empty($_GET['search']) ? $actually = $_GET['search'] : $actually = "."; ?>
        <article class='arbre'>
            <?php include_once('traitement.php');
                $h5ai = new H5AI;
                $h5ai->Scan_Repertoire_Recursive($actually, 0);   
            ?>
        </article>
        <article class="donnee">
            <div class='result name'>
                <div class="Nom">Nom<img src='./assets/haut.png' width="20px" height="40px" class="haut"></div>
                <div class="right">Dernière modification</div>
                <div class="right Taille">Taille</div>
                <div class="padding"><img src='./assets/gauche.png' width="40px" height="20px" class="gauche"><span class="dossierActuelle">h5ai</span></div>
            </div>
            <?php include_once('traitement.php');
                $h5ai = new H5AI;
                $h5ai->Scan_Repertoire_Recursive($actually, 1);   
            ?>
        </article>
    </main>
</body>
</html>