<?php
    session_start();
    if (!isset($_SESSION["erroreRegistrazione"])) {
        $_SESSION["erroreRegistrazione"] = -1;
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
    <h1 class="text-center p-3">Registrazione</h1>
    <div class="mx-auto w-50 p-3 border border-dark border-2 rounded-3">
        <form action="./login.php" method="post">
            <p class="text-danger"><?php
                switch ($_SESSION["erroreRegistrazione"]) {
                    case 1:
                        echo "Username già in uso!";        
                    case 2:
                        echo "Email già in uso!";
                    case 3:
                        echo "Le email non coincidono!";
                    case 4:
                        echo "Le password non coincidono!";
                }
                $_SESSION["erroreRegistrazione"] = -1;
            ?></p>
            <div class="mb-3">
                <label for="username" class="form-label"><b>Username *</b></label>
                <input type="text" class="form-control" name="username" required>
            </div>
            <div class="mb-3">
                <label for="nome" class="form-label"><b>Nome *</b></label>
                <input type="text" class="form-control" name="nome" required>
            </div>
            <div class="mb-3">
                <label for="cognome" class="form-label"><b>Cognome *</b></label>
                <input type="text" class="form-control" name="cognome" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label"><b>Email *</b></label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label for="emailConferma" class="form-label"><b>Conferma email *</b></label>
                <input type="email" class="form-control" name="emailConfemra" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label"><b>Password *</b></label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <div class="mb-3">
                <label for="passwordConferma" class="form-label"><b>Conferma password *</b></label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <input type="radio" required> Accetta termini e condizioni d'uso * <br>
            <input type="radio"> Iscriviti alla newsletter <br><br>
            <button type="submit" class="btn btn-primary">Registrati</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-q8vbdOJ9FB6c+Od76PVCmYl38J5+B0Sk/sPil9/JAzlZMI6JYt" crossorigin="anonymous"></script>
</body>

</html>