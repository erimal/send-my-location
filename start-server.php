#! /usr/bin/env php
<?php

$host = "localhost";
$port = 8000;
$root = "./www";

system("php -S $host:$port -t $root");
