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
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center p-3">Login</h1>
    <div class="mx-auto w-50 p-3 border border-dark border-2 rounded-3">
        <form action="./login.php" method="post">
            <div class="mb-3">
                <label for="username" class="form-label"><b>Username</b></label>
                <input type="text" class="form-control" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label"><b>Password</b></label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Invia</button><br><br>
            <p class="text-danger"><?php
                if ($_SESSION["erroreLogin"] == 1) {
                    echo "Username inesistente!";        
                }  else if ($_SESSION["erroreLogin"] == 2) {
                    echo "Password errata!";
                }
                $_SESSION["erroreLogin"] = -1;
            ?></p>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-q8vbdOJ9FB6c+Od76PVCmYl38J5+B0Sk/sPil9/JAzlZMI6JYt" crossorigin="anonymous"></script>
</body>

</html>