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
    <title>Admin - Dobavljači</title>
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
        <h3>Baza dobavljača</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Naziv</th>
                <th>Adresa</th>
                <th>Telefon</th>
            </tr>
            <?php
            $stmt = $pdo->query("SELECT * FROM Dobavljac");
            $upit = $stmt->fetchAll(PDO::FETCH_OBJ);
            $broj = 0;
            foreach ($upit as $red) {
                echo "<tr>";
                echo "<td>" . $red->dobavljacID . "</td>";
                echo "<td>" . $red->nazivDob . "</td>";
                echo "<td>" . $red->adresa . "</td>";
                echo "<td>" . $red->telefon . "</td>";
                echo "</tr>";
                $broj++;
            }
            ?>
        </table>
        <p>Broj dobavljača: <?php echo $broj; ?></p>
    </div>
</body>

</html>