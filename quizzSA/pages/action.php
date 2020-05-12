<?php
session_start();

$page=(int)$_GET['suite'];
$questionActuelle=(int)$_GET['question'];//la question dans la position acctuelle

$questions=file_get_contents("../data/question.json");
$questions=json_decode($questions,true);
if (isset($_POST['check'])){
    $reponses_utilisateurs=$_POST['check'];
    $reponses_exactes=$questions[$questionActuelle]['reponse_vrai'];
    $_SESSION['check'][$page-1]=[];

    

    $nombre_de_reponses_exacte=count($reponses_exactes);

    $nbre_rep_utilisateur=0;
    foreach ($reponses_utilisateurs as $reponse_utilisateur) {
        if(in_array($reponse_utilisateur,$reponses_exactes)){
            $nbre_rep_utilisateur++;
        }
        $_SESSION['check'][$page-1][]=$reponse_utilisateur;
    }
    //vérifier si si l'utillisateur a trouvé
    if($nbre_rep_utilisateur === $nombre_de_reponses_exacte){
        $_SESSION['score']=$_SESSION['score']+(int)$questions[$questionActuelle]['nombre_de_point'];
     }
}else
    if(isset($_POST['radio'])){
    $reponse_utilisateur=$_POST['radio'];
    $reponses_exactes=$questions[$questionActuelle]['reponse_vrai'];
   
    $nombre_de_reponses_exacte=count($reponses_exactes);

    if($reponse_utilisateur===$reponses_exactes[0]){

        $_SESSION['score']=$_SESSION['score']+(int)$questions[$questionActuelle]['nombre_de_point'];
      }
    
    

        $_SESSION['radio'][$page-1]=$reponse_utilisateur;

}else
if(isset($_POST['texte'])){
    $reponse_utilisateur=$_POST['texte'];

    $reponse_exacte=$questions[$questionActuelle]['reponse'];//

    $_SESSION['texte'][$page-1]=$reponse_utilisateur;

    if($reponse_utilisateur===$reponse_exacte){
        $_SESSION['score']=$_SESSION['score']+(int)$questions[$questionActuelle]['nombre_de_point'];
    }
    
}

if(isset($_POST['terminer'])){
    header("Location:recapulation.php");
}
else
{
    header("Location:../?lien=jeux&suite=$page");
}