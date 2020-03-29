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
<?php
  //Fonction calculer la moyenne
  function moyenne($tableau)
  {
      $som = 0;
      $taille = 0;
      foreach ($tableau as $cle) {
          $som = $som + $cle;
          $taille = $taille + 1;
      }
      $moyenne = $som / $taille;

      return $moyenne;
  }
?>