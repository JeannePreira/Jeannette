<?php
    require_once('./traitement/fonctions.php');
    $msg_erreur="";

    if (empty($_POST['prenom'])){
        $msg_erreur= "Veullez saisir votre prenom svp.";
    }else
        if (is_Prenom_valide($_POST['prenom'])){
            $prenom= $_POST['prenom'];

            if (empty($_POST['nom'])){
                $msg_erreur= "Veullez saisir votre nom svp.";
            }else
                if (is_nom_valide($_POST['nom'])){
                    $nom= $_POST['nom'];

                    if (empty($_POST['login'])){

                        $msg_erreur= "Veullez saisir votre login svp.";

                    }else{

                        $js= file_get_contents('utilisateur.json');

                        $js= json_decode($js, true);

                        foreach ($js as $v) {
                            if ($v['login']==$_POST['login']){
                                $msg_erreur="Ce login exist deja.";
                            }
                         }
                    }
                    
                        if (empty($_POST['password']) || preg_match("/[\s+]/", $_POST['password'])){
                                $msg_erreur= "Veullez saisir un mot de passe ne contenant pas de caractéres vide.";
                        }else
                            if (isset($_POST['confirm']) && isset($_POST['password'])){
                                if ($_POST['confirm'] != $_POST['password']){
                                $msg_erreur= "Veullez saisir des mots de passe identique.";
                                }else
                                if (isset($_POST['creer_compte']) && ($msg_erreur!="Ce login exist deja.") && isset($_SESSION['statut'])){

                                // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
                                    if (isset($_FILES['monfichier']) && $_FILES['monfichier']['error'] == 0)
                                    {
                                            // Testons si le fichier n'est pas trop gros
                                            if ($_FILES['monfichier']['size'] <= 1000000)
                                            {
                                                    // Testons si l'extension est autorisée
                                                    $infosfichier = pathinfo($_FILES['monfichier']['name']);
                                                    $extension_upload = $infosfichier['extension'];
                                                    $extensions_autorisees = array('jpg', 'jpeg', 'png');
                                                    $image='photos/' . basename($_FILES['monfichier']['name']);
                                                    if (in_array($extension_upload, $extensions_autorisees))
                                                    {
                                                            // On peut valider le fichier et le stocker définitivement
                                                            move_uploaded_file($_FILES['monfichier']['tmp_name'], $image);
                                                            chmod ($image, 0755);
                                                            echo "L'envoi a bien été effectué !";
                                                    }else{
                                                        echo "L'envoi a echoué.";
                                                    }
                                            }
                                    }
                                    $creer_compte_admin=array();

                                    $creer_compte_admin['prenom']=$_POST['prenom'];
                                    $creer_compte_admin['nom']=$_POST['nom'];
                                    $creer_compte_admin['login']= $_POST['login'];
                                    $creer_compte_admin['password']= $_POST['password'];
                                    $creer_compte_admin['profil']="admin";
                                    $creer_compte_admin['photo']= $_FILES['monfichier']['name'];

                                    $js= file_get_contents('utilisateur.json');

                                    $js= json_decode($js, true);
                                    
                                    $js[]= $creer_compte_admin;

                                    $js= json_encode($js);

                                    file_put_contents('utilisateur.json', $js);

                                    header ('Location:index.php?lien=acceuil');
                                }else
                                    if ((isset($_POST['creer_compte'])) && ($msg_erreur!="Ce login exist deja.") && !isset($_SESSION['statut'])){
                                        
                                        // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
                                        if (isset($_FILES['monfichier']) && $_FILES['monfichier']['error'] == 0)
                                        {
                                                // Testons si le fichier n'est pas trop gros
                                                if ($_FILES['monfichier']['size'] <= 1000000)
                                                {
                                                        // Testons si l'extension est autorisée
                                                        $infosfichier = pathinfo($_FILES['monfichier']['name']);
                                                        $extension_upload = $infosfichier['extension'];
                                                        $extensions_autorisees = array('jpg', 'jpeg', 'png');
                                                        $image='photos/' . basename($_FILES['monfichier']['name']);
                                                        if (in_array($extension_upload, $extensions_autorisees))
                                                        {
                                                                // On peut valider le fichier et le stocker définitivement
                                                                move_uploaded_file($_FILES['monfichier']['tmp_name'], $image);
                                                                chmod ($image, 0755);
                                                                echo "L'envoi a bien été effectué !";
                                                        }else{
                                                            echo "L'envoi a echoué.";
                                                        }
                                                }
                                        }

                                        $creer_compte_joueur=array();

                                        $creer_compte_joueur['prenom']=$_POST['prenom'];
                                        $creer_compte_joueur['nom']=$_POST['nom'];
                                        $creer_compte_joueur['login']= $_POST['login'];
                                        $creer_compte_joueur['password']= $_POST['password'];
                                        $creer_compte_joueur['profil']="joueur";
                                        $creer_compte_joueur['photo']= $_FILES['monfichier']['name'];
                                        $creer_compte_joueur['score']="0";

                                        $js= file_get_contents('utilisateur.json');

                                        $js= json_decode($js, true);

                                        $js[]= $creer_compte_joueur;

                                        $js= json_encode($js);

                                        file_put_contents('utilisateur.json', $js);

                                        header ('Location:index.php');
                                    }
                            }
                }
        }
        

