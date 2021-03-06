<?php include('layout/header.php');?>
<?php include('layout/sidebar.php');?>
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
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Review Manage</h3>
        </div>
        <div class="card-body">
          <table id="reviewTable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>CustomerEmail</th>
              <th>Product Name</th>
              <th>Rating</th>
              <th>Description</th>
              <th>Date & Time</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="reviewDetails">
          </tbody>
        </table>
        </div>
        <div class="bs-example">    
        <div id="responceModal" class="modal fade">
         <div class="modal-dialog">
            <div class="modal-content" id="dynamiccontent"></div>
         </div>
        </div>
      </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php 
require('layout/footer.php');
?>

<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>

<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- page script -->

<script>
$(document).ready(function() {
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
        thtml+='<h4 class="modal-title float-left">Reviewer '+revname+'</h4>';
        thtml+='<button type="button" class="close" data-dismiss="modal" id="modalclose" aria-hidden="true">&times;</button>';
        thtml+='</div>';
        thtml+='<div class="modal-body">';
        thtml+='<p>Title: <b>'+revtitle+'</b> </p><hr>';
        thtml+='<p>Email: <b>'+revemail+'</b> </p><hr>';
        thtml+='<p>Product Name: <b>'+proname+'</b> </p><hr>';
        thtml+='<p>Rating: <b>'+revrating+'</b> </p><hr>';
        thtml+='<p>Discription / Subject: <b>'+revsub+'</b> </p><hr>';
        thtml+='<p>Status: <b>'+revstatus+'</b> </p><hr>';
        thtml+='<p>Product Image: <br><b>Note:</b> please drag image into Url if you want to show in full size.  <b>'+revImg+'</b> </p><hr>';
      $('#dynamiccontent').append(thtml);
        $('#responceModal').modal({
        backdrop: 'static'
        }); 
     }); 

});

$(document).ready(function() {
  var shop = '<?php echo $_SESSION["shop_encrypt"];?>';
jQuery(document).on('click','#sent_email',function(e){
       e.preventDefault();
      var adminRevReply        = $( '#adminRevReply' ).val();
      if(adminRevReply!==""){
      var customer_email = jQuery(this).attr('customer_email');
       loadReviews = [ { "action": "sendEmail", "adminRevReply": adminRevReply, "replyTo": customer_email,'shop_encrypt':shop}];
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
          type : "POST",
          // dataType: "json",
          url  : "../../productReview/ManageReviews.php",
          data : { data: JSON.stringify(updateReviewStatus) },
          success : function( response ) {
           var result=jQuery.parseJSON(response);
            $(".status-"+review_id).append(result['status']);
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
    }
  });
}); 

</script>