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
            <h1>My Notification</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Notification</li>
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
                <h3 class="card-title">Notification List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="reviewTable" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.no</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Time</th>
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
    <!-- /.content -->
  </div>
<?php 
require('layout/footer.php');
?>
!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>

<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- page script -->
<script>

$(document).ready(function(){
   var shop = '<?php echo $_SESSION["shop_encrypt"];?>';
  loadReviews = [ { "action": "loadNotificationList",'shop_encrypt':shop}];
  var thtml='';
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
                    if(item['is_seen']==0){
                      var is_seen    ='Not Seen';
                    }else{
                      var is_seen    ='Seen';
                    }
                    thtml+='<tr>';
                    thtml+='<td>'+(i+1)+'</td>';
                    thtml+='<td>'+name+'</td>';
                    thtml+='<td>'+item['description']+'</td>';
                    thtml+='<td>'+created_at+'</td>';
                    thtml+='<td><a href="manageReview.php?shop=<?php echo $_SESSION["shop_encrypt"];?>" role="button"><i class="fa fa-eye" style="font-size:24px;color:blue"></i></a></td>';
                    thtml+='</tr>';
              });
              $('#reviewDetails').append(thtml);  
        }
   $("#reviewTable").DataTable({
           "responsive": true,
           "autoWidth": false,
          }); 
        }
      }); //end ajax  
});

</script>
<script>

$(document).ready(function(){
   var shop = '<?php echo $_SESSION["shop_encrypt"];?>';
  loadReviews = [ { "action": "seenNotification",'shop_encrypt':shop}];
  var thtml='';
      $.ajax({
       type: "POST",
       url: "../../productReview/ManageReviews.php",
       data: { data: JSON.stringify(loadReviews) },
       // dataType: 'JSON',
        success: function (response) { 
        var result=jQuery.parseJSON(response);
        }
      }); //end ajax  
});

</script>
