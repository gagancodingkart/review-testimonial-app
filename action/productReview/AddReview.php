<?php
/*
* installation Url:- "http://codingkloud.com/shopify-app/action/include/AppInstall.php?shop=jayka-new"
*/
require_once('../include/Config.php');//exception handling error handling file
require_once('../include/ErrorCode.php');//exception handling error handling file
class AddReview{
  public function __construct(){  
    // basic credentials definition
    $error                   = new ErrorCode();
    $this->error_code        = $error->getCodes();  
  }
  public function addReview($conn){     
  	try
  	{
      $reviewer_name        = $_POST['customer_name'];
      $reviewer_title       = $_POST['review_title'];
      $reviewer_email       = $_POST['customer_email'];
      $reviewer_subject     = $_POST['subject'];
      $rating               = $_POST['rating'];
      $product_id           = $_POST['product_id'];
      $product_image        = $_POST['product_image'];
      $request_at           = date("Y-m-d H:i:s");
      $shop_encrypt_address = md5($_SERVER['HTTP_ORIGIN']);
      $reviewStore          ="INSERT INTO product_review(rating,shop_encrypt_address,reviewer_name,title,customer_email,subject_description,product_id,status,created_at,review_image) VALUES ('$rating','$shop_encrypt_address','$reviewer_name','$reviewer_title','$reviewer_email','$reviewer_subject','$product_id','Unpublished','$request_at','$product_image')";
     $res                 =mysqli_query($conn,$reviewStore);
     header("Location:".$_SERVER['HTTP_REFERER'] ); /* Redirect browser */
  	}catch(Exception $e){
        $response['status'] = 'failer';
        $response['status_code'] = $e->getCode();
        $response['message']     = $this->error_code[$e->getCode()];
        print_r($response);
    }
	die();
  }
}

$AddReviewObj= new AddReview();
$AddReviewObj->addReview($conn);