<!doctype html>
<html lang="en">
<?php
include_once ('../inc/head.inc.php')
?>
<body>
<main class="container py-4">

    <?php
    $id = $_GET['id'];
    $stmt = $pdo->prepare('SELECT * FROM exercise02 WHERE id = ?');
    $stmt->execute(array($id));
    while ($row = $stmt->fetch()) {
        ?>

        <form method="post" action="../logic/logicEdit.php">
            <input type="hidden" name="inputId" value="<?= $row['id'] ?>">

            <div class="mb-3">
                <label for="inputName" class="form-label">Name</label>
                <input type="text" class="form-control" name="inputName" id="inputName" value="<?= $row['name'] ?>">
            </div>

            <div class="mb-3">
                <label for="inputAddress" class="form-label">Name</label>
                <input type="text" class="form-control" name="inputAddress" id="inputAddress" value="<?= $row['address'] ?>">
            </div>

            <div class="mb-3">
                <label for="inputGender" class="form-label">Name</label>
                <input type="text" class="form-control" name="inputGender" id="inputGender" value="<?= $row['geschlecht'] ?>">
            </div>

            <div class="mb-3">
                <label for="inputSorte" class="form-label">Name</label>
                <input type="text" class="form-control" name="inputSorte" id="inputSorte" value="<?= $row['sorte'] ?>">
            </div>


            <div class="mb-3">
                <label for="inputExtra" class="form-label">Name</label>
                <input type="text" class="form-control" name="inputExtra" id="inputExtra" value="<?= $row['extra'] ?>">
            </div>

            <div class="mb-3">
                <label for="inputExtra1" class="form-label">Name</label>
                <input type="text" class="form-control" name="inputExtra1" id="inputExtra1" value="<?= $row['extra1'] ?>">
            </div>

            <div class="mb-3">
                <label for="inputExtra1" class="form-label">Name</label>
                <input type="text" class="form-control" name="inputExtra2" id="inputExtra2" value="<?= $row['extra2'] ?>">
            </div>

            <div class="mb-3">
                <label for="inputExtra1" class="form-label">Name</label>
                <input type="text" class="form-control" name="inputExtra3" id="inputExtra3" value="<?= $row['extra3'] ?>">
            </div>
            <div class="mb-3">
                <label for="inputExtra1" class="form-label">Name</label>
                <input type="text" class="form-control" name="inputExtra4" id="inputExtra4" value="<?= $row['extra4'] ?>">
            </div>

            <button type="submit" class="btn btn-primary">Speichern</button>
        </form>



    <?php } ?>


</main>

<?php
include_once ('../inc/script.inc.php');
?>
</body>
</html>
