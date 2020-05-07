<?php
session_start();
$page=(int)$_GET['suite'];
$questionActuelle=(int)$_GET['question'];

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
   // if($nbre_rep_utilisateur === $nombre_de_reponses_exacte){
        
   // }
}

//header("Location:../?lien=jeux&suite=$page");
var_dump($_SESSION['check'][$page-1]);