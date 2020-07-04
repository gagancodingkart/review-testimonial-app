<?php

require_once('ErrorCode.php');// exception handling file include 
class Config{
  public function __construct(){     
    // basic db credentials 
    $error            = new ErrorCode();
    $this->error_code = $error->getCodes();  
    $this->servername = 'codingkloud.com';
    $this->username   = 'shopify-gagan';
    $this->password   = 'sRD8w82zoVVD';
    $this->database   = 'shopify-app-product-reviews';
  }
  public function getDbConnection(){ 
  	try
  	{
		// Create database connection
		$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->database);
	  // Check connection
		if (!$conn) {
       throw new Exception("Connection failed");
		}
		return $conn;
    }catch(Exception $e){
        $response['status'] = 'failer';
        $response['status_code'] = $e->getCode();
        $response['message']     = $this->error_code[$e->getCode()];
        return $response;
    }
  }
}
$confObj=new Config();
/* getDbConnection responsible for database connection object creation,
* and $conn is a reffernce object for db connection handling
*/
$conn=$confObj->getDbConnection();
?>
