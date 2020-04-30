
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




<style>
    
    .affiche-nom-prenom{
        position:relative;
        left:800px;
        top:-290px;
    }
    .score-joueur{
        width:5%;
        position:relative;
        left:45px;
    }
</style>
