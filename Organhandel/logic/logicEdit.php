<?php
include_once('../inc/login.inc.php');

$extras = 0;
$doc = 25000;
$anesthesia = 8000;
$happyEnd = 150;
($_POST['special01'] ?? '') ? $extras += $doc : '';
($_POST['special02'] ?? '') ? $extras += $anesthesia : '';
($_POST['special03'] ?? '') ? $extras += $happyEnd : '';
var_dump($_POST['organe']);
$organPrice = 0;
switch ($_POST['organe']) {
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

$updateId = $_POST['inputID'];
$updateSex = $_POST['sex'];
$updateName = $_POST['username'];
$updateAdresse = $_POST['adresse'];
$updateUsermessage = $_POST['usermessage'];
$updateOrgane = $_POST['organe'];
$updateSpecial01 = isset($_POST['special01']) ? 1 : 0;
$updateSpecial02 = isset($_POST['special02']) ? 1 : 0;
$updateSpecial03 = isset($_POST['special03']) ? 1 : 0;
$updateOrganPrice = $organPrice;
$updateExtras = $extras;
$updateSumme = $updateOrganPrice + $updateExtras;




$stmt = $pdo->prepare('UPDATE organorder SET
                      sex = :sex_new, 
                      name = :name_new, 
                      adresse = :adresse_new, 
                      usermessage = :usermessage_new, 
                      organe = :organe_new, 
                      special01 = :special01_new, 
                      special02 = :special02_new, 
                      special03 = :special03_new,
                      Organpreis = :organpreis_new,
                      Sonstigekosten = :extras_new,
                      Summe = :summe_new
                  WHERE id = :id');
$stmt->execute(array(
    'id' => $updateId,
    'sex_new' => $updateSex,
    'name_new' => $updateName,
    'adresse_new' => $updateAdresse,
    'usermessage_new' => $updateUsermessage,
    'organe_new' => $updateOrgane,
    'special01_new' => $updateSpecial01,
    'special02_new' => $updateSpecial02,
    'special03_new' => $updateSpecial03,
    'organpreis_new' => $updateOrganPrice,
    'extras_new' => $updateExtras,
    'summe_new' => $updateSumme
));



header('Location: ../pages/index.php');