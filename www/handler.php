<?php

$db = "sqlite:../database.sqlite";
$pdo = new PDO($db);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
    $stmt = $pdo->prepare(
        "insert into orders(phone, longitude, latitude) values(?, ?, ?)"
    );

    $stmt->bindValue(1, $_POST['phone']);
    $stmt->bindValue(2, $_POST['longitude']);
    $stmt->bindValue(3, $_POST['latitude']);
    $stmt->execute();
} catch (PDOException $e) {
    echo $e->getMessage();
}

echo "Thank you for your business!";
