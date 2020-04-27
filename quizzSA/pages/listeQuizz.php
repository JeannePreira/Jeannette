


            <div class="contenu_liste_quizz">
                <div class="contenu_liste_quizz_nbre_point">
                        <label for="nbrPoint">Nbr de Points</label>
                        <select>
                            <?php
                            for ($i = 1; $i <= 100; $i++) {
                            ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php
                            }?>
                        </select>
                        <input type="button" value="ok">
                </div>
            <div class="contenu_liste_quizz_questions">
            <form  method="POST" action= "" name="quiz" >
                <ol>
                    <li>			
                            <p>Les langages Web: 
                                <ul>
                                    <li>
                                        <input type="checkbox" name="question1"  >HTML
                                    </li>
                                    <li>
                                        <input type="checkbox" name="question1" >R
                                    </li>
                                    <li>
                                        <input type="checkbox" name="question1" >JAVA
                                    </li>
                                </ul>
                            </p>
                    </li>
                    <li>			
                        <p>D'où vient le Corona: <br>
                            <ul>
                                <li>
                                    <input type="radio" name="question2">Chine
                                </li>
                                <li>
                                    <input type="radio" name="question2" >Italie
                                </li>
                                
                            </ul>				    	
                        </p>
                    </li>

                    <li>			
                        <p>Quel terme définit langage qui s’adapte sur Androïd et sur Ios? <br>
                            <ul>
                                <li>
                                    <input type="text" name="question2" >
                                </li>
                                
                            </ul>				    	
                        </p>
                    </li>

                    <li>			
                        <p>Quelle est la première école de codage gratuite au Sénégal? <br>
                            
                            <ul>
                                <li>
                                    <input type="radio" name="question2" >Symplon
                                </li>
                                <li>
                                    <input type="radio" name="question2" >Orange Digital Center
                                </li>
                                
                            </ul>				    	
                        </p>
                    </li>

                    

                </ol>
            </form>
            <button id="validation">Suivant</button>
            </div>
            

        </div>  
   

   <style>
        .contenu_liste_quizz{
    width: initial;
    height: 550px;
     
    
}
.contenu_liste_quizz_questions{
    width: initial;
    border: steelblue 1px solid;
    border-radius: 15px/35px;
    margin: 0px 0px 0px 25px;
}
.contenu_liste_quizz_nbre_point{
    margin: 5px 0px 10px 50px;
}
form ul li {
	list-style-type: none;
}
 

 
#validation {
    background-color: #3addd6;
    border-radius: 5px 5px 5px 5px;
    margin-top: 10px;
    float:right;
}
   </style>