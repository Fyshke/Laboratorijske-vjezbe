<!DOCTYPE html>
<html lang="hr">

<head>
    <title>Labos 6</title>
</head>

<body>
    <h3>1. zadatak</h3>
    <?php

    $niz = range(200, 200 + 14 * 10, 10);

    echo "<strong>Originalni niz:</strong><br><pre>";
    print_r($niz);
    echo "</pre>";

    $izrezani = array_splice($niz, 5, 5);

    echo "Nakon array_splice():<br><pre>";
    print_r($niz);
    echo "</pre>";

    echo "Izrezani elementi:<br><pre>";
    print_r($izrezani);
    echo "</pre>";

    array_splice($izrezani, 1, 1, [-5, -15, -25]);

    echo "Uređeni izrezani niz:<br><pre>";
    print_r($izrezani);
    echo "</pre>";
    ?>


    <h3>2. zadatak</h3>

    <?php
    $artikli = ["Čokolada", "Energetsko piće", "Čokolino", "Gumeni bomboni", "Kola"];
    $proizvodac = ["Milka", "Monster", "Podravka", "Haribo", "Coca-Cola"];
    $cijena = [1.90, 2.45, 8.99, 3.50, 1.40];

    array_multisort($cijena, SORT_DESC, $artikli, $proizvodac);

    echo "<table border='1' cellpadding='5' style='border-collapse: collapse;'>
            <tr><th>Artikl</th><th>Proizvođač</th><th>Cijena</th></tr>";

    for ($i = 0; $i < count($artikli); $i++) {
        echo "<tr>
                <td>{$artikli[$i]}</td>
                <td>{$proizvodac[$i]}</td>
                <td>{$cijena[$i]}</td>
              </tr>";
    }

    echo "</table>";
    ?>


    <h3>3. zadatak</h3>

    <?php
    if (!isset($_SESSION['auti'])) {
        $_SESSION['auti'] = [
            "Audi" => "Limuzina",
            "BMW" => "Coupe",
            "Opel" => "Karavan",
            "Renault" => "Hatchback",
            "Volkswagen" => "Golf",
            "Kia" => "Sedan"
        ];
        $_SESSION['posljednje_sortiranje'] = '';
    }

    if (isset($_POST['gumb3'])) {
        $vrsta = $_POST['sortiranje3'];

        switch ($vrsta) {
            case "ksort":
                ksort($_SESSION['auti']);
                break;
            case "krsort":
                krsort($_SESSION['auti']);
                break;
            case "asort":
                asort($_SESSION['auti']);
                break;
            case "arsort":
                arsort($_SESSION['auti']);
                break;
        }
        $_SESSION['posljednje_sortiranje'] = $vrsta;
    }

    $auti = $_SESSION['auti'];
    $odabrano = $_SESSION['posljednje_sortiranje'];
    ?>

    <form method="post">
        <select name="sortiranje3">
            <option value="ksort" <?php if ($odabrano == 'ksort')   echo 'selected'; ?>>Sortiraj po ključu (A–Z)</option>
            <option value="krsort" <?php if ($odabrano == 'krsort')  echo 'selected'; ?>>Sortiraj po ključu (Z–A)</option>
            <option value="asort" <?php if ($odabrano == 'asort')   echo 'selected'; ?>>Sortiraj po vrijednosti (A–Z)</option>
            <option value="arsort" <?php if ($odabrano == 'arsort')  echo 'selected'; ?>>Sortiraj po vrijednosti (Z–A)</option>
        </select>
        <input type="submit" name="gumb3" value="Sortiraj">
    </form>

    <strong>Trenutni sortirani niz:</strong><br>
    <pre>
    <?php print_r($auti); ?>
</pre>


    <h3>4. zadatak</h3>
    <?php
    if (!isset($_SESSION)) session_start();

    if (!isset($_SESSION['brojevi4'])) {
        $_SESSION['brojevi4'] = [12, 5, 77, 3, 29, 48, 90, 1, 16, 72];
        shuffle($_SESSION['brojevi4']);
    }

    if (isset($_POST['gumb4'])) {
        $tip = $_POST['sortiranje4'];

        switch ($tip) {
            case "sort":
                sort($_SESSION['brojevi4']);
                break;
            case "rsort":
                rsort($_SESSION['brojevi4']);
                break;
            case "asort":
                asort($_SESSION['brojevi4']);
                break;
            case "arsort":
                arsort($_SESSION['brojevi4']);
                break;
        }
    }

    $brojevi4 = $_SESSION['brojevi4'];

    echo "<strong>Trenutni niz:</strong><br><pre>";
    print_r($brojevi4);
    echo "</pre>";
    ?>

    <form method="post">
        <select name="sortiranje4">
            <option value="sort">Sort</option>
            <option value="rsort">Rsort</option>
            <option value="asort">Asort</option>
            <option value="arsort">Arsort</option>
        </select>
        <input type="submit" name="gumb4" value="Sortiraj">
    </form>

</body>

</html>