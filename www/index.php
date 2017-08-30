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

    document.getElementById("location_form").submit();
}
</script>
</head>

<body>
<form id="location_form" method="post" action="handler.php">
<input type="hidden" name="phone" value="<?= $phone ?>">
<br>
<input type="hidden" id="longitude" name="longitude" value="">
<br>
<input type="hidden" id="latitude" name="latitude" value="">
<br>
</form>

<script type="text/javascript">
if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(fill_form);
}

</script>
</html>
