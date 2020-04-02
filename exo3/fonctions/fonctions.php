<?php

function est_chiffre($car){
    return ($car >= '0' && $car <= '9');
}

function tailleChaine($chaine){
    for($i=0; true; $i++){
        if(!isset($chaine[$i])){
            break;
        }
    }
    return $i;
}

function est_numeric($nbr){
    for($i=0; $i<tailleChaine($nbr); $i++){
        if(!est_chiffre($nbr[$i])){
            return false;
        }
    }
    return true;
}

function sup_espace($chaine){
    $newchaine="";
    $n=tailleChaine($chaine);
    for($i=0;$i<$n;$i++){
        if($chaine[$i] != " "){
            $newchaine.=$chaine[$i];
        }
    }
    return $newchaine;
}


function est_chaine($chaine){
    $n=tailleChaine($chaine);
    for($i=0;$i<$n;$i++){
        if(!est_lettre($chaine[$i])){
            return false;
        }
    }
    return true;
}

function est_lettre($car){
    return (($car>= 'A' && $car<='Z') || ($car>='a' && $car<='z'));
}

function contient_car($chaine,$car){
    $nbre=tailleChaine($chaine);
    for($i=0;$i<$nbre;$i++){
        if($chaine[$i]==car_lower($car) || $chaine[$i]==car_uper($car)){
            return true;
        }
    }
    return false;
}
 

$caracteres=[
    ['a','A'],['b','B'],['c','C'],['d','D'],['e','E'],['f','F'],['g','G'],['h','H'],['i','I'],['j','J'],
    ['k','K'],['l','L'],['m','M'],['n','N'],['o','O'],['q','Q'],['r','R'],['s','S'],['t','T'],['u','U'],
    ['v','V'],['w','W'],['x','X'],['y','Y'],['z','Z']
];
function car_lower($car){
    global $caracteres;
    foreach($caracteres as $lettres){
        $nbre=tailleChaine($lettres);
        for($i=0;$i<$nbre;$i++){
            if($lettres[$i]=== $car){
                return $lettres[0];
            }
        }
    }
    return $car;
}

function car_uper($car){
    global $caracteres;
    foreach($caracteres as $lettres){
        $nbre=tailleChaine($lettres);
        for($i=0;$i<$nbre;$i++){
            if($lettres[$i]=== $car){
                return $lettres[1];
            }
        }
    }
    return $car;
}





