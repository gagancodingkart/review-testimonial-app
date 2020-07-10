<?php
/*
* installation Url:- "http://codingkloud.com/shopify-app/action/include/AppInstall.php?shop=jayka-new"
*/
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');

require_once('../include/Config.php');//exception handling error handling file
require_once('../include/ErrorCode.php');//exception handling error handling file
class ManageReviews{
  public function __construct($conn){  
    $error                   = new ErrorCode();
    $this->error_code        = $error->getCodes();  
    // basic credentials definition
    if(isset($_POST)){
        $reviewData = json_decode($_POST['data']);
          foreach($reviewData as $i => $item){
              $action = $item->action;
              if($action == 'loadReviews'){
               $this->loadReviews($conn);
              }else if($action == 'reviewStatusToggle'){
               $this->reviewStatusToggle($conn, $item->review_id,$item->status);
              }else if($action == 'reviewDelete'){
               $this->reviewDelete($conn, $item->review_id);
              }else if($action == 'loadRatings'){
               $this->loadRatings($conn, $item->product_id);
              }else if($action == 'loadReviewsForUser'){
               $this->loadReviewsForUser($conn, $item->product_id);
              }
          }
    }
  }
  public function loadReviews($conn){     
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
        echo "<td class='status-".$row['id']."'style='color:red'>" .$row['status']."</td>";
        echo "<td><i class='fa fa-lock status_toggle' review_id='".$row['id']."' style='font-size:24px;color:black'></i><i class='fa fa-trash del-review' review_id='".$row['id']."' style='font-size:24px;color:red'></i>" ."</td>";
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
  public function reviewStatusToggle($conn, $review_id,$status){     
  	try
  	{
      if($status=='Unpublished'){
         $status          ='Published';
      }else{
         $status          ='Unpublished';
      }
      $sqlUpdate          = "UPDATE product_review SET status = '$status' WHERE id='$review_id'";
      $result             = mysqli_query($conn,$sqlUpdate);  
      if($result){
      $response['status'] =$status;
      }
      print_r(json_encode($response));
      // print_r($response);
  	}catch(Exception $e){
        $response['status'] = 'failer';
        $response['status_code'] = $e->getCode();
        $response['message']     = $this->error_code[$e->getCode()];
        print_r($response);
    }
	die();
  }
 public function reviewDelete($conn, $review_id){     
    try
    {
      if($review_id!=''){
       $sqldelete          = "DELETE FROM product_review WHERE id='$review_id'";
       $result             = mysqli_query($conn,$sqldelete);  
       if($result){
       $response['status'] ='Deleted Successfully';
       }else{
        throw new Exception("Error Processing Request Delete", '60');
       }
     }
    }catch(Exception $e){
        $response['status'] = 'failer';
        $response['status_code'] = $e->getCode();
        $response['message']     = $this->error_code[$e->getCode()];
    }
      print_r(json_encode($response));
  die();
  }
 public function loadRatings($conn, $product_id){     
    try
    {
      $rating = array();
   $reviewStore  ="SELECT count(*) as five,(select count(*) from product_review pr where product_id='4699382808621' and rating=4) as four,
                  (select count(*) from product_review pr where product_id='4699382808621' and rating=3) as three,
                  (select count(*) from product_review pr where product_id='4699382808621' and rating=2) as two,
                  (select count(*) from product_review pr where product_id='4699382808621' and rating=1) as one 
                  FROM product_review  where product_id='4699382808621' and rating=5";
        $res    =mysqli_query($conn,$reviewStore);
        if($res){
           $response['status']='success';
            $result=mysqli_fetch_array($res);
            $rating['five']=$result['five'];
            $rating['four']=$result['four'];
            $rating['three']=$result['three'];
            $rating['two']=$result['two'];
            $rating['one']=$result['one'];
           $response['response']= $rating;
        }else{
        throw new Exception("Error Processing Request Delete", '60');
        }
     
    }catch(Exception $e){
        $response['status'] = 'failer';
        $response['status_code'] = $e->getCode();
        $response['message']     = $this->error_code[$e->getCode()];
    }
      print_r(json_encode($response));
  die();
  }
  public function loadReviewsForUser($conn, $product_id){     
    try
    {
      $newArry = array();
      $storeReview  ="SELECT reviewer_name,title,subject_description,rating,created_at FROM product_review  where product_id='4699382808621' and status ='Published'";
      $res    =mysqli_query($conn,$storeReview);
      if($res){
        while($row = mysqli_fetch_array($res)){
        $temp['reviewer_name']        =$row['reviewer_name'];
        $temp['title']                =$row['title'];
        $temp['subject_description']  =$row['subject_description'];
        $temp['rating']               =$row['rating'];
        $temp['created_at']           =$row['created_at'];
        array_push($newArry, $temp);
        }
        $response['status']='success';
        $response['response']= $newArry;
      }else{
        throw new Exception("Error Processing Request Select Sql", '60');
      }
     
    }catch(Exception $e){
        $response['status'] = 'failer';
        $response['status_code'] = $e->getCode();
        $response['message']     = $this->error_code[$e->getCode()];
    }
    
     print_r(json_encode($response));
  die();
  }
}
$AddReviewObj= new ManageReviews($conn);
