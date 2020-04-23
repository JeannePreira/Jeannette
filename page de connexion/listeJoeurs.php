<?php
session_start();
if (!isset($_SESSION['prenom'])){
    header("Location: connexion.php");
    exit;
    }

?>

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
                <h4>LISTE DES JOUEURS PAR SCORE</h4>
                <div class="bloc-liste">
                    <?php
                        $js=file_get_contents('page.json');
                        $js=json_decode($js,true);

                        foreach($js as $value){
                            if($value["profil"]="joueur"){
                                $joueur[]=$value;
                            }
                        }

                        $score=[];

                        foreach($joueur as $key=>$value){
                            array_push($score,$value['score']);
                        }

                        array_multisort($score, SORT_DESC, $joueur);

                        foreach($joueur as $key=>$value){

                                ?>
                                <div class="affiche-nom-prenom">
                                <span class="nom-prenom">
                                    <?php echo $value['prenom'];?>
                                    &nbsp;
                                    <?php echo $value['nom'];?>
                                </span>
                                <span class="score-joueur">
                                    <?php echo $value['score'];?>
                                </span>
                                
                                </div>
                        <?php } ?>

            
             </div>
        </div>  
    </div>  

    
    


















    <style>
        body{
    width: initial;
}
.container{
    width: 70%;
    height: 620px;
    margin:0px 0px 0px 200px;
    background-color: #f8fdfd;
    border-radius: 5px 5px 5px 5px;
}
.up{
    width: 70%;
    height: 50px;
    background-color: #51bfd0;
    margin:20px 0px 0px 200px;
}
h3{
   padding-left: 2px;
    color: #f8fdfd;
    position: absolute;
   margin-top: 15px;
   margin-left: 200px;  
}
.disconnexion a{
   
   background-color: #3addd6;
   border-radius: 5px/2px;
   padding: 3px;
   text-decoration: none;
   color:#042425;
}
.disconnexion{
    margin: 15px 0px 10px 700px;
    position: absolute;
 
}
.big-bloc{
    width: initial;
    height: 530px;
    border: #f8fdfd 3px solid;
}
/*menu*/

.left{
    width: 30%;
    height: 300px;
    border-radius: 5px 5px 5px 5px;
     background-color: white; 
     margin: 80px 0px 0px 10px; 
     float: left;   
   
}
.profil {
    width: initial;
    height: 110px;
    background-color:  #51bfd0;
    border-radius: 5px 5px 0px 0px;
}
.profil img{
    width: initial;
    height: 40px;
    margin: 10px 0px 0px 20px;
    border: #e56945 1px solid;   
    border-radius: 80px;
    padding: 3px;
    float: left;  
}
.bloc{
    width: initial;
    height: 30px;
    margin: 5px 0px 5px 5px;
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
.right{
    width: 60%;
    height: 550px;
    float: right; 
    margin-right: 50px;
    background-color: white; 
    border-radius: 5px 5px 5px 5px;
}
h4{
    color:gray;
    position:relative;
    left:100px;
}
.bloc-liste{
    width:initial;
    border:1px solid blue;
    position:relative;
    top:10px;
    border-radius: 15px/35px;
}
.affiche-nom-prenom{
    position:relative;
   left:25px;
   
}


.score-joueur{
    float:right;
    position:relative;
   right:45px;
}

    </style>
