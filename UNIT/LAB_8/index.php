<!DOCTYPE html>
<html lang="hr">

<head>
    <title>Labos 8</title>
</head>

<body>

    <h2>1. zadatak</h2>

    <form method="post">
        Ime: <input type="text" name="ime1"><br>
        Prezime: <input type="text" name="prezime1"><br>
        Godine: <input type="number" name="godine1"><br>
        <input type="submit" name="gumb1" value="Pokreni">
    </form>

    <?php
    if (isset($_POST['gumb1'])) {

        $ime = $_POST["ime1"];
        $prezime = $_POST["prezime1"];
        $godine = $_POST["godine1"];

        $podaci = [$ime, $prezime, $godine];

        echo "<pre>";
        var_dump($podaci);
        echo "</pre>";

        $csv = implode(",", $podaci);
        echo $csv;
    }
    ?>


    <h2>2. zadatak</h2>

    <form method="post">
        Unesite web adresu: <input type="text" name="url2">
        <input type="submit" name="gumb2" value="Pronađi linkove">
    </form>

    <?php
    if (isset($_POST['gumb2'])) {

        $url = trim($_POST["url2"]);

        if (!preg_match('/^https?:\/\//i', $url))
            $url = "http://" . $url;

        $html = @file_get_contents($url);

        if ($html === false) {
            echo "Ne mogu dohvatiti stranicu.";
        } else {
            $pattern = '/<a\s+href=[\'"][^\'"]+[\'"][^>]*>/i';
            preg_match_all($pattern, $html, $matches);

            echo "<pre>";
            foreach ($matches[0] as $l) echo htmlspecialchars($l) . "\n";
            echo "</pre>";
        }
    }
    ?>


    <h2>3. zadatak</h2>

    <form method="post">
        Ime i prezime: <input type="text" name="ime3"><br>
        Datum rođenja: <input type="text" name="datum3" placeholder="1.2.2000."><br>
        Telefon: <input type="text" name="tel3" placeholder="091 123 4567"><br>
        Email: <input type="text" name="mail3"><br>
        <input type="submit" name="gumb3" value="Provjeri">
    </form>

    <?php
    if (isset($_POST['gumb3'])) {

        $ime = $_POST["ime3"];
        $datum = $_POST["datum3"];
        $telefon = $_POST["tel3"];
        $email = $_POST["mail3"];

        $ok = true;

        if (!preg_match('/^[A-Za-z]+(\s[A-Za-z]+)+$/', $ime)) {
            echo "Ime i prezime nije ispravno.<br>";
            $ok = false;
        }

        if (!preg_match('/^(0?[1-9]|[12][0-9]|3[01])\.(0?[1-9]|1[0-2])\.\d{4}\.$/', $datum)) {
            echo "Datum nije ispravan.<br>";
            $ok = false;
        }

        if (!preg_match('/^0\d{1,2}\s\d{3}\s\d{3,4}$/', $telefon)) {
            echo "Telefon nije ispravan.<br>";
            $ok = false;
        }

        if (!preg_match('/^[\w.-]+@[\w.-]+\.\w+$/', $email)) {
            echo "Email nije ispravan.<br>";
            $ok = false;
        }

        if ($ok) echo "Svi podaci su ispravni!";
    }
    ?>


    <h2>4. zadatak</h2>

    <?php
    $tekst = 'Porast broja noćenja od 50% očekujemo u drugoj polovici 2017. godine.
    Iduća 2018. godina bit će povijesno najveća po porastu BDP-a.
    Od 2013. godine na drveću će rasti euri koje ćete samo trebati pobrati i odnijeti u banku.
    Kao Švicarska bit ćemo bogati u 2010. godini.';

    $novi = preg_replace('/\b\d{4}\b/', '2020', $tekst);

    echo "<pre>$novi</pre>";
    ?>

</body>

</html>