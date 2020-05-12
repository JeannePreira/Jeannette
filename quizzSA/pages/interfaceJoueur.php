<?php
is_connect();
//afficher les infos du joeur connecté
    $nom=$_SESSION['user']['nom'];
    $prenom=$_SESSION['user']['prenom'];
    $photo= $_SESSION['user']['photo'];

?>


<?php
         
    $tab=file_get_contents('./data/interface_joueur.json');
    $tab=json_decode($tab,true);
    $_SESSION['number']=(int)$tab['nombre_par_jeu'];//recuperation
?>
 


<div class="up-play">
    <div class="profil">

        <img src="<?=$photo ?>" alt="logo">
        <p class="name"><?php echo $nom.' '.$prenom;?></p>

    </div>
        
    <div class="up-play-titre1"> <h3>BIENVENUE SUR LA PLATEFORME DE JEU DE QUIZZ</h3></div>
    <div class="up-play-titre2"> <h3>JOUER ET TESTER VOTRE NIVEAU DE CULTURE GÉNÉRALE</h3></div>
    <div class="up-play-disconnexion"><a href="index.php?statut=logout">Déconnexion</a></div> 

</div>

<div class=container-play>

    <div class="right">
    
        <?php
            $data=file_get_contents("./data/question.json");
            $table=json_decode($data,true);
                            
            $max=$_GET['suite']*1;
            $min=$max-1;
            $a=(int)$_GET['suite']+1;  
            for($cpt=$min;$cpt<$max;$cpt++){   
                if(array_key_exists($cpt,$table)){?>

                    <div class="head-right">

                        <?php
                            if($_GET['suite']<=$_SESSION['number']) {
                                echo '<div class="quizz"><p>Question'.' '.$_GET['suite']. '/'.$_SESSION['number'].'</p></div>';
                                echo'<div class="rep-quizz"><p>'.$table[$cpt]['question'].'</p></div>';
                        ?>    

                    </div> 
                    
        <div class="bloc">
     
            <div class="bloc1">     

                    <form action="pages/action.php?question=<?= $cpt ?>&suite=<?= $a ?>" method="post">
                        <?php    
                        $reponse=$table[$cpt]['reponse'];
                        if($table[$cpt]['type_reponse']=='simple'){
                            for($i=1;$i<=count($reponse);$i++){
                                $est_cocher=false;
                                if(isset($_SESSION['radio'][$a-1])){
                                
                                    if($reponse[$i]===$_SESSION['radio'][$a-1]){
                                        $est_cocher=true; 
                                    }
                                    
                                }
                                if($est_cocher){
                                    echo  "<input  type='radio' name='radio'  value='$reponse[$i]' checked >";
                                    echo '<label>'.$reponse[$i].'</label><br>';
                                }else{
                                    echo  "<input  type='radio' name='radio'  value='$reponse[$i]' >";
                                    echo '<label>'.$reponse[$i].'</label><br>';
                                }
                                
                            }
                        }else
                            if($table[$cpt]['type_reponse']=='multiple'){
                                
                                for($j=1;$j<=count($reponse);$j++){
                                    $est_cocher=false;
                                    if(isset($_SESSION['check'][$a-1])){
                                        foreach ($_SESSION['check'][$a-1] as  $value) {
                                            if($reponse[$j]===$value){
                                                $est_cocher=true; 
                                            }
                                        }
                                    }
                                    if($est_cocher){
                                        echo  "<input  type='checkbox' name='check[]'  value='$reponse[$j]' checked >";
                                        echo '<label>'.$reponse[$j].'</label><br>';
                                    }else{
                                        echo  "<input  type='checkbox' name='check[]'  value='$reponse[$j]' >";
                                        echo '<label>'.$reponse[$j].'</label><br>';
                                    }
                                    
                                }
                            }else
                                {
                                    if (isset($_SESSION['texte'][$a-1])){
                                        echo  "<input  type='text' name='texte'  value='".$_SESSION['texte'][$a-1]."' >";
                                    
                                    }else{
                                        echo  "<input  type='text' name='texte' >";
                                    }
                               
                                 
                                } ?>
                            </div>

                            <div class="bloc2">

                                     <div class="point"> <?php echo $table[$cpt]['nombre_de_point'].'pts';?></div>
                 

                                     </div>
                            <div class="nav">

                                    <?php   
                                        
                                            
                                        if($_GET['suite'] < $_SESSION['number']){
                                            echo"<div class='suivant'><button>suivant</button></div>";
                                        }else
                                            if($_GET['suite'] == $_SESSION['number']){
                                                echo"<div class='suivant'><button name='terminer'>Terminer</button></div>";
                                                //ca marche cette redirection??
                                                //l'emplacement n'est pas bon!
                                            }

                                            if($_GET['suite']>1){
                                                echo '<button
                                                onclick="rtn()" type="submit" class="precedent">Précédent</button>';
                                            }
                                            
                                    ?>
                                            
                                    <?php }  ?> 
                            </div>
                        
                    </form>
            </div>

            
            <?php  }                                   
                }?>
            
       
                            
            
               
    </div>
      
    <div class="left">
        <?php include_once 'lien.php' ?>
    </div>
              
</div>


<script>
function rtn() {
   window.history.back();
}


</script>

































































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
    top:0px;
    left: 40px;

            }
            .right{
                width:70%;
                height:420px;
                border:1px solid #51bfd0;
                float:left;
                background-color: white;
                border-radius:5px;
                margin:15px 0px 0px 10px;
            }
            
            .head-right{
                width:98%;
                height:80px;
                background-color:#DCDCDC;
                border-radius:5px;
                position:relative;
                bottom:15px;
                margin:0px 2px 0px 10px; 
            }
            .quizz p{
                width:20%;
                color:black;
                position:relative;
                border-bottom:1px solid black;
                left:280px;
                top:5px;
                font-size:23px;
                font-weight:bold;
            }
            .rep-quizz p{
                position:relative;
                left:280px;
                bottom:10px;
                font-size:25px;
                
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
                position:relative;
                top:50px;
                left:200px;
                font-size:30px;
            }
            .bloc2{
                width:5%;
                float:right;
                position:relative;
                right:80px;
                top:20px;
                background-color: #DCDCDC;
                border-radius:5px;
                padding:5px;
                font-size:25px;
            }
            .rep{
                padding:5px;
            }
            .nav{
                width:98%;
                position:relative;
                top:270px;
            }
            .suivant button{
                width:18%;
                position:absolute;
                right:0px;
                float:right;
                padding:10px;
                background-color:#51bfd0;
                border-radius:5px;
            }
            .precedent{
                width:18%;
                position:absolute;
                left:10px;
                float:left;
                padding:10px;
                border-radius:5px;
                background-color:#DCDCDC;
                
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