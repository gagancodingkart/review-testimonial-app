<?php
require('layout/header.php');
?> 

<?php require('layout/sidebar.php');?>
 <!-- echo "http://" . $_SERVER['SERVER_NAME']; -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Review Manage</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Review Manage</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
      <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Review List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="reviewTable" class="table table-bordered table-striped">
                  <thead>
                  <tr>
<<<<<<< HEAD
                    <th>Product Name</th>
                    <th>Rating</th>
                    <th>Description</th>
                    <th>Product Photo</th>
                    <th>Time</th>
=======
                    <th>Product Photo</th>
                    <th>Rating</th>
                    <th>Time</th>
                    <th>Review</th>
>>>>>>> d7022d1858dc10e35ea7c559c57146cadf527262
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody id="reviewDetails">
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
<<<<<<< HEAD

    <div class="bs-example">    
    <!-- Modal HTML -->
    <div id="responceModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content" id="dynamiccontent"></div>
        </div>
    </div>
    </div>

    </section>
    <style>
    .bs-example{
      margin: 20px;
    }
</style>
=======
    </section>
>>>>>>> d7022d1858dc10e35ea7c559c57146cadf527262
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
// $contactName='Dharmendra';
//  $subject = $contactName.' sent';
//  $shop="https://jayka-new.myshopify.com";
//  $message='first App email';
//  $from="gagan.codingkart1@gmail.com";
//  $to="gagan.codingkart@gmail.com";
//  $phone=9074490746;
//     $htmlContent = ' 
//             <html> 
//             <head> 
//                 <title> '.$subject.' </title> 
//             </head> 
//             <body> 
//                 <h1>Thanks you for purchase!</h1> 
//                 <table cellspacing="0" style="border:  width: 100%;"> 
//                     <tr> 
//                         <th>Welcome to '.$shop.' !</th> 
//                     </tr> 
//                     <tr style="background-color: #e0e0e0;"> 
//                         <th>'.$message.' ( '.$phone.' )</th> 
//                     </tr> 
//                     <tr> 
//                         <th><a href="'.$shop.'" class="btn btn-primary">Go to shop</a></th> 
//                     </tr> 
//                 </table> 
//             </body> 
//             </html>'; 
//             $headers = "Content-type:text/html;" . "<br>"; 

//             // Additional headers 
//             $headers .= 'From: Gagan <'.$from.'>' ."<br>"; 
//             $headers .= 'Cc: '.$from."<br>"; 
//             $headers .= 'Bcc: '.$from ."<br>"; 
           
//              if(!mail($to, $subject, $htmlContent, $headers)){ 
//               echo 'Sending failed.'; 
//                }
//              else{
//               echo 'Sending success.'; 
//               }

?>
<?php 
require('layout/footer.php');
?>
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- page script -->
<script>
$(document).ready(function() {
<<<<<<< HEAD
  // modal email load
jQuery(document).on('click','.send_email',function(e){
   e.preventDefault();
    var review_id = jQuery(this).attr('review_id');
    var customer_email = jQuery(this).attr('customer_email');
    var reviewer_name = jQuery(this).attr('reviewer_name');
    var thtml=''; 
   $('#dynamiccontent').empty();
    var thtml='<div class="modal-header" >';
        thtml+='<h4 class="modal-title float-left">Your Reply to '+reviewer_name+'</h4>';
        thtml+='<button type="button" class="close" data-dismiss="modal" id="modalclose" aria-hidden="true">&times;</button>';
        thtml+='</div>';
        thtml+='<div class="modal-body">';
        thtml+='<p>Customer Email: <b>'+customer_email+'</b> </p><hr>';
        thtml+='<textarea style="width: 100%; font-weight: 400" rows="5" id="adminRevReply" class="m-t-15 p-10" placeholder="Please Enter Email Discription"></textarea></div>';
        thtml+=' <div class="modal-footer">';
        thtml+=' <span id="sent_email" customer_email='+customer_email+' class="btn btn-primary">Submit</span>';
        thtml+=' </div>';

    $('#dynamiccontent').append(thtml);
        $('#responceModal').modal({
        backdrop: 'static'
        }); 
     }); 


// modal email load
jQuery(document).on('click','.view-review',function(e){
   e.preventDefault();
    var review_id     = jQuery(this).attr('review_id');
    var revImg        = jQuery(this).attr('rev-img');
    var revname       = jQuery(this).attr('rev-name');
    var revtitle      = jQuery(this).attr('rev-title');
    var revrating     = jQuery(this).attr('rev-rating');
    var revsub        = jQuery(this).attr('rev-sub');
    var revstatus     = jQuery(this).attr('rev-status');
    var proname       = jQuery(this).attr('pro-name');
    var revemail      = jQuery(this).attr('rev-email');
    var thtml=''; 
   $('#dynamiccontent').empty();
    var thtml='<div class="modal-header" >';
        thtml+='<h4 class="modal-title float-left">Review Details of '+revname+'</h4>';
        thtml+='<button type="button" class="close" data-dismiss="modal" id="modalclose" aria-hidden="true">&times;</button>';
        thtml+='</div>';
        thtml+='<div class="modal-body">';
        thtml+='<p>Title: <b>'+revtitle+'</b> </p><hr>';
        thtml+='<p>Email: <b>'+revemail+'</b> </p><hr>';
        thtml+='<p>Product Name: <b>'+proname+'</b> </p><hr>';
        thtml+='<p>Rating: <b>'+revrating+'</b> </p><hr>';
        thtml+='<p>Discription / Subject: <b>'+revsub+'</b> </p><hr>';
        thtml+='<p>Product Image: <b>'+revImg+'</b> </p><hr>';
        thtml+='<p>Status: <b>'+revstatus+'</b> </p><hr>';
      $('#dynamiccontent').append(thtml);
        $('#responceModal').modal({
        backdrop: 'static'
        }); 
     }); 

});

