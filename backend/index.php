<?php
header("Content-Type: application/json");
echo json_encode(["status" => "API funcionando ".getenv('name-project')]);
