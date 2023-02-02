<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include_once('../inc/head.inc.php')
    ?>
    <meta charset="UTF-8">
    <title>Hier bekommen sie ihre Wunschorgane</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>

<div class="color">
    <h1>Dein Körper ist unser Geschäft</h1>
    <form action="../logic/logicInsert.php" method="POST">
        <section class="flex">
            <label id="sex">Geschlecht</label>
            <div>
                <div class="radio"><input type="radio" name="sex" value="maennlich">Männlich</div>
                <div class="radio"><input type="radio" name="sex" value="weiblich">Weiblich</div>
                <div class="radio"><input type="radio" name="sex" value="divers">Divers</div>
            </div>
        </section>
        <section class="flex">
            <label id="name">Dein Name</label>
            <input type="text" id="username" name="username" required>
        </section>
        <section class="flex">
            <label id="adresse">Deine Adresse</label>
            <input type="text" id="adresse" name="adresse" required>
        </section>
        <section class="flex">
            <label id="usermessage">Persönliche Anmerkungen</label>
            <textarea id="usermessage" name="usermessage"></textarea>
        </section>
        <section class="flex">
            <div>
                <label for="organe">Organe :</label><br>
                <img src="../img/organe.jpg" class="imgFluid" alt="Organe"></div>
            <div class="dropdown">
                <select name="organe" id="organe">
                    <option value="Herz">Herz</option>
                    <option value="Lunge">Lunge</option>
                    <option value="Magen">Magen</option>
                    <option value="Niere">Niere</option>
                    <option value="Hornhaut">Hornhaut</option>
                </select>
                <div>
                </div>
            </div>


        </section>
        <section class="flex">
            <label>Extrawünsche zur Bestellung</label>
            <div>
                <div class="checkboxen">
                    <input type="checkbox" name="special01" id="special01">Arzt für die OP
                </div>
                <div class="checkboxen">
                    <input type="checkbox" name="special02" id="special02">Narkose
                </div>
                <div class="checkboxen">
                    <input type="checkbox" name="special03" id="special03">Happy End
                </div>
            </div>
        </section>
        <section class="flex">
            <button type="reset" class="btn btn-cancel">Reset</button>
            <button type="submit" class="btn btn-send">Absenden</button>
        </section>
    </form>
</div>
<div class="color">
    <form style="margin-top: 20px">
    <section class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Geschlecht</th>
                <th scope="col">Name</th>
                <th scope="col">Adresse</th>
                <th scope="col">Wunschorgan</th>
                <th scope="col">Arzt</th>
                <th scope="col">Narkose</th>
                <th scope="col">Happy End</th>
                <th scope="col">Summe</th>
                <th scope="col">Erstellt</th>
                <th scope="col">#</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $stmt = "SELECT * FROM organorder";
            foreach ($pdo->query($stmt) as $row) {
                ?>

                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['sex'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['adresse'] ?></td>
                    <td><?= $row['organe'] ?></td>
                    <td><?= $row['special01'] ?></td>
                    <td><?= $row['special02'] ?></td>
                    <td><?= $row['special03'] ?></td>
                    <td><?= $row['Summe'] ?></td>
                    <td><?= $row['created_at'] ?></td>
                    <td>
                        <a href="detail.php?id=<?= $row['id'] ?>" class="btn btn-dark">Ändern</a>
                        <a href="../logic/logicDelete.php?id=<?= $row['id'] ?>" class="btn btn-danger">Löschen</a>

                    </td>
                </tr>
            <?php } ?>

            </tbody>
        </table>
    </section>
    </form>
</div>
<?php
include_once('../inc/script.inc.php');
?>
</body>
</html>