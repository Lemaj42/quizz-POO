<?php
session_start();
include "../setting/verification_superglobal.php";
require_once "../setting/connexion.php";
/* WHERE  REQUETTE A FINIR */
$afficherScore = $connexion->prepare(
    "SELECT * FROM score JOIN users WHERE id_user = users.ID ORDER BY score_total DESC");
$afficherScore->execute();

$scoreADD = $afficherScore->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/style_score.css">
</head>
<body>

        
        <div class="score_user">

        <?php if (!isset($_SESSION['points'])) {

                    ?> Pas de score pour l'instant...<?php

                 } else {
                
                if ($_SESSION['points'] > 5) {
                    ?> <p>Votre score : <?=$_SESSION['points']?> Bien joué ! </p> <?php
                }else {
                    ?> <p>Votre score : <?=$_SESSION['points']?> NUL !!! </p> <?php
                } 
            
        } ?>
            
        </div>

    <section class="score">    

    <div class="top3"> 
        <?php foreach ($scoreADD as $key => $afficherScore1) {
                if($key < 3){ 
                    ?><div class="list1"><b><?= $afficherScore1['user_name']?></b> a obtenue un score de : <?= $afficherScore1['score_total']?> </div>
        <?php } }?>
    </div>


    <div class="listScore">
        <?php foreach ($scoreADD as $key => $afficherScore1) {
                if ($key > 3) {
                    ?><div class="list2"><b><?= $afficherScore1['user_name']?></b> a obtenue un score de : <?= $afficherScore1['score_total']?> </div>
        <?php } }?>
    </div>

    </section>


    <section  class="acceuil">
       
        <form action="../setting/session_unset.php" method="post">
        <button type="submit">Acceuil</button>
        </form>
        
    </section>

</body>
</html> 