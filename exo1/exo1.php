
<!DOCTYPE html>
<html lang='fr'> 
<head>
	<title>Exo1</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        input{
            height:30px;
            border-radius:5px 5px 5px 5px;
            background-color: pink;    
        }
        table,td {
        border: 1px solid black;
        border-collapse: collapse;
        }
        tr{
            width:200px;
        }
        td {
        padding: 10px;
        }
        form,p,h1{
            margin:0px 0px 0px 400px;
            padding:20px;
        }
        table{
            margin:0px 0px 0px 5px;
        }
        tr:nth-child(even) {background: pink}
        tr:nth-child(odd) {background: blue}
    </style>
</head>
<body>
		<form action="" method="POST">
			<input type="text" name="nombre" placeholder="Entrer un nombre supérieur à 10000"/>
			<input type="submit" name="valider" value="Calculer">
		</form>
</body>
</html>
<?php
require_once 'fonction1.php'; 
if(isset($_POST['valider'])) {
    $nbre = $_POST['nombre'];//recuperation de donnée
    if (empty($_POST['nombre']))//validation
    {
        echo '<p>Ce champ est obligatoire!</p>';
        exit();
        }else{
        if ((preg_match("#[^0-9]#", $nbre)) || ($nbre < 10000)) //validation
        {
            echo "<h1>Beugouma li! nombre bou eupeu mil la wakh!</h1>";
            exit();
            } else {
        //traitement
            $T =[];
            for ($i = 1; $i <= $nbre; $i++) {
                
                $som = 0;
                $cpt = 0;
                for ($j = 1; $j <= $i; $j++) {
                    if($i % $j){
                   
                        $cpt = $cpt + 1;
                    }
                }
                if ($cpt==2) {
                    $T[] = $i;
                }
            }

      

        $moyenne_tab = moyenne($T);
        $T1 =[];
        $T2 =[];
        foreach ($T as $key=> $valeur) {
            if ($valeur < $moyenne_tab) {
                $T1[] = $valeur;
            } else {
                $T2[] = $valeur;
            }
        }
        $_SESSION['moyenne']=$moyenne_tableau;
        $_SESSION['inf']=$T1;
        $_SESSION['sup']=$T2;
        }
        }
    
}//affichage avec pagination
if (isset($_SESSION['inf']) || isset($_GET['Pinf'])) {
    echo "La moyenne est égale à ".$_SESSION['moyenne'];
    echo "<h2>Les nombres premiers inférieurs à la moyenne</h2>";
    
    $nombreDePage=ceil(count($_SESSION['inf'])/100);
    
    if (isset($_GET['Pinf'])) {
        $page=$_GET['Pinf'];
        pagination($page,$_SESSION['inf']);
    }else{
        pagination(1,$_SESSION['inf']);
    }
    echo "</br> Page: ";
    for ($i=1; $i <=$nombreDePage ; $i++) { 
        echo '<a href="exo1.php?Pinf='.$i.'">page'.$i.'</a>';
    }
}
echo "<br>";
if (isset($_SESSION['sup']) || isset($_GET['Psup'])) {
    echo "<h2>Les nombres premiers supérieurs à la moyenne</h2>";
   
    $nombreDePage=ceil(count($_SESSION['sup'])/100);
        if (isset($_GET['Psup'])) {
        $page=$_GET['Psup'];
        pagination($page,$_SESSION['sup']);
    }else{
        pagination(1,$_SESSION['sup']);
    }
     echo "</br> Page: ";
    for ($i=1; $i <=$nombreDePage ; $i++) { 
        echo '<a href="exo1.php?Psup='.$i.'">page'.$i.'</a>';
    }

}
?>
