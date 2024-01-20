<?php
session_start();
//include "./setting/verification_superglobal.php";
require_once "./setting/connexion.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizz</title>
    <link rel="stylesheet" href="./style/style_index.css">
</head>
<body>
    
    <div class="titre"> 
        <h1> Nom du Quizz</h1>
    </div>
    <div class="connectedUser">
        <?php if (!empty($_SESSION['users'])) {
                ?>Connecter en temps que : <?=$_SESSION['users'];
        }else {
            ?> Personne n'est connecté <?php
        }?>
    </div>

<section class="first_page">

    <div class="connexion">
        <form action="./process/register_users.php" method="post">
            <div class="form-connexion">
                <label for="userName">Votre pseudo</label>
                <input type="text" name="userName">
                    <button type="submit">Connexion</button>
            </div>
        </form>

        
    </div>

    <div class="others">
        <button type="button"><a href="./pages/questions.php">Commencer le Quizz</a></button>
        <button type="button"><a href="./pages/score.php">Tableau des scores</a></button>
        <form action="./setting/session_destroy.php" method="post">
            <button type="submit">Déconnexion</button>
        </form>
    </div>

   

</section>

    <?php if (!empty($_SESSION['users']) && $_SESSION['users'] == 'lucas') { ?>
        <div class="admin"><a href="./pages/submit_question-response.php">admin</a></div>
       <?php }?>
        

    <script src="./JS/index.js"></script>
</body>
</html>