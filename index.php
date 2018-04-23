
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	
</head>
<body>
	<?php
	include "db_connect.php";
	?>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>

				<a class="navbar-brand" href="#"><span>Google home</span> Healthy hub</a>
			</div>

    
    <!-- PROFILE -->        
		</div>
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
   <!-- PROFILE -->
        
   <!-- NAVIGATIE BAR -->     
		<div class="divider"></div>
		<ul class="nav menu">
			<li class="active"><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
            <li><a href="nutrition.php"><em class="fa fa-bar-chart">&nbsp;</em> Nutrition</a></li>
			<li><a href="goal.php"><em class="fa fa-line-chart">&nbsp;</em> Goals</a></li>
			<li><a href="User.php"><em class="fa fa-user">&nbsp;</em> My details</a></li>
            <li><a href="login.php" onclick="signOut();"><em class="fa fa-power-off">&nbsp;</em> Logout</a> </li>
<script>
  function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
  }
</script>
		</ul>
	</div>
    <!-- NAVIGATIE BAR -->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active" id="bigOne"></li>
			</ol>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div>
		
        <!-- DEVICE PANEL -->
		<div class="panel panel-container">
			<div class="row">
				<div class="col-xs-6 col-md-4 col-lg-4 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding">
							<img src="img/bar-chart.png">
                            <div class="text-muted">Goals</div>

							<button type="button" class="btn btn-primary" onclick="location.href='goal.php';"> Add a new goal</button>
						</div>
					</div>
				</div>
				
				<div class="col-xs-6 col-md-4 col-lg-4 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding">
							<img src="img/recipe.png">
							<div class="text-muted">Recipes</div>
                            <button type="button" class="btn btn-primary" onclick="location.href='nutrition.php';"> Search recipie</button>
						</div>
					</div>
				</div>
                
<!---				<div class="col-xs-6 col-md-4 col-lg-4 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding">
							<img src="img/linkedin.png">
							<div class="text-muted">LinkedIn</div>
                            <button type="button" class="btn btn-primary" onclick="location.href='elements.php';"> Add Platform</button>
						</div>
					</div>
				</div> -->
			</div>
		</div>
		<!-- DEVICE PANEL -->
 
		<!-- TIMELINE -->	
			<div class="panel panel-container">
				<div class="panel panel-default ">
					<div class="panel-heading">
						Recent achievements 
						
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body timeline-container">
						<ul class="timeline">
							<li>
								<div class="timeline-badge"><em class="glyphicon glyphicon-user"></em></div>
								<div class="timeline-panel">
									<div class="timeline-heading">
										<h4 class="timeline-title">You've lost 5 kilo's</h4>
									</div>
									<div class="timeline-body">
										<p>19:32</p>
									</div>
								</div>
							</li>
							<li>
								<div class="timeline-badge primary"><em class="glyphicon glyphicon-link"></em></div>
								<div class="timeline-panel">
									<div class="timeline-heading">
										<h4 class="timeline-title">A recipe was added to your account </h4>
									</div>
									<div class="timeline-body">
										<p>14:49</p>
									</div>
								</div>
							</li>
							<li>
								<div class="timeline-badge"><em class="glyphicon glyphicon-flash"></em></div>
								<div class="timeline-panel">
									<div class="timeline-heading">
										<h4 class="timeline-title">You've completed your workout  </h4>
									</div>
									<div class="timeline-body">
										<p>12:05</p>
									</div>
								</div>
							</li>
							<li>
								<div class="timeline-badge"><em class="glyphicon glyphicon-flash"></em></div>
								<div class="timeline-panel">
									<div class="timeline-heading">
										<h4 class="timeline-title">You've completed your workout</h4>
									</div>
									<div class="timeline-body">
										<p>10:20</p>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div> 
        <!-- TIMELINE -->
        
        <!-- FOOTER -->
			<div class="col-sm-12">
				<p class="back-link">Google home Healthy Habits </p>
			</div>
		</div>
		<!-- FOOTER -->
   <!-- bestanden die waarschijnlijk niet in gebruik zijn!-->
    
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	
	<!-- grafiek van tevoren?-->
	<script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
	</script>


</body>
</html>