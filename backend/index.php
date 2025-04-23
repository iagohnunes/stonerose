<?php

header("Content-Type: application/json");

$apiKey = getenv("NAME_PROJECT") ?? 'não encontrada';
echo "API $apiKey";
echo "\n<br>";