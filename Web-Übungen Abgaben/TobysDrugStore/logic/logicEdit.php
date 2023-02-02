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




$updateplace = $_POST["deliveryLocation"];
$updateplaceInfo = $_POST["deliveryInfo"];
$updatedrug = $_POST["drugType"];
$updateweight = $_POST["weight"];
$updatequantity = (int)$_POST["quantity"];
$updatepurityGrade = (int)$_POST["purityGrade"];
$updateId = $_POST["inputId"];
$updatePrice = $totalPrice;

$stmt = $pdo->prepare("UPDATE drugorder SET place = :place_new, placeInfo = :placeInfo_new, 
drug = :drug_new, weight = :weight_new, quantity = :quantity_new, purityGrade = :purityGrade_new , price = :price_new WHERE id = :id");

$stmt->execute(array("id" =>$updateId, "place_new" => $updateplace, "placeInfo_new" => $updateplaceInfo,
    "drug_new" => $updatedrug, "weight_new" => $updateweight, "quantity_new" => $updatequantity,
    "purityGrade_new" => $updatepurityGrade, "price_new" => $updatePrice));

header("Location: ../pages/orders.php");
