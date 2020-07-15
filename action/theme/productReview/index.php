<?php include('layout/header.php');?>
<?php include('layout/sidebar.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
     <section class="content">
      <div class="row">
          <div class="col-md-12">
            <div class="row">

              <div class="col-md-3">
                <!-- USERS LIST -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Review Widget</h3>

                    <div class="card-tools">
                      <span class="badge badge-danger"> New </span>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
<<<<<<< HEAD
                    <a href="manageReview.php?shop=<?php echo $_SESSION["shop_encrypt"];?>">Customize-></a>
=======
                    <a href="javascript::">Customize-></a>
>>>>>>> d7022d1858dc10e35ea7c559c57146cadf527262
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!--/.card -->
              </div>
              <div class="col-md-3">
                <!-- USERS LIST -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Import Reviews</h3>

                    <div class="card-tools">
                      <span class="badge badge-danger">New</span>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
<<<<<<< HEAD
                    <a href="importReview.php?shop=<?php echo $_SESSION["shop_encrypt"];?>">Import Reviews-></a>
=======
                    <a href="javascript::">Import Reviews-></a>
>>>>>>> d7022d1858dc10e35ea7c559c57146cadf527262
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!--/.card -->
              </div>
              <div class="col-md-3">
                <!-- USERS LIST -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Export Reviews</h3>

                    <div class="card-tools">
                      <span class="badge badge-danger"> New</span>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
<<<<<<< HEAD
                    <a href="exportReview.php?shop=<?php echo $_SESSION["shop_encrypt"];?>">Export Reviews-></a>
=======
                    <a href="javascript::">Export Reviews-></a>
>>>>>>> d7022d1858dc10e35ea7c559c57146cadf527262
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!--/.card -->
              </div>
              <div class="col-md-3">
                <!-- USERS LIST -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Request Email</h3>

                    <div class="card-tools">
                      <span class="badge badge-danger"> New</span>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
<<<<<<< HEAD
                    <a href="reviewRequest.php?shop=<?php echo $_SESSION["shop_encrypt"];?>">Review Request Email-></a>
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!--/.card -->
              </div>
              <div class="col-md-3">
                <!-- USERS LIST -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">My Notification</h3>

                    <div class="card-tools">
                      <span class="badge badge-danger"> New</span>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="notification.php?shop=<?php echo $_SESSION["shop_encrypt"];?>">All Notification-></a>
=======
                    <a href="javascript::">Request Email-></a>
>>>>>>> d7022d1858dc10e35ea7c559c57146cadf527262
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!--/.card -->
              </div>
  <?php 

/*
 * Script upoad from here, and its and responsible for Product review flow
 */
   include('../../include/ShopifyFunction.php');
         $api_url   ="/admin/api/2020-07/script_tags.json";
         $token     ="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";
         $shop_name ="jayka-new";
<<<<<<< HEAD
         $checkScript['reviewJsUrl']= "https://codingkloud.com/shopify-app/action/include/assets/rev.js";
=======
         $checkScript['reviewJsUrl']= "https://codingkloud.com/shopify-app/action/include/assets/review.js";
>>>>>>> d7022d1858dc10e35ea7c559c57146cadf527262
         $checkScript['token']      =$token;
         $checkScript['shop_name']  =$shop_name;
         $checkScriptUpload =checkScriptUpload($shopifyObj,$checkScript);
         if($checkScriptUpload!='exists'){
              $scriptDetails = array('script_tag' => array(
                               'event' => "onload", 
                               'src' => $checkScript['reviewJsUrl']
                           )
               );
              $uploadScript = $shopifyObj->shopify_call($token,$shop_name ,"/admin/api/2020-07/script_tags.json", $scriptDetails, 'POST'); 
          }
          function checkScriptUpload($shopifyObj,$checkScript)
          {  
              $count = $shopifyObj->shopify_call($checkScript['token'],$checkScript['shop_name'],"/admin/api/2020-07/script_tags.json", $array, 'GET');  
              $response = json_decode($count['response'], JSON_PRETTY_PRINT); 
              if($response['script_tags']){
                for($i=0;$i<sizeof($response['script_tags']);$i++)
                 {
                   $script_url=(string)$response['script_tags'][$i]['src'];
                    if($script_url==$checkScript['reviewJsUrl']){
                    $script_id=(int)$response['script_tags'][$i]['id'];
                      $scriptDetails = array('script_tag' => array(
                                             'id' =>  $script_id, 
<<<<<<< HEAD
                                             'src' => 'https://codingkloud.com/shopify-app/action/include/assets/rev.js'
                                            )
                                        );
                      $ScriptUpdate = $shopifyObj->shopify_call($checkScript['token'],$checkScript['shop_name'],"/admin/api/2020-04/script_tags/".$script_id.".json", $scriptDetails, 'PUT');  
=======
                                             'src' => 'https://codingkloud.com/shopify-app/action/include/assets/review.js'
                                            )
                                        );
                      $ScriptUpdate = $shopifyObj->shopify_call($checkScript['token'],$checkScript['shop_name'],"/admin/api/2020-04/script_tags/".$script_id.".json", $scriptDetails, 'PUT');  
                      echo"already";
>>>>>>> d7022d1858dc10e35ea7c559c57146cadf527262
                     return 'exists';
                    }
                 }
               }
          }
  ?>
              <!-- /.col -->
            </div> 
            <!-- /.card -->
          </div>
          <!-- /.col -->
     </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php 
require('layout/footer.php');
?>
<<<<<<< HEAD
=======
<?php 
 
  
    ?>
>>>>>>> d7022d1858dc10e35ea7c559c57146cadf527262
