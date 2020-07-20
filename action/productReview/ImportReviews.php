<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');

require_once('../include/Config.php');//exception handling error handling file
require_once('../include/ErrorCode.php');//exception handling error handling file
class ImportReviews{
  public function __construct($conn){  
    $error                   = new ErrorCode();
    $this->error_code        = $error->getCodes(); 
    $tmpName = $_FILES['reviewFile']['tmp_name'];
    if($tmpName!==""){
      if($_FILES["reviewFile"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        header("Location:".$_SERVER['HTTP_REFERER']);
      }
      $csvAsArray = array_map('str_getcsv', file($tmpName));
      $shop_encrypt='2ce2dec5327693017ea3f54b0b495a2d';
      $request_at           = date("Y-m-d H:i:s");
      for($k=1; $k< (int)sizeof($csvAsArray); $k++){
       $product_id           =$csvAsArray[$k][0];
       $reviewer_name        =$csvAsArray[$k][1];
       $product_name         =$csvAsArray[$k][2];
       $title                =$csvAsArray[$k][3];
       $customer_email       =$csvAsArray[$k][4];
       $subject_description  =$csvAsArray[$k][5];
       $rating               =$csvAsArray[$k][6];
       $storeReviewFromCsv ="INSERT INTO product_review(rating,shop_encrypt_address,reviewer_name,title,customer_email,subject_description,status,created_at,product_id,product_name) VALUES ('$rating','$shop_encrypt','reviewer_name','$title','$customer_email','subject_description','Unpublished','$request_at','$product_id','$product_name')";
      $res=mysqli_query($conn,$storeReviewFromCsv);
      }
    }
    header("Location:".$_SERVER['HTTP_REFERER'] );
    exit; 
    
  }
  public function loadReviews($conn,$shop_encrypt){     
    try
    {
     $reviewStore          ="SELECT * FROM product_review where shop_encrypt_address='$shop_encrypt'";

     $res                  =mysqli_query($conn,$reviewStore);
     $collection = array();
      while($row = mysqli_fetch_array($res))
      {
        $starthtml='';
        $rating  =$row['rating'];
        echo "<tr><td>" .$row['product_name']."</td>";
        echo "<td>" .$rating."</td>";
        echo "<td>" .$row['subject_description']. "</td>";
        echo "<td>" .$row['created_at']."</td>";
        echo "<td class='status-".$row['id']."'style='color:red'>" .$row['status']."</td>";
        echo "</tr>";
      }
      exit;
    }catch(Exception $e){
        $response['status'] = 'failer';
        $response['status_code'] = $e->getCode();
        $response['message']     = $this->error_code[$e->getCode()];
        print_r($response);
    }
  die();
  }
}
$reviewObj= new ImportReviews($conn);
