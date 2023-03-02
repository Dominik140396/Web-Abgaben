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

$newEntry = array();
$newEntry['sex'] = $_POST['sex'];
$newEntry['name'] = $_POST['username'];
$newEntry['adresse'] = $_POST['adresse'];
$newEntry['usermessage'] = $_POST['usermessage'];
$newEntry['organe'] = $_POST['organe'];
$newEntry['special01'] = (bool)(($_POST['special01'] ?? ""));
$newEntry['special02'] = (bool)(($_POST['special02'] ?? ""));
$newEntry['special03'] = (bool)(($_POST['special03'] ?? ""));
$newEntry['Organpreis'] = $organPrice;
$newEntry['Sonstigekosten'] = $extras;
$newEntry['Summe'] = $organPrice + $extras;

$stmt = $pdo->prepare("INSERT INTO organorder (sex, name, adresse, usermessage, organe, special01, special02, special03, Organpreis, Sonstigekosten, Summe) VALUES
                                                    (:sex, :name, :adresse, :usermessage, :organe, :special01, :special02, :special03, :Organpreis, :Sonstigekosten, :Summe)");
$stmt->execute($newEntry);

header('Location: ' . $_SERVER['HTTP_REFERER']);
//http referer leitet auf die vorherige Seite retour


