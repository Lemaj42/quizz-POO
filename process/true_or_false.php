<?php
session_start();
require_once "../setting/connexion.php";


if (isset($_POST['click_response'])) {
    
    if ($_POST['click_response'] == 1) {
        
       $_SESSION['points'] = $_POST['click_response'] + $_SESSION['points'];

                 if (isset($_SESSION['NBRquestions']) && ($_SESSION['NBRquestions']) < 9) {

                     $_SESSION['NBRquestions'] = $_SESSION['NBRquestions'] + 1;

                     header("location: ../pages/questions.php");   
                     die;


                 } else {
                    

                    $insertscore = $connexion->prepare(
                        "INSERT INTO score (score_total, id_user) VALUES (?, ?)");
                        
                        $insertscore->execute([
                        $_SESSION['points'],
                        $_SESSION['ID_users']]);

                     header("location: ../pages/score.php");
                     die;   
                 }
                      
        header("location: ../pages/questions.php");
        die;

    } elseif ($_POST['click_response'] == 0){

        $_SESSION['points'] = $_POST['click_response'] + $_SESSION['points'];
      
        if (isset($_SESSION['NBRquestions']) && ($_SESSION['NBRquestions']) < 9) {

            $_SESSION['NBRquestions'] = $_SESSION['NBRquestions'] + 1;

            header("location: ../pages/questions.php"); 
            die;  

            
        } else {
            
            
            $insertscore = $connexion->prepare(
                "INSERT INTO score (score_total, id_user) VALUES (?, ?)");
                
                $insertscore->execute([
                    $_SESSION['points'],
                    $_SESSION['ID_users']]);
                    
                    
                    header("location: ../pages/score.php");
                    die;
                    
                }
                
                header("location: ../pages/questions.php");
                die;
    }

} else {
    
    header("location: ../index.php");
    die;

}
