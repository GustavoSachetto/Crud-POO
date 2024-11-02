<?php

session_start();

$parsed = parse_ini_file(__DIR__.'/../.env');

foreach ($parsed as $key => $value) {
  $_ENV[$key] = $value;
}

define('URL', $_ENV['URL']);

echo "<script>const baseUrl = '".URL."';</script>";