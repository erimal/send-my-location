<?php

include_once('db.inc.php');
include_once('lib.inc.php');
require_once('vendor/telerivet-php-client-master/telerivet.php');

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

$address = get_address();
$tr = new Telerivet_API('API Key');
$project = $tr->initProjectById('Project ID');
$contact = $project->getOrCreateContact(array('vars' => array(
	"L_Street" => $address[0], 
	"L_Area" => $address[1])
));

echo "Thank you for your business!";
