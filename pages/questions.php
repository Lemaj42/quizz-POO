<?php
session_start();
include "../setting/verification_superglobal.php";
require_once "../setting/connexion.php";

        // REQUETES POUR LES QUESTIONS EN RANDOM
        $ignoreQuestion = implode(',', $_SESSION['questions']);
$afficherQuestions = $connexion->prepare(
    "SELECT * FROM questions WHERE ID_question NOT IN (?) ORDER BY RAND() LIMIT 1");
$afficherQuestions->execute([
    $ignoreQuestion
]);

    $questionsADD = $afficherQuestions->fetch(PDO::FETCH_ASSOC);
    array_push($_SESSION['questions'], $questionsADD['ID_question'] );



        // REQUETTE POUR LES REPONSE
$afficherReponse = $connexion->prepare(
    "SELECT * FROM reponse WHERE id_question = ? ORDER BY RAND() LIMIT 4");
$afficherReponse->execute([
    $questionsADD['ID_question']
]);

    $responseADD = $afficherReponse->fetchAll(PDO::FETCH_ASSOC);
?>

 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>questions</title>
    <link rel="stylesheet" href="../style/style_questions.css">
</head>
<body>

    <!-- BOUTON ACCEUIL !-->

    <div class="connected">
       <p> Vous jouez en tant que :<?= $_SESSION['users']?> </p>
    </div>

    <!--EMPLACEMENT QUESTION -->

    <section class="question">
        <div class="text_question">
            <?=$questionsADD['question'] ?>
        </div>
    </section>


    <!--EMPLACEMENT REPONSE !-->

    <section class="response-container">

    <form action="../process/true_or_false.php" class="response" method="post">

        <?php  foreach ($responseADD as $responseADD1) { ?>  
            <button id="BTNquestion"type="submit" name="click_response" value="<?=$responseADD1['goodanswer'] ?>"> <?=$responseADD1['reponse_content'] ?> </button>
            <input type="hidden" name="IDquestions" value="<?=[$questionsADD['ID_question']]?>">
            <?php } ?>
    </form>

    </section>

            <script src="../JS/index.js"></script>
</body>
</html>


