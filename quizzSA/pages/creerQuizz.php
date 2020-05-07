

<?php
//stockage
if(isset($_POST['validation'])){
  
    $message=array();
    if(isset($_POST['type_reponse'])){
        if($_POST['type_reponse']=='texte'){
            $message["question"]=$_POST["question"];
            $message['nombre_de_point']=$_POST['score'];
            $message['type_reponse']=$_POST['type_reponse'];
            $message['reponse']=$_POST['reponse']; 
        }else{
            $message["question"]=$_POST["question"];
            $message['nombre_de_point']=$_POST['score'];
            $message['type_reponse']=$_POST['type_reponse'];
            $message['reponse']=$_POST['reponse'];
            if($_POST['type_reponse']=="multiple" || $_POST['type_reponse']=="simple")
            { foreach($_POST['reponse'] as $key1 => $val1)
               {
                    foreach($_POST['reponse_vrai'] as $key2 => $val2)
                    {
                             if($key1==$key2){ $message['reponse_vrai'][]=$val1;}
                     }
                }
            }
        }
    }
    
   


    $js= file_get_contents('./data/question.json');//contenue du fichier json

    $js= json_decode($js, true);//convertir le fichier json en tableau

    $js[]= $message;//ajouter notre nouveau element dans le fichier json

    $js= json_encode($js);//reconvertir en json

    file_put_contents('./data/question.json', $js);//le remetre dans le fichier json
    
}

?>


            <div class="contenu_create_quizz">
                <div class="contenu_create_quizz_header">
                    <h4>PARAMETREZ VOS QUESTIONS</h4>
                </div>
                <div class="contenu_create_quizz_body">
                    <form action="" method="post" id="form" onsubmit="return validate();"  > 
                            <div class="bloc_form">

                                <div class="form_quizz"><label for="question">Questions</label></div>
                                <div class="form_text"><textarea name="question" id="question" error="error-1" cols="30" rows="2"></textarea></div>
                                <div class="line-error" id="error-1"></div>
                            </div>
        
                            <div class="bloc_form">
                                <br><br><br><br>
                                <label for="nbrPoint">Nbr de Points</label>
                                <input type="number" name="score" min="1" value="score" id="score" error="error-2" class="nombre" required>
                                <div class="line-error" id="error-2"></div>
                            </div>
        
                            <div class="bloc_form">

                                <label for="typeRep">Type de réponse</label>

                                <select name="type_reponse" id="type_reponse" required>
                                    <option value="0" >Donnez le type de réponse</option>
                                    <option value="texte"onclick="addInput()" >Texte</option>
                                    <option value="multiple" onclick=addInputMultiple() >Multiple</option>
                                    <option value="simple" onclick="addInputSimple()">Simple</option>
                                </select>
                                
                                 <img src="public/icones/ic-ajout-réponse.png"  class='genere' id="genere" onclick="add()" alt="ajout" >

                            </div>
                            <div id="error-3"></div>s
                           
                                <div id="inputs">

                                </div>
                            
                            </div>
                            <div class="enregistrer">

                                <input type="submit" value="Enregistrer" name="validation">

                            </div>
                                        
                    </form>
                </div>
            </div>  
   


