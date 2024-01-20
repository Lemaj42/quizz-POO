<?php
session_start();
if (!empty($_SESSION['users']) && $_SESSION['users'] !== 'lucas') { 
    header("Location: ../index.php");
}
//include "../setting/verification_superglobal.php";
require_once "../setting/connexion.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/add_question.css">
</head>
<body>

    <header><h1>ADMIN : <?= $_SESSION['users']?></h1></header>

<section class="ajout">

    <form action="../process/add_question.php" method="post">

        <input type="text" name="question" id="fond1" placeholder="Intitulé de votre question :">

        <input type="text" name="reponse1" id="fond" placeholder="première réponse :">
        <input type="checkbox" name="check1" value="1" >

        <input type="text" name="reponse2" id="fond" placeholder="deuxieme réponse :">
        <input type="checkbox" name="check2" value="1" >

        <input type="text" name="reponse3" id="fond" placeholder="troisieme réponse :">
        <input type="checkbox" name="check3" value="1" >

        <input type="text" name="reponse4" id="fond" placeholder="quatrieme réponse :">
        <input type="checkbox" name="check4" value="1"> 
    <div class="button-submit">
        <button type="submit">Envoyer mon Quizz</button>
    </div>
    </form>

</section>

<div class="acceuil">
        <button><a href="../index.php">Acceuil</a></button>
    </div>

</body>
</html>