<?php include('layout/header.php');?>
<?php include('layout/sidebar.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Export Review</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Export Review</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
     <section class="content">

      <!-- <div class= "card"> -->
      <div class= "row">
                    <!-- /.col -->
          <div class="col-md-4">
            <div class="card card-primary collapsed-card">
              <div class="card-header">
                <h3 class="card-title"> Export Published Reviews</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <button type="button" class="btn btn-block btn-secondary btn-lg">Click to download</button>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
                         <!-- /.col -->
          <div class="col-md-4">
            <div class="card card-primary collapsed-card">
              <div class="card-header">
                <h3 class="card-title"> Export Unpublished Reviews</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <button type="button" class="btn btn-block btn-secondary btn-lg">Click to download</button>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
                         <!-- /.col -->
          <div class="col-md-4">
            <div class="card card-primary collapsed-card">
              <div class="card-header">
                <h3 class="card-title"> Export All Reviews</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <button type="button" class="btn btn-block btn-secondary btn-lg">Click to download</button>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
     </div>
     <!-- </div> -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php 
require('layout/footer.php');
?>
