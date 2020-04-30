<?php 
//tester la fonction connexion
if(isset($_POST['btn_submit']))//pour vérifier si on acliker sur le bouton
{
    $login=$_POST['login'];//recupere login
    $pwd=$_POST['pwd'];//recupere mot de pass

    //traitement de connexion
    $result=connexion($login,$pwd); 
    if($result=='error'){
        echo "Login ou mots de pass incorrect"; 
    }else{ 
        header("location:index.php?lien=".$result);//aller à la page admin ou jeux
    }
}
?>
<div class="container">

    <div class="login">
        <div class="text">Login Form</div> 
    </div>

    <div class="form-blocs">    
        <form action="" method="post" id="form-connexion">

            <div class="form-bloc">
                <div class="line-icon line-icon-login"></div>
                <input type="text" class="control" error="error-1" name="login"  id="" placeholder="Login">
                <div class="line-error" id="error-1"></div>
            </div>

            <div class="form-bloc">
                <div class="line-icon line-icon-password"></div>
                <input type="password" class="control" error="error-2" name="pwd"  id="" placeholder="Password">
                <div class="line-error" id="error-2"></div>
            </div>
            
            <div class="form-bloc">
                <button type="text" class="line-btn" name="btn_submit"  id="">Connexion</button>
                <a href="index.php?lien=inscription" class="line-link">S'inscrire pour jouer</a>
            </div>

        </form>
    </div>
</div> 


<script>
const inputs=document.getElementsByTagName("input");
for(input of inputs){
    input.addEventListener("keyup",function(e){
       if(e.target.hasAttribute("error")) {
        var idDivError=e.target.getAttribute("error")
        document.getElementById(idDivError).innerText=""
       }
    })

}

document.getElementById("form-connexion").addEventListener("submit", function(e){
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