?>

    
            <div class="inscription_joueur">
                <div class="titre_2">
                    <h2>S'INSCRIRE</h2>
                    <p>Pour tester votre niveau de culture général</p>
                    
                </div>

                
  
           
                <form method="POST" action="" id="form-inscription" enctype="multipart/form-data">
                    
                    <div class="input_inscription">
                    
                        <div class="login_line">
                            <label for="prenom" name="prenom">Prenom</label> <br>
                            <input type="text" name="prenom" id="prenom" error="error-3" placeholder="Aaaaa" value="<?php if(isset($_POST['prenom'])) { echo $_POST['prenom']; } ?>">
                        </div>

                        <div class="login_line">
                            <label for="nom" name="nom">Nom</label><br>
                            <input type="text" name="nom" id="nom" error="error-4" placeholder= "BBBBB" value="<?php if(isset($_POST['nom'])) { echo $_POST['nom']; } ?>">
                        </div>
                        
                        <div class="login_line">
                            <label for="login" name="login">Login</label><br>
                            <input type="text" name="login" id="login" error="error-5" placeholder= "aaabb"value="<?php if(isset($_POST['login'])) { echo $_POST['login']; } ?>">                        
                        </div>
                        
                        <div class="login_line">
                            <label for="password" name="password">Password</label><br>
                            <input type="password" name="password" id="password" error="error-6" placeholder= "• • • • • • • • • • • • • • • • •" value="<?php if(isset($_POST['password'])) { echo $_POST['password']; } ?>">
                        </div>
    
                        <div class="login_line">
                            <label for="confirm" name="confirm">Confirm Password</label><br>
                            <input type="password" name="confirm" id="confirm" error="error-7" placeholder= "• • • • • • • • • • • • • • • • •" value="<?php if(isset($_POST['confirm'])) { echo $_POST['confirm']; } ?>">
                        </div>
                        
                        <div class="envoi_fichier">
                                <input type="file" name="monfichier" id="imag" onchange="previewImage(event)"/>
                        </div>

                        <div class="submit_creer_compte_utilisateur">
                            <a href="interface_joueur.php">
                                <input type="submit" name="creer_compte" value="Creer un compte">
                            </a>
                        </div>
                        
                    </div>
                </form>
                <span class="erreur"><strong>   <?php if (isset($msg_erreur)){ echo  $msg_erreur;} ?>   </strong></span>

        <?php
            if (isset($_SESSION['user']['prenom']) && ($_SESSION['user']['nom'])){
        ?>
        <div class="avatar-inscription-admin">

            <div class="donnees_avatar">
               
                <img src="" id="im" class="image-ronde-avatar">
                    <div class="nom_prenom_avatar">
                        <p>
                            <strong>
                                <?php
                                    echo $_SESSION['user']['prenom'];
                                ?>
                                <br>
                                <?php
                                    echo $_SESSION['user']['nom'];
                                ?>
                            </strong>
                        </p>
                    </div>
            </div>

        </div>
        <?php
            }else{
        ?>
                <div class="avatar-inscription-joueur">
                    <div class="donnees_avatar">
                        <img src="" id="im" class="image-ronde-avatar">
                    </div>
                </div>
        <?php
            }
        ?>

    
</div>
    <script>
    function previewImage(event)
    {
        var reader=new FileReader();
        var imageField=document.getElementById("im")
        reader.onload=function()
        {
            if(reader.readyState==2)
            {
                imageField.src=reader.result;
            }
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
    
                



    
<script>
    const inputs= document.getElementsByTagName("input");
    for (input of inputs){
        input.addEventListener("keyup",function(e){
           if (e.target.hasAttribute("error")){
               var idDivError=e.target.getAttribute("error");
               document.getElementById(idDivError).innerText=""
           }
        })
    }
    document.getElementById("form-inscription").addEventListener("submit",function(e){
        const inputs= document.getElementsByTagName("input");
        var error=false;
        for (input of inputs){
            if (input.hasAttribute("error")){
                var idDivError=input.getAttribute("error");
            if (!input.value){
                document.getElementById(idDivError).innerText="Ce champ est obligatoire."
                error=true
            }
            
            }
        }

        if(error){
            e.preventDefault();
            return false;
        }
           
    })
</script>




<style>
.inscription_joueur{
    width:90%;
    height:480px;
    background-color:white;
    border-radius:5px;
    border:1px solid white;
    margin-left:50px;
}

.titre_2{
    width:60%;
    height:50px;
    border-bottom:2px solid #C0C0C0;
}
.titre_2 h2{
    position:relative;
    bottom:40px;
    left:10px;
    top:-12px;
}
.titre_2 p{
    font-size:20px;
    position:relative;
    bottom:35px;
    left:10px;
}
.login_line{
    margin-left:20px;
}
.login_line label{
    
    margin:5px;
}
.login_line input{
    width:50%;
    height:40px;
    border-radius:5px;
}

.envoi_fichier{
    position:relative;
    top:15px;
    left:50px;
}
.submit_creer_compte_utilisateur{
    position:relative;
    top:15px;
    left:150px;
}
.submit_creer_compte_utilisateur input{
    background-color:pink;
    padding:10px;
}
.erreur {margin-top: 28%; margin-left: 10%; color: red;}

.avatar-inscription-admin {
    float: right;
    width: 50%;
    height: 50%;
    left: 60%;
    bottom: 40%;
    margin-top: 0%;
    position: absolute;
}

.avatar-inscription-joueur {
    float: right;
    width: 50%;
    height: 50%;
    margin-top: 0%;
    position: relative;
}

.donnees_avatar{
    width: 100%;
    height: 100%;
    position: relative;
}

.image-ronde-avatar {
    float: left; 
    width : 150px; 
    height : 150px; 
    position:relative;
    left:220px;
    top:20px; 
    border: none; 
     
    border-radius : 75px;
    border: 2px solid darkturquoise;
}

.nom_prenom_avatar p{
    float: left;
    position:relative;
    left:130px;
    top:180px;
    text-align: center;
    color: black;
}
</style>
               