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
	<link rel="icon" href="img/pic.png">
	<!--Custom Font-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <meta name="google-signin-client_id" content="307112913485-5kkslq098hfj65e6l3qngjo1916a7h4i.apps.googleusercontent.com">
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
		<div class="divider"></div>
		<ul class="nav menu">
			<li><a href="index.php"><em class="fa fa-home">&nbsp;</em> Home</a></li>
			<li class="active"><a href="nutrition.php"><em class="fa fa-bar-chart">&nbsp;</em> Nutrition</a></li>
            <li><a href="Recipe.php"><em class="fa fa-utensils">&nbsp;</em> Recipes</a></li>
			<li><a href="goal.php"><em class="fa fa-line-chart">&nbsp;</em> Goals</a></li>
			<li><a href="User.php"><em class="fa fa-user">&nbsp;</em> Personal info</a></li>
			<li><a href="Settings.php"><em class="fa fa-wrench">&nbsp;</em> Settings</a></li>
            <li><a href="db_logout.php" onclick="location.href = db_logout.php;"><em class="fa fa-power-off">&nbsp;</em> Logout</a> </li>
		    <script>
              function signOut() {
                  alert("User will be logged off");
                var auth2 = gapi.auth2.getAuthInstance();
                auth2.signOut().then(function () {  

                  console.log('User signed out.');
                    window.location = "\login.php";
                });
              }
                function onLoad() {
                  gapi.load('auth2', function() {
                    gapi.auth2.init();
                });
              }
                function onLoad() {
                  gapi.load('auth2', function() {
                    gapi.auth2.init();
                  });
                }
                 function deleteCookie(name) {
                    setCookie({name: name, value: "", seconds: 0.1});
                }
            </script>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Nutrition</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Nutrition</h1>
			</div>
		</div><!--/.row-->
        
        	<div class="panel panel-default">
					<div class="panel-heading">
						Nutritional intake values
                    </div>
                <button style="height:30px;width:200px"type="button" onclick="createChart()" class="btn btn-light">Last 7 events</button>
                <button style="height:30px;width:200px"type="button" onclick="createChartHalfYear()"  class="btn btn-light">Events in last 180 days</button>
                <script> createChart() </script>
        <canvas id="lineChart"></canvas>
          </div>
        <!-- TIMELINE -->	
            <?php
            include_once 'db_connect.php';
            $foodName = array();
            $foodCal = array();
            $timeStamp = array();
            $_email =  $_COOKIE["email"];
            $_limitEvents =  $_COOKIE["amountOfEvents"];
             	
            $foodProperties = $conn->query(
                "SELECT product,calories,timestamp FROM `Food` WHERE user_id IN (SELECT user_id FROM User where email='".$_email."') ORDER BY timestamp DESC LIMIT ".$_limitEvents."");           
			echo"<div class='panel panel-container'>";
				echo"<div class='panel panel-default '>";
					echo"<div class='panel-heading'>";
						echo "What you've eaten today";						
						echo"</div>";
                   while ($row = $foodProperties->fetch_assoc()) {
                       
              echo"<div class='panel panel-container'>";
				echo"<div class='panel panel-default '>";
					echo"<div class='panel-body timeline-container'>";
						echo"<ul class='timeline'>";
								echo"<li>";
									echo"<div class='timeline-badge'><em class='glyphicon glyphicon-refresh'></em></div>";
									echo"<div class='timeline-panel'>";
										echo"<div class='timeline-heading'>";
											echo"<h4 class='timeline-title'>".$row['product']."<br>";"</h4>";
										echo"</div>";
										echo"<div class='timeline-body'>";
											echo"<p>Date and time: " .$row['timestamp']."</p>";
                                        	echo"<p>Calories: " .$row['calories']."</p>";
										echo"</div>";
									echo"</div>";
								echo"</li>";
								echo"<li>";
						  echo"</ul>";
						echo"</div>";
					echo"</div>";
				echo"</div> ";            
             
             }
        ?>
        <!-- TIMELINE -->
  	
			<div class="col-sm-12">
				<p class="back-link">Google home Healthy Habits EWA United</p>
			</div>
		<!--/.row-->
	</div>	<!--/.main-->
	  
    <?php
	include_once "db_connect.php";
    $_email =  $_COOKIE['email'];
    $today = date('Y-m-d');
    $aLotOfDaysAgo = date('Y-m-d', strtotime('-180 days')); 
     $timeStampArray = array();
     $caloriesPerDayArray = array();
     $countEventsPerDayArray = array();
    $datetime = array();
    $sqlGetCaloriesLastSevenDays = ("SELECT Food.timestamp, count(*), SUM(calories) AS totalCalories from `Food` INNER JOIN `User` ON User.user_id = Food.user_id where (DATE(Food.timestamp) between '$aLotOfDaysAgo' AND '$today') AND email = '".$_email."' group by timestamp");
    

   $result = $conn->query($sqlGetCaloriesLastSevenDays);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $timeStampArray[] = $row['timestamp'];
          $caloriesPerDayArray[] = $row['totalCalories'];
          $countArray[] = $row['count(*)'];
        }
    }                              
	?>
    
    
    
    
    
