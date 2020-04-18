<?php
session_start();
if (!isset($_SESSION['prenom'])){
    header("Location: connexion.php");
    exit;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="mini.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include "header.php"
    ?>
    

        <div class="up">
            <div class="h3"> <h3>CREER ET PARAMETRER VOS QUIZZ</h3></div>
           <div class="disconnexion"><a href="deconnexion.php">Déconnexion</a></div> 
        </div>
        <div class=container>
        <div class="big-bloc"> 
            <div class="left">
                        <div class="profil"><img src="icones/img5.jpg"></div>
                    
                        <div class="bloc">
                            <a href="listeQuizz.php">Listes Questions</a>
                            <img src="icones/ic-liste-active.png" alt="liste">
                        </div>
                        <div class="bloc">
                            <a href="compeAdmin.php">Créer Admin</a>
                            <img src="icones/ic-ajout.png" alt="admin">
                        </div>
                        <div class="bloc">
                            <a href="listeJoeurs.php">Listes Joueurs</a>
                            <img src="icones/ic-liste.png" alt="liste">
                        </div>
                        <div class="bloc">
                            <a href="creerQizz.php">Créer Question</a>
                            <img src="icones/ic-ajout-active.png" alt="liste">
                        </div>   
            </div>

            <div class="right">
                <div class="blok">
                        <p>LISTE DES JOUEURS PAR SCORE</p>
                </div>
            <div class="formulaire">
            <table>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Score</th>
                </tr>
                <tr>
                    <td>DIATTA </td>
                    <td>Ibou</td>
                    <td> 1 022 pts</td>
                </tr>
                <tr>
                    <td>NIANG  </td>
                    <td>Aly</td>
                    <td>963 pts</td>
                </tr>
                </tr>
                <tr>
                    <td>DIATTA </td>
                    <td>Ibou</td>
                    <td> 1 022 pts</td>
                </tr>
                <tr>
                    <td>NIANG  </td>
                    <td>Aly</td>
                    <td>963 pts</td>
                </tr>
                <tr>
                    <td>MBAYE  </td>
                    <td>Saliou</td>
                    <td>877pts</td>
                </tr>
                <tr>
                <td>MBAYE  </td>
                    <td>Saliou</td>
                    <td>877pts</td>
                </tr>
                <tr>
                    <td>MBAYE</td>
                    <td>Saliou</td>
                    <td>877pts</td>
                </tr>
                <tr>
                <td>MBAYE</td>
                    <td>Saliou</td>
                    <td>877pts</td>
                </tr>
                <tr>
                    <td>DIATTA </td>
                    <td>Ibou</td>
                    <td> 1 022 pts</td>
                </tr>
                <tr>
                    <td>NIANG  </td>
                    <td>Aly</td>
                    <td>963 pts</td>
                </tr>
                <tr>
                    <td>NIANG  </td>
                    <td>Aly</td>
                    <td>963 pts</td>
                </tr>
                <tr>
                    <td>MBAYE  </td>
                    <td>Saliou</td>
                    <td>877pts</td>
                </tr>
                <tr>
                    <td>MBAYE  </td>
                    <td>Saliou</td>
                    <td>877pts</td>
                </tr>
                <tr>
                <td>MBAYE  </td>
                    <td>Saliou</td>
                    <td>877pts</td>
                </tr>
                <tr>
                    <td>MBAYE</td>
                    <td>Saliou</td>
                    <td>877pts</td>
                </tr>
                <tr>
                <td>MBAYE</td>
                    <td>Saliou</td>
                    <td>877pts</td>
                </tr>
            </table>
            </div>
            

        </div>  
    </div>        
</body>
</html>