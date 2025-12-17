<!DOCTYPE html>
<html lang="hr">

<head>
    <title>Labos 9</title>
</head>

<body>

    <h2>1. zadatak</h2>

    <?php
    class artikl
    {
        public $naziv;
        public $proizvodac;

        public function __construct($proizvodac)
        {
            $this->proizvodac = $proizvodac;
        }

        public function __destruct()
        {
            echo "Uništavam objekt... <br>";
        }
    }

    $obj1 = new artikl("Samsung");
    $obj1->naziv = "Galaxy S25";

    $obj2 = new artikl("Apple");
    $obj2->naziv = "iPhone 17";

    echo "Objekt 1: {$obj1->naziv} - {$obj1->proizvodac}<br>";
    echo "Objekt 2: {$obj2->naziv} - {$obj2->proizvodac}<br>";
    // ispisati će se dva puta jer se destruktor poziva za svaki objekt 
    ?>

    <hr>

    <h2>2. zadatak</h2>

    <?php
    class pijetao
    {
        public $ime;
        protected $boja = 'crveno-smeđa';
        private $glavni = 'ne';

        public function pjevaj()
        {
            echo 'kukurikuuuu<br>';
        }
    }

    class pilic extends pijetao
    {
        public $ZnakHoroskopa = 'Bik';

        public function __construct()
        {
            $this->boja = 'žuta';
        }

        public function pjevaj()
        {
            echo 'pijuuuuuu<br>';
        }
    }

    echo "<strong>Pijetao:</strong><br>";
    $pijetao1 = new pijetao();
    $pijetao1->ime = "Pjetko";
    echo "Ime: " . $pijetao1->ime . "<br>";
    // echo "Boja: " . $pijetao1->boja . "<br>"; // Greška – protected
    // echo "Glavni: " . $pijetao1->glavni . "<br>"; // Greška – private
    // echo "Horoskop: " . $pijetao1->ZnakHoroskopa . "<br>"; // Greška – ne postoji
    $pijetao1->pjevaj();

    echo "<br><strong>Pilić:</strong><br>";
    $pilic1 = new pilic();
    $pilic1->ime = "Poli";
    echo "Ime: " . $pilic1->ime . "<br>";
    // echo "Boja: " . $pilic1->boja . "<br>"; // Greška - protected
    // echo "Glavni: " . $pilic1->glavni . "<br>"; // Greška – ne postoji
    echo "Horoskop: " . $pilic1->ZnakHoroskopa . "<br>";
    $pilic1->pjevaj();
    ?>

    <hr>

    <h2>3. zadatak</h2>

    <?php
    class artikl2
    {
        public $naziv;
        public $kolicina;
        public $cijena;

        public function RacunajVrijednost()
        {
            return $this->kolicina * $this->cijena;
        }

        public function AzurirajKolicinu($kol)
        {
            $this->kolicina += $kol;
            echo "Nova količina: " . $this->kolicina . "<br>";
        }
    }

    $art = new artikl2();
    $art->naziv = "Čokolino";
    $art->kolicina = 40;
    $art->cijena = 8.5;

    echo "Naziv: " . $art->naziv . "<br>";
    echo "Trenutna količina: " . $art->kolicina . "<br>";
    echo "Cijena po komadu: " . $art->cijena . " €<br>";
    echo "Ukupna vrijednost artikla: " . $art->RacunajVrijednost() . " €<br>";
    ?>

    <form method="post">
        <label>Unesite količinu za dodati/odbiti (može biti negativna):</label><br>
        <input type="number" name="kolicina_delta" required>
        <input type="submit" name="azuriraj" value="Ažuriraj količinu">
    </form>

    <?php
    if (isset($_POST['azuriraj'])) {
        $delta = intval($_POST['kolicina_delta']);
        $art->AzurirajKolicinu($delta);
        echo "Nova ukupna vrijednost artikla: " . $art->RacunajVrijednost() . " €<br>";
    }
    ?>

    <hr>

    <h2>4. zadatak</h2>

    <?php
    class artiklPopust
    {
        public $naziv;
        public $kolicina;
        public $cijena;
        private $popust = 0;

        public function __get($ime)
        {
            if ($ime === 'popust') {
                return $this->popust;
            }
        }

        public function __set($ime, $vrijednost)
        {
            if ($ime === 'popust') {
                if ($vrijednost > 50) {
                    echo "Pretjerali ste, popust je prevelik!<br>";
                    $this->popust = 0;
                } else {
                    $this->popust = $vrijednost;
                }
            }
        }

        public function vrijednostBezPopusta()
        {
            return $this->kolicina * $this->cijena;
        }

        public function vrijednostSPopustom()
        {
            $bez = $this->vrijednostBezPopusta();
            return $bez - ($bez * $this->popust / 100);
        }
    }

    $art2 = new artiklPopust();
    $art2->kolicina = 1;
    $art2->cijena = 899;

    echo "Vrijednost artikla bez popusta: " . $art2->vrijednostBezPopusta() . " €<br>";
    ?>

    <form method="post">
        <label>Unesite postotak popusta (0-50):</label><br>
        <input type="number" name="postotak_popusta" min="0" max="100">
        <input type="submit" name="postavi_popust" value="Postavi popust">
    </form>

    <?php
    if (isset($_POST['postavi_popust'])) {
        $pop = intval($_POST['postotak_popusta']);
        $art2->popust = $pop;
        echo "Trenutni popust: " . $art2->popust . " %<br>";
        echo "Vrijednost artikla s popustom: " . $art2->vrijednostSPopustom() . " €<br>";
    }
    ?>

    <hr>
</body>

</html>