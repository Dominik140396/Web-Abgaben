<!doctype html>
<html lang="en">
<?php
include_once('../inc/head.inc.php')
?>
<body>
<main class="container py-4">
    <?php
    $id = $_GET['id'];
    $stmt = $pdo->prepare('SELECT * FROM organorder WHERE id = ?');
    $stmt->execute(array($id));
    while ($row = $stmt->fetch()) {
        ?>
        <form method="post" action="../logic/logicEdit.php">
            <input type="hidden" name="inputID" value="<?= $row['id'] ?>">
            <section class="flex">
                <label id="sex">Geschlecht</label>
                <div>
                    <div class="radio"><input type="radio" name="sex"
                                              value="maennlich" <?php if ($row['sex'] == 'm') echo 'checked' ?> >Männlich
                    </div>
                    <div class="radio"><input type="radio" name="sex"
                                              value="weiblich" <?php if ($row['sex'] == 'w') echo 'checked' ?> >Weiblich
                    </div>
                    <div class="radio"><input type="radio" name="sex"
                                              value="divers" <?php if ($row['sex'] == 'd') echo 'checked' ?> >Divers
                    </div>
                </div>
            </section>
            <section class="flex">
                <label id="name">Dein Name</label>
                <input type="text" id="username" name="username" required value="<?= $row['name'] ?>">
            </section>
            <section class="flex">
                <label id="adresse">Deine Adresse</label>
                <input type="text" id="adresse" name="adresse" required value="<?= $row['adresse'] ?>">
            </section>
            <section class="flex">
                <label id="usermessage">Persönliche Anmerkungen</label>
                <textarea id="usermessage" name="usermessage"><?= $row['usermessage'] ?></textarea>
            </section>
            <section class="flex">
                <div>
                    <label for="organe">Organe :</label><br>
                    <img src="../img/organe.jpg" class="imgFluid" alt="Organe"></div>
                <div class="dropdown">
                    <select name="organe" id="organe">
                        <option value="Herz" <?php if ($row['organe'] == 'Herz') echo 'selected' ?>>Herz</option>
                        <option value="Lunge" <?php if ($row['organe'] == 'Lunge') echo 'selected' ?>>Lunge</option>
                        <option value="Milz" <?php if ($row['organe'] == 'Milz') echo 'selected' ?>>Milz</option>
                        <option value="Niere" <?php if ($row['organe'] == 'Niere') echo 'selected' ?>>Niere</option>
                        <option value="Hornhaut" <?php if ($row['organe'] == 'Hornhaut') echo 'selected' ?>>Hornhaut</option>
                    </select>
                    <div>
                    </div>
                </div>


            </section>
            <section class="flex">
                <label>Extrawünsche zur Bestellung</label>
                <div>
                    <div class="checkboxen">
                        <input type="checkbox" name="special01" id="special01" <?php if ($row['special01'] ) echo 'checked' ?>>Arzt für die OP
                    </div>
                    <div class="checkboxen">
                        <input type="checkbox" name="special02" id="special02" <?php if ($row['special02'] ) echo 'checked' ?>>Narkose
                    </div>
                    <div class="checkboxen">
                        <input type="checkbox" name="special03" id="special03" <?php if ($row['special03'] ) echo 'checked' ?>>Happy End
                    </div>
                </div>
            </section>
            <section class="flex">
                <button type="reset" class="btn btn-cancel">Reset</button>
                <button type="submit" class="btn btn-send">Absenden</button>
            </section>
            <!--            OLD-->
<!--            <div class="mb-3">-->
<!--                <label for="inputMail" class="form-label">Email Addresse</label>-->
<!--                <input type="email" class="form-control" name="inputMail" id="inputMail" value="--><?php //= $row['mail'] ?><!--">-->
<!--            </div>-->
<!--            </div>-->
<!--            <div class="mb-3">-->
<!--                <label for="inputName" class="form-label">Name</label>-->
<!--                <input type="text" class="form-control" name="inputName" id="inputName" value="--><?php //= $row['name'] ?><!--">-->
<!--            </div>-->
<!---->
<!--            <button type="submit" class="btn btn-primary">Speichern</button>-->
            <!--            OLD-->
        </form>

    <?php } ?>
</main>

<?php
include_once('../inc/script.inc.php');
?>
</body>
</html>
