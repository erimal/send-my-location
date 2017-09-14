<?php

include_once('db.inc.php');
include_once('lib.inc.php');

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
    foreach ($result as $row) {
        $address = get_address($row['latitude'], $row['longitude']);
        $street = $address[0];
        $area = $address[1];
        ?>
        <tr>
        <td><?= $row['phone'] ?></td>
        <td><?= $street ?>, <?= $area ?></td>
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
