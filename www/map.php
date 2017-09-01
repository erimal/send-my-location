<!doctype html>

<html>
<head>
<title>Map</title>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css"
   integrity="sha512-M2wvCLH6DSRazYeZRIm1JnYyh22purTM+FDB5CsyxtQJYeKq83arPe5wgbNmcFXGqiSH2XR8dT/fJISVA1r/zQ==" crossorigin=""/>

<style type="text/css">
    html, body { height: 100% }
    #mapid { height: 100%; width: 100%; }
</style>

<script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"
   integrity="sha512-lInM/apFSqyy1o6s89K4iQUKg6ppXEgsVxT35HbzUupEVRh2Eu9Wdl4tHj7dZO0s1uvplcYGmt3498TtHq+log=="
   crossorigin=""></script>
</head>

<body>

<div id="mapid"></div>

<script type="text/javascript">
var mymap = L.map('mapid').setView([5.55, -0.2167], 13);

L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox.streets',
    accessToken: 'pk.eyJ1IjoibG9yZW56b2NhYnJpbmkiLCJhIjoiY2o2emdvdWV6Mml6dTJxbjcxbmg0Y2JjNyJ9.4XVM2qJTEh4c4GTmeWH-sA'
}).addTo(mymap);

<?php
include_once('db.inc.php');
$result = $pdo->query("select * from orders where completed = 0");
foreach ($result as $row) {
    $phone = $row['phone'];
    $longitude = $row['longitude'];
    $latitude = $row['latitude'];
    echo "var marker = L.marker([$latitude, $longitude]).addTo(mymap);\n";
    echo "marker.bindPopup('$phone').openPopup();\n";
}
?>
</script>
</body>
</html>
