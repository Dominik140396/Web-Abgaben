<?php
include_once('../inc/login.inc.php');


$pricePerKG = 0;
$totalPrice = 0;
switch ($_POST["drugType"]) {
    case "Cannabis":
    case "Fentanyl":
        $pricePerKG += 6000;
        break;
    case "Heroin":
    case "CrystalMeth":
        $pricePerKG += 35000;
        break;
    case "Kokain":
        $pricePerKG += 250000;
        break;
}
if ($_POST["weight"] == "Gramm") {
    $pricePerKG = ($pricePerKG / 1000);
}
$totalPrice = $pricePerKG * (int)$_POST["quantity"];
$totalPrice = $totalPrice / 50 * (int)$_POST["purityGrade"];



$newEntry = array();
$newEntry["place"] = $_POST["deliveryLocation"];
$newEntry["placeInfo"] = $_POST["deliveryInfo"];
$newEntry["drug"] = $_POST["drugType"];
$newEntry["weight"] = $_POST["weight"];
$newEntry["quantity"] = (int)$_POST["quantity"];
$newEntry["purityGrade"] = (int)$_POST["purityGrade"];
$newEntry["price"] = $totalPrice;



$stmt = $pdo->prepare("INSERT INTO drugorder (place, placeInfo, drug, weight, quantity, purityGrade, price) VALUES (:place, :placeInfo, :drug, :weight, :quantity, :purityGrade, :price)");
$stmt ->execute($newEntry);

header("Location: ". $_SERVER["HTTP_REFERER"]);

