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
                    <th>Product Photo</th>
                    <th>Rating</th>
                    <th>Time</th>
                    <th>Review</th>
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
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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


$( document ).ready(function() {
      $.ajax({
       type: "POST",
       url: "../../productReview/ManageReviews.php",
       // data: dataString,
       crossDomain: true,
       cache: false,
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