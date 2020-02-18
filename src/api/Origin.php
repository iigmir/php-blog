<?php
class Origin {
    /**
     * Origins accepted to use APIs
     * @var Origin
     */
    private $acceptable_origin = [
        "localhost", "127.0.0.1",
        "iigmir.github.io", "iismmx.000webhostapp.com",
    ];
    /**
     * The request origin
     * @var Origin
     */
    public $request_origin;

    public function __construct( $request_origin ) {
        $this->request_origin = $request_origin;
    }
    public function set_request_origin( $input )
    {
        $this->$request_origin = $input;
    }
    public function request_origin( $server_name )
    {
        return isset( $server_name ) ? $server_name : null;
    }
    public function allow_credentials( $server_name )
    {
        $obj = new Origin;
        return in_array( $obj->request_origin( $server_name ), $obj->acceptable_origin );
    }
}