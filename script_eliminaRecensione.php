<?php
    session_start();
    include("./connection/connessione.php");
    $result = $conn->query("DELETE FROM recensione WHERE id_recensione = ". $_POST["id"]);
    if ($result) {
        if ($result->affected_rows = 0) {
            $_SESSION["erroreEliminazione"] = 'Impossibile eliminare la recensione!';
        }
    } else {
        $_SESSION["erroreEliminazione"] = 'Errore nella query!';
    }
    header("Location: homepage.php");
    exit;
?>