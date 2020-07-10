<?php include('layout/header.php');?>
<?php include('layout/sidebar.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Insallation</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Insallation</li>
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
          <h3 class="card-title">Product Review Setup Manual</h3>

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
                  <h4>Display all product reviews on one page</h4>
                    <div class="post">
                      <div class="user-block">
                      </div>
                      <!-- /.user-block -->
                      <p>
                      Please add this code to the page you want to show all the product reviews on.
                      Note: Do not add this code to your product page. The app displays the review of that particular product there.
                      </p>

                      <p>
                        <textarea readonly="true" style=" width: 100%; padding: 15px 0 0 10px; border: 2px solid #DFE3E8; border-radius: 3px; background-color: #f8f8f8; font-size: 15px; resize: none;">&lt;div id='leave_review' data-product-id='{{ product.id }}' data-product-handle='{{product.handle}}' data-product-name='{{ product.title }}' evm-data-img-url='{{ product.featured_image | img_url: 'large' }}'&gt;&lt;/div&gt;</textarea>
                      </p>
                      <p>
                         <textarea readonly="true" style=" width: 100%; padding: 15px 0 0 10px; border: 2px solid #DFE3E8; border-radius: 3px; background-color: #f8f8f8; font-size: 15px; resize: none;">&lt;script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" &gt;&lt;/script&gt;</textarea>
                      </p>
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
