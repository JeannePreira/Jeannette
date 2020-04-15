<?php
session_start();
if (!isset($_SESSION['prenom'])){
    header("Location: connexion.php");
    exit;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="mini.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    include "header.php"
    ?>
    <div class=corps>
        <div class="param">
            <div class="do"><h4>CREER ET PARAMETRER VOS QUIZZ</h4></div>
            <div class="disconn"><a href="deconnexion.php">Déconnexion</div>
        </div>
        
        
    </div>
    
</body>
</html>