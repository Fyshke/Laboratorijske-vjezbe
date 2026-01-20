<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'Prodaja';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // dobavljac
    $pdo->exec("INSERT INTO Dobavljac (dobavljacID, nazivDob, adresa, telefon) VALUES 
        (1, 'Kraš', 'Ravnice 48, Zagreb', '01 2396 111'),
        (2, 'Labud', 'Radnička cesta 173 r, Zagreb', '01 2396 111'),
        (3, 'Podravka', 'Ante Starčevića 32, Koprivnica', '048 651 144')");
    echo "Dobavljac podaci uspješno uneseni. ";

    // kategorija
    $pdo->exec("INSERT INTO Kategorija (kategorijaID, nazivKat) VALUES 
        (1, 'juna'),
        (2, 'dodatak jelu'),
        (3, 'čokolada'),
        (4, 'keksi'),
        (5, 'deterdžent')");
    echo "Kategorija podaci uspješno uneseni. ";

    // proizvod
    $pdo->exec("INSERT INTO Proizvod (proizvodID, nazivPro, cijena, kolicina, dobavljacID, kategorijaID) VALUES 
        (1, 'Oliver Futura', 34.99, 25, 2, 5),
        (2, 'Vegeta pikant', 12.50, 100, 3, 2),
        (3, 'Dorina Mousse', 7.05, 70, 1, 3),
        (4, 'Životinjsko carstvo', 1.45, 150, 1, 3)");
    echo "Proizvod podaci uspješno uneseni. ";
} catch (PDOException $e) {
    echo "Greška: " . $e->getMessage();
}
