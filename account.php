<?php
    session_start();
    if (!$_SESSION["login"]) {
        header("Location: index.php");
        exit;
    }
    include("./connection/connessione.php");
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <div id="background">
        <?php include("./utilsPHP/navbar.php"); ?>
        <!-- Body -->
        <div class="mt-3 w-75 divBackground">
            <h1>Impostazioni account</h1><hr>
            <?php
                $username = $_SESSION["username"];
                $query = "SELECT username, nome, cognome, email, data_registrazione FROM utente WHERE username = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $result = $stmt->get_result();

            if ($result && $result->num_rows > 0): 
                $user = $result->fetch_assoc(); ?>
                <div class="table-responsive w-100 mb-4">
                    <table class="table table-bordered table-striped text-center align-middle w-75 mx-auto">
                        <thead class="table-dark">
                            <tr>
                                <th>Username</th>
                                <th>Nome</th>
                                <th>Cognome</th>
                                <th>Email</th>
                                <th>Data registrazione</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= htmlspecialchars($user["username"]) ?></td>
                                <td><?= htmlspecialchars($user["nome"]) ?></td>
                                <td><?= htmlspecialchars($user["cognome"]) ?></td>
                                <td><?= htmlspecialchars($user["email"]) ?></td>
                                <td><?= date("d/m/Y", strtotime($user["data_registrazione"])) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php else: ?>
                    <div class="alert alert-warning text-center">Informazioni utente non disponibili.</div>
                <?php endif; ?>
            <div>
                <h3>Cambio password</h3>
                <form action="./script_cambioPassword.php" method="post">
                    <div class="input-group">
                        <input type="password" class="form-control w-50" placeholder="Inserire una nuova password" name="password" required>
                        <span class="input-group-text bg-success"><button type="submit" class="btn btn-success">Invia</button></span>
                    </div>
                    <?php
                        if (isset($_SESSION["erroreCambioPassword"])) {
                            switch($_SESSION["erroreCambioPassword"]) {
                                case 0:
                                    echo "<p class='text-success'>Password cambiata con successo!</p>";
                                    break;
                                case 1:
                                    echo "<p class='text-danger'>Inserire una password differente da quella attuale</p>";   
                                    break;
                                case 2:
                                    echo "<p class='text-danger'>Errore nella query!</p>";
                                    break;
                            }
                        }
                        unset($_SESSION["erroreCambioPassword"]);
                    ?>
                </form>
            </div>
        </div>
    </div>
    <?php include("./utilsPHP/formLogout.html"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-q8vbdOJ9FB6c+Od76PVCmYl38J5+B0Sk/sPil9/JAzlZMI6JYt" crossorigin="anonymous"></script>
    <script src="./js/script.js"></script>
</body>
</html>