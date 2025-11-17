<!DOCTYPE html>
<html lang="hr">

<head>
    <title>Labos 4</title>
</head>

<body>
    <h3>1. zadatak</h3>
    <form method="post">
        <p>Unesite prvi broj:
            <input type="number" name="broj1" required>
        </p>
        <p>Unesite drugi broj:
            <input type="number" name="broj2" required>
        </p>
        <input type="submit" value="Zamijeni">
    </form>
    <?php
    function zamijeni_referenca(&$a, &$b)
    {
        $temp = $a;
        $a = $b;
        $b = $temp;
    }

    function zamijeni_vrijednost($a, $b)
    {
        $temp = $a;
        $a = $b;
        $b = $temp;
    }

    if (isset($_POST['broj1']) && isset($_POST['broj2'])) {
        $broj1 = $_POST['broj1'];
        $broj2 = $_POST['broj2'];

        echo "Prije dolaska u funkciju prvi je $broj1, a drugi $broj2<br>";
        zamijeni_referenca($broj1, $broj2);
        echo "Nakon zamjene putem referenci prvi je $broj1, a drugi $broj2<br>";

        // ponovno postavljanje vrijednosti 
        $broj1 = $_POST['broj1'];
        $broj2 = $_POST['broj2'];

        echo "Prije dolaska u funkciju prvi je $broj1, a drugi $broj2<br>";
        zamijeni_vrijednost($broj1, $broj2);
        echo "Nakon zamjene putem vrijednosti prvi je $broj1, a drugi $broj2<br>";
    }
    ?>

    <h3>2. zadatak</h3>
    <form method="post">
        <p>Unesite brzinu zvuka u m/s (za zrak ostavite prazno):<br>
            <input type="number" name="brzina">
        </p>
        <p>Unesite vrijeme u sekundama:<br>
            <input type="number" name="vrijeme" required>
        </p>
        <input type="submit" value="Izračunaj put" name="zadatak2">
    </form>
    <?php
    function brzina_zvuka_kroz_zrak($vrijeme, $brzina = 344)
    {
        return $brzina * $vrijeme;
    }
    if (isset($_POST['zadatak2'])) {
        $vrijeme = floatval($_POST['vrijeme']);
        $brzina_unos = $_POST['brzina'];

        if ($brzina_unos === "" || $brzina_unos === null) {
            $put = brzina_zvuka_kroz_zrak($vrijeme);
            echo "Prijeđeni put: " . number_format($put, 2) . " m/s";
        } else {
            $put = brzina_zvuka_kroz_zrak($vrijeme, floatval($brzina_unos));
            echo "Prijeđeni put: " . number_format($put, 2) . " m/s";
        }
    }
    ?>

    <h3>3. zadatak</h3>
    <form method="post">
        <p>Unesite jedan broj:<br>
            <input type="number" name="uneseni_broj" required>
        </p>
        <input type="submit" value="Izračunaj" name="zadatak3">
    </form>
    <?php
    function aritmeticka_sredina()
    {
        $broj_arg = func_num_args();
        if ($broj_arg == 0) return 0;
        $suma = 0;
        for ($i = 0; $i < $broj_arg; $i++) {
            $suma += func_get_arg($i);
        }
        return $suma / $broj_arg;
    }
    if (isset($_POST['zadatak3'])) {
        if (isset($_POST['uneseni_broj']) && $_POST['uneseni_broj'] !== '') {
            $broj = floatval($_POST['uneseni_broj']);

            // prvi poziv: 5, 14, 25, 67, 10 + uneseni broj
            $sredina1 = aritmeticka_sredina(5, 14, 25, 67, 10, $broj);
            echo "Prosjek prvog skupa: " . $sredina1 . "<br>";

            // drugi poziv: 50, 70, 90 + uneseni broj
            $sredina2 = aritmeticka_sredina(50, 70, 90, $broj);
            echo "Prosjek drugog skupa: " . $sredina2 . "<br>";
        }
    }
    ?>

    <h3>4. zadatak</h3>
    <form method="post">
        <p>Unesite prvi cijeli broj:<br>
            <input type="number" name="broj_a" required>
        </p>
        <p>Unesite drugi cijeli broj:<br>
            <input type="number" name="broj_b" required>
        </p>
        <input type="submit" value="Pronađi NZD" name="zadatak4">
    </form>
    <?php
    function nzd($a, $b)
    {
        // pozitivni brojevi
        $a = abs($a);
        $b = abs($b);

        // počinjemo od manjeg
        $manji = min($a, $b);

        // NZD
        for ($i = $manji; $i >= 1; $i--) {
            if ($a % $i == 0 && $b % $i == 0) {
                return $i;
            }
        }
        return 1;
    }

    if (isset($_POST['zadatak4'])) {
        $a = intval($_POST['broj_a']);
        $b = intval($_POST['broj_b']);

        $rezultat = nzd($a, $b);
        echo "Najveći zajednički djelitelj $a i $b je $rezultat<br>";
    }
    ?>

</body>

</html>