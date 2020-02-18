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
    // Methods
    public function __construct( $request_origin )
    {
        $this->request_origin = $request_origin;
    }
    public function set_request_origin( $input )
    {
        $this->$request_origin = $input;
    }
    public function allow_credentials()
    {
        return in_array( $this->request_origin, $this->acceptable_origin );
    }
}
