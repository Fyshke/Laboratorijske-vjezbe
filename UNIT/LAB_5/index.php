<!DOCTYPE html>
<html lang="hr">

<head>
    <title>Labos 5</title>
</head>

<body>
    <h3>1. zadatak</h3>
    <?php

    $niz = [];
    for ($i = 0; $i < 20; $i++) {
        $niz[$i] = $i;
    }

    $suma = array_sum($niz);
    echo "Zbroj elemenata je $suma<br>";

    $broj_elemenata = count($niz);
    echo "Broj elemenata je $broj_elemenata<br>";

    unset($niz[9]);
    $broj_elemenata = count($niz);
    echo "Nakon brisanja broj elemenata je $broj_elemenata<br>";

    //novi element
    $niz[] = 77;

    echo "Niz:<br>";
    foreach ($niz as $vrijednost) {
        echo "$vrijednost<br>";
    }
    ?>

    <h3>2. zadatak</h3>
    <form method="post">
        <p>Unesite proizvoljno dugačak niz (brojeve odvojiti zarezom, npr. 3, 7.3, 1.2, 67):<br>
            <input type="text" name="brojevi" required style="width: 300px;">
        </p>
        <input type="submit" value="Izračunaj prosjek, min i max" name="zadatak2">
    </form>
    <?php
    if (isset($_POST['zadatak2'])) {
        $ulaz = trim($_POST['brojevi']);

        $brojevi_str = array_map('trim', explode(',', $ulaz));
        $brojevi = [];
        foreach ($brojevi_str as $b) {
            if (is_numeric($b)) {
                $brojevi[] = floatval($b);
            }
        }

        if (empty($brojevi)) {
            echo "Niste unijeli nijedan valjani broj.";
        } else {
            $prosjek = array_sum($brojevi) / count($brojevi);
            $min = min($brojevi);
            $max = max($brojevi);

            echo "Uneseni niz: " . "<strong>" . implode(', ', $brojevi) . "</strong><br>";
            echo "Prosječna vrijednost: " . "<strong>" . number_format($prosjek, 2) . "</strong><br>";
            echo "Minimalna vrijednost: <strong>$min</strong><br>";
            echo "Maksimalna vrijednost: <strong>$max</strong><br>";
        }
    }
    ?>


    <h3>3. zadatak</h3>
    <?php
    $drzave = [
        "Hrvatska" => "Zagreb",
        "Srbija" => "Beograd",
        "Slovenija" => "Ljubljana",
        "Njemačka" => "Berlin",
        "Italija" => "Rim"
    ];

    $drzave["Bosna i Hercegovina"] = "Sarajevo";

    foreach ($drzave as $drzava => $grad) {
        echo "$drzava: $grad<br>";
    }
    ?>

    <h3>4. zadatak</h3>
    <?php
    $drzave_kopija = $drzave;

    $kljucevi = array_keys($drzave_kopija);
    $vrijednosti = array_values($drzave_kopija);

    echo "<strong>Niz ključeva:</strong><br>";
    echo "<pre>";
    print_r($kljucevi);
    echo "</pre>";
    echo "<br><br><strong>Niz vrijednosti:</strong><br>";
    echo "<pre>";
    print_r($vrijednosti);
    echo "</pre>";
    ?>

    <h3>5. zadatak</h3>
    <?php
    $prvi = ["jabuka", "kruška", "ananas", "kivi", "jagoda"];
    $drugi = ["jagoda", "šljiva", "malina"];
    $treci = ["jagoda", "jabuka", "kupina", "mango"];

    $unija = array_unique(array_merge($prvi, $drugi));
    $razl = array_diff($prvi, $drugi, $treci);
    $pres = array_intersect($prvi, $drugi);

    echo "<strong>Unija:</strong><br>";
    echo "<pre>";
    print_r($unija);
    echo "</pre>";

    echo "<strong>Razlika:</strong><br>";
    echo "<pre>";
    print_r($razl);
    echo "</pre>";

    echo "<strong>Presjek:</strong><br>";
    echo "<pre>";
    print_r($pres);
    echo "</pre>";
    ?>
</body>

</html>