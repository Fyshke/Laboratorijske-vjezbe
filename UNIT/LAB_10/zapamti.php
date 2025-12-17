<?php

session_start();

if (isset($_POST['posaljiInfo'])) {
    if (isset($_POST["ime"])) {
        $_SESSION["ime"] = $_POST["ime"];
    }
    header("Location: zapamti.php");
    exit;
}

if (isset($_GET['action']) && $_GET['action'] === 'zaboravi') {
    unset($_SESSION["ime"]);
    header("Location: zapamti.php");
    exit;
}

$ime = isset($_SESSION["ime"]) ? $_SESSION["ime"] : "";
?>
<!DOCTYPE html>
<html lang="hr">

<body>

    <?php if ($ime): ?>
        <p>Bok, <?php echo htmlspecialchars($ime) ?>!</p>
        <p><a href="zapamti.php?action=zaboravi">Zaboravi moje podatke!</a></p>
    <?php else: ?>
        <form method="post">
            <label>Unesi svoje ime:<br>
                <input type="text" name="ime"></label><br><br>

            <input type="submit" name="posaljiInfo" value="Pošalji informacije">
        </form>
    <?php endif; ?>

</body>

</html>