<?php 
  session_start();
    $requests   = $_GET;

    if($requests['shopaddress']!="" && $requests['shop']!=""){
      $_SESSION["shop_encrypt"] =$requests['shopaddress'];  
      $_SESSION["shop"] =$requests['shop']; 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Reviews</title>
  
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
       <a href="index.php?shop=<?php echo $_SESSION["shop_encrypt"];?>" class="btn btn-sm btn-info float-left">Home</a>
      </li> &nbsp; &nbsp;
      
       <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="btn btn-sm btn-info float-left">Go To Site</a>
      </li> 
    </ul>

    <!-- SEARCH FORM -->
<!--     <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
       <a class="nav-link" class="btn btn-sm" data-toggle="tooltip" title="Active Plan/offer" href="myPlan.php?shop=<?php echo $_SESSION["shop_encrypt"];?>" role="button"><i
            class="fa fa-tasks" style="font-size:24px;color:red"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tooltip" title="Guid Video" class="btn btn-sm" href="#" role="button"><i
            class="fa fa-play" style="font-size:24px;color:red"></i></a>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown" data-toggle="tooltip" title="Notification" >
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge" id="notify_me"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header" id="notify_me"></span>
          <div id="notify_message"></div>
          
          <!-- <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a> -->
          <div class="dropdown-divider"></div>
          <a href="notification.php?shop=<?php echo $_SESSION["shop_encrypt"];?>" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>

       <li class="nav-item">
        <a class="nav-link" class="btn btn-sm" data-toggle="tooltip" title="Help" href="help.php?shop=<?php echo $_SESSION["shop_encrypt"];?>" role="button"><i
            class="fa fa-question-circle" style="font-size:24px;color:red"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
<script type="text/javascript">
  $(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();   
       var shop = '<?php echo $_SESSION["shop"];?>';
       var shop_encrypt = '<?php echo $_SESSION["shop_encrypt"];?>';
         $( "#switch_mode" ).change(function() {
           var switch_mode=$( "#switch_mode" ).val();
         if(switch_mode=='on'){
           window.location.href="http://codingkloud.com/shopify-app/action/theme/testimonial/index.php?shop="+shop+"&shopaddress="+shop_encrypt; 
         }
       });
   loadReviews = [ { "action": "loadNotification",'shop_encrypt':shop_encrypt}];
      $.ajax({
       type: "POST",
       url: "../../productReview/ManageReviews.php",
       data: { data: JSON.stringify(loadReviews) },
       // dataType: 'JSON',
        success: function (response) { 
        var result=jQuery.parseJSON(response);
        if(result.status=='success'){
         var notify_count =result.response.count;
          $('#notify_me').html(notify_count);
          } 
        }
      }); //end ajax  

      var loadReviews = [ { "action": "loadNotificationDetails",'shop_encrypt':shop_encrypt}];
      var thtml="";
      $.ajax({
       type: "POST",
       url: "../../productReview/ManageReviews.php",
       data: { data: JSON.stringify(loadReviews) },
       // dataType: 'JSON',
        success: function (response) { 
        var result=jQuery.parseJSON(response);
            if(result.status=='success'){
              $.each(result.response, function (i, item) {
                    var name          =item['name'];
                    var created_at    =item['created_at'];
                    var description    =item['description'];
                    var str = description;
                    var subDes = str.substr(0,20);
                    thtml+='<div class="dropdown-divider"></div>';
                    thtml+='<a href="notification.php?shop=<?php echo $_SESSION["shop_encrypt"];?>" class="dropdown-item">';
                    thtml+='<i class="fas fa-envelope mr-2"> &nbsp;'+subDes+'... </i>';
                    thtml+=' <span class="float-right text-muted text-sm">'+created_at+'</span>';
                    thtml+='</a>';
              });
         // var notify_message= name+" "+'New Message';
          $('#notify_message').html(thtml);
          } 
        }
      }); //end ajax  
});

</script>