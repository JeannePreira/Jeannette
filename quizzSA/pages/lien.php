
       <?php
    require_once('./traitement/fonctions.php');

is_connect();
//afficher les infos du joeur connecté
    $nom=$_SESSION['user']['nom'];
    $prenom=$_SESSION['user']['prenom'];
    $photo= $_SESSION['user']['photo'];
    $score= $_SESSION['user']['score'];
?>

    <input style="backgroung-color:white" type="button" value="Best Score" id="togg1">
    <input type="button" value="Top Score" id="togg2">  
    <div style="display:block" id="d1">
        
        <div class="affiche-nom-prenom-score">
            <p>
                <strong>
                <span class="prenom-joueur">
                    <?php echo $prenom;?>
                </span>    
                <span class="nom-joueur">
                    <?php echo $nom;?>
                </span>
                
                <span class="score-joueur">
                    <?php echo $score;?>
                </span>
                </strong>
            </p>
        </div>
    </div>
    <div style="display:none" id="d2">
    <?php
 $data=file_get_contents("./data/utilisateur.json");
 $table=json_decode($data,true);

foreach($table as $value){
    if($value["profil"]="joueur"){
        $joueur[]=$value;
    }
}

$score=[];

foreach($joueur as $key=>$value){
    array_push($score,$value['score']);
}

array_multisort($score, SORT_DESC, $joueur);?>
<table>
                            <tr>
                                
                                <th>Prenom</th>
                                <th class="nom"> Nom</th>
                                <th class="score">Score</th>
                            </tr>
<?php
foreach($joueur as $key=>$value){
    if($key<5){
        ?>
        <tr>
      
            <?php echo '<td>'.$value['prenom'].'</td>';?>
           
      
            <?php echo '<td class="nom">'.$value['nom'].'</td>';?>
       
        
       
            <?php echo'<td class="score">'. $value['score'].'</td>';?>
       
        </tr>
        <?php } ?>
        
<?php } ?>

</table>
    </div>
    


   
  


<script>
            let togg1=document.getElementById("togg1");
             let togg2=document.getElementById("togg2");
             let d1=document.getElementById("d1");
             let d2=document.getElementById("d2");

             togg1.addEventListener("click", ()=> {
                 d1.style.display = "block";
                 d2.style.display = "none";

             })

             function togg(){
                d2.style.display = "block";
                d1.style.display = "none";
            };

    togg2.onclick = togg;
    </script>


<style>
    .score-joueur{
        padding:55px;
    }
    .nom-joueur{
        padding:5px;
    }
    .prenom-joueur{
        padding:15px;
    }


    td{
    padding-left:10px;
    font-size:18px;

}
.score{
    padding-left:70px; 
}
.nom{
    padding-left:40px; 
}
input{
    background-color:white;
    margin:5px 0px 5px 0px;
    
}
</style>