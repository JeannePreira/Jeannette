<?php
    session_start();
    function pagination($page,$tab){
        $contenu_page=($page-1)*100;
        echo"<table>";
        echo "<tr>";
                for ($i=$contenu_page; $i<$contenu_page+100 ; $i++)
                {
                        if (array_key_exists($i, $tab)) {
                            echo "<td>$tab[$i]</td>";
                        }
                        else{
                            echo "<td>&nbsp;</td>";
                        }
                        if($i%15==0){
                            echo "<tr>";
                        }
                }
                    echo "</tr>";
            echo"</table>";
    }
?>

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
            margin-top:
            100px ;
        }
        table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        }
        th, td {
        padding: 9px;
        }
        table{
            margin:0px 0px 0px 5px;
        }
        tr:nth-child(even) {background: #357AB7}
        tr:nth-child(odd) {background: #56739A}
    </style>
</head>
<body>
	<div>
	<div>
		<form action="" method="POST">
			<input type="text" name="nombre" placeholder="Donnez un nombre supérieur à 10000"/>
			<input type="submit" name="valider" value="Calculer">
		</form>
	</div>
	<div>
					<?php
if(isset($_POST['valider'])) {
    if (!(empty($_POST['nombre']))) {
        if ((preg_match("#[^0-9]#", $_POST['nombre'])) || ($_POST['nombre'] < 10000)) {
            echo "<h2>Donner un nombre entier supérieur à 10000</h2>";
            } else {
            $n = $_POST['nombre'];
            $som = 0;
            $nbr = 0;
            $resultat = "";
            $T1 = [];
            for ($i = 1; $i <= $n; $i++) {
                $resultat = 0;
                $som = 0;
                $nbr = 0;
                for ($j = 1; $j <= $i; $j++) {
                    $resultat = $i % $j;
                    if ($resultat == 0) {
                        $nbr = $nbr + 1;
                    }
                }
                if ($nbr == 2) {
                    $T1[] = $i;
                }
            }

        //Fonction calculer la moyenne
        function moyenne($table)
        {
            $som = 0;
            $taille = 0;
            foreach ($table as $nombres) {
                $som = $som + $nombres;
                $taille = $taille + 1;
            }
            $moyenne = $som / $taille;

            return $moyenne;
        }

        $moyenne_tableau = moyenne($T1);
        $T2 = [];
        $T3 = [];
        foreach ($T1 as $key1 => $valeur) {
            if ($valeur < $moyenne_tableau) {
                $T2[] = $valeur;
            } else {
                $T3[] = $valeur;
            }
        }
        $_SESSION['moyenne']=$moyenne_tableau;
        $_SESSION['inf']=$T2;
        $_SESSION['sup']=$T3;
        }
        }
    else{
            echo 'Ce champ est obligatoire!';
        }
}
if (isset($_SESSION['inf']) || isset($_GET['Pinf'])) {
    echo "La moyenne est égale à ".$_SESSION['moyenne'];
    echo "<h4>Tableau des nombres premiers inférieurs à la moyenne</h4>";
    
    $nombreDePage=ceil(count($_SESSION['inf'])/100);
    
    if (isset($_GET['Pinf'])) {
        $page=$_GET['Pinf'];
        pagination($page,$_SESSION['inf']);
    }else{
        pagination(1,$_SESSION['inf']);
    }
    echo "</br> Page: ";
    for ($i=1; $i <=$nombreDePage ; $i++) { 
        echo '<a href="pagination.php?Pinf='.$i.'">page'.$i.'</a>';
    }
}
echo "<br>";
if (isset($_SESSION['sup']) || isset($_GET['Psup'])) {
    echo "<h4>Tableau des nombres premiers supérieurs à la moyenne</h4>";
   
    $nombreDePage=ceil(count($_SESSION['sup'])/100);
        if (isset($_GET['Psup'])) {
        $page=$_GET['Psup'];
        pagination($page,$_SESSION['sup']);
    }else{
        pagination(1,$_SESSION['sup']);
    }
     echo "</br> Page: ";
    for ($i=1; $i <=$nombreDePage ; $i++) { 
        echo '<a href="pagination.php?Psup='.$i.'">page'.$i.'</a>';
    }

}
?>
	</div>
</div>

</body>
</html>