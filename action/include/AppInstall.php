<?php
/*
* installation Url:- "http://codingkloud.com/shopify-app/action/include/AppInstall.php?shop=jayka-new"
*/
require_once('ErrorCode.php');//exception handling error handling file
class AppInstall{
  public function __construct(){  
    // basic credentials definition
    $error                   = new ErrorCode();
    $this->error_code        = $error->getCodes();  
    $this->api_key			     = "afd1509f3bb72237f9d44c13fd02ff42";
   	$this->scope             = "read_products,write_products,read_content,write_content,read_themes,write_themes,read_customers,write_customers,read_analytics,read_script_tags,write_script_tags";
    $this->redirect_uri      = "http://codingkloud.com/shopify-app/action/include/GenerateToken.php";
  }
  public function install(){     
  	try
  	{
  	    $shop    = $_GET['shop'];
		// Build install/approval URL to redirect to
		$install_url = "https://" . $shop . ".myshopify.com/admin/oauth/authorize?client_id=".$this->api_key."&scope=".$this->scope."&redirect_uri=" . urlencode($this->redirect_uri);
		//Auth Redirect for specific store
		header("Location: " . $install_url);
		
  	}catch(Exception $e){
        $response['status'] = 'failer';
        $response['status_code'] = $e->getCode();
        $response['message']     = $this->error_code[$e->getCode()];
        print_r($response);
    }
	die();
  }
}

$installObj= new AppInstall();
// install function responsible for application installation into store.
$installObj->install();