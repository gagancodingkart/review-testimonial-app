

$(document).ready(function() {
   document.write("\<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css' type='text/javascript'>\<\/script>");


  var product_id= jQuery('#leave_review').attr('data-product-id').toString();
  var thtml='';
  thtml+='<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';
  thtml+='<div class="row cart">';
  thtml+='  <div id="divStar" class="col-md-8" style="float:left"><h2>Star Rating</h2>';
  thtml+='  </div>';
  thtml+='  <div class="col-md-5"><h2></h2></br></br></br>';
  thtml+='    <h3><span class="btn btn-info" id="showReviewBtn">Show Review</span></h3>';
  thtml+='    <h3><span class="btn btn-info" id="addReviewBtn">&nbsp; Add  Review </span></h3>';
  thtml+='  </div>';
  thtml+='</div></br><hr>';
  thtml+='<div id="viewReviewDiv" class="container row-12 cart" ></div>';
  thtml+='<div id="addReviewDiv">';
  thtml+='<h3>Review</h3>';
  thtml+='<div class="container reviewCont">';
  thtml+='  <form action="http://codingkloud.com/shopify-app/action/productReview/AddReview.php" method="post" enctype="multipart/form-data" class="add-event-form">';
  thtml+='  <label for="rating">Rating</label>';
  thtml+='  <input id="rating5" type="radio" name="rating" value="1">';
  thtml+='  <label for="rating5">1</label>';
  thtml+='  <input id="rating4" type="radio" name="rating" value="2">';
  thtml+='  <label for="rating4">2</label>';
  thtml+='  <input id="rating3" type="radio" name="rating" value="3">';
  thtml+='  <label for="rating3">3</label>';
  thtml+='  <input id="rating2" type="radio" name="rating" value="4" checked>';
  thtml+='  <label for="rating2">4</label>';
  thtml+='  <input id="rating1" type="radio" name="rating" value="5">';
  thtml+='  <label for="rating1">5</label>';
  thtml+='    <label for="name">Name</label>';
  thtml+='   <input type="text" id="customer_name" name="customer_name" placeholder="Your name."> ';
  thtml+='   <input type="hidden" id="product_id" name="product_id" value="'+product_id+'"> ';
  thtml+='   <label for="review_title">Review Title(Optional)</label>';
  thtml+='    <input type="text" id="review_title" name="review_title" placeholder="Give Review Title."/>';
  thtml+='    <label for="email">Email</label>';
  thtml+='   <input type="email" id="customer_email" name="customer_email" placeholder="Your email."/>';
  thtml+='    <label for="productimage">Upload a picture of your product(Optional)</label>';
  thtml+='     <input type="file" id="product_image" name="product_image" />';
  thtml+='    <label for="subject">Review Description</label>';
  thtml+=' <textarea id="subject" name="subject" placeholder="Write something." style="height:200px"></textarea>';
  thtml+=' <button class="btn btn-info" id="review_submit" value="Submit">Submit</button>';
  thtml+='  </form>';
  thtml+='</div></div>';

  $('#leave_review').append(thtml);
  $('.container.reviewCont').css({'border-radius': '5px',
                               'background-color': '#f2f2f2',
                               'padding': '20px'
                             }); 
  $('input[type=text], select, textarea').css({'width': '100%',
                                              'padding': '12px',
                                              'border': '1px solid #ccc',
                                              'border-radius': '4px',
                                              'box-sizing':' border-box',
                                              'margin-top': '6px',
                                              'margin-bottom': '16px',
                                              'resize': 'vertical'
                                             }); 
  $('input[type=submit]:hover').css({'background-color': '#45a049;'}); 
  $('.rating').css({'overflow': 'hidden',
                    'vertical-align': 'bottom',
                    'display': 'inline-block',
                    'width': 'auto',
                    'height': '30px'  
                     }); 


 $('.rating > label').css({'position': 'relative',
                    'display': 'block',
                    'float': 'right',
                    'background-size': '30px 30px'  
                     }); 

 $('.rating > label').css({'display': 'block',
                    'opacity': '0',
                    'content': '',
                    'width': '30px',
                    'height': '30px',
                    'background': '30px 30px',
                    'transition': 'opacity 0.2s linear',
                   
                     }); 
 $('.rating > label:before').css({'opacity': '0',
                    'margin-right': '-100%'
                     }); 

$('.rating > label:hover:before,  .rating > label:hover ~ label:before,  .rating:not(:hover) > :checked ~ label:before').css({'opacity': '1'
                     }); 
       
 $('#addReviewDiv').hide();
  $( "#addReviewBtn" ).click(function() {
    $('#addReviewDiv').show();
  });
                            
});


