<?php 

$host = "multidigitos.culbrckcaj13.us-west-2.rds.amazonaws.com";
$dbname = "cuotta";
$username = "lcruz";
$password = "q/HLGVFmCoPuAP4I";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
    die("Fail" . $e->getMessage());
}

