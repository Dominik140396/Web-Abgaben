<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
<div class="order">
    <article>
        <h1>Ihre Bestellung</h1>
        <section class="flex">
            <p>Ihr Name:</p>
            <?php
            $sex = '';
            switch ($_POST['sex']) {
                case 'maennlich':
                    $sex = "Herr";
                    break;
                case 'weiblich':
                    $sex = "Frau";
                    break;
                case 'divers':
                    $sex = "Person";
                    break;
            }
            ?>
            <p><?= $sex . ' ' . $_POST['username'] ?></p>
        </section>
        <section class="flex">
            <p>Lieferort:</p>
            <p><?= $_POST['adresse'] ?></p>
        </section>
        <section class="flex">
            <p>Persönliche Anmerkungen:</p>
            <p><?= $_POST['usermessage'] ?></p>
        </section>
        <section class="flex">
            <p>Gewünschtes Organ</p>
            <p><?= $_POST['interiorOrgan'] ?></p>
        </section>
        <section class="flex">
            <p>Zusatzpakete</p>
            <p>
            <?php
            $extras = 0;
            $doc = 25000;
            $anesthesia = 8000;
            $happyEnd = 150;
            ($_POST['special01'] ?? '') ? $extras += $doc : '';
            ($_POST['special02'] ?? '') ? $extras += $anesthesia : '';
            ($_POST['special03'] ?? '') ? $extras += $happyEnd : '';
            echo ($_POST['special01'] ?? '') ? "inkl. Arzt € $doc<br>" : "Nur Organe / Arzt vor Ort><br>";
            echo ($_POST['special02'] ?? '') ? "inkl. Narkose € $anesthesia<br>" : "Holznarkose (For Free :D)><br>";
            echo ($_POST['special03'] ?? '') ? "inkl. Happy End € $happyEnd<br>" : "Take and Go><br>";

            ?></p>
        </section>
        <section class="flex">
            <?php
            $organPrice = 0;
            switch ($_POST['interiorOrgan']) {
                case 'Herz':
                    $organPrice += 108000;
                    break;
                case 'Lunge':
                    $organPrice += 280000;
                    break;
                case 'Magen':
                    $organPrice += 450;
                    break;
                case 'Niere':
                    $organPrice += 118000;
                    break;
                case 'Hornhaut':
                    $organPrice += 20500;
                    break;

            }

            ?>
            <p>Kostenzusammenstellung</p>
            <p>Organ: € <?= $organPrice ?><br>
            Zusatzpakete: € <?= $extras ?><br>
            <strong>Insg.: € <?= $organPrice + $extras ?></strong></p>

        </section>

    </article>
</div>
</body>
</html>