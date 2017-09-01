<?php

try {
    $dbname = "sqlite:../database.sqlite";
    $pdo = new PDO($dbname);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}
