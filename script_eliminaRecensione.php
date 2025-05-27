<?php
    session_start();
    include("./connection/connessione.php");
    $result = $conn->query("DELETE FROM recensione WHERE id_recensione = ". $_POST["id"]);
    if (!$result) {
        $_SESSION["erroreEliminazione"] = 'Errore nella query!';
    }
    header("Location: homepage.php");
    exit;
?>