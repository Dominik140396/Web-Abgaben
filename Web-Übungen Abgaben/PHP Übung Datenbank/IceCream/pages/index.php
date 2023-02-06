<!doctype html>
<html lang="en">
<?php
include_once ('../inc/head.inc.php')
?>
<body>
<main class="container py-4">

    <div class="center">
        <img class="Eiswaffel" src="ice-cone.png" alt="Eiswaffel">
        <h1>
            Eis cream Laden um die Ecke
        </h1>
        <img class="Eiswaffel" src="ice-cone.png" alt="Eiswaffel">
    </div>

    <article>
        <form method="post" action="../logic/logicInsert.php">

            <div class="mb-3">
                <label for="inputName" class="form-label">Name</label>
                <input type="text" class="form-control" name="inputName" id="inputName">
            </div>

            <div class="mb-3">
                <label for="inputAddress" class="form-label">Adresse</label>
                <input type="text" class="form-control" name="inputAddress" id="inputAddress">
            </div>

            <div class="mb-3">
                <label for="inputGender"></label>
                <input type="radio" name="inputGender" id="inputGender">
                Mann
            </div>
            <div class="mb-3">
                <label for="inputGender"></label>
                <input type="radio" name="inputGender" id="inputGender">
                Frau
            </div>

            <div class="mb-3">
                <label for="inputSorte" class="formFlex">Unsere Sorten :</label>
                <select name="inputSorte" id="inputSorte">
                    <option value="Schoko">Schoko</option>
                    <option value="Vanille">Vanille</option>
                    <option value="Zimt">Zimt</option>
                    <option value="Fingernägel">Fingernägel</option>
                    <option value="Zehennägel">Zehennägel</option>
                    <option value="Haare">Haare</option>
                </select>
            </div>
            <div>

                <div class="mb-3">
                    <label>
                        <input type="checkbox" name="inputExtra" id="inputExtra">
                    </label>
                    Zuckerstreusel
                </div>
                <div class="mb-3">
                    <label>
                        <input type="checkbox" name="inputExtra1" id="inputExtra1">
                    </label>
                    Schoko-Waffel
                </div>
                <div class="mb-3">
                    <label>
                        <input type="checkbox" name="inputExtra2" id="inputExtra2">
                    </label>
                    Hautschuppen
                </div>
                <div class="mb-3">
                    <label>
                        <input type="checkbox" name="inputExtra3" id="inputExtra3">
                    </label>
                    Winterkirschen
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Speichern</button>
        </form>
    </article>

    <article class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Geschlecht</th>
                <th scope="col">Sorte</th>
                <th scope="col">Zusatz</th>
                <th scope="col">Created</th>
                <th scope="col">#</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $stmt = "SELECT * FROM exercise02";
            foreach ($pdo->query($stmt) as $row) {
                ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['address'] ?></td>
                    <td><?= $row['gender'] ?></td>
                    <td><?= $row['sorte'] ?></td>
                    <td><?= $row['extra'] ?></td>
                    <td><?= $row['created_at'] ?></td>

                    <td>
                        <a href="detail.php?id=<?= $row['id'] ?>" class="btn btn-dark">Edit</a>
                        <a href="../logic/logicDelete.php?id=<?= $row['id'] ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </article>
    <img class="Eisbecher" src="ice-cream.png" alt="Eis">
</main>

<?php
include_once ('../inc/script.inc.php');
?>
</body>
</html>
