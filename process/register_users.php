<?php
session_start();

if (!empty($_POST['userName'])) {
   
    require_once "../setting/connexion.php";
    
    $sqlrequestUsers = $connexion->prepare("SELECT * FROM users WHERE user_name = '" .  $_POST['userName'] . "'");
    $sqlrequestUsers->execute();
    $newUser = $sqlrequestUsers->fetch(PDO::FETCH_ASSOC);

    if (!empty($newUser['user_name'])) {
        
        $_SESSION['users'] = $newUser['user_name'];
        $_SESSION['points'] = 0;
        $_SESSION['questions'] = [];
        $_SESSION['NBRquestions'] = 0;
        $_SESSION['ID_users'] = $newUser['ID'];
    
        header("Location: ../index.php");


    }else {
        
        $insertUserRequest = $connexion->prepare(
                "INSERT INTO users (user_name) VALUES (?)");
        $insertUserRequest->execute([
                $_POST['userName']]);

            $_SESSION['users'] = $_POST['userName'];
            $_SESSION['points'] = 0;
            $_SESSION['questions'] = [];
            $_SESSION['NBRquestions'] = 0;
            $_SESSION['ID_users'] = $connexion->lastInsertId();
    }

    header("Location: ../index.php");
}