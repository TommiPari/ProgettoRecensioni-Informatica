<?php if (isset($_SESSION["erroreEliminazione"])): ?>
    <div class="alert alert-danger text-center" role="alert">
        <?= $_SESSION["erroreEliminazione"]; unset($_SESSION["erroreEliminazione"]); ?>
    </div>
<?php endif; ?>
<?php
    $query = "
        SELECT r.id_recensione, rs.nome, rs.indirizzo, r.voto, r.data
        FROM recensione r
        JOIN utente u ON r.id_utente = u.id_utente
        JOIN ristorante rs ON rs.id_ristorante = r.id_ristorante
        WHERE u.username = '". $_SESSION["username"] ."'
    ";
    if ($result = $conn->query($query)) {
        if ($result->num_rows > 0): ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-center align-middle w-100">
                    <thead class="table-dark">
                        <tr>
                            <th>Nome</th>
                            <th>Indirizzo</th>
                            <th>Voto</th>
                            <th>Data</th>
                            <th>Elimina</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= htmlspecialchars($row["nome"]) ?></td>
                                <td><?= htmlspecialchars($row["indirizzo"]) ?></td>
                                <td><span class="badge text-dark"><?= $row["voto"] ?>⭐</span></td>
                                <td><?= date("d/m/Y", strtotime($row["data"])) ?></td>
                                <td>
                                    <form method="post" action="./script_eliminaRecensione.php">
                                        <button type="submit" name="id" value="<?= $row["id_recensione"] ?>" class="btn btn-sm btn-outline-danger">
                                            <i class="fa fa-trash"></i> Elimina
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="alert alert-info text-center" role="alert">
                Nessuna recensione effettuata.
            </div>
        <?php endif;
    } else {
        echo "<div class='alert alert-danger text-center'>Errore nella query.</div>";
    }
?>