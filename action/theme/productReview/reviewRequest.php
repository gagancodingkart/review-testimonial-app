<?php include('layout/header.php');?>
<?php include('layout/sidebar.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Review Request</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Review Request</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Automated Review Request Email</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Automatic Review Request Email</label>
                  </div>
                  <div class="form-group">
                    <label class="switch">
                      <input type="checkbox" id='rev_request_mode'>
                      <span class="slider btn-danger round"></span>
                     </label>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">From</label>
                    <input type="text" class="form-control" id="from_email" name="from_email" readonly/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email Subject</label>
                    <input type="text" class="form-control" id="email_subject" name="email_subject" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Message</label>
                    <textarea type="text" class="form-control" id="email_message" name="email_message" required></textarea>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <span class="btn btn-primary" id="save_changes">Save Changes</span>
                </div>
              </form>
            </div>

          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
  <!-- /.content-wrapper -->

<?php 
require('layout/footer.php');
?>
<script>
$(document).ready(function() {
   var shop = '<?php echo $_SESSION["shop_encrypt"];?>';
   var ReviewRequest = [ { "action": "loadShopDetails",'shop_encrypt':shop}];
   // console.log(ReviewRequest);
      $.ajax({
       type: "POST",
       url: "../../productReview/ReviewRequest.php",
       data: { data: JSON.stringify(ReviewRequest) },
       // dataType: 'JSON',
        success: function (response) { 
          var result=jQuery.parseJSON(response);
          if(result.status=='success'){
           var resp=jQuery.parseJSON(result.response);
           $('#from_email').val(resp.email);
              if(result.response_in!==0){
                 $('#email_subject').val(result.response_in.email_subject);
                 $('#email_message').val(result.response_in.email_message);
                     if(result.response_in.is_auto_send==1){
                      $('#rev_request_mode').attr('checked', 'checked');
                     }
              }

          }
        }
      }); //end ajax  

  jQuery(document).on('click','#save_changes',function(e){
       e.preventDefault();
        var from_email    = $('#from_email').val();
        var email_subject = $('#email_subject').val();
        var email_message = $('#email_message').val();
        if(from_email==""||email_subject==""||email_message==""){
          alert("all Field must be filled out!");
          return false;
        }else{
          if($('#rev_request_mode').is(":checked"))
          {
            var rev_request_mode = 1;
          }else{
           var rev_request_mode = 0;
          }
          var requestData = [{ "action": "updateReviewRequest",'shop_encrypt':shop,'from_email':from_email,'email_subject':email_subject,'email_message':email_message,'rev_request_mode':rev_request_mode}];
          $.ajax({
            type: "POST",
            url: "../../productReview/ReviewRequest.php",
            data: { data: JSON.stringify(requestData) },
            success: function (response) { 
            var result=jQuery.parseJSON(response);
            if(result.status=='success'){
              alert(result.message);
              location.reload();
            }
           }
          }); //end ajax 
        }
  });



  jQuery(document).on('click','#rev_request_mode',function(e){
          if($('#rev_request_mode').is(":checked"))
          {
            var rev_request_mode = 1;
          }else{
            var rev_request_mode = 0;
          }
        var requestData = [{ "action": "thankYouScriptUpdate",'shop_encrypt':shop,'rev_request_mode':rev_request_mode}];
          $.ajax({
            type: "POST",
            url: "../../productReview/ReviewRequest.php",
            data: { data: JSON.stringify(requestData) },
            success: function (response) { 
            var result=jQuery.parseJSON(response);
            if(result.status=='success'){
              alert(result.message);
              location.reload();
            }
           }
          }); //end ajax 
   });
});

</script>
