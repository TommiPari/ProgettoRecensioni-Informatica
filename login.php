<?php
    session_start();
    include("./connection/connessione.php");
    $username = $_POST["username"];
    $password = hash("sha256", $_POST["password"]);
    if ($conn->query("SELECT username FROM utente WHERE username = '$username'")->num_rows > 0) {
        if ($conn->query("SELECT username FROM utente WHERE username = '$username' AND utente.password = '$password'")->num_rows > 0) {
            $_SESSION["erroreLogin"] = 0;
            $_SESSION["username"] = $username;
            header("Location: homepage.php");
            exit;
        } else {
            $_SESSION["erroreLogin"] = 2;
            header("Location: index.php");
            exit;
        }
    } else {
        $_SESSION["erroreLogin"] = 1;
        header("Location: index.php");
        exit;
    }
?>