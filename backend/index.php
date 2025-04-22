<?php
header("Content-Type: application/json");
echo "API funcionando " . $_ENV('name-project') . " ou " . $_GET('name-project');
