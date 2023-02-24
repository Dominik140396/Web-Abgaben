<?php
include_once('../inc/login.inc.php');

$updateName = $_POST['inputName'];
$updateAddress = $_POST['inputAddress'];
$updateGeschlecht = $_POST['inputGeschlecht'];
$updateSorte = $_POST['inputSorte'];
$updateExtra = $_POST['inputExtra'];
$updateExtra1 = $_POST['inputExtra1'];
$updateExtra2 = $_POST['inputExtra2'];
$updateExtra3 = $_POST['inputExtra3'];
$updateId = $_POST['inputId'];


$stmt = $pdo->prepare('UPDATE exercise02 SET mail= :email_new, name= :name_new WHERE id= :id');
$stmt->execute(array('id' =>$updateId, 'email_new' => $updateMail, 'name_new' => $updateName));

header('Location: ../pages/index.php');
