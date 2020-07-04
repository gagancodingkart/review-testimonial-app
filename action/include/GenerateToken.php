<?php

require_once("Config.php");   // Db connection file include
require_once('ErrorCode.php');// error handling file include
class GenerateToken{
   public function __construct()
    { 
    // basic credential defination
        $error               = new ErrorCode();
        $this->error_code    = $error->getCodes(); 
        $this->api_key 	   = "afd1509f3bb72237f9d44c13fd02ff42";
        $this->shared_secret = "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";
    }
   public function getAccessToken($conn){
      try
      { 
		$params        = $_GET; // Retrieve all request parameters
		$hmac          = $_GET['hmac']; // Retrieve HMAC request parameter
		$params = array_diff_key($params, array('hmac' => '')); // Remove hmac from params
		ksort($params); // Sort params lexographically
		$computed_hmac = hash_hmac('sha256', http_build_query($params), $this->shared_secret);
		if (hash_equals($hmac, $computed_hmac))
		{
			$query = array(
				"client_id" => $this->api_key, // Your API key
				"client_secret" => $this->shared_secret, // Your app credentials (secret key)
				"code" => $params['code'] // Grab the access key from the URL
			);
			// Generate access token URL
			$access_token_url = "https://" . $params['shop'] . "/admin/oauth/access_token";
			// Configure curl client and execute request for get Access token for store
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_URL, $access_token_url);
			curl_setopt($ch, CURLOPT_POST, count($query));
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($query));
			$result = curl_exec($ch);
			curl_close($ch);
			
			$result = json_decode($result, true);
			$access_token = $result['access_token']; // Store access token
			if ($access_token) {
				$shop_name="https://" . $params['shop'];
				date_default_timezone_set('Asia/Kolkata');
				$installed_time = date("Y-m-d H:i:s");
		        $shop_add = md5($shop_name);
		        $query="INSERT INTO shop_details(shop_name,shop_encrypt_address,access_token,install_at,shop_status) VALUES ('$shop_name','$shop_add','$access_token','$installed_time','1')";
		 		$res=mysqli_query($conn,$query);
		        $redirectOn="https://" . $params['shop'] . "/admin/apps";
		        header("Location:".$redirectOn ); /* Redirect browser */
			}
			else{
				 throw new Exception("Access Token not Available");
				 session_destroy();
			}	 
		}else{
				 throw new Exception(' Shopify Request Not Recorgnized!');
			die();// Someone is trying to be shady!
		}
    }catch(Exception $e){
        $response['status']		 = 'failer';
        $response['status_code'] = $e->getCode();
        $response['message']     = $this->error_code[$e->getCode()];
        print_r($response);
    }
  }
}
$tokenObj = new GenerateToken();
// getAccessToken responsible for getting access token
$tokenObj->getAccessToken($conn);