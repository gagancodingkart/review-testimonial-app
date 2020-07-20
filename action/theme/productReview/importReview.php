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
      <div class= "row">
        <div class="col-md-6">
          <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Direct import</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                  <p>You can import reviews by uploading a csv file.</p><p>Column of CSV:</p>
                  <p>1. product ID - (required) e.g. "Name of product ID"</p> 
                  <p>2. product handle - (required) e.g. "Name of product handle"</p> 
                  <p>3. reviewer name - (required) - The name of the customer</p>
                  <p>4. reviewer email - (required) - The email of the customer</p>
                  <p>5. Product image urls - (optional) - Product photo of the review</p>
                  <p>6. review date - (required) - must be in the following format: YYYY-MM-DD. For example, "2019-01-09"</p>
                  <p>7. review title - (optional) - The title of the review</p>
                  <p>8. review detail - (required) - The text of the review</p>
                  <p>9. status - (required) - Published/Unpublished</p>
                  <p>10. rating - (required) - valid values are only 1,2,3,4,5</p>
                  <p>11. type - (optional) - User/Admin</p>
                
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <!-- <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
                <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a> -->
              </div>
              <!-- /.card-footer -->
            </div>
        </div>
        <div class="col-md-6">

          <!-- http://codingkloud.com/shopify-app/action/include/assets/product_review_format -->
            <!-- general form elements -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Import Reviews From Review Apps</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="../../productReview/ImportReviews.php" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Sample CSV format</label><br>
                    <a href="<?php print_r('https://'.$_SERVER['HTTP_HOST'].'/shopify-app/action/include/assets/revCsvformat.csv')?>" class="btn btn-primary">Download</a>
                  </div>
                  <br>
                    <label for="importCsv">You can upload reviews as CSV format.</label> 

                    <p><b>Note:</b> Please upload Less Than 5 MB CSV</p>                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                   <input type="file" name="reviewFile" class="float-left"id="reviewFile">    
                  <button type="submit" class="btn btn-primary float-right">Submit</button>
                </div>
              </form>
            </div>
        </div>
      </div>
    </section> 
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php 
require('layout/footer.php');
?>
