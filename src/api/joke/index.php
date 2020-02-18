<?php
// Origin header
$request_origin = isset( $_SERVER["SERVER_NAME"] ) ? $_SERVER["SERVER_NAME"] : null;
$acceptable_origin = [
    "localhost",
    "127.0.0.1",
    "iigmir.github.io",
    "iismmx.000webhostapp.com",
];
$data = array();
$allow_credentials = in_array( $request_origin, $acceptable_origin );

if ( $allow_credentials )
{
    // Origin header
    header("Access-Control-Allow-Origin: ${request_origin}");
    header("Access-Control-Allow-Credentials: true");
    // Joke API
    $ch = curl_init( "https://icanhazdadjoke.com" );
    curl_setopt( $ch, CURLOPT_HTTPHEADER, [ "Accept: application/json" ] );
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    $response_data = curl_exec($ch);
    if (!curl_errno($ch))
    {
        $data = json_decode( $response_data );
    }
    curl_close($ch);
}
header("Content-Type: application/json");
echo json_encode( $data );
