<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'Prodaja';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Greška spajanja: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nazivPro = $_POST['nazivPro'] ?? '';
    $cijena = floatval($_POST['cijena'] ?? 0);
    $kolicina = intval($_POST['kolicina'] ?? 0);
    $dobavljacID = intval($_POST['dobavljacID'] ?? 0);
    $kategorijaID = intval($_POST['kategorijaID'] ?? 0);

    if (!empty($nazivPro) && $cijena > 0 && $kolicina >= 0 && $dobavljacID > 0 && $kategorijaID > 0) {
        $stmt = $pdo->prepare("INSERT INTO Proizvod (nazivPro, cijena, kolicina, dobavljacID, kategorijaID) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$nazivPro, $cijena, $kolicina, $dobavljacID, $kategorijaID]);
        echo "Novi proizvod uspješno dodan!";
    } else {
        echo "Greška: Svi podaci su obavezni.";
    }
}
?>
<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <title>Dodaj novi proizvod</title>
</head>

<body>
    <h3>Dodaj novi proizvod</h3>
    <form method="post">
        <label>Naziv proizvoda: <input type="text" name="nazivPro" required></label>
        <br>
        <label>Cijena: <input type="number" step="0.01" name="cijena" required></label>
        <br>
        <label>Količina: <input type="number" name="kolicina" required></label>
        <br>
        <label>Dobavljač ID: <input type="number" name="dobavljacID" required></label>
        <br>
        <label>Kategorija ID: <input type="number" name="kategorijaID" required></label>
        <br>
        <input type="submit" value="Dodaj">
        <br>
        <p><a href="admin.php"><--- Povratak</a></p>
    </form>
</body>

</html>