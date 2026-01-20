<?php
session_start();

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <title>Admin stranica</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h3 class="text-center">Admin</h3>
        <p>Dobro došli, <?= htmlspecialchars($_SESSION['ime'] ?? 'korisniče') ?>!</p>
        <p>Ovo je zaštićena admin stranica, vidljiva SAMO prijavljenim korisnicima!!!</p>
        <div class="tenor-gif-embed" data-postid="9842551414196208576" data-share-method="host" data-aspect-ratio="0.829317" data-width="200" data-height="200"><a href="https://tenor.com/view/zesty-cat-niklas-cat-tongue-gif-9842551414196208576">Zesty Cat Niklas GIF</a>from <a href="https://tenor.com/search/zesty+cat-gifs">Zesty Cat GIFs</a></div>
        <script type="text/javascript" async src="https://tenor.com/embed.js"></script>
        <p><a href="logout.php" class="btn btn-danger">Odjava</a></p>
    </div>
</body>

</html>