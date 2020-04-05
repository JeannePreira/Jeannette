<?php include_once 'fonction.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input{
            width:100px;
            background-color:pink;
           margin-left:300px;
        }
    </style>
</head>
<body>
<form method="post" action="">
        <div class="phrases">
            <textarea name="phrase"  cols="110" rows="10" placeholder="Entrer vos phrases"><?=@$_POST["phrase"]?></textarea> 
        </div>
        <input type="submit" name="ok">
</form>

</body>
</html>
<?php
   
if(isset($_POST['ok'])){
    $phrase=$_POST['phrase'];
    if(empty($_POST['phrase'])){
        echo "champs obligatoire";
    }else{
    
        $phrase=preg_split('#(?<=[.?!])#',$phrase);//découpage

        if (tailleChaine($phrase)<=200)//validation
          {
        echo "<br>";
        echo"les phrases valides sont:";
        ?>
               
      <textarea name="phrase"  cols="110" rows="10">
      <?php delete_espaces($phrase);?>
      </textarea>
      <?php
          }else{
              echo "taille supérieur à 200";
          }
    }
}
?>