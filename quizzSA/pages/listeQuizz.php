 <?php           
           require_once('./traitement/fonctions.php');

$formValide= false;

$nombre="";
$msg_erreur="";

if (isset($_POST['ok'])){     
    if (!is_entier($_POST['nombre'])){
        $msg_erreur="Veullez saisir un nombre entier et positif.";
    }else
        if (!is_number($_POST['nombre'])){
        $msg_erreur="Veullez saisir un nombre entier et positif.";
        }else{
            $nombre=$_POST['nombre'];
            $formValide= true;
        }
}



?>
           
           
            <div class="contenu_liste_quizz">
                <div class="contenu_liste_quizz_header"> 
                <form method="post">
                    <label>Nbre de question/Jeux</label><input type="text" class="number" name='nombre' value="<?= $nombre; ?>" >
                    <input type="submit" value="OK" class="ok" name='ok'>
                </form>
            </div>
                
                <div class="contenu_liste_quizz_body">
                   
                    <?php
                            $data=file_get_contents("./data/question.json");
                            $table=json_decode($data,true);
                            echo '<ol>'."\n";
                            $max=$_GET['fenetre']*5;
                            $min=$max-5;
                         
                                for($cpt=$min;$cpt<$max;$cpt++){                                
                                    echo '<li>'.$table[$cpt]['question'].'</li>';
                                    $reponse=$table[$cpt]['reponse'];
                                if($table[$cpt]['type_reponse']=='simple'){
                                    for($i=1;$i<=count($reponse);$i++){
                                        echo  '<input  type="radio" name=""  value="">';
                                        echo $reponse[$i].'<br>';
                                    }
                                }else
                                    if($table[$cpt]['type_reponse']=='multiple'){
                                        for($j=1;$j<=count($reponse);$j++){
                                            echo  '<input  type="checkbox" name=""  value="">';
                                            echo $reponse[$j].'<br>';
                                        } 
                                    }else{
                                        echo $reponse.'<br>';
                                    }                                    
                            }
                            echo '</ol>'."\n";
                        ?>
                     <?php
                    $a=$_GET['fenetre']+1;
                echo"<div class='btn_suivant'>
                    <a href='index.php?lien=accueil&menu=listeQuizz&fenetre=$a'>
                        <button>suivant</button>
                    </a>
                    </div>";
                    
          

?>
   
                    </div>

    </div>           

            
             



    
    


    <style>
.contenu_liste_quizz{
    width:90%;
    margin-left:30px;
}
 
.contenu_liste_quizz_body{
    width:initial;
    height:380px;
    border:1px solid #51bfd0;
    border-radius: 15px/35px;
}
.contenu_liste_quizz_header{
   padding:15px 0px 10px 0px;
   margin-left:200px;
}
.number{
    width:50px;
}
.ok{
    background-color:blue;
}

.btn_suivant button{
    width: 8%;
    background-color: #3addd6;
    border-radius: 3px;
    padding:5px;
    color:white;
    position:absolute;    
    right:100px;
    bottom:28px;
}

    </style>






















