<?php

include_once('db.inc.php');

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
