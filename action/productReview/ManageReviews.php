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
<<<<<<< HEAD
               $this->loadReviews($conn,$item->shop_encrypt);
              }else if($action == 'reviewStatusToggle'){
               $this->reviewStatusToggle($conn,$item->review_id,$item->status);
=======
               $this->loadReviews($conn);
              }else if($action == 'reviewStatusToggle'){
               $this->reviewStatusToggle($conn, $item->review_id,$item->status);
>>>>>>> d7022d1858dc10e35ea7c559c57146cadf527262
              }else if($action == 'reviewDelete'){
               $this->reviewDelete($conn, $item->review_id);
              }else if($action == 'loadRatings'){
               $this->loadRatings($conn, $item->product_id);
              }else if($action == 'loadReviewsForUser'){
               $this->loadReviewsForUser($conn, $item->product_id);
<<<<<<< HEAD
              }else if($action == 'sendEmail'){
               $this->sendEmail($conn, $item->replyTo,$item->adminRevReply);
              }else if($action == 'loadNotification'){
               $this->loadNotificationCount($conn,$item->shop_encrypt);
              }else if($action == 'loadNotificationDetails'){
               $this->loadNotificationDetails($conn,$item->shop_encrypt);
              }else if($action == 'loadNotificationList'){
               $this->loadNotificationList($conn,$item->shop_encrypt);
              }else if($action == 'seenNotification'){
               $this->seenNotification($conn,$item->shop_encrypt);
=======
>>>>>>> d7022d1858dc10e35ea7c559c57146cadf527262
              }
          }
    }
  }
