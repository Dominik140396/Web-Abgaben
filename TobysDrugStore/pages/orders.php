<!doctype html>
<html lang="en">
<?php
include_once ('../inc/head.inc.php')
?>
<body>
<main class="container py-4">


    <article class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Order ID</th>
                <th scope="col">Delivery Place</th>
                <th scope="col">Information</th>
                <th scope="col">Drug Type</th>
                <th scope="col">Quantity of weight</th>
                <th scope="col">Weight</th>
                <th scope="col">Purity Grade</th>
                <th scope="col">Price</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $stmt = "SELECT * FROM drugorder";
            foreach ($pdo->query($stmt) as $row){
                ?>
                <tr>
                    <td><?= $row["id"]?></td>
                    <td><?= $row["place"]?></td>
                    <td><?= $row["placeInfo"]?></td>
                    <td><?= $row["drug"]?></td>
                    <td><?= $row["quantity"]?></td>
                    <td><?= $row["weight"]?></td>
                    <td><?= $row["purityGrade"]?></td>
                    <td>$ <?= $row["price"]?></td>
                    <td>
                        <a href="detail.php?id=<?= $row["id"]?>" class="btn btn-dark">Ändern</a>
                        <a href="../logic/logicDelete.php?id=<?= $row["id"] ?>" class="btn btn-danger">Löschen</a>
                    </td>




                </tr>
            <?php }
            ?>
            </tbody>
        </table>
    </article>

</main>

<?php
include_once ('../inc/script.inc.php');
?>
</body>
</html>
