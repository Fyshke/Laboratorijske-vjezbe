<?php

function pohraniInfo()
{
    if (isset($_POST["ime"])) {
        setcookie("ime", $_POST["ime"], time() + 60 * 60 * 24 * 365, "", "", false, true);
    }
    if (isset($_POST["lokacija"])) {
        setcookie("lokacija", $_POST["lokacija"], time() + 60 * 60 * 24 * 365, "", "", false, true);
    }
    header("Location: zapamtime.php");
    exit;
}

function zaboraviInfo()
{
    setcookie("ime", "", time() - 3600, "", "", false, true);
    setcookie("lokacija", "", time() - 3600, "", "", false, true);
    header("Location: zapamtime.php");
    exit;
}

function prikaziStranicu()
{
    $ime = isset($_COOKIE["ime"]) ? $_COOKIE["ime"] : "";
    $lokacija = isset($_COOKIE["lokacija"]) ? $_COOKIE["lokacija"] : "";
?>
    <!DOCTYPE html>
    <html lang="hr">

    <body>

        <?php if ($ime || $lokacija): ?>
            <p>Bok, <?php echo $ime ? htmlspecialchars($ime) : "neznani posjetitelju" ?>
                <?php echo $lokacija ? " iz mjesta " . htmlspecialchars($lokacija) : "" ?>!</p>
            <p><a href="zapamtime.php?action=zaboravi">Zaboravi moje podatke!</a></p>
        <?php else: ?>
            <form method="post">
                <label>Unesi svoje ime:<br>
                    <input type="text" name="ime"></label><br><br>

                <label>Gdje živiš:<br>
                    <input type="text" name="lokacija"></label><br><br>

                <input type="submit" name="posaljiInfo" value="Pošalji informacije">
            </form>
        <?php endif; ?>

    </body>

    </html>
<?php
}
if (isset($_POST['posaljiInfo'])) {
    pohraniInfo();
} elseif (isset($_GET['action']) && $_GET['action'] === 'zaboravi') {
    zaboraviInfo();
} else {
    prikaziStranicu();
}
?>