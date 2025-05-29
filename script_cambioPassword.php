<?php
    session_start();
    include("./connection/connessione.php");
    $password = hash("sha256", $_POST["password"]);
    $result = $conn->query("UPDATE utente SET `password` = '$password' WHERE username = '". $_SESSION["username"] ."'");
    if ($result) {
        if ($conn->affected_rows > 0) {
            $_SESSION["erroreCambioPassword"] = 0;
        } else {
            $_SESSION["erroreCambioPassword"] = 1;
        }
    } else {
        $_SESSION["erroreCambioPassword"] = 2;
    }
    header("Location: account.php");
    exit;
?>