<?php
is_connect();
//afficher les infos du joeur connecté
    $nom=$_SESSION['user']['nom'];
    $prenom=$_SESSION['user']['prenom'];
    $photo= $_SESSION['user']['photo'];

?>
    <div class="up-play">
        <div class="profil">
            <img src="<?=$photo ?>" alt="logo">
            <p class="name"><?php echo $nom.' '.$prenom;?></p>
        </div>
        
        <div class="up-play-titre1"> <h3>BIENVENUE SUR LA PLATEFORME DE JEU DE QUIZZ</h3></div>
        <div class="up-play-titre2"> <h3>JOUER ET TESTER VOTRE NIVEAU DE CULTURE GÉNÉRALE</h3></div>
        <div class="up-play-disconnexion"><a href="index.php/statut=logout">Déconnexion</a></div> 
    </div>

        <div class=container-play>
        <div class="right">
                    <div class="head-right">
                        <div class="quizz"><p>Question 1/5</p></div>
                        <div class="rep-quizz"><p>Les langages web</p></div>
                    </div>
                    <div class="body-right">

                            <div class="bloc">
                                <div class="bloc1">
                                    <div class="rep">
                                        <input type="checkbox" name="" id=""><label for="html">HTML</label>
                                    </div>
                                    <div class="rep">
                                            <input type="checkbox" name="" id=""><label for="R">R</label>
                                    </div>
                                    <div class="rep">
                                    <input type="checkbox" name="" id=""><label for="JAVA">JAVA</label>
                                    </div>
                                </div>
                                <div class="bloc2">
                                    <div class="point">3pts</div>
                                </div>
                            </div>

                        <div class="nav">
                            <button type="submit" class="precedent">Précédent</button>
                            <button type="submit" class="suivant">Suivant</button>
                        </div>
                        
                        
                    </div>
                </div>
                <div class="left">
                    <div class="top-score">
                        <a href="?lien=interfaceJoueur&page=top-score">Top score</a>
                    </div>
                    <div class="best-score">
                        <a href="./index?lien=interfaceJoueur&page=best-score">Mon meilleur score</a>
                    </div>
                </div>
         </div>  


         <div class="affichescore">
                <?php
                    if(isset($_GET['page'])){
                        switch($_GET['page']){
                            case "top-score":
                                include('top-score.php');
                            break;
                            case "best-score":
                                include('best-score.php');
                            break;
                            default;
                        }
                    }
                ?>
         </div>    
        </div>


<style>
      img{
          height:50px;
          border:3px solid white;
          border-radius:100%;
          position:relative;
          top:2px;
          left:20px;
      } 
       .name{
        position:relative;
        bottom:22px; 
        left:10px; 
      }     
    .up-play{
        width: 93.5%;
        height: 75px;
        background-color: #51bfd0;
        position: relative;
        top:5px;
        left: 40px;
    }
.up-play-titre1{
    color: #f8fdfd;
    position: absolute;
    left: 180px; 
    bottom:13px;
    font-size:20px;
}
.up-play-titre2{
    color: #f8fdfd;
    position: absolute;
    left: 160px; 
    top:10px;
    font-size:20px; 
}
.up-play-disconnexion{
    width: 10%;
    position: relative;
    bottom:90px;
    left: 950px;
    padding:5px;
   background-color: #3addd6;
   border-radius: 3px;
}
.up-play-disconnexion a{
    margin-left:10px;
   text-decoration: none;
   color:white
  
}


.container-play{
    width: 93.5%;
    height: 450px;
    background-color: #f8fdfd;
    border-radius: 0px 0px 5px 5px;
    position:relative;
    top:15px;
    left: 40px;

            }
            .right{
                width:70%;
                height:420px;
                border:1px solid blue;
                float:left;
                background-color: white;
                border-radius:5px;
                margin:15px 0px 0px 10px;
            }
            
            .head-right{
                width:98%;
                height:80px;
                background-color: #d7e0e0;
                border-radius:5px;
                margin:-5px 2px 0px 10px; 
            }
            .quizz p{
                width:20%;
                color:black;
                position:relative;
                border-bottom:1px solid gray;
                left:280px;
                top:5px;
                font-size:23px;
                font-weight:bold;
            }
            .rep-quizz p{
                position:relative;
                left:280px;
                font-size:20px;
                
            }
            .body-right{
                position:relative;
                left:150px;
                top:100px;
            }
            .bloc{
                width:initial;
            }
            .bloc1{
                float:left;
            }
            .bloc2{
                width:5%;
                float:right;
                position:relative;
                right:200px;
                top:-50px;
                background-color: gray;
                border-radius:5px;
            }
            .rep{
                padding:5px;
            }
            .nav{
                width:98%;
                position:relative;
                top:180px;
            }
            .suivant{
                width:18%;
                position:relative;
                left:250px;
                padding:10px;
                background-color: blue;
                border-radius:5px;
            }
            .precedent{
                width:18%;
                position:relative;
                left:-180px;
                padding:10px;
                border-radius:5px;
                background-color: gray;
                
            }
            .left{
                width:25%;
                height:300px;
                
                float:left;
                background-color: white;
                border-radius:5px;
                margin:100px 0px 0px 20px;
            }
            .top-score{
                float:left;
                
            }
           

            .best-score{
                float:right;
            }


         </style>