<?php
require( "../Origin.php" );
$data = array();

$new_origin = new Origin( $_SERVER["SERVER_NAME"] );
$request_origin = $new_origin->request_origin;

if ( $new_origin->allow_credentials() )
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
        $id = json_decode( $response_data )->id;
        $data["API"] = json_decode( $response_data );
        $data["URL"] = "https://icanhazdadjoke.com/j/${id}";
        $data["SRC"] = "https://icanhazdadjoke.com/";
    }
    curl_close($ch);
}
header("Content-Type: application/json");
echo json_encode( $data );
