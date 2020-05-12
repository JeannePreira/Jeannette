
         
       <?php 
        require_once('./traitement/fonctions.php') ;
        if(isset($_POST['ok'])){
                if(!is_number($_POST['number']) || $_POST['number']<5){
                    echo "Entrer un nombre supérieur ou égal à 5";
                }else{
                    

                    $_SESSION['number']=$_POST['number'];
                    $message=array();
                    $message["nombre_par_jeu"]=$_SESSION['number'];
                    $tab=file_get_contents('./data/interface_joueur.json');
                    $tab=json_decode($tab,true);
                    
                    $tab=$message;
                    $tab=json_encode($tab);
                    file_put_contents('./data/interface_joueur.json',$tab);
                    
                    
                  
                     
                }
            
        }
       
        ?>        
                  
        
               

     <div class="contenu_liste_quizz">
        <div class="contenu_liste_quizz_header"> 
        
               <form method="post" id='validation'>
                   <label for='number'>Nbre de question/Jeux</label>
                   <input type="text" name="number" id="number" error="error" class="number"
                   value="<?= $_SESSION['number'] ?>">
                   <input type="submit" value="OK" class="ok" name='ok' id="btn_envoie" >
                   <span class='line_error' id='error'></span><br>
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
                            if(array_key_exists($cpt,$table)){                               
                                    echo '<li>'.$table[$cpt]['question'].'</li>';
                                    $reponse=$table[$cpt]['reponse'];
                                if($table[$cpt]['type_reponse']=='simple'){
                                    for($i=1;$i<=count($reponse);$i++){
                                        if(in_array($reponse[$i], $table[$cpt]['reponse_vrai'])){
                                            echo  '<input  type="radio" name=""  value="" checked>';
                                            echo $reponse[$i].'<br>';
                                        }else{
                                            echo  '<input  type="radio" name=""  value="">';
                                            echo $reponse[$i].'<br>';
                                        }
                                    }
                                }else
                                    if($table[$cpt]['type_reponse']=='multiple'){
                                        for($j=1;$j<=count($reponse);$j++){
                                            if(in_array($reponse[$j], $table[$cpt]['reponse_vrai'])){
                                                echo  '<input  type="checkbox" name=""  value="" checked>';
                                            echo $reponse[$j].'<br>';
                                            }else{
                                                echo  '<input  type="checkbox" name=""  value="" >';
                                                echo $reponse[$j].'<br>';
                                            }
                                            
                                            
                                        } 
                                    }else{
                                        echo "<input type='text' value ='$reponse'/><br>";
                                    } 
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
    
    <script>
   //validation en js
const inputs=document.getElementsByTagName("input");
for(input of inputs){
   input.addEventListener("keyup",function(e){
      if(e.target.hasAttribute("error")) {
       var idDivError=e.target.getAttribute("error")
       document.getElementById(idDivError).innerText=""
      }
   })

}

document.getElementById("validation").addEventListener("submit", function(e){
   const inputs=document.getElementsByTagName("input");
   var error=false;
   for(input of inputs){
       if(input.hasAttribute("error")){
          var idDivError=input.getAttribute("error")
       if(!input.value){                                                      //si le champ est vide
               document.getElementById(idDivError).innerText="Ce champ est obligatoire"
               error=true;                                                  // on met erro a true pour dire qu on a trouve une erreur
           }
          
       }
   }
   if(error){
       e.preventDefault();
   }
//pour que la page ne se recharge pas
   return false;
  
})
</script>
           
             



    
    


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






















