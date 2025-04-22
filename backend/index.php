<?php

header("Content-Type: application/json");

$apiKey = getenv("name-project") ?? 'não encontrada';
echo "API $apiKey";
echo "<br>";

$apiKey = $_ENV['name-project'] ?? 'não encontrada';
echo "API $apiKey";
echo "<br>";

$apiKey = $_SERVER['name-project'] ?? 'não encontrada';
echo "API $apiKey";
echo "<br>";
