<?php
session_start();

if (!empty($_SESSION['users'])) {
    
    $_SESSION['points'] = 0;
    $_SESSION['questions'] = [];
    $_SESSION['NBRquestions'] = 0;

}
header("Location: ../index.php");