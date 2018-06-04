
             
 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Google Home - Nutrition</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <meta name="google-signin-client_id" content="307112913485-5kkslq098hfj65e6l3qngjo1916a7h4i.apps.googleusercontent.com">
    <!--Custom Font-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <span><a href="Settings.php"><em class="fa fa-cog" style="font-size:48px;">&nbsp;</em> </a></span>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span></button>
                <a class="navbar-brand" href="#"><span>Google home</span> healthy habits</a>
                
            </div>
        </div><!-- /.container-fluid -->
    </nav>
        
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">Details</li>
            </ol>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Settings</h1>
            </div>
        </div>

    <form class="form-horizontal" action="" method="post">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default articles">
                    
                    <div class="panel-heading">
                        Fill your weight and your length in
                        </div>  
                            <div class="panel-body articles-container">
                                <div class="form-group">
                                  
                                        <label>Weight (Kilograms)</label>
                                        <input type="text" class="form-control" id="weight" placeholder="Enter your weight here in kilograms">
                                      
                                     
                                        <label>Length (Centimetres)</label>
                                        <input type="type" class="form-control" id="length" placeholder="Enter your length here in centimetres">
                                      
                                </div>
                            </div>
                        </div>
                </div> 
        </div>    
        
         <button type="submit" class="btn btn-success">Submit</button> 
        </form>
            <?php
            
            $weight = isset($_POST["weight"]) ? $_POST['weight'] : "";
            $length = isset($_POST["length"]) ? $_POST['length'] : "";
            $_email =  $_COOKIE["email"];
            include 'db_connect.php';
            // Dit stukje hieronder doet het niet
            $sql = "UPDATE User
            SET weight =" . $weight . "AND length=" . $length . 
            " WHERE user_id IN (SELECT user_id FROM User WHERE email='".$_email."')";
             if ($conn->query($sql) === TRUE) {
           echo "<script type='text/javascript'>alert('Weight and length updated!');</script>";
                 header("Location: index.php");
             } else {
           echo "<script type='text/javascript'>alert('Something went wrong');</script>";  
   
           }
        
            ?>
        
<!--            <button type="submit" class="btn btn-success" onclick="">Submit</button>-->
             

          
            <div class="col-sm-12">
                <p class="back-link">Google home Healthy Habits EWA United</p>
            </div>
        <!--/.row-->
        
    </div>  <!--/.main-->
      
<script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
<script src="js/jquery-1.11.1.min.js"></script>
    
</body>
</html>
