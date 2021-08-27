<?php

session_start();

mb_internal_encoding("utf8");

require "DB.php";

$db = new DB();

$pdo = $db->connect();

$stmt = $pdo->prepare($db->update());

$stmt->bindValue(1, $_POST['name']);
$stmt->bindValue(2, $_POST['mail']);
$stmt->bindValue(3, $_POST['password']);
$stmt->bindValue(4, $_POST['comment']);
$stmt->bindValue(5, $_SESSION['id']);

$_SESSION['name'] = $_POST['name'];
$_SESSION['mail'] = $_POST['mail'];
$_SESSION['password'] = $_POST['password'];
$_SESSION['comment'] = $_POST['comment'];


$stmt->execute();
$pdo = NULL;

header("Location:http://localhost/login_mypage/mypage.php");

?>

