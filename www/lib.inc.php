<?php

function get_address($lat, $long) {
    $url = "http://maps.googleapis.com/maps/api/geocode/json?latlng="
        . "$lat,$long";
    $file = file_get_contents($url);
    $json = json_decode($file, true);

    $route = $json['results'][0]['address_components'][0]['long_name'];
    $sublocality = $json['results'][0]['address_components'][1]['long_name'];
    return array($route, $sublocality)";
}


