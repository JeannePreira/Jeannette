<?php

    function connexion($login, $pwd)//tester si l'utilisateur est connecter
    {
        $users= getData();
        foreach ($users as $key => $user){
            
            if ($user["login"]===$login && $user["password"]===$pwd){
                $_SESSION['user']=$user;
                $_SESSION['statut']="login";
               
                if ($user["profil"]==="admin"){
                    return "accueil";
                }else{
                    return "jeux&suite=1";
                }
            }
        }
        return "error";
    }


    function deconnexion(){
        unset($_SESSION['user']);//suprimer l'existance d'une variable
        unset($_SESSION['statut']);
        session_destroy();
    }

    function is_connect(){
        if (!isset($_SESSION['statut'])){
            header("location:index.php");
        }
    }

    //fonction qui charge les fichiers json
    function getData($file="utilisateur"){
        $data= file_get_contents('./data/'.$file.'.json');//charger le data ki est en json
        $data= json_decode($data, true);//transformer un json en tableau
        return $data;//un tableau pour vérifier la connexion
    }
  


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
        for($i=0; $i<my_strlen($char); $i++){
            if(!is_entier($char[$i])){
                return false;
            }
        }
        return true;
    }

    function is_entier($car){
        return ($car >= '0' && $car <= '9');
    }


   

?>
<script>
     function is_question_empty(){
        
        var question=document.getElementById("question").value
        if(question){
            return true;
        }else{
            document.getElementById("error-1").innerText="Entrer une question";
            return false;
        }
    }

    function is_score_empty(){
        var score=document.getElementById("score").value
        if(!Number.isInteger(+score)){   
            document.getElementById("error-2").innerText="Entrer un nombre";
            return false; 
        }else{
            return true;
        }        
    }

    function clik_checkbox(){
        var type_reponse=document.getElementId("type_reponse").value;
       if(type_roponse=="texte") {
           return true;
       }else{
        var form=document.getElementById("form");
        var checks=form.getElementsByClassName("check")
        for(let chk of checks){
            if(chk.checked){
                return true;
            }
        }
        document.getElementById("error-3").innerText="cocher d'abord!";
        return false;
       }
       
    }



    function validate(){
       return is_question_empty() && is_score_empty() && clik_checkbox()
    }
</script>

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






