<?php

function tailleChaine($chaine){
    for($i=0; true; $i++){
        if(!isset($chaine[$i])){
            break;
        }
    }
    return $i;
}

function is_uper($car){
    return($car>='A' && $car<='Z');
}

function est_point($chaine){
        return($chaine=="." || $chaine=="?" || $chaine=="!");  
    }

function est_phrase($chaine){
    $n=taillechaine($chaine);
        return (is_uper($chaine[0])===true &&  est_point($chaine[$n-1])===true);
}


function delete_espaces($texte){
    
    for($i=0;$i<tailleChaine($texte);$i++)//validation de texte
    {
       $texte[$i]=preg_replace('#[\s]+#'," ",$texte[$i]);
       $texte[$i]=preg_replace('#[\s]+,#',",",$texte[$i]);
       $texte[$i]=preg_replace('#[\s]+;#',";",$texte[$i]);
       $texte[$i]=preg_replace('#[\s]+\!#',"!",$texte[$i]);
       $texte[$i]=preg_replace('#[\s]+\.#',".",$texte[$i]);
       $texte[$i]=preg_replace('#[\s]+\?#',"?",$texte[$i]);
       $texte[$i]=preg_replace('#[\s]+\'#',"'",$texte[$i]);
      } 
    for($i=0;$i<tailleChaine($texte);$i++){
        
        $new=$texte[$i];
      
        $new=trim($new);
        $new=ucfirst($new);

        echo $new; 
   
    }
    
}
?>