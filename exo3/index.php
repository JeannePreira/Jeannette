<?php include_once 'fonctions/fonctions.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 3</title>
</head>
<body>
    <form method="post">
        <div class="form-group">
            <label for="nbr">Donnez le nombre de mots</label>
            <input type="text" name="nbr" id="nbr" value="<?= @$_POST['nbr'] ?>">
        </div>
        <button class="btn"  name="valid">Ok</button>


        <?php if(isset($_POST['nbr'])){
            for($i=1; $i<=$_POST['nbr']; $i++){ ?>
                <br><br><input type="text" name="mot[]" value="<?= @$_POST['mot'][$i-1] ?>" placeholder="<?= 'Entrer le mot '.$i ?>">
            <?php } ?>
            <button name="resultat">Résultat</button>
        <?php } ?>
    </form>

    <?php
    $erreurs = [];
        if(isset($_POST['valid'])){
            if(!est_numeric($_POST['nbr']) || $_POST['nbr'] <= 0){
                echo "Entrer un entier positif";
                exit();
            }
        }
        if(isset($_POST['resultat'])){    
            foreach($_POST['mot'] as $cle=>$mot){
                $mot=sup_espace($mot);
                
                if(tailleChaine($mot)>20){
                    $erreurs[]='Champs'.($cle+1).' a dépassé 20 caracteres<br>';
                }else if(!est_chaine($mot)){
                    $erreurs[]='Champs '.($cle+1).' est incorrect<br>'; 
                }else if($mot === ''){
                    $erreurs[]='Champs '.($cle+1).' est vide<br>';
                }
            }
            var_dump($_POST['mot']);
        var_dump($erreurs); 
        $nbre=0;
        
        if(empty($erreurs)){
            foreach($_POST['mot'] as $cle=>$mot){ 
                if(contient_car($mot,'M')){
                    $nbre++;
                }
            }
            echo "il y'a ".$nbre." mot qui contient M";
        }else{
            foreach($erreurs as $error){
                echo $error;
            }
        }
    }
    ?>
</body>
</html>