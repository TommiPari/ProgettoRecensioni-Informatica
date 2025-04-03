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
    <div class="divInTheMiddle d-none" id="confermaLogout">
        <h1>Sei sicuro di voler effettuare il logout? </h1>
        <form action="./logout.php">
            <button type="submit" class="btn btn-success">Si</button>
        </form>
        <button class="btn btn-danger" onaction="">No</button>
    </div>
    <button onaction="" class="btn btn-primary">Logout</button>
</body>
</html>