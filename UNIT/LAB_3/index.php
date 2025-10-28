<html>

<head>
    <title>Lab 3</title>
</head>

<body>
    <h3>1. zadatak</h3>

    <form method="post">
        <p>Prvi kolokvij:
            <input type="number" name="kolokvij1" required>
        </p>
        <p>Drugi kolokvij:
            <input type="number" name="kolokvij2" required>
        </p>
        <input type="submit" value="Provjeri">
    </form>

    <?php
    if (isset($_POST['kolokvij1']) && isset($_POST['kolokvij2'])) {
        $k1 = $_POST['kolokvij1'];
        $k2 = $_POST['kolokvij2'];

        function provjeriKolokvije($k1, $k2)
        {
            if ($k1 < 40 || $k2 < 40) {
                return "Pad";
            } elseif (($k1 >= 40 && $k1 <= 49) || ($k2 >= 40 && $k2 <= 49)) {
                return "Ponavljanje kolokvija";
            } elseif (($k1 + $k2) >= 100) {
                return "Položeno";
            } else {
                return "Greška";
            }
        }
        $rezultat = provjeriKolokvije($k1, $k2);
        echo "Rezultat: $rezultat";
    }
    ?>

    <h3>2. zadatak</h3>
    <?php
    function Oduzmi()
    {
        global $v;
        $v -= 20;
    }
    function Dodaj()
    {
        global $v;
        $v += 60;
    }
    $v = 50;
    echo "v: $v<br>";
    Oduzmi();
    echo "Nakon oduzimanja: $v<br>";
    Dodaj();
    echo "Nakon dodavanja: $v<br>";
    ?>

    <h3>3. zadatak</h3>
    <?php
    function Ispis()
    {
        static $stat = 20;
        echo "$stat&nbsp;";
        $stat++;
    }
    for ($i = 0; $i < 10; $i++) {
        Ispis();
    }
    ?>

    <h3>4. zadatak</h3>
    <form method="post">
        <p>Prvi broj:
            <input type="number" name="broj1" required>
        </p>
        <p>Drugi broj:
            <input type="number" name="broj2" required>
        </p>
        <input type="submit" value="Prikaz">
    </form>
    <?php
    if (isset($_POST['broj1']) && isset($_POST['broj2'])) {
        $broj1 = $_POST['broj1'];
        $broj2 = $_POST['broj2'];

        //provjera 
        if ($broj1 > $broj2) {
            $temp = $broj1;
            $broj1 = $broj2;
            $broj2 = $temp;
        }

        echo "for petlja: ";
        for ($i = $broj1; $i <= $broj2; $i++) {
            if ($i % 2 != 0) {
                echo "$i ";
            }
        }
        echo "<br>while petlja: ";
        $i = $broj1;
        while ($i <= $broj2) {
            if ($i % 2 != 0) {
                echo "$i ";
            }
            $i++;
        }
    }
    ?>

    <h3>5. zadatak</h3>
    <form method="post">
        Unesite broj:
        <input type="number" name="djeljitelji" required>
        <br>
        <input type="submit" value="Prikaz">
    </form>
    <?php
    if (isset($_POST['djeljitelji'])) {
        $broj = $_POST['djeljitelji'];
        echo "Svi djelitelji broja $broj: ";
        $i = 1;
        do {
            if ($broj % $i == 0) {
                echo "$i ";
            }
            $i++;
        } while ($i <= $broj);
    }
    ?>

    <h3>6. zadatak</h3>
    <form method="post">
        Unesite broj:
        <input type="number" name="prosti_broj" required>
        <br>
        <input type="submit" value="Provjera">
    </form>
    <?php
    if (isset($_POST['prosti_broj'])) {
        $broj = $_POST['prosti_broj'];
        $je_prost = true;

        if ($broj <= 1) {
            $je_prost = false;
        } else {
            for ($i = 2; $i <= $broj / 2; $i++) {
                if ($broj % $i == 0) {
                    $je_prost = false;
                    break;
                }
            }
        }
        if ($je_prost) {
            echo "Broj $broj je prost broj.";
        } else {
            echo "Broj $broj nije prost broj.";
        }
    }
    ?>

</body>

</html>