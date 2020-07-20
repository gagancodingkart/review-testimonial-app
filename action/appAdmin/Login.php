<?php

require_once('../include/Config.php');//exception handling error handling file
require_once('../include/ErrorCode.php');//exception handling error handling file
require_once('../include/ShopifyFunction.php');//Shopify function Api handle file
class Login{
  public function __construct($conn){  
    $error                   = new ErrorCode();
    $this->error_code        = $error->getCodes();  
    if(isset($_POST)){
        $reviewData = json_decode($_POST['data']);
          foreach($reviewData as $i => $item){
              $action = $item->action;
              if($action == 'loginCheck'){
               $this->loginCheck($conn,$item->username,$item->password);
              }
          }
    }
  }


  public function loginCheck($conn,$username,$password){     
     try
     { 
       $password         =md5($password);
       $query            ="SELECT count(*) as count, id from user where user_name='$username' and password='$password'";
       $queryRes         = mysqli_query($conn,$query);  
      if($queryRes){
      $row=mysqli_fetch_array($queryRes);
        $count = $row['count'];
        $id = $row['id'];
        if($count==1){
          $user_id=md5($id);
          $response['status']     = 'success';
          $response['user_id']    = $user_id;
        }else{
          $response['status']      = 'failer';
          $response['message']      = 'Invalid Login';
        }
      }
     }catch(Exception $e){
        $response['status']      = 'failer';
        $response['status_code'] = $e->getCode();
        $response['message']     = $this->error_code[$e->getCode()];
     }
       print_r(json_encode($response));
    die();
  }



 }
$reviewObj= new Login($conn);
