<?php

$data = array( "message" => "The api directory provide some APIs for my personal use." );
header( "Content-Type: application/json" );
echo json_encode($data);
