<?php

$data = array( "message" => "The api directory provide some APIs for iigmir.github.io and iismmx.000webhostapp.com use." );
header("Content-Type: application/json");
echo json_encode($data);
