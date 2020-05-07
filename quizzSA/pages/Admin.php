<?php
is_connect();
//afficher les infos du joeur connecté
    $nom=$_SESSION['user']['nom'];
    $prenom=$_SESSION['user']['prenom'];
    $photo= $_SESSION['user']['photo'];
?>

    <div class="text">
        <div class="text-titre"><h3>CREER ET PARAMETRER VOS QUIZZ</h3></div>
        <div class="text-disconnexion"><a href="index.php/statut=logout">Déconnexion</a></div> 
    </div>
    
    

    <div class=bloc_body_admin>

            <div class="left">
                        <div class="profil">
                            <img src="<?=$photo ?>" alt="logo" class="image">
                            <p class="name-user"><?php echo $nom.'<br>'.$prenom;?></p>
                        </div>
                    
                        <div class="bloc">

                            <a href="index.php?lien=accueil&menu=listeQuizz&fenetre=1">Listes Questions</a>
                            <img src="./public/icones/ic-liste-active.png" alt="liste">

                        </div>
                        <div class="bloc">

                            <a href="index.php?lien=accueil&menu=inscription">Créer Admin</a>
                            <img src="./public/icones/ic-ajout.png" alt="admin">

                        </div>
                        <div class="bloc">

                            <a href="index.php?lien=accueil&menu=listeJoueurs&page=1">Listes Joueurs</a>
                            <img src="./public/icones/ic-liste.png" alt="liste">

                        </div>
                        <div class="bloc">
                            <a href="index.php?lien=accueil&menu=creerQuizz">Créer Question</a>
                            <img src="./public/icones/ic-ajout.png" alt="liste">
                        </div>  
                        <div class="bloc">

                            <a href="index.php?lien=accueil&menu=dashboard">Dashboard</a>
                            <img src="./public/icones/ic-liste-active.png" alt="liste">

                        </div> 
            </div>

            <div class="right">
            <?php
            if (isset($_GET['menu'])){
                if ($_GET['menu']=='listeQuizz'){
                    require_once("listeQuizz.php");
                }elseif($_GET['menu']=='inscription'){
                    require_once("inscription.php");
                }elseif($_GET['menu']=='listeJoueurs'){
                    require_once("listeJoueurs.php");
                }elseif($_GET['menu']=='creerQuizz'){
                    require_once("creerQuizz.php");
                }elseif($_GET['menu']=='dashboard'){
                    require_once("dashboard.php");
                }
                       
            }else{
                require_once('./pages/Admin.php');
            }
        ?>
            </div>
    </div>        


    

<style>
       
.text{
    width: 90.4%;
    height: 20px;
    background-color: #51bfd0;
    position: relative;
    top:5px;
    left: 40px;
}
.text-titre{
    width: 70%;
    padding-left: 2px;
    color: #f8fdfd;
    position: relative;
    bottom:35px;
    left: 200px;  
}
.text-disconnexion{
    width: 15%;
    position: relative;
    bottom: 95px;
    left: 900px;
    right:10px;
   background-color: #3addd6;
   border-radius: 3px;
}
.text-disconnexion a{
    margin-left:10px;
   text-decoration: none;
   color:white
  
}
.bloc_body_admin{
    width: 93.5%;
    height: 500px;
    background-color: #f8fdfd;
    border-radius: 0px 0px 5px 5px;
    position:relative;
    top:5.1px;
    left: 40px;
}

/*menu*/

.left{
    width: 30%;
    height: 360px;
    border-radius: 5px 5px 5px 5px;
     background-color: white; 
     position:absolute;
     top:80px;
     left:10px; 
     float: left;   
   
}
.profil {
    width: initial;
    height: 110px;
    background-color:  #51bfd0;
    border-radius: 5px 5px 0px 0px;
    position:relative;
     bottom:13px;
}
.image{
    width: initial;
    height: 80px;
    margin: 10px 0px 0px 20px;
    border: #e56945 1px solid;   
    border-radius: 200px;
    padding: 3px;
    float: left;  
}
.name-user{
    position:relative;
    top:20px;
    left:25px;
}
.bloc{
    width: initial;
    height: 30px;
    margin: 0px 0px 5px 5px;
    padding: 6px;
}
.bloc a{
    text-decoration: none;
    color: black;
    padding-left: 2px;
    float: left; 
    font-size: 20px;  
}
 .bloc img{
    width: 10%;
    height: 25px;
    margin-left: 50px;
    float: right;
}
.bloc:hover{
    border-left: 3px solid green;
}

/*affichage*/
.right{
    width: 60%;
    height: 480px;
    float: right; 
    margin-right: 50px;
    background-color: white; 
    border-radius: 5px 5px 5px 5px;
}

