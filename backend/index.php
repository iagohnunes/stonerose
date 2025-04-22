<?php
header("Content-Type: application/json");
echo json_encode(["status" => "API funcionando ".$_ENV('name-project')." ou ".$_GET('name-project')]);
