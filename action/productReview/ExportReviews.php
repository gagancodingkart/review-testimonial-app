<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');

require_once('../include/Config.php');//exception handling error handling file
require_once('../include/ErrorCode.php');//exception handling error handling file
class ExportReviews{
  public function __construct($conn){  
    $error                   = new ErrorCode();
    $this->error_code        = $error->getCodes();  
    // basic credentials definition
    if(isset($_POST)){
        $reviewData = json_decode($_POST['data']);
          foreach($reviewData as $i => $item){
              $action = $item->action;
              if($action == 'loadReviews'){
               $this->loadReviews($conn,$item->shop_encrypt);
              }
          }
    }
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
   
        echo "<tr><td>" .$row['customer_email']."</td>";
        echo "<td>" .$row['product_name']."</td>";
        echo "<td>" .$row['rating']."</td>";
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
$ReviewObj= new ExportReviews($conn);
