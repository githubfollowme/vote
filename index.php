<?php
$dsn="mysql:host=localhost;charset=utf8;dbname=s1100417";
$pdo=new PDO($dsn,'s1100417','s1100417');
$sql="SELECT * FROM `user` where `id`='1'";
$user=$pdo->query($sql)->fetch();
// 123123132
echo "<pre>";
print_r($user);
echo "</pre>";
?>