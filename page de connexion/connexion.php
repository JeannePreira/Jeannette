<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="stile.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <div class="contenue">  
        <?php
        include "header.php";
        ?>  
        <div class="connecte">
                <div class="login">
                      <p>Login Form</p>
                </div>
        <div> 
    <form action="" method="post">
        <div class="ine"> 
                    <div class="name">
                        <input type="text" name="login" placeholder="Login">
                    </div>
                    <div class="image">
                        <img src="icones/icone-user.png" alt="user">                        
                    </div>
        </div>
        <div class="motPasse"> 
                    <div class="pass">
                        <input type="password" name="Mdp" placeholder="Mot de pass">
                    </div>
                    <div class="image">
                        <img src="icones/icone-password.png" alt="password " >
                    </div>
        </div>
        <div class="validation">         
                    <div class="ok">
                        <input type="submit" value="Connexion">
                    </div>
                    <div class="inscrip">
                        <a href="inscription.php">S'inscrire pour jouer?</a>
                    </div>
        </div>
    </form>
</div> 
</body>
</html>
<?php
			$user_Login="jeanne";
      $user_Mdp="soy-unica";
      $admin_Login="admin";
      $admin_Mdp="admin";

            if(isset($_POST['login']) && isset($_POST['Mdp'])){
                $pseudo=$_POST['login'];
                $mdp=$_POST['Mdp'];

                if ($pseudo ==$user_Login && $mdp ==$user_Mdp){
                  session_start ();
                  $_SESSION['login'] = $pseudo;
                  $_SESSION['mdp'] = $mdp;
                   
                  
                  // on redirige notre visiteur vers une page de notre section membre
                  header ("location: interfaceJoueur.php");

                }

                elseif($pseudo ==$admin_Login && $mdp ==$admin_Mdp){
                    session_start ();
                  $_SESSION['login'] = $pseudo;
                  $_SESSION['mdp'] = $mdp;

                  // on redirige notre visiteur vers une page de notre section membre
                  header ("location: accueilAdmin.php");

                  } 
                  else{
                      echo"VEILLEZ VOUS INSCRIRE!";
                  }
            
            }


		?>