<<<<<<< HEAD
  public function loadNotificationCount($conn,$shop_encrypt){     
  	try
  	{
     $reviewNotification   ="SELECT count(*) as count from notification where is_seen=0 and shop_address='$shop_encrypt'";
     $res                  =mysqli_query($conn,$reviewNotification);
     if($res){
           $response['status']='success';
           $result=mysqli_fetch_array($res);
           $notification['count']=$result['count'];
           $response['response']= $notification;
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
  public function seenNotification($conn,$shop_encrypt){     
    try
    {
     $updNotificationstatus   ="UPDATE notification SET is_seen=1 where shop_address='$shop_encrypt' and is_seen=0";
     $res                  =mysqli_query($conn,$updNotificationstatus);
     if($res){
           $response['status']='success';
           $response['response']= 'Seen';
        }else{
        throw new Exception("Error Processing Request Update", '60');
        }
    }catch(Exception $e){
        $response['status'] = 'failer';
        $response['status_code'] = $e->getCode();
        $response['message']     = $this->error_code[$e->getCode()];
    
    }
    print_r(json_encode($response));
  die();
  }    
  public function loadNotificationDetails($conn,$shop_encrypt){     
    try
    { 
     $newArry = array();
     $reviewNotification   ="SELECT * from notification where is_seen=0 and shop_address='$shop_encrypt' LIMIT 10";
     $res                  =mysqli_query($conn,$reviewNotification);
     if($res){
        while($row = mysqli_fetch_array($res)){
        $temp['name']                 =$row['name'];
        $temp['created_at']           =$row['created_at'];
        $temp['description']           =$row['description'];
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
   public function loadNotificationList($conn,$shop_encrypt){     
    try
    { 
     $newArry = array();
     $reviewNotification   ="SELECT * from notification where shop_address='$shop_encrypt' ORDER BY id DESC";
     $res                  =mysqli_query($conn,$reviewNotification);
     if($res){
        while($row = mysqli_fetch_array($res)){
        $temp['name']                 =$row['name'];
        $temp['created_at']           =$row['created_at'];
        $temp['is_seen']              =$row['is_seen'];
        $temp['description']         =$row['description'];
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
  public function loadReviews($conn,$shop_encrypt){     
    try
    {
     $reviewStore          ="SELECT * FROM product_review where shop_encrypt_address='$shop_encrypt'";
=======
  public function loadReviews($conn){     
  	try
  	{
     $reviewStore          ="SELECT * FROM product_review";
>>>>>>> d7022d1858dc10e35ea7c559c57146cadf527262
     $res                  =mysqli_query($conn,$reviewStore);
     $collection = array();
      while($row = mysqli_fetch_array($res))
      {
        echo "<tr>";
<<<<<<< HEAD
        if($row['review_image']!==''){

          // $ab=$_SERVER['HTTP_REFERER'].$row['review_image'];
          // print_r($_SERVER['HTTP_REFERER']);exit;
         $image='<img src="http://codingkloud.com/shopify-app/action/include/assets/images/'.$row['review_image'].'" class="brand-image img-circle elevation-3" style="height:100px;width:100px;">';
        }else{
          $image="";
        }

        $starthtml='';
        $rating  =$row['rating'];
        $ramaing = 5-(int)$rating;
         for($i=0; $i< $rating; $i++){
            $starthtml=$starthtml.'<span style="color: orange" class="fa fa-star checked"></span>';
         }
         for($i=0; $i<(int)$ramaing; $i++){
            $starthtml=$starthtml.'<span class="fa fa-star "></span>';
         }
         $thtml = $starthtml;

        echo "<td>" .$row['product_name']."</td>";
        echo "<td>" .$thtml."</td>";
        echo "<td>" .$row['reviewer_name']." post review ".$row['subject_description']. "</td>";
        echo "<td>" .$image."</td>";
        echo "<td>" .$row['created_at']."</td>";
        echo "<td class='status-".$row['id']."'style='color:red'>" .$row['status']."</td>"; 
        echo "<td><i class='fa fa-envelope send_email' review_id='".$row['id']."' customer_email='".$row['customer_email']."' reviewer_name='".$row['reviewer_name']."'style='font-size:24px;'></i>&nbsp;<i class='fa fa-lock status_toggle' review_id='".$row['id']."' style='font-size:24px;color:black'></i>  &nbsp;<i class='fa fa-trash del-review' review_id='".$row['id']."' style='font-size:24px;color:red'></i> &nbsp;<i class='fa fa-eye view-review' rev-img='".$image."' rev-name='".$row['reviewer_name']."' rev-title='".$row['title']."'  rev-rating='".$thtml."' rev-sub='".$row['subject_description']."' rev-status='".$row['status']."' pro-name='".$row['product_name']."'review_id='".$row['id']."' rev-email='".$row['customer_email']."' style='font-size:24px;color:blue'></i>" ."</td>";
        echo "</tr>";
      }
      exit;
    }catch(Exception $e){
=======
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
>>>>>>> d7022d1858dc10e35ea7c559c57146cadf527262
        $response['status'] = 'failer';
        $response['status_code'] = $e->getCode();
        $response['message']     = $this->error_code[$e->getCode()];
        print_r($response);
    }
<<<<<<< HEAD
  die();
=======
	die();
>>>>>>> d7022d1858dc10e35ea7c559c57146cadf527262
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
<<<<<<< HEAD
  }  
  public function sendEmail($conn, $replyTo,$adminRevReply){     
    try
    {
      if($replyTo!==''){
        ini_set( 'display_errors', 1 );
        error_reporting( E_ALL );
        $from    = "gagan.codingkart@gmail.com";
        $to      = (string)$replyTo;
        // $replyTo;
        $subject = "Store Admin Responds on your Review";
        $message = $adminRevReply;
        $headers = "From:" . $from;
        $resp= mail($to,$subject,$message, $headers);
        $response['status'] ='Success';
       }else{
        $response['status'] ='Invalid Reciever';
      }
      print_r(json_encode($response));
    }catch(Exception $e){
        $response['status'] = 'failer';
        $response['status_code'] = $e->getCode();
        $response['message']     = $this->error_code[$e->getCode()];
        print_r($response);
    }
  die();
=======
>>>>>>> d7022d1858dc10e35ea7c559c57146cadf527262
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