<script>
var nbregenere = 1;
var count_simple = 1;
var count_multiple = 1;
        function addInputSimple(n) {
            
            nbregenere++;
            var divInputs = document.getElementById("inputs");
            var newInput = document.createElement("div");
            var div_error = document.createElement("div");
            newInput.setAttribute('id','new_input_'+nbregenere);
            newInput.setAttribute('class','new_input');
            newInput.innerHTML = `<input class="input-reponse" type="text" 
            name="reponse[${count_simple}]" id="" >
            <input  type="radio" name="reponse_vrai[${count_simple}]" id="simple" value="reponse${count_simple}" class="check">
            <img src="public/icones/ic-supprimer.png" alt="delete" class="button_supp"
             onclick="onDeleteInput(${nbregenere})">`;
            divInputs.appendChild(newInput);
            count_simple++;

        }

        

        function addInput() {
            nbregenere++;
            var divInputs = document.getElementById("inputs");
            var newInput = document.createElement("div");
            newInput.setAttribute('id','new_input_'+nbregenere);
            newInput.setAttribute('class','new_input');
            newInput.innerHTML = `ENTRER VOTRE REPONSE/<input class="input-reponse"
             type="text" name="reponse" id="">
            <img src="public/icones/ic-supprimer.png" alt="delete" class="button_supp"
             onclick="onDeleteInput(${nbregenere})">`;
            divInputs.appendChild(newInput);
        }

        function addInputMultiple() {
            nbregenere++;
            var divInputs = document.getElementById("inputs");
            var newInput = document.createElement("div");
            newInput.setAttribute('id','new_input_'+nbregenere);
            newInput.setAttribute('class','new_input');
            newInput.innerHTML = `ENTRER VOTRE REPONSE/<input class="input-reponse" type="text" 
            name="reponse[${count_multiple}]" id="texte">
            <input type="checkbox" name="reponse_vrai[${count_multiple}]" id="simple" 
            value="reponse${count_multiple}" class="check">
            <img src="public/icones/ic-supprimer.png" alt="delete" class="button_supp" 
            onclick="onDeleteInput(${nbregenere})">`;
            divInputs.appendChild(newInput);
            count_multiple++;
        }
      
            function add(){
                var type = document.getElementById("type_reponse").value;
                if (type == 'multiple') {
                    return addInputMultiple();
                } else if (type == 'simple') {
                    return addInputSimple();
                }
            }
        
       
            function onDeleteInput(n){
            var target = document.getElementById('new_input_'+n);  
                     setTimeout(function(){
                        target.remove();
                    },500)
                    fadeout('new_input_'+n);
        }

        function fadeOut(idTarget){
                    var target = document.getElementById(idTarget);
                    var effect = setInterval(function(){
                        if(!target.style.opacity){
                            target.style.opacity = 1;
                        }
                        if(target.style.opacity>0){
                            target.style.opacity = 0.1;
                        }else{
                            clearInterval(effet);
                        }
                    },200); 
                }




</script>










<style>
    .contenu_create_quizz{
        width:90%;
        margin-left:30px;
    }
    h4{
        margin:-1px 0px 5px 150px;
        padding:10px;
        font-size:23px;
        color:#51bfd0;
    }
    .contenu_create_quizz_body{
        width:initial;
        height:420px;
        border:1px solid #51bfd0;
        border-radius: 15px/35px;
    }
   
    .enregistrer{
        width: 15%;
        position:absolute;
        top:440px;
        right:10px;
    }
    .nombre{
    width:80px;
    height:30px;
    background-color:rgb(219, 212, 212);
    border:1px solid rgb(219, 212, 212);
    border-bottom:#51bfd0 1px solid;
     border-radius:2px; 
    }
    select{
    width:320px;
    height:40px;
    background-color:rgb(219, 212, 212);
     border:1px solid rgb(219, 212, 212);
     border-bottom:#51bfd0 1px solid;
     border-radius:2px;  
    }
    .enregistrer input{
        background-color: #3addd6;
        border-radius: 3px;
        padding:5px;
    color:white
    }
    .bloc_form{
        padding:10px;
        font-size:23px;
    }
    .form_quizz{ 
        float:left;
        position:relative;
        top:25px;  
    }
    .form_text{
        float:right;
        position:relative;
        right:10px;
        bottom:0px;
    }
    textarea{
    width:490px;
    height:80px; 
    background-color:rgb(219, 212, 212);  
    border:1px solid rgb(219, 212, 212);
    border-bottom:#51bfd0 1px solid;
    border-radius:2px; 
    }
    .button_supp{
        position:relative;
        top:5px;
        left:3px;
    }
.genere{
    position:relative;
    top:14px;
}

.new_input{
    padding:10px;
}
.input-reponse{
    width:300px;
    height:25px;
    background-color:rgb(219, 212, 212);
    border:1px solid rgb(219, 212, 212);
    border-bottom:#51bfd0 1px solid;
    border-radius:2px; 
}
</style>





