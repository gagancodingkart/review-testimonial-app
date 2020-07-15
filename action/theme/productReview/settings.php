<?php include('layout/header.php');?>
<?php include('layout/sidebar.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Settings</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Settings</li>
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
                <h3 class="card-title">General Settings</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Auto publish</label>
                  </div>
                  <div class="form-group">
                    <label class="switch">
                      <input type="checkbox" id='request_mode'>
                      <span class="slider btn-info round"></span>
                     </label>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Notification Email</label>
                  </div>
                  <div class="form-group">
                    <label class="switch">
                      <input type="checkbox" id='request_mode'>
                      <span class="slider btn-info round"></span>
                     </label>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Review Heading</label>
                    <input type="email" class="form-control" id="exampleInputEmail1"  >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Position for Review Heading</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"   >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Write the first review</label>
                    <input type="text" class="form-control" id="exampleInputPassword1">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Reviews</label>
                    <input type="text" class="form-control" id="exampleInputPassword1">
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save Changes</button>
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