<script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/mdb.js"></script>
    <script> 
//line
        
var dailyCalorieCounter = <?php echo json_encode($caloriesPerDayArray); ?>;
var eventsPerDayCounter = <?php echo json_encode($countEventsPerDayArray); ?>; 
var timeStampArray = <?php echo json_encode($timeStampArray); ?>; 
var ctxL = document.getElementById("lineChart").getContext('2d');
var date = new Date();
var i;
var a;
createChart();
function createChart(){
var myLineChart = new Chart(ctxL, {        
    type: 'line',
    data: {
         labels:
        [timeStampArray[timeStampArray.length-7],
         timeStampArray[timeStampArray.length-6], 
         timeStampArray[timeStampArray.length-5], 
         timeStampArray[timeStampArray.length-4], 
         timeStampArray[timeStampArray.length-3],
         timeStampArray[timeStampArray.length-2], 
         timeStampArray[timeStampArray.length-1]],
        datasets:[
            {
                 label: "Ideal amount of calories per day (man)",
                    backgroundColor : "rgba(220,220,220,0)",
                    borderWidth : 2,
                    borderColor : "rgba(253, 1, 1, 1)",
                    pointBackgroundColor : "rgba(253, 1, 1, 1)",
                    pointBorderColor : "#BE0D0D",
                    pointBorderWidth : 0,
                    pointRadius : 0,
                    pointHoverBackgroundColor : "#009933",
                    pointHoverBorderColor : "rgba(190, 13, 13, 1)",
                    data: [2500,2500,2500,2500,2500,2500,2500]
             }
            ,
            {
               label: "Eaten calories",
                    backgroundColor : "rgba(220,220,220,0)",
                    borderWidth : 2,
                    borderColor : "rgba(79, 153, 36, 1)",
                    pointBackgroundColor : "rgba(79, 153, 36, 1)",
                    pointBorderColor : "#009933",
                    pointBorderWidth : 1,
                    pointRadius : 4,
                    pointHoverBackgroundColor : "#009933",
                    pointHoverBorderColor : "rgba(79, 153, 36, 1)",
                    data: [
                        dailyCalorieCounter[dailyCalorieCounter.length-7],
                        dailyCalorieCounter[dailyCalorieCounter.length-6],
                        dailyCalorieCounter[dailyCalorieCounter.length-5],
                        dailyCalorieCounter[dailyCalorieCounter.length-4],
                        dailyCalorieCounter[dailyCalorieCounter.length-3],
                        dailyCalorieCounter[dailyCalorieCounter.length-2],
                        dailyCalorieCounter[dailyCalorieCounter.length-1],
                    ]
            }
        ]
    },
    options: {
        responsive: true
    }    
});
}
function createChartHalfYear(){
    
var myLineChart = new Chart(ctxL, {        
    type: 'line',
    data: {
         labels:
        [timeStampArray[timeStampArray.length-7],
         timeStampArray[timeStampArray.length-6], 
         timeStampArray[timeStampArray.length-5], 
         timeStampArray[timeStampArray.length-4], 
         timeStampArray[timeStampArray.length-3],
         timeStampArray[timeStampArray.length-2], 
         timeStampArray[timeStampArray.length-1]],
        datasets:[
            {
                 label: "Ideal amount of calories per day (man)",
                    backgroundColor : "rgba(220,220,220,0)",
                    borderWidth : 2,
                    borderColor : "rgba(253, 1, 1, 1)",
                    pointBackgroundColor : "rgba(253, 1, 1, 1)",
                    pointBorderColor : "#BE0D0D",
                    pointBorderWidth : 0,
                    pointRadius : 0,
                    pointHoverBackgroundColor : "#009933",
                    pointHoverBorderColor : "rgba(190, 13, 13, 1)",
                    data: [2500,2500,2500,2500,2500,2500,2500]
             }
            ,
            {
               label: "Eaten calories",
                    backgroundColor : "rgba(220,220,220,0)",
                    borderWidth : 2,
                    borderColor : "rgba(79, 153, 36, 1)",
                    pointBackgroundColor : "rgba(79, 153, 36, 1)",
                    pointBorderColor : "#009933",
                    pointBorderWidth : 1,
                    pointRadius : 4,
                    pointHoverBackgroundColor : "#009933",
                    pointHoverBorderColor : "rgba(79, 153, 36, 1)",
                    data: [2300,2270,2700,3000,2400,2200,2800]
//                [
//                        dailyCalorieCounter[dailyCalorieCounter.length-7],
//                        dailyCalorieCounter[dailyCalorieCounter.length-6],
//                        dailyCalorieCounter[dailyCalorieCounter.length-5],
//                        dailyCalorieCounter[dailyCalorieCounter.length-4],
//                        dailyCalorieCounter[dailyCalorieCounter.length-3],
//                        dailyCalorieCounter[dailyCalorieCounter.length-2],
//                        dailyCalorieCounter[dailyCalorieCounter.length-1],
//                    ]
            }
        ]
    },
    options: {
        responsive: true
    }    
});
}

        
    </script>
    
	
</body>
</html>
