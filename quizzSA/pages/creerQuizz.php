
    

       

            <div class="right">
            <h4>PARAMETREZ VOS QUESTIONS</h4>
                <form action="" method="post" >
                <div class="formulaire">          
                    <div class="bloc2">
                        <label for="question"><p>Questions</p></label>
                        <textarea name="" id="" cols="30" rows="2"></textarea>
                    </div>

                    <div class="bloc2">
                        <label for="nbrPoint">Nbr de Points</label>
                        <select>
                            <?php
                            for ($i = 1; $i <= 100; $i++) {
                            ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php
                            }?>
                        </select>
                    </div>

                    <div class="bloc2">
                        <label for="typeRep">Type de réponse</label>
                        <select name="" id="">
                            <option value="0">Donnez le type de réponse</option>
                            <option value="texte">Texte</option>
                            <option value="multiple">Multiple</option>
                            <option value="simple">Simple</option>
                        </select>
                    </div>

                    <div class="bloc2">
                        <label for="rep">réponse 1</label>
                        <input type="text">
                    </div>

                    <div class="enregistrer">
                        <input type="submit" value="Enregistrer">
                    </div>
                                
                </form>
                
    </div>

<style>
    body{
    width: initial;
}
.container{
    width: 70%;
    height: 620px;
    margin:0px 0px 0px 200px;
    background-color: #f8fdfd;
    border-radius: 5px 5px 5px 5px;
}
.up{
    width: 70%;
    height: 50px;
    background-color: #51bfd0;
    margin:20px 0px 0px 200px;
}
h3{
   padding-left: 2px;
    color: #f8fdfd;
    position: absolute;
   margin-top: 15px;
   margin-left: 200px;  
}
.disconnexion a{
   
   background-color: #3addd6;
   border-radius: 5px/2px;
   padding: 3px;
   text-decoration: none;
   color:#042425;
}
.disconnexion{
    margin: 15px 0px 10px 770px;
    position: absolute;
 
}
.big-bloc{
    width: initial;
    height: 530px;
    border: #f8fdfd 3px solid;
}
/*menu*/

.left{
    width: 30%;
    height: 300px;
    border-radius: 5px 5px 5px 5px;
     background-color: white; 
     margin: 80px 0px 0px 10px; 
     float: left;   
   
}
.profil {
    width: initial;
    height: 110px;
    background-color:  #51bfd0;
    border-radius: 5px 5px 0px 0px;
}
.profil img{
    width: initial;
    height: 40px;
    margin: 10px 0px 0px 20px;
    border: #e56945 1px solid;   
    border-radius: 80px;
    padding: 3px;
    float: left;  
}
.bloc{
    width: initial;
    height: 30px;
    margin: 5px 0px 5px 5px;
    padding: 6px;
}
.bloc a{
    text-decoration: none;
    color: black;
    padding-left: 2px;
    float: left; 
    font-size: 20px;  
}
 .bloc img{
    width: 10%;
    height: 25px;
    margin-left: 50px;
    float: right;
}
.bloc:hover{
    border-left: 3px solid green;
}

/*affichage*/
.right{
    width: 60%;
    height: 550px;
    float: right; 
    margin-right: 50px;
    background-color: white; 
    border-radius: 5px 5px 5px 5px;
}
.formulaire{
    width: 90%;
    border: steelblue 1px solid;
    border-radius: 15px/35px;
    margin-left: 25px;
}
.blok{
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

 

 


ss
</style>





