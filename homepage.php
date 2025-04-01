<?php
    session_start();
    if ($_SESSION["erroreLogin"] != 0) {
        header("Location: index.php");
    }    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Accesso effettuato!</p>
    <a href="./logout.php">Logout</a>
</body>
</html>