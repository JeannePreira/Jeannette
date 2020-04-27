         
            <div class="right">
                <h4>LISTE DES JOUEURS PAR SCORE</h4>
                <div class="bloc-liste">
                    <?php
                        $js=file_get_contents('./data/utilisateur.json');
                        $js=json_decode($js,true);

                        foreach($js as $value){
                            if($value["profil"]="joueur"){
                                $joueur[]=$value;
                            }
                        }

                        $score=[];

                        foreach($joueur as $key=>$value){
                            array_push($score,$value['score']);
                        }

                        array_multisort($score, SORT_DESC, $joueur);

                    
                    $max=$_GET['page']*1;
                    $min=$max-1;
                    for($i=$min;$i<$max;$i++){
                        
                        echo $js[$i]["nom"];
                        echo $js[$i]["prenom"];
                        echo $js[$i]["score"];
                    }
                    $a=$_GET['page']+1;
                echo"<a href='index.php?lien=accueil&menu=listeJoueurs.php?page=$a'><button>suivant</button></a>";

?>
                           

            
             </div>
        </div>  
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
    margin: 15px 0px 10px 700px;
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
.right{
    width: 60%;
    height: 550px;
    float: right; 
    margin-right: 50px;
    background-color: white; 
    border-radius: 5px 5px 5px 5px;
}
h4{
    color:gray;
    position:relative;
    left:100px;
}
.bloc-liste{
    width:initial;
    border:1px solid blue;
    position:relative;
    top:10px;
    border-radius: 15px/35px;
}
.affiche-nom-prenom{
    position:relative;
   left:25px;
   
}


.score-joueur{
    float:right;
    position:relative;
   right:45px;
}

    </style>
