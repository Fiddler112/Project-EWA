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
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>Google home</span> healthy habits</a>
				
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">Username</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav menu">
			<li><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li><a href="nutrition.php"><em class="fa fa-bar-chart">&nbsp;</em> Nutrition</a></li>
			<li><a href="goal.php"><em class="fa fa-line-chart">&nbsp;</em> Goals</a></li>
			<li class="active"><a href="User.php"><em class="fa fa-user">&nbsp;</em> My details</a></li>
			 <li><a href="db_logout.php" onclick="signOut();"><em class="fa fa-power-off">&nbsp;</em> Logout</a> </li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Details</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Personal details</h1>
			</div>
		</div><!--/.row-->

        <!--/.DAILY INTAKE-->
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default articles">
					<div class="panel-heading">
						BMI from database
						</div>					
						<?php
							include_once 'db_connect.php';
							$sql = "SELECT * FROM BMI";
							$result = $conn->query($sql);
							if($result == FALSE) {
								print(mysqli_error());
							} else {
								while($row = $result->fetch_array()) {
								// PRINTEN VAN BMI WERKT, MAAR NAMEN OPHALEN NIET!!!
								echo" <div class='article'>";
									echo"<div class='col-xs-12'>";
									echo"	<div class='row'>";
									echo"	<div class='col-xs-2 col-md-2 date'>";
									echo"	<div class='large'>".$row["BMI"]. "</div>";
									echo"	<div class='text-muted'>bmi</div>";
									echo"	</div>";
									echo"<div class='col-xs-10 col-md-10'>";
									echo'	<p>'.$row["BMI_id"].'</p>';
									echo"</div>";
									echo"</div>";
								echo"</div>";
								echo"<div class='clear'></div>";
								echo"</div>	";																																	
								}
							}
							$conn->close();
							?>
							</div>
                        </div>
				</div> 
				           
        </div>
				<!--/.DAILY INTAKE-->

			</div><!--/.col-->
			<div class="col-sm-12">
				<p class="back-link">Google home Healthy Habits  <a href="https://www.medialoot.com">EWA United</a></p>
			</div>
		<!--/.row-->
	</div>	<!--/.main-->
	  

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	
</body>
</html>
