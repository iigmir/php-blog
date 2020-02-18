<?php

$data = array( "msg" => "Hello World!" );

header("Content-Type: application/json");
echo json_encode($data);
