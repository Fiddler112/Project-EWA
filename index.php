<?php
include 'functions.php';
enterWeight();
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link rel="icon" href="img/pic.png">
	<!--Custom Font-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	
    <meta name="google-signin-client_id" content="307112913485-5kkslq098hfj65e6l3qngjo1916a7h4i.apps.googleusercontent.com">
    
</head>
<body>
    <?php
	include "db_connect.php";
	?>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
                <span><a href="Settings.php"><em class="fa fa-cog" style="font-size:48px;">&nbsp;</em> </a></span>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>

				<a class="navbar-brand" href="#"><span>Google home</span> Healthy habits</a>
			</div>

    
    <!-- PROFILE -->        
		</div>
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="  <?php $imgURL =  $_COOKIE["imgURL"];
                echo $imgURL;
                ?> " class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">                
				<div class="profile-usertitle-name"> <?php $firstName =  $_COOKIE["firstName"];
                echo $firstName;
                ?> </div>
			</div>
			<div class="clear"></div>
		</div>
   <!-- PROFILE -->
        
   <!-- NAVIGATIE BAR -->     
		<div class="divider"></div>
		<ul class="nav menu">
			<li class="active"><a href="index.php"><em class="fa fa-home">&nbsp;</em> Home</a></li>
            <li><a href="nutrition.php"><em class="fa fa-bar-chart">&nbsp;</em> Nutrition</a></li>
            <li><a href="Recipe.php"><em class="fa fa-utensils">&nbsp;</em> Recipes</a></li>
			<li><a href="goal.php"><em class="fa fa-line-chart">&nbsp;</em> Goals</a></li>
			<li><a href="User.php"><em class="fa fa-user">&nbsp;</em> Personal info</a></li>
			<li><a href="Settings.php"><em class="fa fa-wrench">&nbsp;</em> Settings</a></li>
            <li><a href="db_logout.php" onclick="location.href = db_logout.php;"><em class="fa fa-power-off">&nbsp;</em> Logout</a> </li>
		</ul>
	</div>
    <!-- NAVIGATIE BAR -->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active" id="bigOne"> Home</li>
			</ol>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Home</h1>
			</div>
		</div>
        
    <form method="post" action="" name="form">  
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default articles">    
      <!-- Progress bar-->
    <?php
        include_once 'db_connect.php';
        $today = date('Y-m-d');
        $_email =  $_COOKIE["email"];
        $sql = "SELECT SUM(calories) AS totalCalories FROM `Food` WHERE timestamp='$today'AND user_id IN (select User.user_id FROM `User` where User.email = '".$_email."')";
        $result = $conn->query($sql);
        if($result == FALSE) {
        print(mysqli_error());
        } else {
              while($row = $result->fetch_array()) {
                 $calories = $row["totalCalories"]; 
            $percentage = ($calories / 2500 * 100);
      echo  "<div class='panel-heading' >";
      echo  "<p class= 'text-center'> Calories you have eaten today </p>";
      echo  "</div>";
          echo  "<div class='row'>";
              echo  "<div class='col-md-12'>";
                  echo  "<div class='progress' style='height:25px' font>";
                      echo  "<div class='progress-bar active massive-font'  role='progressbar' height='25px' style='width: $percentage% ' aria-valuenow=100 aria-valuemin='0' aria-valuemax='100'>$calories</div>";
                      echo  "</div>";
                  echo  "</div>";
          echo  "</div>";
        }
        }
  ?>  
                    
                                     </div>
				</div> 
        </div>
        </form>
        
      <div id="myCarousel" class="carousel slide" data-interval="3000" data-ride="carousel">
    <!-- Carousel indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>   
    <!-- Carousel items -->
    <div class="carousel-inner">
        <div class="item active">
            <img src="img/slises.png" alt="First Slide">
        </div>
        <div class="item">
            <img src="img/superfoods.png" alt="Second Slide">
        </div>
        <div class="item">
            <img src="img/pure.png" alt="Third Slide">
        </div>
    </div>
    <!-- Carousel nav -->
    <a class="carousel-control left" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="carousel-control right" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
</div>   
        
        
    <form method="post" action="" name="form">  
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default articles">
					<div class="panel-heading">
						Progress time line
						</div>	
							<div class="panel-body articles-container">
                                <div class="form-group">

                                              <?php
                        include_once 'db_connect.php';
                        $_email =  $_COOKIE["email"];
                        $sql = "SELECT type, description, timestamp FROM `Events` WHERE user_id IN (select User.user_id FROM `User` where User.email = '".$_email."')";
                        $result = $conn->query($sql);
                        if($result == FALSE) {
                        print(mysqli_error());
                        } else {
                        while($row = $result->fetch_array()) {
                            
               echo  "<div class=' col-md-9 col-lg-9 '>";
                       echo  "<table class='table table-user-information'>";                            
                        echo    "<td>".$row["description"]."</td>";
                        echo    "<td>".$row["timestamp"]."</td>";
                        echo    "<tr>";                   
                    echo    "<tbody>";
                    echo    "</table>";
                    echo    "</div>";
                    echo    "</div>";
                     }

}
$conn->close();
?>                                            
          
                                </div>
							</div>
                        </div>
				</div> 
        </div>
        </form>
        <!--      
      <form method="post" action="" name="form">  
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default articles">
					<div class="panel-heading">
						Daily calories
						</div>	
							<div class="panel-body articles-container">
                                <div class="form-group">

                          -->                 
                                              <?php
                        
//                        $_email =  $_COOKIE["email"];
//                        $today = date("Y-m-d");
//                        $sql = "SELECT SUM(calories) AS sumCalories 
//                        FROM `Food` WHERE user_id IN (select User.user_id FROM `User` where User.email = '$_email') AND timestamp = '$today';";
//                        $result = $conn->query($sql);
//                                  
//                        if ($result->num_rows > 0) {
//                            while ($row = $result->fetch_assoc()) {
//                                $sumCal = $row["sumCalories"];
//                            }
//                        }
//                                    
//                         
//                    echo  "<div class=' col-md-9 col-lg-9 '>";
//                       echo  "<table class='table table-user-information'>";
//                       echo  "<tbody>";
//                            
//                        echo    "<tr>";
//                        echo    "<td>$sumCal</td>";
//                        echo    "<td>/ 2200</td>";
//                        echo    "<tr>";
//                            
//                      
//                            
//                    echo    "<tbody>";
//                    echo    "</table>";
//                    echo    "</div>";
//                    echo    "</div>";
?>                              
          
<!--
                                </div>
							</div>
                        </div>
				</div> 
        </div>
        </form>      
-->
      	
			<div class="col-sm-12">
				<p class="back-link">Google home Healthy Habits EWA United</p>
			</div>
		<!--/.row-->
	</div>	<!--/.main-->
   <!-- bestanden die waarschijnlijk niet in gebruik zijn!-->
    <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
    <script src="js/jquery-1.11.1.min.js"></script>
</body>
</html>