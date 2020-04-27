<?php
$tab=[24,25,248,65,79,45,21,78,4852,32];


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php
function pagination($tab){
    //click numéro de page
    define("NBREVALEURPARPAGE",15);
$totalValeur=count($tab);
$nbrePage=ceil($totalValeur/NBREVALEURPARPAGE);
    if(isset($_GET['page'])){
        $pageActuelle=$_GET['page'];
        if($pageActuelle>$nbrePage){
            $pageActuelle=$nbrePage;
        }
    }else{
        $pageActuelle=1;
    }

    $indiceDepart=($pageActuelle-1)*NBREVALEURPARPAGE;
    $indiceDeFin=$indiceDepart+NBREVALEURPARPAGE-1;

    for($i=$indiceDepart; $i<=$indiceDeFin; $i++){
        echo $tab[$i]." ";
    }

    //affichage des pages
    for($page=1; $page<=$nbrePage; $page++){
        echo '<a href="pagination.php?page='.$page.'">['.$page.']</a>';
    }
}
    
?>
</body>
</html>