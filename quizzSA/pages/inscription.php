<div class="contenue_inscription">
    <div class="header_inscription">
        <div class="gras">S'INSCRIRE</div>
        <div class="sous_titre">Pour tester votre niveau de culture générale</div>
    </div>
    <hr>
    <div class="formulaire_inscription">
        <form action="" method="post">
            <div class="row_login">

                <div class="row_login_p">Prenom</div>
                <input type="text" name="prenom" id="" class="row_login_input" placeholder='Aaaaa'>
                <div class="error">aaa</div>

            </div>

            <div class="row_login">
                <div class="row_login_p">Nom</div>
                <input type="text" name="nom" id="" class="row_login_input" placeholder='BBBB'>
                <div class="error">aaa</div>
            </div>
            <div class="row.login">
                <div class="row_login_p">Login</div>
                <input type="text" name="login" id="" class="row_login_input" placeholder='aabaab'>
                <div class="error">aaa</div>
            </div>
            <div class="row.login">
                <div class="row_login_p">pass</div>
                <input type="text" name="pass" id="" class="row_login_input" placeholder='..........'>
                <div class="error">aaaa</div>
            </div>
            <div class="row.login">
                <div class="row_login_p">Confirmer votre Password</div>
                <input type="text" name="c_pass" id="" class="row_login_input" placeholder='..........'>
                <div class="error">aaaa</div>
            </div>
            <div class="row_ligne">
                <div class="row_ligne_text">Avata</div>
                <div class="row_ligne_upload">Choisir un fichier</div>
            </div>
           <div class="button"><button type="submit">Créer compte</button></div> 
        </form>
    </div>
</div>

























<style>

.contenue_inscription{
    width:100%;
    height:450px;
    background-color:white;
    border-radius:5px;
}
.formulaire_inscription{
    width:60%;
    position:relative;
    left:20px;
}
.row_login_input{
    width:350px;
    height:30px;
    border-radius:5px;
    border:1px solid gray;
    
       
}
.row_login_p{
 padding:2px;
    
}
.row_ligne_upload{
    float:right;
    position:relative;
    right:100px;
    
}
.row_ligne_text{
    float:left;
}
.button{
    position:relative;
    top:35px;
}
</style>