$(document).ready(function() {
  var product_id= jQuery('#leave_review').attr('data-product-id').toString();
   loadRatings = [ { "action": "loadRatings","product_id":product_id}];
    $.ajax({
          type : "POST",
          dataType: "json",
          url  : "http://codingkloud.com/shopify-app/action/productReview/ManageReviews.php",
          data : { data: JSON.stringify(loadRatings) },
          success : function( response ) {
            if(response.status!=='failure'){
              thtml='';
              thtml+='<span style="color: orange"class="fa fa-star checked"></span>';
              thtml+='<span style="color: orange"class="fa fa-star checked"></span>';
              thtml+='<span style="color: orange"class="fa fa-star checked"></span>';
              thtml+='<span style="color: orange"class="fa fa-star checked"></span>';
              thtml+='<span style="color: orange"class="fa fa-star checked"></span>&nbsp; ('+response.response.five+')<br>';

              thtml+='<span style="color: orange" class="fa fa-star checked"></span>';
              thtml+='<span style="color: orange" class="fa fa-star checked"></span>';
              thtml+='<span style="color: orange" class="fa fa-star checked"></span>';
              thtml+='<span style="color: orange" class="fa fa-star"></span>';
              thtml+='<span class="fa fa-star"></span>&nbsp; ('+response.response.four+') <br>';

              thtml+='<span style="color: orange"class="fa fa-star checked"></span>';
              thtml+='<span style="color: orange"class="fa fa-star checked"></span>';
              thtml+='<span style="color: orange"class="fa fa-star"></span>';
              thtml+='<span class="fa fa-star"></span>';
              thtml+='<span class="fa fa-star"></span>&nbsp; ('+response.response.three+') <br>';
              
              thtml+='<span style="color: orange" class="fa fa-star checked"></span>';
              thtml+='<span style="color: orange" class="fa fa-star "></span>';
              thtml+='<span class="fa fa-star"></span>';
              thtml+='<span class="fa fa-star"></span>';
              thtml+='<span class="fa fa-star"></span>&nbsp; ('+response.response.two+') <br>';

              thtml+='<span style="color: orange" class="fa fa-star "></span>';
              thtml+='<span class="fa fa-star "></span>';
              thtml+='<span class="fa fa-star"></span>';
              thtml+='<span class="fa fa-star"></span>';
              thtml+='<span class="fa fa-star"></span>&nbsp; ('+response.response.one+') <br>';
              $('#divStar').append(thtml);
            }
          }
        });
 });


 $( "#showReviewBtn" ).click(function() 
 {var thtmll='';
 thtmll+='<div class="row">';   
  $('#viewReviewDiv').empty();
  var product_id= jQuery('#leave_review').attr('data-product-id').toString();
   loadRatings = [ { "action": "loadReviewsForUser","product_id":product_id}];
    $.ajax({
          type : "POST",
          dataType: "json",
          url  : "http://codingkloud.com/shopify-app/action/productReview/ManageReviews.php",
          data : { data: JSON.stringify(loadRatings) },
          success : function(result) {
          if(result.status!=='failure'){

              $.each(result.response, function (i, item) {
                    var reviewer_name      =item['reviewer_name'];
                    var title              =item['title'];
                    var subject_description=item['subject_description'];
                    var rating             =item['rating'];
                    var created_at         =item['created_at'];  
                    var ramaing = 5-parseInt(rating);
                    var starthtml='';
                    for($i=0; $i<parseInt(rating); $i++){
                       starthtml+='<span style="color: orange" class="fa fa-star checked"></span>';
                    }
                    for($i=0; $i<parseInt(ramaing); $i++){
                       starthtml+='<span class="fa fa-star "></span>';
                    }
                    thtmll+='<div class="col-sm-2">Name &nbsp; : &nbsp;'+reviewer_name+'</div>';
                    thtmll+='<div class="col-sm-2">Title &nbsp; : &nbsp;'+title+'</div>';
                    thtmll+='<div class="col-sm-2">Subject (description) &nbsp; : &nbsp;'+reviewer_name+'</div>';
                    thtmll+='<div class="col-sm-2">Rating  &nbsp; : &nbsp;'+starthtml+'</div>';
                    thtmll+='<div class="col-sm-2">Reviewer Date  &nbsp; : &nbsp;'+created_at+'</div><hr>';
                  
             });  
                thtmll+='</div>';
              $('#viewReviewDiv').append(thtmll);
             }
          }
        });
 });


