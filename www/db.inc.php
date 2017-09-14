<?php

try {
    //$dbname = "sqlite:../database.sqlite";
    $dbname = "restaurant";
    $user = "root";
    $password = "m00kaw";
    $host = "localhost";
    //$pdo = new PDO($dbname);
    $pdo = new PDO("mysql:dbname=$dbname;host=$host", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}
