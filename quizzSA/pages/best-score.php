<?php var_dump ($_SESSION);?>
    <div class="affiche-nom-prenom-score">
    <p>
        <strong>
        <span class="nom-prenom">
            <?php
                echo $_SESSION['prenom'];
            ?>
            &nbsp;
            <?php
                echo $_SESSION['nom'];
            ?>
            </span>

        <span class="score">
            <?php
                echo $_SESSION['score'].' pts';
            ?>
        </span>
        </strong>
    </p>
</div>

<style>

.affiche-nom-prenom-score {
    float: left;
    width: 100%;
}

.score{
    float: right;

}


</style>