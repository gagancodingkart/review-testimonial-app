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
                      <input type="checkbox" id='request_mode'>
                      <span class="slider btn-info round"></span>
                     </label>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Send Email After</label>
                    <input type="email" class="form-control" id="exampleInputEmail1"  >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email Subject</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"   >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">From</label>
                    <input type="text" class="form-control" id="exampleInputPassword1">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Message</label>
                    <input type="text" class="form-control" id="exampleInputPassword1">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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
