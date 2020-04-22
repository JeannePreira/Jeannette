<?php

 

    function is_lower($char){
        return ($char>='a' && $char<='z');
    }

    function is_uper($char){
        return ($char>='A' && $char<='Z');
    }

    function my_strlen($char){
        $i=0;
        while (isset($char[$i])){
            $i=$i+1;
        }
        return ($i);
    }

    function is_number($char){
        for ($i=0; $i<my_strlen($char); $i++){
            if (!(is_entier($char[$i]))){
                return false;
            }
        }
        return ($char>0);
    }

    function is_entier($char){
        return ($char>='0' && $char<='9');
    }

?>

<?php
    function is_Prenom_valide($chaine){

        if (!preg_match("/^[A-Z]/", $chaine)){
?>
            <script> alert ("Le prenom doit commencer par une lettre majuscule.") </script>
<?php
        }else
            if (preg_match("/[0-9éèêëàáâúûù,.?'\-;:_=+<>\s{}]/", $chaine)){
?>
                <script> alert ("Le prenom ne doit pas contenir de chiffre, de caracteres speciaux ou de caractere accentuer.");</script>
<?php
            }else{
                return $chaine;
            }
    }
?>



<?php
    function is_nom_valide($chaine){
        $msg_erreur="";

        if (preg_match("/[a-z]/", $chaine)){
?>
            <script> alert ("Le nom ne doit comporter que des caracteres en majuscule.") </script>
<?php
        }else
            if (preg_match("/[0-9éèêëàáâúûù,.?'\-;:_=+<>\s{}]/", $chaine)){
?>
                <script> alert ("Le nom ne doit pas contenir de chiffre, de caracteres speciaux ou de caractere accentuer.");</script>
<?php
                
            }else{
                return $chaine;
            }
    }
?>
