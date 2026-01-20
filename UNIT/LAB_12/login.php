<?php
session_start();

if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
    header('Location: admin.php');
    exit;
}

$poruka = '';

if (isset($_POST['submit'])) {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    $file = 'podaci.csv';
    if (!file_exists($file)) {
        $poruka = "<div class='alert alert-danger'>Datoteka podaci.csv ne postoji!</div>";
    } else {
        $handle = fopen($file, 'r');
        if ($handle) {
            $pronadjen = false;
            while (($row = fgetcsv($handle, 0, ",")) !== false) {
                if (count($row) >= 4) {
                    $ime     = trim($row[0]);
                    $prezime = trim($row[1]);
                    $user    = trim($row[2]);
                    $pass    = trim($row[3]);

                    if ($username === $user && $password === $pass) {
                        $_SESSION['login'] = true;
                        $_SESSION['ime']   = $ime . ' ' . $prezime;
                        $pronadjen = true;
                        break;
                    }
                }
            }
            fclose($handle);

            if ($pronadjen) {
                header('Location: admin.php');
                exit;
            } else {
                $poruka = "<div class='alert alert-danger'>Korisničko ime i lozinka se ne podudaraju.</div>";
            }
        } else {
            $poruka = "<div class='alert alert-danger'>Greška pri otvaranju datoteke podaci.csv</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h3 class="text-center">Login</h3>
        <?php if ($poruka) echo $poruka; ?>
        <form method="post">
            <div class="form-group">
                <label for="username">Korisničko ime:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="pwd">Lozinka:</label>
                <input type="password" class="form-control" id="pwd" name="password" required>
            </div>
            <button type="submit" name="submit" class="btn btn-default">Prijava</button>
        </form>
    </div>
</body>

</html>