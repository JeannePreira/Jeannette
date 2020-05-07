<?php
    $quest = getDatas($file = "Question");
    $nbqts= getDatas($file = "parametre");
    $question= [];
   
    $i= 0 ;
    $j = 0;
    $lq = 0;
    $pageCourant= 0;
    $total_page=$nbqts[0]['nb-qts'];
   while ($j <$total_page){
         $question[$j]= $quest[$j];
         $j++;
   }
   shuffle($question);


?>
  
<?php  
    if(isset($question) ){
           if(isset($_POST['suivant']))
           { 
               $_SESSION['i'] =+ $_POST['suivant']+1;
                $lq = $_SESSION['i'] ;
               
           }if(isset($_POST['precedent'])){
                $_SESSION['i']=$_POST['precedent'];
                $lq = $_SESSION['i'];  
           }
           //tirage
           if(isset())
    ?>
        <form action="" method="post">
            <div class="_question">
                <h3>Questions <?= $lq,"/",$total_page?></h3>
                <p>***<?= $question[$lq-1]['question'] ?>***</p>
            </div>
            <p class="nbre-points"><?= $question[$lq-1]['nbPoint'] ?>pts</p>

            <div class="content-btn">

                <?php
                if($lq>1){
                    $precedent=$lq-1;
                    echo'<button type=submit class="btn-prec btn-suiv-j" name=precedent value='.$precedent.'>Precedent</button>';    
                        }  
                if($lq<$total_page){
                    $suivant= $lq;
                    echo'<button type=submit class="btn-suiv btn-suiv-j" name=suivant value='.$suivant.'>Suivant</button>';   
                        }else   
                    echo'<a class="btn-suiv btn-suiv-j" href=" href="?page=joueur&game=fin" >Terminer</a>';
                ?>
            </div>
        </form>
        <?php } ?>