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
                            <a href="inscription.php">Créer Admin</a>
                            <img src="icones/ic-ajout.png" alt="admin">
                        </div>
                        <div class="bloc">
                            <a href="listeJoeurs.php">Listes Joueurs</a>
                            <img src="icones/ic-liste.png" alt="liste">
                        </div>
                        <div class="bloc">
                            <a href="creerQizz.php">Créer Question</a>
                            <img src="icones/ic-ajout.png" alt="liste">
                        </div>   
            </div>

            <div class="right">
                <div class="blok">
                        <label for="nbrPoint">Nbr de Points</label>
                        <select>
                            <?php
                            for ($i = 1; $i <= 100; $i++) {
                            ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php
                            }?>
                        </select>
                        <input type="button" value="ok">
                </div>
            <div class="formulaire">
            <form  method="POST" action= "" name="quiz" >
                <ol>
                    <li>			
                            <p>Les langages Web: 
                                <ul>
                                    <li>
                                        <input type="checkbox" name="question1"  >HTML
                                    </li>
                                    <li>
                                        <input type="checkbox" name="question1" >R
                                    </li>
                                    <li>
                                        <input type="checkbox" name="question1" >JAVA
                                    </li>
                                </ul>
                            </p>
                    </li>
                    <li>			
                        <p>D'où vient le Corona: <br>
                            <ul>
                                <li>
                                    <input type="radio" name="question2">Chine
                                </li>
                                <li>
                                    <input type="radio" name="question2" >Italie
                                </li>
                                
                            </ul>				    	
                        </p>
                    </li>

                    <li>			
                        <p>Quel terme définit langage qui s’adapte sur Androïd et sur Ios? <br>
                            <ul>
                                <li>
                                    <input type="text" name="question2" >
                                </li>
                                
                            </ul>				    	
                        </p>
                    </li>

                    <li>			
                        <p>Quelle est la première école de codage gratuite au Sénégal? <br>
                            
                            <ul>
                                <li>
                                    <input type="radio" name="question2" >Symplon
                                </li>
                                <li>
                                    <input type="radio" name="question2" >Orange Digital Center
                                </li>
                                
                            </ul>				    	
                        </p>
                    </li>

                    <li>			
                        <p>Les précurseurs de la révolution digitale <br>
                            
                            <ul>
                                <li>
                                    <input type="radio" name="question2" value="faim">GAFAM
                                </li>
                                <li>
                                    <input type="radio" name="question2" value="peur">CIA-FBI
                                </li>
                                
                            </ul>				    	
                        </p>
                    </li>

                </ol>
            </form>
            <button id="validation">Suivant</button>
            </div>
            

        </div>  
    </div>        
</body>
</html>