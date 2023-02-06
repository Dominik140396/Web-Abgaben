<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Offer</title>
    <link rel="stylesheet" href="../styling/styling.css">
</head>
<body>
<!--
Price per Kg in $
Cannabis 5.000
Fentanyl 5.000
Heroin 30.000
Crystal Meth 30.000
Kokain 45.000



array(6) { ["deliveryLocation"]=> string(2) "87"
["deliveryInfo"]=> string(3) "/78"
["drugType"]=> string(8) "Fentanyl"
["weight"]=> string(5) "Gramm"
["quantity"]=> string(1) "3"
["purityGrade"]=> string(3) "100" }
-->

<div>
    <h1>
        Your Order
    </h1>
</div>
<article>
    <section>
        <p>Transfer Location:</p>
        <p><?= $_POST["deliveryLocation"] ?></p>
    </section>
    <section>
        <p>Drug Type:</p>
        <p><?= $_POST["drugType"] ?></p>
    </section>
    <section>
        <p>Quantity:</p>
        <p><?= $_POST["quantity"] . " " .$_POST["weight"]?></p>
    </section>
    <section>
        <p>Purity Grade</p>
        <p><?= $_POST["purityGrade"] . "%" ." +- 0.1%"?></p>
    </section>
    <section>
        <?php
        $pricePerKG = 0;
        $totalPrice = 0;
        switch ($_POST["drugType"]){
            case "Cannabis":
            case "Fentanyl":
                $pricePerKG += 5000;
                break;
            case "Heroin":
            case "CrystalMeth":
                $pricePerKG += 30000;
                break;
            case "Kokain":
                $pricePerKG += 45000;
                break;
        }
        if ($_POST["weight"] == "Gramm"){
            $pricePerKG = ($pricePerKG / 1000);
        }
        $totalPrice =$pricePerKG * (int)$_POST["quantity"];
        $totalPrice = $totalPrice / 100 * (int)$_POST["purityGrade"]
        ?>
        <p>Total, need to pay in bar!</p>
        <p>$ <?=$totalPrice?></p>
    </section>
</article>

</body>
</html>