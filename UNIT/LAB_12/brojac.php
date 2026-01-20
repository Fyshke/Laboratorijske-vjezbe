<?php
$datoteka = 'brojac.dat';
$broj = 0;

if (!file_exists($datoteka)) {
    $handle = fopen($datoteka, 'w');
    if ($handle === false) {
        die("Greška: Ne mogu kreirati datoteku $datoteka");
    }
    fwrite($handle, "0");
    fclose($handle);
}

$handle = fopen($datoteka, 'r');
if ($handle === false) {
    die("Greška: Ne mogu otvoriti datoteku $datoteka za čitanje");
}
$broj = (int) trim(fgets($handle));
fclose($handle);

$broj++;
echo "<h2>Vi ste $broj. posjetitelj ove stranice!</h2>";

$handle = fopen($datoteka, 'w');
if ($handle === false) {
    die("Greška: Ne mogu otvoriti datoteku $datoteka za pisanje");
}
fwrite($handle, $broj);
fclose($handle);

if (isset($_POST['obrisi'])) {
    if (unlink($datoteka)) {
        echo "<p style='color:green'>Brojač je uspješno obrisan. Sljedeći posjet će početi od 1.</p>";
    } else {
        echo "<p style='color:red'>Greška pri brisanju datoteke $datoteka</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <title>Brojač posjeta</title>
</head>

<body>
    <form method="post">
        <button type="submit" name="obrisi">Obriši brojač</button>
    </form>
    <p><a href="brojac.php">Osvježi stranicu</a></p>
</body>

</html>