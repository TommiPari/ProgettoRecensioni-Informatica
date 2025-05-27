<?php
    session_start();
    include("./connection/connessione.php");
    $username = $_POST["username"];
    $password = hash("sha256", $_POST["password"]);
    if ($conn->query("SELECT username FROM utente WHERE username = '$username'")->num_rows > 0) {
        if ($conn->query("SELECT username FROM utente WHERE username = '$username' AND utente.password = '$password'")->num_rows > 0) {
            $_SESSION["erroreLogin"] = 0;
            $_SESSION["username"] = $username;
            if ($conn->query("SELECT admin FROM utente WHERE username = '".$_SESSION["username"]."'")->fetch_assoc()["admin"] == 1) {
                $_SESSION["admin"] = true;
                header("Location: pannelloadmin.php");
                exit;
            } else {
                $_SESSION["login"] = true;
                header("Location: homepage.php");
                exit;
            }
        } else {
            $_SESSION["erroreLogin"] = 2;
            header("Location: pannellologin.php");
            exit;
        }
    } else {
        $_SESSION["erroreLogin"] = 1;
        header("Location: pannellologin.php");
        exit;
    }
?>