<?php
$host = 'localhost';
$user = 'root';
$pass = '';

try {

    // baza
    $pdo = new PDO("mysql:host=$host", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("CREATE DATABASE IF NOT EXISTS Prodaja");
    echo "Baza uspješno kreirana.";
    $pdo = new PDO("mysql:host=$host;dbname=Prodaja", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // dobavljac
    $pdo->exec("CREATE TABLE IF NOT EXISTS Dobavljac (
        dobavljacID INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
        nazivDob VARCHAR(60) NOT NULL,
        adresa VARCHAR(70) NOT NULL,
        telefon VARCHAR(20) NOT NULL,
        PRIMARY KEY (dobavljacID)
    ) ENGINE = MyISAM");
    echo "Tablica Dobavljac uspješno kreirana. ";

    // kategorija
    $pdo->exec("CREATE TABLE IF NOT EXISTS Kategorija (
        kategorijaID INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
        nazivKat VARCHAR(30) NOT NULL,
        PRIMARY KEY (kategorijaID)
    ) ENGINE = MyISAM");
    echo "Tablica Kategorija uspješno kreirana. ";

    // proizvod
    $pdo->exec("CREATE TABLE IF NOT EXISTS Proizvod (
        proizvodID INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
        nazivPro VARCHAR(40) NOT NULL,
        cijena DECIMAL(7,2) NOT NULL,
        kolicina SMALLINT NOT NULL DEFAULT 0,
        dobavljacID INTEGER UNSIGNED,
        kategorijaID INTEGER UNSIGNED,
        PRIMARY KEY (proizvodID)
    ) ENGINE = MyISAM");
    echo "Tablica Proizvod uspješno kreirana. ";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
