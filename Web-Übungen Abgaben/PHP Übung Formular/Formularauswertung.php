<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Ice</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Ihre Anfrage</h1>

<article>
    <section class="flex">
        <p>Ihr Name</p>
        <p><strong><?= $_POST['username'] ?></strong></p>
    </section>

    <section class="flex">
        <p>Ihre Adresse</p>
        <p><strong><?= $_POST['userAdresse'] ?></strong></p>
    </section>

    <section class="flex">
        <p>Ihre Geschlecht</p>
        <p><strong><?= $_POST['Geschlecht'] ?> </strong></p>
    </section>

    <section class="flex">
        <p>Gewählte Sorte</p>
        <p><strong> <?= $_POST['Eis-Sorten'] ?></strong> </p>
    </section>

    <section class="flex">
        <p>Gewählte Extras</p>
        <p>
            <?php
            echo ($_POST['special01'] ?? '') ? 'inkl. Zuckerstreusel <br>' : 'Kein Zuckerstreusel<br>';
            echo ($_POST['special02'] ?? '') ? 'inkl. Schoko-Waffel <br>' : 'Kein Schoko-Waffel<br>';
            echo ($_POST['special03'] ?? '') ? 'inkl. Hautschuppen <br>' : 'Kein Hautschuppen<br>';
            echo ($_POST['special04'] ?? '') ? 'inkl. Winterkirschen <br>' : 'Kein Winterkirschen<br>';
            echo ($_POST['special05'] ?? '') ? 'inkl. Sommerkirschen <br>' : 'Kein Sommerkirschen<br>';
            ?>
        </p>
    </section>

    <?php
    $angebot = 0;
    switch ($_POST['Eis-Sorten']) {
        case 'Schoko':
            $angebot += 1.2;
            break;
        case 'Vanille':
            $angebot += 1.5;
            break;
        case 'Zimt':
            $angebot += 2;
            break;
        case 'Fingernägel':
            $angebot += 4;
            break;
        case 'Zehennägel':
            $angebot += 3.2;
            break;
        case 'Haare':
            $angebot += 3;
            break;
    }
    ?>

    <section class="flex">
        <p>Was ist letzte Preis</p>
        <div>
            <p>Eis $ <?= $angebot ?></p>
            <?php
            $zusatz = 0;
            if (isset($_POST['special01'])) {
                $zusatz += 0.5;
            }
            if (isset($_POST['special02'])) {
                $zusatz += 2;
            }
            if (isset($_POST['special03'])) {
                $zusatz += 1;
            }
            if (isset($_POST['special04'])) {
                $zusatz += 5;
            }
            if (isset($_POST['special05'])) {
                $zusatz += 3;
            }
            ?>
            <p>Zusatz $ <?= $zusatz ?> </p>
            <p><strong>Insg.: $ <?= $zusatz + $angebot ?> </strong></p>
        </div>
    </section>

</body>
</html>