<?php 
function calendrier($langue){
    $date=array(
        '1'=>['Janvier','January'],
        '2'=>['Fevrier','February'],
        '3'=>['Mars','martch'],
        '4'=>['Avril','April'],
        '5'=>['Mai','May'],
        '6'=>['Juin','June'],
        '7'=>['Juillet','July'],
        '8'=>['Août','Aguste'],
        '9'=>['Septembre','September'],
        '10'=>['Octobre','October'],
        '11'=>['Novembre','November'],
        '12'=>['Décembre','December']);
echo"<table>";
echo "<tr >"; 
for($i=1;$i<=12;$i++){
    echo "<td>".$i."</td> <td>".$date[$i][$langue]."</td>";
     if($i%3==0){
    echo "</tr>";
    }
}
echo "</table>";
}
?>





