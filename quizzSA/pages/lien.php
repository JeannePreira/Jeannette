
       <?php
    require_once('./traitement/fonctions.php');

is_connect();
//afficher les infos du joeur connecté
    $nom=$_SESSION['user']['nom'];
    $prenom=$_SESSION['user']['prenom'];
    $photo= $_SESSION['user']['photo'];

?>

    <input style="backgroung-color:white" type="button" value="Best Score" id="togg1">
    <input type="button" value="Top Score" id="togg2">  
    <div style="display:block" id="d1">
        
        <div class="affiche-nom-prenom-score">
            <p>
                <strong>
                <span class="nom-prenom">
                    <?php
                        echo $_SESSION['prenom'];
                    ?>
                    &nbsp;
                    <?php
                        echo $_SESSION['nom'];
                    ?>
                    </span>

                <span class="score">
                    <?php
                        echo $_SESSION['score'].' pts';
                    ?>
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

array_multisort($score, SORT_DESC, $joueur);

foreach($joueur as $key=>$value){
    if($key<5){
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
        <?php } ?>
        </div>
<?php } ?>


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
