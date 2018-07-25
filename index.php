
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<title>Dashboard</title>
<!--	<link href="css/bootstrap.css" rel="stylesheet">-->
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
                              </div>
				</div> 
        </div>
        </form>
          <!-- Progress bar-->
        <?php
        include_once 'db_connect.php';
        $today = date('Y-m-d');
        $_email =  $_COOKIE["email"];
        
        $sqlIntakes = "select SUM(calories) AS totalCalories, SUM(`fat`) AS fat, SUM(`saturated_fat`) as saturatedFat, SUM(`sugar`) as sugar, SUM(`carbohydrates`) AS carbs, User.gender AS gender FROM Food inner join User on Food.user_id = User.user_id WHERE DATE(`timestamp`) = CURDATE() AND email = '".$_email."'";           
        $result = $conn->query($sqlIntakes);
        if($result == FALSE) {
        print(mysqli_error()); 
        } else {
             while($row = $result->fetch_array()) {
            $calorieAmount = $row["totalCalories"]; 
            $sugarAmount = $row["sugar"]; 
            $recommendedAmountOfCaloriesMale = 2500;
            $recommendedAmountOfCaloriesFemale = 2000;
            $recommendedAmountOfSugarMale = 60;
            $recommendedAmountOfSugarFemale = 50;
                 
            if($row["gender"] === "man") {
                 $caloriePercentage = ($calorieAmount / $recommendedAmountOfCaloriesMale * 100);
                 $sugarPercentage = ($sugarAmount / $recommendedAmountOfSugarMale * 100);
            } else if ($row["gender"] === "woman") {
                $caloriePercentage = ($calorieAmount / $recommendedAmountOfCaloriesFemale * 100);
                 $sugarPercentage = ($sugarAmount / $recommendedAmountOfSugarFemale * 100);
            }
            }
        }
  ?>  
        <!-- Echo the percentages to js -->
         <div id="caloriePercentageOutput" style="display: none;">        
             <?php   
            echo htmlspecialchars($caloriePercentage);           
            ?>  </div>
        
         <div id="sugarPercentageOutput" style="display: none;">        
             <?php   
            echo htmlspecialchars($sugarPercentage);
            ?>  </div>
        
                   <div class="container">
          <div class="row">
            <div class="col-sm-5" >
               <!-- Circle calories indicator-->
             <div class="circle" id="calorieLevel"></div>
            </div>
            <p class="font-weight-normal">Calorie percentage </p>
            <div class="col-sm-5" >
              <!-- Circle sugar indicator-->
             <div class="circle" id="sugarLevel"></div>
                 <p class="font-weight-normal">Sugar percentage </p>
            </div>
          </div>
        </div> 
<!--
    <form method="post" action="" name="form">  
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default articles">
					<div class="panel-heading">
						Progress time line
						</div>	
							<div class="panel-body articles-container">
                                <div class="form-group">
-->

                                              <?php
//                        include_once 'db_connect.php';
//                        $_email =  $_COOKIE["email"];
//                        $sql = "SELECT type, description, timestamp FROM `Events` WHERE user_id IN (select User.user_id FROM `User` where User.email = '".$_email."')";
//                        $result = $conn->query($sql);
//                        if($result == FALSE) {
//                        print(mysqli_error());
//                        } else {
//                        while($row = $result->fetch_array()) {
//                            
//               echo  "<div class=' col-md-9 col-lg-9 '>";
//                       echo  "<table class='table table-user-information'>";                            
//                        echo    "<td>".$row["description"]."</td>";
//                        echo    "<td>".$row["timestamp"]."</td>";
//                        echo    "<tr>";                   
//                    echo    "<tbody>";
//                    echo    "</table>";
//                    echo    "</div>";
//                    echo    "</div>";
//                            
//                                              
//                            
//                     }
//
//}
//$conn->close();
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
  
  <script src="js/circles.js"></script>
     <script src="js/circles.min.js"></script>
	<script>
         var caloriePerDiv = document.getElementById("caloriePercentageOutput");
         var calData = caloriePerDiv.textContent;
         var roundCal = Math.round(calData);
		Circles.create({
			id:           'calorieLevel',
			value:        roundCal,
			radius:       60,
			width:        10,
			duration:     1,
			colors:       ['#D3B6C6', '#4B253A']
		});
        
         var sugarPerDiv = document.getElementById("sugarPercentageOutput");
         var sugData = sugarPerDiv.textContent;
         var roundSug = Math.round(sugData);
		Circles.create({
			id:           'sugarLevel',
			value:        roundSug,
			radius:       60,
			width:        10,
			duration:     1,
			colors:       ['#D3B6C6', '#4B253A']
		});
	</script>
</body>
</html>