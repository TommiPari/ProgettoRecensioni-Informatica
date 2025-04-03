<?php
    session_start();
    include("./connection/connessione.php");
    $username = $_POST["username"];
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $email = $_POST["email"];
    $password = hash("sha256", $_POST["password"]);
    if ($conn->query("SELECT username FROM utente WHERE username = '$username'")->num_rows == 0) {
        if ($conn->query("SELECT email FROM utente WHERE email = '$email'")->num_rows == 0) {
            $conn->query("INSERT INTO utente (username, nome, cognome, email, password) VALUES ('$username', '$nome', '$cognome', '$email', '$password')");
            $_SESSION["erroreRegistrazione"] = 0;
            header("Location: index.php");
            exit;
        } else {
            $_SESSION["erroreRegistrazione"] = 2;
            header("Location: registrazione.php");
            exit;
        }
    } else {
        $_SESSION["erroreRegistrazione"] = 1;
        header("Location: registrazione.php");
        exit;
    }
?>