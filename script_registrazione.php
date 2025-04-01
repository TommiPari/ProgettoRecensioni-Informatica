<?php
    session_start();
    include("./connection/connessione.php");
    $username = $_POST["username"];
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $email = $_POST["email"];
    $emailConferma = $_POST["emailConferma"];
    $password = $_POST["password"];
    $passwordConferma = $_POST["passwordConferma"];
    if ($email === $emailConferma) {
        if ($password === $passwordConferma) {
            if ($conn->query("SELECT username FROM utente WHERE username = '$username'")->num_rows == 0) {
                if ($conn->query("SELECT email FROM utente WHERE email = '$email'")->num_rows == 0) {
                    $_SESSION["erroreRegistrazione"] = 0;
                    header("Location: index.php");
                    exit;
                } else {
                    $_SESSION["erroreRegistrazione"] = 2;
                    header("Location: registazione.php");
                    exit;
                }
            } else {
                $_SESSION["erroreRegistrazione"] = 1;
                header("Location: registazione.php");
                exit;
            }
        } else {
            $_SESSION["erroreRegistrazione"] = 4;
            header("Location: registazione.php");
            exit;
        }
    } else {
        $_SESSION["erroreLogin"] = 3;
        header("Location: registazione.php");
        exit;
    }
?>