<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="stile.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
     
        <?php
        include "header.php";
        ?>  
        
    <div class="container">
        <div class="login"><p>Login Form</p></div>
        <div class="form-group">    
            <form action="" method="post">
            
                <div class="name">
                    <input type="text"  id='login' name="login"  value="<?= @$_POST['login'] ?>" placeholder="Login">
                    <div class="image"><img src="icones/ic-login.png" alt="user"></div>
                </div>
            
                <div class="pass">
                    <input type="password" name="password"  value="<?= @$_POST['password'] ?>" placeholder="Mot de pass">
                    <div class="image"><img src="icones/ic-password.png" alt="password " ></div>
                </div>
            
                <div class="ok">
                    <input type="submit" name="Connexion" id="boutton_envoi" value="Connexion">
                    <div class="inscrip"><a href="inscription.php">S'inscrire pour jouer?</a></div>
                </div>

            </form>
        </div>
    </div> 
</body>
</html>
<?php
session_start();
            if(isset($_POST['Connexion'])){
                $fichier='page.json';
                $js=file_get_contents($fichier);
                $js=json_decode($js);

                 if(empty($_POST['login']) || empty($_POST['password'])){

                        echo "<p style='color:red'>Ce champs est obligatoire</p>";

                }
                else{

                            if(($_POST['login']==$js [0]->login) &&  ($_POST['password']==$js [0]->password)){
                                $_SESSION["prenom"]=$js [0]->prenom;
                                $_SESSION["nom"]=$js [0]->nom;
                                    header ("location: interfaceJoueur.php");//redirection

                            }else if(($_POST['login']==$js [1]->login) && ($_POST['password']==$js [1]->password)){
                                $_SESSION["prenom"]=$js [1]->prenom;
                                $_SESSION["nom"]=$js [1]->nom;
                                    header ("location: accueilAdmin.php");////redirection

                            }else{

                                    echo "<p style='color:red'>login ou mot de passe incorrect</p>";//message d'erreur

                                }
                }
                    
            }


		?>