<?php include('layout/header.php');?>
<?php include('layout/sidebar.php');?>
  <!-- Content Wrapper. Contains page content -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css" />
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
     <div class="container-fluid"> 
     <table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                 <th>CustomerEmail</th>
                <th>Product Name</th>
                <th>Rating</th>
                <th>Description</th>
                <th>Date & Time</th>
                <th>Status </th>
            </tr>
        </thead>
        <tbody id="reviewDetails">
           
        </tbody>
    </table>
     </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php 
require('layout/footer.php');
?>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    var thtml='';
var shop = '<?php echo $_SESSION["shop_encrypt"];?>';
  loadReviews = [ { "action": "loadReviews",'shop_encrypt':shop}];
      $.ajax({
       type: "POST",
       url: "../../productReview/ExportReviews.php",
       data: { data: JSON.stringify(loadReviews) },
       // dataType: 'JSON',
        success: function (result) { 
          $('#reviewDetails').append(result);   
          $('#example').DataTable( {
             dom: 'Bfrtip',
             buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
          });
        }
      }); //end ajax  

   
} );
</script>