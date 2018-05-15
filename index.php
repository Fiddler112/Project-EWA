
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
				<img src="  <?php $imgURL =  $_COOKIE["imgURL"];
                echo $imgURL;
                ?> " class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">                
				<div class="profile-usertitle-name"> <?php $firstName =  $_COOKIE["firstName"];
                echo $firstName;
                ?> </div>
<!--				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>-->
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
			<li><a href="Settings.php"><em class="fa fa-wrench">&nbsp;</em> Settings</a></li>
			<li><a href="User.php"><em class="fa fa-user">&nbsp;</em> My details</a></li>
            <li><a href="db_logout.php" onclick="signOut();"><em class="fa fa-power-off">&nbsp;</em> Logout</a> </li>
<script>
  function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
       deletecookie("profileName");
       deletecookie("email");
       deletecookie("gIdToken");
       deletecookie("firstName");
       deletecookie("lastName");
       deletecookie("imgURL");
  }
     function deleteCookie(name) {
        setCookie({name: name, value: "", seconds: 0.1});
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
        
        
        
   <!-- CAROUSEL-->     
                 <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
        <img src="sugar.png" alt="sugar_facts">
        </div>

        <div class="item">
        <img src="chicago.jpg" alt="Chicago">
        </div>

        <div class="item">
            <img src="ny.jpg" alt="New York">
        </div>
    </div>
                     
		
 <!-- TIMELINE versie 1-->
<!--		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default articles">
					<div class="panel-heading">
						Time line 1
						</div>					
						<?php
												
							$result = $conn->query($sql);
							if($result == FALSE) {
								print(mysqli_error());
							} else {
								while($row = $result->fetch_array()) {
								echo" <div class='article'>";
									echo"<div class='col-xs-12'>";
									echo"	<div class='row'>";
									echo"	<div class='col-xs-2 col-md-2 date'>";
									echo"	<div class='large'>".$row["Events"]. "</div>";
									echo"	<div class='text-muted'>bmi</div>";
									echo"	</div>";
									echo"<div class='col-xs-10 col-md-10'>";
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
				           
        </div>-->

    <!-- TIMELINE versie 1—>

 
	<!-- TIMELINE versie 2-->

<!--
    <div class="panel panel-container">
        <div class="panel panel-default ">
            <div class="panel-heading">
                Time line 2
                <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
            <div class="panel-body timeline-container">
                        <?php
                include_once 'db_connect.php';
                $sql = "SELECT * FROM Events";
                $result = $conn->query($sql);
                if($result == FALSE) {
                    print(mysqli_error());
                } else {
                    while($row = $result->fetch_array()) {

                        echo "<ul class='timeline'>";
                            
                        echo   "	<li>";
                        echo	"<div class='timeline-badge'><em class='glyphicon glyphicon-user'></em></div>";
                        echo	"<div class='timeline-panel'>";
                        echo	"<div class='timeline-heading'>";
                        echo	"<h4 class='timeline-title'>".$row["description"]"</h4>";
                        echo	"</div>";
                        echo	"<div class='timeline-body'>";
                        echo	"<p>".$row["timestamp"]"</p>";
                        echo	"</div>";
                        echo	"</div>";
                        echo	"</li>";
                    }
                }
                $conn->close();
                ?> 
                  </div>
</div>
</div> 
-->

               
        <!-- TIMELINE versie 2—>

        
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