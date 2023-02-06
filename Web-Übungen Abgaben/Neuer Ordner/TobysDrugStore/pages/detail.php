<!doctype html>
<html lang="en">


<?php
include_once ('../inc/head.inc.php')
?>

<head>
    <link rel="stylesheet" href="../styling/style.css">
</head>
<body>
<main class="container py-4">
    <?php
    $id = $_GET["id"];
    $stmt = $pdo->prepare("SELECT * FROM drugorder WHERE id = ?");
    $stmt->execute(array($id));
    while ($row = $stmt->fetch()){
        ?>
        <div>
            <h2>Change your Order</h2>
            <form action="..\logic\logicEdit.php" method="post">
                <input type="hidden" name="inputId" value="<?= $row["id"] ?>">
                <section class="flex">
                    <label for="deliveryLocation">Delivery place</label>
                    <input type="text" id="deliveryLocation" name="deliveryLocation" required placeholder="Delivery place" value="<?= $row["place"] ?>">
                </section>

                <section class="flex">
                    <label for="deliveryInfo">Delivery place Information</label>
                    <textarea id="deliveryInfo" name="deliveryInfo" placeholder="Delivery place Information" required><?= $row["placeInfo"]?></textarea>
                </section>


                <section class="flex">
                    <label>Desire drug</label>
                    <div class="radio">
                        <div>
                            <select name="drugType" id="drugType" value="<?= $row["drug"] ?>">
                                <option value="Heroin">Heroin</option>
                                <option value="Fentanyl">Fentanyl</option>
                                <option value="Kokain">Kokain</option>
                                <option value="CrystalMeth">Crystal Meth</option>
                                <option value="Cannabis">Cannabis</option>
                            </select>

                        </div>
                    </div>
                </section>


                <section class="flex">
                    <label>Weight</label>
                    <div>
                        <div class="radio">
                            <input type="radio" name="weight" value="Gramm" required <?php if ($row['weight'] == 'Gramm') echo 'checked' ?>>gramm
                        </div>
                        <div class="radio">
                            <input type="radio" name="weight" value="Kilogramm" required <?php if ($row['weight'] == 'Kilogramm') echo 'checked' ?>>kilogramm
                        </div>
                </section>


                <section class="flex">
                    <label for="quantity">Quantity of weight</label>
                    <div class="radio">
                        <input type="number" id="quantity" name="quantity" min="1" max="100" required value="<?= $row["quantity"] ?>">
                    </div>
                </section>


                <section class="flex">
                    <label>Purity Grade</label>
                    <div>
                        <div class="checkBoxen">50%
                            <input type="range" name="purityGrade" min="50" max="99" step=1 value="<?= $row["purityGrade"] ?>">99%
                        </div>
                    </div>
                </section>


                <section class="flex">
                    <button type="reset" class="btn btn-cancel">Reset</button>
                    <button type="submit" class="btn btn-send">Change</button>
                </section>


            </form>
        </div>
    <?php }


    ?>

</main>

<?php
include_once ('../inc/script.inc.php');
?>
</body>
</html>
