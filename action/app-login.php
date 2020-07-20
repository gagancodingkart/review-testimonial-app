<!doctype html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script>
    <meta charset="UTF-8">
    <style>
        body{
            margin: 0;
            padding: 0;
        }
        body:before{
            content: '';
            position: fixed;
            width: 100vw;
            height: 100vh;
            background-image: url("theme/productReview/layout/images/4.jpeg");
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            -webkit-filter: blur(10px);
            -moz-filter: blur(10px);
            -o-filter: blur(10px);
            -ms-filter: blur(10px);
            filter: blur(10px);
        }
        .contact-form
        {
            position: absolute;
            top: 70%;
            left: 50%;
            transform: translate(-50%,-50%);
            width: 400px;
            height: 500px;
            padding: 80px 40px;
            box-sizing: border-box;
            background: rgba(0,0,0,.5);
        }
        .avatar {
            position: absolute;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            overflow: hidden;
            top: calc(-80px/2);
            left: calc(50% - 40px);
        }
        .contact-form h2 {
            margin: 0;
            padding: 0 0 20px;
            color: #fff;
            text-align: center;
            text-transform: uppercase;
        }
        .contact-form p
        {
            margin: 0;
            padding: 0;
            font-weight: bold;
            color: #fff;
        }
        .contact-form input
        {
            width: 100%;
            margin-bottom: 20px;
        }
        .contact-form input[type="text"],
        .contact-form input[type="password"]
        {
            border: none;
            border-bottom: 1px solid #fff;
            background: transparent;
            outline: none;
            height: 40px;
            color: #fff;
            font-size: 16px;
        }
        .contact-form input[type="submit"] {
            height: 30px;
            color: #fff;
            font-size: 15px;
            background: red;
            cursor: pointer;
            border-radius: 25px;
            border: none;
            outline: none;
            margin-top: 15%;
        }
        .contact-form a
        {
            color: #fff;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
        }
        input[type="checkbox"] {
            width: 20%;
        }
    </style>
</head>
<body>
    <div class="contact-form">
        <img src="theme/productReview/layout/images/r&t.png" class="avatar">
        <h2>Admin Login</h2>
            <p>Username</p>
            <input type="text" name="username" id="username" placeholder="Enter Username">
            <p>Password</p>
            <input type="password" name="password" id="password" placeholder="Enter Password">
            <input type="submit" id="login" value="Sign In">
    
    </div>
</body>
</html>
<script type="text/javascript">
      $('#login').click(function() {

        var app_loc="http://codingkloud.com/shopify-app";
        var username=$('#username').val();
        var password=$('#password').val();
        var loginDetails = [ { "action": "loginCheck", "username": username, "password": password}];
      $.ajax({
       type: "POST",
       url: "appAdmin/Login.php",
       data: { data: JSON.stringify(loginDetails) },
       // dataType: 'JSON',
        success: function (response) { 
          var result=jQuery.parseJSON(response);

          if(result.status=='success'){
            alert(result.status); 
           window.open(app_loc+"/action/theme/appAdmin/index.php?"+result.user_id, "_blank"); 
          }else{
            alert(result.message);
          }
        }
      }); //end ajax  



      });
</script>