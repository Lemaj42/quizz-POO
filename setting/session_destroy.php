<?php
session_start();

if (!empty($_SESSION['users'])){

    session_destroy();

    header('Location: ../index.php');
}