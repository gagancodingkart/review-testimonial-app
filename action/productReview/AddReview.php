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
<<<<<<< HEAD
  	{ 
      $target_dir = "../include/assets/images/";
    
      // Check if image file is a actual image or fake image
      $reviewer_name        = $_POST['customer_name'];
      $product_name         = $_POST['product_name'];
=======
  	{
      $reviewer_name        = $_POST['customer_name'];
>>>>>>> d7022d1858dc10e35ea7c559c57146cadf527262
      $reviewer_title       = $_POST['review_title'];
      $reviewer_email       = $_POST['customer_email'];
      $reviewer_subject     = $_POST['subject'];
      $rating               = $_POST['rating'];
      $prod_id              = $_POST['product_id'];
<<<<<<< HEAD
      $request_at           = date("Y-m-d H:i:s");
      $shop_encrypt_address = md5($_SERVER['HTTP_ORIGIN']);
      $description =(string)$reviewer_name.' gives rating '. $rating . ' stars with review ' .$reviewer_subject;
if(isset($_FILES["product_image"]["name"]) && $_FILES["product_image"]["name"]!=="") {
      $target_file = $target_dir . basename($_FILES["product_image"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      $product_image        = $target_file;
  // Check file size
      if ($_FILES["product_image"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
      }

      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
        throw new Exception("Sorry, only JPG, JPEG, PNG & GIF files are allowed.",1);
        $uploadOk = 0;
      }
  $check = getimagesize($_FILES["product_image"]["tmp_name"]);
       if($check !== false) {
         echo "File is an image - " . $check["mime"] . ".";
         $uploadOk = 1;
       } else {
      throw new Exception("File is not an image", '');
         $uploadOk = 0;
       }
  // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
     throw new Exception("Sorry, your file was not uploaded", 1);  
      // if everything is ok, try to upload file
      } else {
        if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
          echo "The file ". basename( $_FILES["product_image"]["name"]). " has been uploaded.";
        } else {
      throw new Exception("Sorry, there was an error uploading your file.", 1);
        }
      }
       $image_name=(string)$_FILES["product_image"]["name"];
       $reviewStore          ="INSERT INTO product_review(rating,shop_encrypt_address,reviewer_name,title,customer_email,subject_description,status,created_at,review_image,product_id,is_notify,product_name) VALUES ('$rating','$shop_encrypt_address','$reviewer_name','$reviewer_title','$reviewer_email','$reviewer_subject','Unpublished','$request_at','$image_name','$prod_id',1,'$product_name')";
      }else{
      $reviewStore          ="INSERT INTO product_review(rating,shop_encrypt_address,reviewer_name,title,customer_email,subject_description,status,created_at,product_id,is_notify,product_name) VALUES ('$rating','$shop_encrypt_address','$reviewer_name','$reviewer_title','$reviewer_email','$reviewer_subject','Unpublished','$request_at','$prod_id',1,'$product_name')";
      }
      $revStoreResult                  =mysqli_query($conn,$reviewStore);
      if($revStoreResult){
      $notificationStore ="INSERT INTO notification(name,description,shop_address,created_at,is_seen) VALUES ('Review Request','$description','$shop_encrypt_address','$request_at',0)";
       $res=mysqli_query($conn,$notificationStore);
      }

=======
      $product_image        = $_POST['product_image'];
      $request_at           = date("Y-m-d H:i:s");
      $shop_encrypt_address = md5($_SERVER['HTTP_ORIGIN']);
      $reviewStore          ="INSERT INTO product_review(rating,shop_encrypt_address,reviewer_name,title,customer_email,subject_description,status,created_at,review_image,product_id) VALUES ('$rating','$shop_encrypt_address','$reviewer_name','$reviewer_title','$reviewer_email','$reviewer_subject','Unpublished','$request_at','$product_image','$prod_id')";
     $res                 =mysqli_query($conn,$reviewStore);
>>>>>>> d7022d1858dc10e35ea7c559c57146cadf527262
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