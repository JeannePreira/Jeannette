


   <div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<?php
    $js=json_decode(file_get_contents('./data/utilisateur.json'),true);

    foreach($js as $value){
        $table["label"]=$value["prenom"];
        $table["y"]=$value["score"] ; 
        $dataPoints[]=$table; 
    }
    
?>
<script>
    window.onlaod=function(){
        var chart = new CanvasJS.Chart("chartContainer",{
            animationEnabled:true,
            title:{
                text:"Diagramme de meilleurs joueurs"
            },
            data:[
                {
                    type:"pie",
                    yvalueFormatString:"#,##0.00\"points\"",
                    index Label:"{label}({y})",
                    dataPoints:<?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK);?>

                }
            ]
        })
        chart.render();
    }

    
</script>