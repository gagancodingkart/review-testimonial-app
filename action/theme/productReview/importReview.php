<?php include('layout/header.php');?>
<?php include('layout/sidebar.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Import Review</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Import Review</li>
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
                    <a href="manageReview.php?shop=<?php echo $_SESSION["shop_encrypt"];?>">Customize-></a>
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
                    <a href="javascript::">Import Reviews-></a>
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
                    <a href="javascript::">Export Reviews-></a>
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
                    <a href="javascript::">Request Email-></a>
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!--/.card -->
              </div>
 
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
