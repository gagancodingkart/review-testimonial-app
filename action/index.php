<?php 
$requests                 = $_GET;
session_start();
$shop_encrypt_address     =md5("https://".$requests['shop']);
$_SESSION["shop_encrypt"] =$shop_encrypt_address;
?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<style>
body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">

<!-- w3-content defines a container for fixed size centered content, 
and is wrapped around the whole page content, except for the footer in this example -->
<div class="w3-content" style="max-width:1400px">

<!-- Header -->
<header class="w3-container w3-center w3-padding-32"> 
  <h1><b>Product Reviews and Testimonials</b></h1>
  <p><span class="w3-tag">Welcome to Our Application</span></p>
</header>

<!-- Grid -->
<div class="w3-row">
<!-- Introduction menu -->
<div class="w3-col m6 ">
  <!-- About Card -->
  <div class="w3-card w3-white w3-margin w3-margin-top">
  <img src="./theme/productReview/layout/images/review.jpg" height="300px" style="width:100%">
    <div class="w3-container w3-white">
      <h4><b>Product Reviews</b></h4>
      <p>By this app, you can show a reviews widget on your Shopify store and allow customers to submit reviews on store as well as in emails too.</p>
    </div>
    
      <p><span onclick="appTransition('review');" class="w3-button w3-padding-large w3-white w3-border">Configure »</span></p>
      	
  </div><hr>
   
<!-- END Introduction Menu -->
</div>
<!-- Introduction menu -->
<div class="w3-col m6 ">
  <!-- About Card -->
  <div class="w3-card w3-white w3-margin w3-margin-top">
  <img src="./theme/testimonial/layout/images/testi.png" height="300px" style="width:100%">
    <div class="w3-container w3-white">
      <h4><b>Testimonials</b></h4>
      <p>Collect & show customer testimonials easily. Use premade testimonial widget templates to display social proof on your store.</p>
    </div>
   <p><span onclick="appTransition('testimonial');" class="w3-button w3-padding-large w3-white w3-border">Configure »</span></p> 
  </div><hr>
   
<!-- END Introduction Menu -->
</div>

<!-- END GRID -->
</div><br>

<!-- END w3-content -->
</div>

<!-- Footer -->
<footer class="w3-container w3-dark-grey w3-padding-32 w3-margin-top">
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">Codingkart IT solution</a></p>
</footer>

</body>
</html>
<script> 
        function appTransition(choice){ 
          var shop = '<?php echo $requests['shop']?>';
          var shopaddress = '<?php echo $_SESSION["shop_encrypt"];?>';
          if(choice=='review'){
            window.open("http://codingkloud.com/shopify-app/action/theme/productReview/index.php?shop="+shop+"&shopaddress="+shopaddress, "_blank"); 
          }else if(choice=='testimonial'){
            window.open("http://codingkloud.com/shopify-app/action/theme/testimonial/index.php?shop="+shop+"&shopaddress="+shopaddress, "_blank"); 
          }else{
            alert("Not Configure Yet!");
            return false;
          }
// console.log($shop+$choice);return false;
        } 
</script> 

