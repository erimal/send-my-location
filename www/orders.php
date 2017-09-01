<?php

try {
    $db = "sqlite:../database.sqlite";
    $pdo = new PDO($db);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}

if (array_key_exists("id", $_GET)) {
    try {
        $stmt = $pdo->prepare("delete from orders where id = ?");
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
<th>Order Date and Time</th>
<th>Operations</th>
<?php
try {
    $result = $pdo->query("select * from orders where completed = 0");
    foreach ($result as $row) { ?>
        <tr>
        <td><?= $row['phone'] ?></td>
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
