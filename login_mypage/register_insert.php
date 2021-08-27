<?php

mb_internal_encoding("utf8");

require "DB.php";

$db = new DB();
$pdo = $db->connect();

$stmt = $pdo->prepare($db->insert());

$stmt->bindValue(1, $_POST['name']);
$stmt->bindValue(2, $_POST['mail']);
$stmt->bindValue(3, $_POST['password']);
if(empty($_POST['picture'])){
    $stmt->bindValue(4, "default.png");
}else{
    $stmt->bindValue(4, $_POST['picture']);
}
$stmt->bindValue(5, $_POST['comment']);

$stmt->execute();
$pdo = NULL;

header("Location:http://localhost/login_mypage/after_register.html");

?>

