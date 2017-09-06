<?php

include_once('db.inc.php');

function get_address($lat, $long) {
    $url = "http://maps.googleapis.com/maps/api/geocode/json?latlng="
        . "$lat,$long";
    $file = file_get_contents($url);
    $json = json_decode($file, true);

    $route = $json['results'][0]['address_components'][0]['long_name'];
    $sublocality = $json['results'][0]['address_components'][1]['long_name'];
    return "$route, $sublocality";
}

if (array_key_exists("id", $_GET)) {
    try {
        //$stmt = $pdo->prepare("delete from orders where id = ?");
        $stmt = $pdo->prepare("update orders set completed = 1 where id = ?");
        $stmt->bindValue(1, $_GET['id']);
        $stmt->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

?>
<!doctype html>
<html>
<head>
<title>Order List</title>
</head>

<body>
<h1>Open Orders</h1>

<table>
<tr>
<th>Phone Number</th>
<th>Location</th>
<th>Order Date and Time</th>
<th>Operations</th>
<?php
try {
    $result = $pdo->query("select * from orders where completed = 0");
    foreach ($result as $row) { ?>
        <tr>
        <td><?= $row['phone'] ?></td>
        <td><?= get_address($row['latitude'], $row['longitude']) ?></td>
        <td><?= $row['timestamp'] ?></td>
        <td><a href="/orders.php?id=<?= $row['id'] ?>">Close</a></td>
        </tr>
    <?php }
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
</table>
</body>
</html>
