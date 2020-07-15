<?php
class ErrorCode{
    public $code=array();
    public function __construct() {
       $this->code = array(
            '201'   => "The request has been fulfilled and a new resource has been created.",
            '202'   => "The request has been accepted, but not yet processed.",
            '204'   => "The server successfully executed the method but returns no response body.",
            '303'   => "The request has been accepted, but not yet processed.",
            '400'   => "Bad Request.",
            '401'   => "Unauthorized.",
            '403'   => "Forbidden.",
            '404'   => "Not Found.",
            '405'   => "METHOD_NOT_SUPPORTED. The server does not implement the requested HTTP method.",
            '406'   => "Not Acceptable",
            '415'   => "Unsupported Media Type",
            '422'   => "Unprocessable Entity",
            '500'   => "Internal Server Error",
            '503'   => "Service Unavailable",
            '504'   => "Gateway Timeout",
            '60'    => "INVALID type SPECIFICATION SQL Error",
            '' =>'something went worng!!'          
            );
    }

    public function getCodes() {       
        return $this->code;
    }
}
new ErrorCode();
?>



