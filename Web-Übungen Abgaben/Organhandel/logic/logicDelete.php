<?php
include_once('../inc/login.inc.php');

$id = $_GET['id'];
$stmt = $pdo->prepare('DELETE FROM organorder WHERE id = ?');
$stmt->execute(array($id));
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>