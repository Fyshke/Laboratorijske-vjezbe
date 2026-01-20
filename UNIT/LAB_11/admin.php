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
?>
<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <title>Baza proizvoda</title>
    <style>
        table {
            border-collapse: collapse;
            width: 60%;
            margin: 20px auto;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div style="text-align: center;">
        <h3>Baza proizvoda</h3>
        <table>
            <tr>
                <th>Naziv proizvoda</th>
                <th>Količina</th>
                <th>Cijena</th>
                <th>Vrijednost robe</th>
                <th>Obriši</th>
            </tr>
            <?php

            $stmt = $pdo->query("SELECT proizvodID, nazivPro, kolicina, cijena, (cijena * kolicina) AS vrijednost FROM Proizvod");
            $brojpro = 0;
            $upit = $stmt->fetchAll(PDO::FETCH_OBJ);
            foreach ($upit as $red) {
                echo "<tr>";
                echo "<td>" . $red->nazivPro . "</td>";
                echo "<td>" . $red->kolicina . "</td>";
                echo "<td>" . $red->cijena . "</td>";
                echo "<td>" . $red->vrijednost . "</td>";
                echo "<td><a href='proizvod.php?action=uredi&id=" . $red->proizvodID . "'>[UREDI]</a></td>";
                echo "</tr>";
                $brojpro++;
            }
            ?>
        </table>
        <p><a href="potvrdi.php">Dodaj</a></p>
        <p>Broj proizvoda: <?php echo $brojpro; ?></p>
    </div>
</body>

</html>