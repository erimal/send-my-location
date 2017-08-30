<?php
$phone = $_GET['phone'];
?>
<!doctype html>

<html lang="en">
<head>
<title>Location Form</title>
<script type="text/javascript">
function fill_form(position) {
    var lon = document.getElementById('longitude');
    var lat = document.getElementById('latitude');
    var f = document.getElementById('location_form');

    lon.value = position.coords.longitude;
    lat.value = position.coords.latitude;

    document.getElementById("submit").disabled = false;
}
</script>
</head>

<body>
<form id="location_form" method="post" action="handler.php">
<label for="phone">Phone number</label>
<input type="text" name="phone" value="<?= $phone ?>">
<br>
<label for="longitude">Longitude</label>
<input type="text" id="longitude" name="longitude" value="">
<br>
<label for="latitude">Latitude</label>
<input type="text" id="latitude" name="latitude" value="">
<br>
<input id="submit" type="submit" value="OK" disabled>
</form>

<script type="text/javascript">
if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(fill_form);
}

</script>
</html>
