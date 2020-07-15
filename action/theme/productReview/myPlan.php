<?php include('layout/header.php');?>
<?php include('layout/sidebar.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Plans & Pricing</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">My Plan</li>
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
          <h3 class="card-title">Pricing plans tailored for your store</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-12 order-2 order-md-1">
              <div class="row">
                <div class="col-12">
                    <div class="post">
                      <div class="row">
                      <div class="col-md-12">
                        <div class="card">
                          <div class="card-header">
                            <h3 class="card-title">Find a plan that fits your requirements.</h3>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <table class="table table-bordered">
                              <thead>                  
                                <tr>
                                  <th>Free $0.00 / mo </th>
                                  <th>Pro Plus $0.00 / mo</th>
                                  <th style="width: 40px">Growth $0.00 / mo</th>
                                  <th style="width: 40px">Business $0.00 / mo</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>1.</td>
                                  <td>Update software</td>
                                  <td>
                                    <div class="progress progress-xs">
                                      <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                    </div>
                                  </td>
                                  <td><span class="badge bg-danger">55%</span></td>
                                </tr>
                                <tr>
                                  <td>2.</td>
                                  <td>Clean database</td>
                                  <td>
                                    <div class="progress progress-xs">
                                      <div class="progress-bar bg-warning" style="width: 70%"></div>
                                    </div>
                                  </td>
                                  <td><span class="badge bg-warning">70%</span></td>
                                </tr>
                                <tr>
                                  <td>3.</td>
                                  <td>Cron job running</td>
                                  <td>
                                    <div class="progress progress-xs progress-striped active">
                                      <div class="progress-bar bg-primary" style="width: 30%"></div>
                                    </div>
                                  </td>
                                  <td><span class="badge bg-primary">30%</span></td>
                                </tr>
                                <tr>
                                  <td>4.</td>
                                  <td>Fix and squish bugs</td>
                                  <td>
                                    <div class="progress progress-xs progress-striped active">
                                      <div class="progress-bar bg-success" style="width: 90%"></div>
                                    </div>
                                  </td>
                                  <td><span class="badge bg-success">90%</span></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                              <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                              <li class="page-item"><a class="page-link" href="#">1</a></li>
                              <li class="page-item"><a class="page-link" href="#">2</a></li>
                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                              <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                            </ul>
                          </div>
                        </div>
                        <!-- /.card -->
                      </div>
                    </div>
              
                                 
                    </div>
                </div>
              </div>
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
