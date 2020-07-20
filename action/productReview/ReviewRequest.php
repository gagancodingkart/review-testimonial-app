<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
require_once('../include/Config.php');//exception handling error handling file
require_once('../include/ErrorCode.php');//exception handling error handling file
require_once('../include/ShopifyFunction.php');//Shopify function Api handle file
class ReviewRequest{
  public function __construct($conn){  
    $error                   = new ErrorCode();
    $this->error_code        = $error->getCodes();  
    $this->$shopifyObj       = new ShopifyFunction();
    // basic credentials definition
    if(isset($_POST)){
        $reviewData = json_decode($_POST['data']);
          foreach($reviewData as $i => $item){
              $action = $item->action;
              if($action == 'loadShopDetails'){
               $this->loadShopDetails($conn,$item->shop_encrypt);
              }else if($action == 'updateReviewRequest'){
               $this->updateReviewRequest($conn,$item->shop_encrypt,$item->from_email,$item->email_subject,$item->email_message,$item->rev_request_mode);
              }else if($action == 'thankYouScriptUpdate'){
               $this->thankYouScriptUpdate($conn,$item->shop_encrypt,$item->rev_request_mode);
              }else if($action == 'triggerThankyouPage'){
               $this->triggerThankyouPage($conn);
              }
          }
    }
  }

  public function loadShopDetails($conn, $shop_encrypt){     
    try
    {
      $getshop   ="SELECT shop_json from shop_details where shop_status=1 and shop_encrypt_address='$shop_encrypt' LIMIT 1";
      $getshopres                  =mysqli_query($conn,$getshop);

      if($getshopres){
        $getShopresRow = mysqli_fetch_array($getshopres);
        $jsonTemp                = $getShopresRow['shop_json'];
        $response['status']  = 'success';
        $getSettingCount     = "SELECT count(*) as count from request_review_setting where shop_encrypt_address='$shop_encrypt'";
        $res                 = mysqli_query($conn,$getSettingCount);
        $settingRowCount                 = mysqli_fetch_array($res); 
        if($settingRowCount['count']==0){
          $response['response_in']=0;
        }else{
          $getSettings     ="SELECT * from request_review_setting where status=1 and shop_encrypt_address='$shop_encrypt' LIMIT 1";
          $getSettingsres   =mysqli_query($conn,$getSettings);
             $getSettingsData = mysqli_fetch_array($getSettingsres);
             $data['email_message']=$getSettingsData['email_message'];
             $data['email_subject']=$getSettingsData['email_subject'];
             $data['is_auto_send']=$getSettingsData['is_auto_send'];
             $response['response_in']=$data;
        }
        $response['response']= $jsonTemp;
      }  
    }catch(Exception $e){
        $response['status'] = 'failer';
        $response['status_code'] = $e->getCode();
        $response['message']     = $this->error_code[$e->getCode()];
    }
     print_r(json_encode($response));
   die();
  }

  public function updateReviewRequest($conn,$shop_encrypt,$from_email,$email_subject,$email_message,$rev_request_mode){     
    try
    {    
      $getSettingCount  = "SELECT count(*) as count from request_review_setting where shop_encrypt_address='$shop_encrypt'";
      $res              = mysqli_query($conn,$getSettingCount);
      $row              = mysqli_fetch_array($res); 
      if($row['count']==0){
      $settingStore ="INSERT INTO request_review_setting(is_auto_send,from_email,shop_encrypt_address,status,email_subject,email_message) VALUES ('$rev_request_mode','$from_email','$shop_encrypt',1,'$email_subject','$email_message')";
       $res=mysqli_query($conn,$settingStore);
      }else if($row['count']==1){
        $settingUpdate  ="UPDATE request_review_setting SET is_auto_send='$rev_request_mode',email_subject='$email_subject',email_message='$email_message' where shop_encrypt_address='$shop_encrypt'";
        $result         = mysqli_query($conn,$settingUpdate);  
      }else{
        $settingDelete  ="DELETE FROM request_review_setting WHERE shop_encrypt_address='$shop_encrypt'";
        $result         = mysqli_query($conn,$settingDelete);  
        $settingStore ="INSERT INTO request_review_setting(is_auto_send,from_email,shop_encrypt_address,status,email_subject,email_message) VALUES ('$rev_request_mode','$from_email','$shop_encrypt',1,'$email_subject','$email_message')";
        $res=mysqli_query($conn,$settingStore);
      }
        $response['status'] = 'success';
        $response['message'] = 'Setting Updated!';
    }catch(Exception $e){
        $response['status'] = 'failer';
        $response['status_code'] = $e->getCode();
        $response['message']     = $this->error_code[$e->getCode()];
    }
      print_r(json_encode($response));
   die();
  }

  public function triggerThankyouPage($conn){     
    try
    { 
    $shopifyObj       = new ShopifyFunction();
    $shop_encrypt        = md5($_SERVER['HTTP_ORIGIN']);
    $getStoreAccess      = "SELECT access_token, name from shop_details where shop_encrypt_address='$shop_encrypt' ORDER BY id DESC LIMIT 1"; 
       $accessProcess     = mysqli_query($conn,$getStoreAccess);
       $getAccess         = mysqli_fetch_array($accessProcess); 
       $shop_access_token = $getAccess['access_token'];
       $shop_name         = $_SERVER['HTTP_ORIGIN'];
 
       $getSettings       = "SELECT * from request_review_setting where status=1 and shop_encrypt_address='$shop_encrypt' ORDER BY id DESC LIMIT 1";
        $getSettingsres    = mysqli_query($conn,$getSettings);
        $getSettingsData   = mysqli_fetch_array($getSettingsres);
        $email_message     = $getSettingsData['email_message'];
        $email_subject     = $getSettingsData['email_subject'];
        $from_email        = $getSettingsData['from_email'];
        $is_auto_send      = $getSettingsData['is_auto_send'];
        if($is_auto_send==1){
          $todayDay          = date("Y-m-d", strtotime("now"));
          $order_url         ="/admin/api/2020-07/orders.json?fields=customer&status=any&updated_at_min=".$todayDay;
          $count             = $shopifyObj->shopify_call($shop_access_token,$shop_name,$order_url, $array, 'GET');  
          $orderResp         = json_decode($count['response'], JSON_PRETTY_PRINT); 
          if($orderResp['orders'][0]){
             $reciever=$orderResp['orders'][0]['customer']['email'];
              if($reciever!==''){
                ini_set( 'display_errors', 1 );
                error_reporting( E_ALL );
                $from    = $from_email;
                $to      = (string)$reciever;
                $subject = (string)$email_subject;
                $message = $email_message;
                $headers = "From:" . $from;
                $resp= mail($to,$subject,$message, $headers);
                print_r($resp);
                if($resp==1){
                  $response['status']  = 'success';
                  $response['message'] = 'success';
                }
              }
          }
        }
 // header("Location:".$_SERVER['HTTP_REFERER'] );
    }catch(Exception $e){
        $response['status'] = 'failer';
        $response['status_code'] = $e->getCode();
        $response['message']     = $this->error_code[$e->getCode()];
    }
     
   die();
  }
  public function thankYouScriptUpdate($conn,$shop_encrypt,$rev_request_mode){     
    try
    {    
       $settingUpdate  ="UPDATE request_review_setting SET is_auto_send='$rev_request_mode'where shop_encrypt_address='$shop_encrypt'";
        $result         = mysqli_query($conn,$settingUpdate);  
      if($result){
        $response['status'] = 'success';
        $response['message'] = 'Setting Updated!';
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
$reviewObj= new ReviewRequest($conn);
