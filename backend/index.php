<?php

header("Content-Type: application/json");

$apiKey = getenv("name-project") ?? 'não encontrada';
echo "API $apiKey";

$apiKey = $_ENV['name-project'] ?? 'não encontrada';
echo "API $apiKey";

$apiKey = $_SERVER['name-project'] ?? 'não encontrada';
echo "API $apiKey";
