<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'Prodaja';

try {
    $veza = mysqli_connect($host, $user, $pass, $dbname);
    if (!$veza) {
        die("Greška pri spajanju: " . mysqli_connect_error());
    }
    mysqli_set_charset($veza, "utf8mb4");
} catch (Exception $e) {
    die("Greška: " . $e->getMessage());
}

$action = $_GET['action'] ?? '';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($action === 'obrisi' && $id > 0) {
    $delete_sql = "DELETE FROM Proizvod WHERE proizvodID = $id";
    if (mysqli_query($veza, $delete_sql)) {
        header("Location: admin.php");
        exit;
    } else {
        die("Greška pri brisanju: " . mysqli_error($veza));
    }
}

if ($action !== 'uredi' || $id <= 0) {
    header("Location: admin.php");
    exit;
}

$sql = "SELECT * FROM Proizvod WHERE proizvodID = $id";
$rezultat = mysqli_query($veza, $sql);
$proizvod = mysqli_fetch_assoc($rezultat);

if (!$proizvod) {
    echo "Proizvod s ID $id ne postoji.";
    mysqli_close($veza);
    exit;
}

$poruka = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nazivPro      = mysqli_real_escape_string($veza, $_POST['nazivPro'] ?? '');
    $cijena        = floatval($_POST['cijena'] ?? 0);
    $kolicina      = (int)($_POST['kolicina'] ?? 0);
    $dobavljacID   = (int)($_POST['dobavljacID'] ?? 0);
    $kategorijaID  = (int)($_POST['kategorijaID'] ?? 0);

    if (!empty($nazivPro) && $cijena > 0 && $kolicina >= 0 && $dobavljacID > 0 && $kategorijaID > 0) {
        $update_sql = "UPDATE Proizvod SET 
            nazivPro = '$nazivPro',
            cijena = $cijena,
            kolicina = $kolicina,
            dobavljacID = $dobavljacID,
            kategorijaID = $kategorijaID
            WHERE proizvodID = $id";

        if (mysqli_query($veza, $update_sql)) {
            $poruka = "Proizvod uspješno ažuriran!";
            header("Refresh: 2; url=admin.php");
        } else {
            $poruka = "Greška pri ažuriranju: " . mysqli_error($veza);
        }
    } else {
        $poruka = "Svi podaci su obavezni i moraju biti ispravni.";
    }
}
?>

<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <title>Uredi proizvod</title>
</head>

<body>

    <h2>Uredi proizvod: <?= htmlspecialchars($proizvod['nazivPro']) ?></h2>

    <?php if ($poruka): ?>
        <div class="<?= strpos($poruka, 'Greška') === false ? 'poruka' : 'greska' ?>">
            <?= $poruka ?>
        </div>
    <?php endif; ?>

    <form method="post">
        <label>Naziv proizvoda:</label>
        <input type="text" name="nazivPro" value="<?= htmlspecialchars($proizvod['nazivPro']) ?>" required>
        <br>
        <label>Cijena (€):</label>
        <input type="number" step="0.01" name="cijena" value="<?= $proizvod['cijena'] ?>" required>
        <br>
        <label>Količina:</label>
        <input type="number" name="kolicina" value="<?= $proizvod['kolicina'] ?>" required>
        <br>
        <label>Dobavljač ID:</label>
        <input type="number" name="dobavljacID" value="<?= $proizvod['dobavljacID'] ?>" required>
        <br>
        <label>Kategorija ID:</label>
        <input type="number" name="kategorijaID" value="<?= $proizvod['kategorijaID'] ?>" required>
        <br>
        <button type="submit">Spremi promjene</button>
        <a href="proizvod.php?action=obrisi&id=<?= $id ?>" onclick="return confirm('Jeste li sigurni da želite obrisati ovaj proizvod?')">[Obriši]</a>
    </form>

    <p><a href="admin.php"><--- Povratak</a></p>

</body>

</html>

<?php
mysqli_close($veza);
?>