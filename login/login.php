<?php
    session_start();
    include("../utilsPHP/connessione.php");
    $username = $_POST["username"];
    $password = $_POST["password"];
    if ($conn->query("SELECT username FROM utente WHERE username = $username")) {
        if ($conn->query("SELECT username FROM utente WHERE username = $username AND passwrd = $password")) {
            header("Location: ./pages/index.php");
            exit;
        } else {
            $_SESSION["erroreLogin"] = 2;
            header("Location: ../index.php");
            exit;
        }
    } else {
        $_SESSION["erroreLogin"] = 1;
        header("Location: ../index.php");
        exit;
    }
?>