$(document).ready(function() {
jQuery(document).on('click','#sent_email',function(e){
       e.preventDefault();
      var adminRevReply        = $( '#adminRevReply' ).val();
      if(adminRevReply!==""){
      var customer_email = jQuery(this).attr('customer_email');
       loadReviews = [ { "action": "sendEmail", "adminRevReply": adminRevReply, "replyTo": customer_email}];
      $.ajax({
       type: "POST",
       url: "../../productReview/ManageReviews.php",
       data: { data: JSON.stringify(loadReviews) },
       // dataType: 'JSON',
        success: function (response) { 
          var result=jQuery.parseJSON(response);
          alert(result.status);
          $('#modalclose').trigger('click');
        }
      }); //end ajax  
    }else{
      alert("Email Discription Field Cannot be Empty!");
      return false;
    }
    });

});
$(document).ready(function() {
   var shop = '<?php echo $_SESSION["shop_encrypt"];?>';
  loadReviews = [ { "action": "loadReviews",'shop_encrypt':shop}];
=======
  loadReviews = [ { "action": "loadReviews"}];
>>>>>>> d7022d1858dc10e35ea7c559c57146cadf527262
      $.ajax({
       type: "POST",
       url: "../../productReview/ManageReviews.php",
       data: { data: JSON.stringify(loadReviews) },
       // dataType: 'JSON',
        success: function (result) { 
          $('#reviewDetails').append(result);   
           $("#reviewTable").DataTable({
           "responsive": true,
           "autoWidth": false,
          }); 
        }
      }); //end ajax  
});

</script>
<script>
jQuery(document).ready(function(){
<<<<<<< HEAD
  // Toggle Review Status
  jQuery(document).on('click','.status_toggle',function(e){
   e.preventDefault();
    var r = confirm("Do you realy want to change status!");
    if (r == true) {
      var review_id = jQuery(this).attr('review_id');
      var status    = jQuery(".status-"+review_id).text();
      var shop = '<?php echo $_SESSION["shop_encrypt"];?>';
      updateReviewStatus = [ { "action": "reviewStatusToggle", "review_id": review_id ,"status":status,'shop_encrypt':shop}];
      $(".status-"+review_id).empty();
      $.ajax({
=======
  jQuery(document).on('click','.status_toggle',function(e){
   e.preventDefault();
     var review_id = jQuery(this).attr('review_id');
     var status    = jQuery(".status-"+review_id).text();
     updateReviewStatus = [ { "action": "reviewStatusToggle", "review_id": review_id ,"status":status}];
  $(".status-"+review_id).empty();
       $.ajax({
>>>>>>> d7022d1858dc10e35ea7c559c57146cadf527262
          type : "POST",
          // dataType: "json",
          url  : "../../productReview/ManageReviews.php",
          data : { data: JSON.stringify(updateReviewStatus) },
          success : function( response ) {
           var result=jQuery.parseJSON(response);
            $(".status-"+review_id).append(result['status']);
<<<<<<< HEAD
            location.reload();
            }
      });
    }
  });
  // Delete the Review
  jQuery(document).on('click','.del-review',function(e){
   e.preventDefault();
    var r = confirm("Do you realy want to delete!");
    if (r == true) {
      var review_id = jQuery(this).attr('review_id');
      deleteReview = [ { "action": "reviewDelete", "review_id": review_id}];
      $.ajax({
=======
            }
        });
  });
  jQuery(document).on('click','.del-review',function(e){
   e.preventDefault();
     var review_id = jQuery(this).attr('review_id');
     deleteReview = [ { "action": "reviewDelete", "review_id": review_id}];
       $.ajax({
>>>>>>> d7022d1858dc10e35ea7c559c57146cadf527262
          type : "POST",
          // dataType: "json",
          url  : "../../productReview/ManageReviews.php",
          data : { data: JSON.stringify(deleteReview) },
          success : function( response ) {
           var result=jQuery.parseJSON(response);
            // console.log(result);
           location.reload();
            }
        });
<<<<<<< HEAD
    }
  });
}); 
=======
  });

 }); 
>>>>>>> d7022d1858dc10e35ea7c559c57146cadf527262

</script>