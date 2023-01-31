<?php

include_once('../inc/login.inc.php');

$newEntry = array();
$newEntry['name'] = $_POST['inputName'];
$newEntry['address'] = $_POST['inputAddress'];
$newEntry['gender'] = $_POST['inputGender'];
$newEntry['sorte'] = $_POST['inputSorte'];

$newEntry['extra'] = (bool)((isset($_POST['inputExtra']) ? $_POST['inputExtra'] : ""));
$newEntry['extra1'] = (bool)((isset($_POST['inputExtra1']) ? $_POST['inputExtra1'] : ""));
$newEntry['extra2'] = (bool)((isset($_POST['inputExtra2']) ? $_POST['inputExtra2'] : ""));
$newEntry['extra3'] = (bool)((isset($_POST['inputExtra3']) ? $_POST['inputExtra3'] : ""));


$stmt = $pdo->prepare("INSERT INTO exercise02 (name, address, male, female, sorte, extra, extra1, extra2, extra3) VALUES (:name, :address, :male, :female, :sorte, :extra, :extra1, :extra2, :extra3)");
$stmt->execute($newEntry);
header('Location: ' . $_SERVER['HTTP_REFERER']);//http referer leitet auf die vorherige Seite retour