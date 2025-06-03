<?php
    session_start();
    if (!isset($_SESSION["erroreLogin"])) {
        $_SESSION["erroreLogin"] = -1;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ForkScore</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="mt-5 w-50 divBackground">
        <h1 class="text-center">Accedi</h1>
        <form action="./login.php" method="post">
            <div class="mb-3">
                <label for="username" class="form-label"><b>Username</b></label>
                <input type="text" class="form-control" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label"><b>Password</b></label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <p>Non hai un account? <a href="./pannelloregistrazione.php"> Registrati ora!</a></p>
            <button type="submit" class="btn btn-success">Invia</button><br>
            <?php
                if ($_SESSION["erroreLogin"] == 1) {
                    echo "<br><p class='text-danger'>Username inesistente!</p>";        
                }  else if ($_SESSION["erroreLogin"] == 2) {
                    echo "<br><p class='text-danger'>Password errata!</p>";
                }
                $_SESSION["erroreLogin"] = -1;
            ?>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-q8vbdOJ9FB6c+Od76PVCmYl38J5+B0Sk/sPil9/JAzlZMI6JYt" crossorigin="anonymous"></script>
</body>

</html>