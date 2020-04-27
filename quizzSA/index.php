<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./public/css/index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <div class="header">
            <div class="logo"></div>
            <div class="title">Le plaisir de jouer</div>
        </div>
        <div class="contain">
            <?php
            session_start();
                require_once ('./traitement/fonctions.php');
               
               if(isset($_GET['lien']))//comme lien est une variale d'url on le test avec get
                {
                    //test 
                   switch($_GET['lien']){
                        case "accueil":
                            require_once ('./pages/Admin.php');
                        break;
                        case "jeux":
                            require_once ('./pages/interfaceJoueur.php');
                        break;
                    }
                }else{
                    if(isset($_GET['statut']) && $_GET['statut']==='logout'){
                        deconnexion();
                    }
                    require_once ('./pages/connexion.php');
                }
                
            ?>
        </div>
</body>
</html>