            
            <div class="contenu_liste_joueur">
                <div class="contenu_liste_joueur_header"> 
                <h4>LISTE DES JOUEURS PAR SCORE</h4>
                </div>
                
                <div class="contenu_liste_joueur_body">
                    <?php
                        $js=file_get_contents('./data/utilisateur.json');
                        $js=json_decode($js,true);
                        if(empty($js)){
                            echo " ";
                        }else{
                            
                            foreach($js as $value){
                                if($value["profil"]="joueur"){
                                    $joueur[]=$value;
                                }
                            }
                            $score=[];
                            foreach($joueur as $key=>$value){
                                array_push($score,$value['score']);
                            }
                            
                            ?>
                            
                         
                        <table>
                            <tr>
                                <th> Nom</th>
                                <th>Prenom</th>
                                <th class="score">Score</th>
                            </tr>
                            
                        <?php
                        $max=$_GET['page']*15;
                        $min=$max-15;
                     
                            for($i=$min;$i<$max;$i++){ 
                                if(array_key_exists($i,$js)){
                                echo"<tr>";         
                                echo '<td>'.$js[$i]["nom"].'</td>';
                                echo '<td>'.$js[$i]["prenom"].'</td>';
                                echo '<td class="score">'.$js[$i]["score"].'<td>';
                                echo '<br>';
                                echo"</tr>";
                                }
                            }
                            ?>
                        </table>
                    
                    
                    <?php
                    $a=$_GET['page']+1;
                echo"<div class='suite'>
                    <a href='index.php?lien=accueil&menu=listeJoueurs&page=$a'>
                        <button>suivant</button>
                    </a>
                    </div>";
                    
            }

?>
                           

            
             </div>
        </div>  
    </div>  





    
    


















    <style>
.contenu_liste_joueur{
    width:90%;
    margin-left:30px;
}
 h4{
    margin:-1px 0px 5px 150px;
}
.contenu_liste_joueur_body{
    width:initial;
    height:410px;
    border:1px solid #51bfd0;
    
    
    border-radius: 15px/35px;
}
.suite button{
    width: 10%;
    position:absolute;
    top:440px;
    right:100px;
    background-color: #3addd6;
    border-radius: 3px;
  
    padding:5px;
   color:white
}
td,th{
    padding-left:80px;
    font-size:18px;
}
.score{
    padding-left:150px;
}



    </style>
