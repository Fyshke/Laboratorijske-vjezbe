<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <title>Labos 7</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="p-4">
    <div class="container">

        <h2 class="mb-4">1. zadatak</h2>

        <form method="post" class="mb-3">
            <label>Unesi brojeve odvojene zarezom:</label>
            <input type="text" name="brojevi1" class="form-control" placeholder="npr. 2,6,7,21...">
            <button type="submit" name="gumb1" class="btn btn-primary mt-2">Pošalji</button>
        </form>

        <?php
        if (isset($_POST['gumb1'])) {
            $ulaz = $_POST['brojevi1'];
            $niz = array_map('intval', explode(',', $ulaz));

            $parni = [];
            $neparni = [];

            foreach ($niz as $b) {
                if ($b % 2 == 0) $parni[] = $b;
                else $neparni[] = $b;
            }

            echo "<strong>Parni brojevi:</strong><br><pre>";
            print_r($parni);
            echo "</pre>";

            echo "<strong>Neparni brojevi:</strong><br><pre>";
            print_r($neparni);
            echo "</pre>";
        }
        ?>

        <hr>
        <h2>2. zadatak</h2>

        <form method="post" class="mb-3">
            <label>Ime:</label>
            <input type="text" name="ime2" class="form-control">
            <label>Prezime:</label>
            <input type="text" name="prezime2" class="form-control">

            <button type="submit" name="gumb2" class="btn btn-primary mt-2">Pošalji</button>
        </form>

        <?php
        if (isset($_POST['gumb2'])) {
            $ime = trim($_POST['ime2']);
            $prezime = trim($_POST['prezime2']);
            $inicijali = strtoupper($ime[0]) . "." . strtoupper($prezime[0]) . ".";

            echo "<strong>Malim slovima:</strong> " . strtolower("$ime $prezime") . "<br>";
            echo "<strong>Velikim slovima:</strong> " . strtoupper("$ime $prezime") . "<br>";
            echo "<strong>Prva slova velika:</strong> " . ucwords(strtolower("$ime $prezime")) . "<br>";
            echo "<strong>Inicijali:</strong> $inicijali<br>";
        }
        ?>


        <hr>
        <h2>3. zadatak</h2>

        <form method="post" class="mb-3">
            <label>Niz znakova:</label>
            <input type="text" name="rijec3" class="form-control">

            <label>Koliko puta ispisati:</label>
            <input type="number" name="broj3" class="form-control">

            <button type="submit" name="gumb3" class="btn btn-primary mt-2">Provjeri</button>
        </form>

        <?php
        if (isset($_POST['gumb3'])) {
            $rijec_original = $_POST['rijec3'];

            $rijec = strtolower($rijec_original);
            $rijec = str_replace(' ', '', $rijec);
            $je_palindrom = ($rijec == strtolower(strrev($rijec)));

            if ($je_palindrom) {
                echo "<strong>Riječ je palindrom</strong><br>";
            } else {
                echo "<strong>Riječ nije palindrom</strong><br>";
            }

            $broj = intval($_POST['broj3']);
            echo "<br><strong>Ispis $broj puta:</strong><br>";
            for ($i = 0; $i < $broj; $i++) {
                echo $rijec_original . "<br>";
            }
        }
        ?>


        <hr>
        <h2>4. zadatak</h2>

        <form method="post" class="mb-3">
            <label>Originalni string:</label>
            <input type="text" name="orig4" class="form-control">

            <label>Novi string:</label>
            <input type="text" name="novi4" class="form-control">

            <label>Pozicija početka zamjene:</label>
            <input type="number" name="poz4" class="form-control">

            <label>Koliko znakova zamijeniti:</label>
            <input type="number" name="broj4" class="form-control">

            <button type="submit" name="gumb4" class="btn btn-primary mt-2">Zamijeni</button>
        </form>

        <?php
        if (isset($_POST['gumb4'])) {
            $orig = $_POST['orig4'];
            $novi = $_POST['novi4'];
            $poz = intval($_POST['poz4']);
            $br = intval($_POST['broj4']);

            $rezultat = substr_replace($orig, $novi, $poz, $br);

            echo "<strong>Rezultat:</strong> $rezultat";
        }
        ?>


        <hr>
        <h2>5. zadatak</h2>

        <div class="p-3 bg-light border rounded">
            <p>Forme iznad su uređene koristeći CSS</p>
        </div>

    </div>

</body>

</html>