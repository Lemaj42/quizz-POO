<?php 

// include "../setting/verification_superglobal.php";
// die;

if (!empty($_POST['question'])
    && !empty($_POST['reponse1'])
    && !empty($_POST['reponse2'])
    && !empty($_POST['reponse3'])
    && !empty($_POST['reponse4'])
    ) {
 
    require_once "../setting/connexion.php";
 
   $prepareRequest = $connexion->prepare(
        "INSERT INTO questions (question) VALUES (?)");
    $prepareRequest->execute([
        $_POST['question'],
    ]);

      $id_question = $connexion->lastInsertId();
         

       $prepareRequest = $connexion->prepare(
           "INSERT INTO reponse (id_question, reponse_content, goodanswer) VALUES (?,?,?)");

            $prepareRequest->execute([
                $id_question,
                $_POST['reponse1'],
                $_POST['check1'] ?? 0
            ]);

            $prepareRequest->execute([
                $id_question,
                $_POST['reponse2'],
                $_POST['check2'] ?? 0
            ]);

            $prepareRequest->execute([
                $id_question,
                $_POST['reponse3'],
                $_POST['check3']?? 0
            ]);

            $prepareRequest->execute([       
                $id_question,
                $_POST['reponse4'],
                $_POST['check4']?? 0
            ]);  
      
      header("Location: ../pages/submit_question-response.php");
 }

