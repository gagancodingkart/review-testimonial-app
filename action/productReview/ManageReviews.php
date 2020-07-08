<?php
/*
* installation Url:- "http://codingkloud.com/shopify-app/action/include/AppInstall.php?shop=jayka-new"
*/
require_once('../include/Config.php');//exception handling error handling file
require_once('../include/ErrorCode.php');//exception handling error handling file
class ManageReviews{
  public function __construct(){  
    // basic credentials definition
    $error                   = new ErrorCode();
    $this->error_code        = $error->getCodes();  
  }
  public function loadReview($conn){     
  	try
  	{
     $reviewStore          ="SELECT * FROM product_review";
     $res                  =mysqli_query($conn,$reviewStore);
     $collection = array();
      while($row = mysqli_fetch_array($res))
      {
        echo "<tr>";
        echo "<td>" .$row['review_image']."</td>";
        echo "<td>" .$row['rating']."</td>";
        echo "<td>" .$row['created_at']."</td>";
        echo "<td>" .$row['reviewer_name']." post review ".$row['subject_description']. "</td>";
        echo "<td style='color:red'>" .$row['status']."</td>";
        echo "<td><i class='fa fa-lock' href='".$row['id']."'style='font-size:24px;color:black'></i><i href='".$row['id']."' class='fa fa-trash' style='font-size:24px;color:red'></i>" ."</td>";
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

$AddReviewObj= new ManageReviews();
$AddReviewObj->loadReview($conn);