<?php
$request_origin = isset( $_SERVER["SERVER_NAME"] ) ? $_SERVER["SERVER_NAME"] : null;
$acceptable_origin = [
    "localhost",
    "127.0.0.1",
    "iigmir.github.io",
    "iismmx.000webhostapp.com",
];
$data = array(
    "accepted" => in_array( $request_origin, $acceptable_origin ),
    "origin" => $request_origin,
);
$allow_credentials = in_array( $request_origin, $acceptable_origin );

if ( $allow_credentials )
{
    header("Access-Control-Allow-Origin: ${request_origin}");
    header("Access-Control-Allow-Credentials: true");
}

header("Content-Type: application/json");
echo json_encode( $data );
