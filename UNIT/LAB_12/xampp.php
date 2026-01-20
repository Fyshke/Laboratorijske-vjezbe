<?php

$direktorij = 'C:/xampp';

if (!is_dir($direktorij)) {
    die("Direktorij $direktorij ne postoji.");
}

echo "<h2>Datoteke u direktoriju: $direktorij</h2>";
echo "<ul>";

$datoteke = scandir($direktorij);
foreach ($datoteke as $datoteka) {
    $putanja = $direktorij . '/' . $datoteka;
    if (is_file($putanja)) {
        echo "<li>" . htmlspecialchars($datoteka) . "</li>";
    }
}

echo "</ul>";
