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
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
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
			<li><a href="goal.php"><em class="fa fa-line-chart">&nbsp;</em> Goals</a></li>
			<li><a href="User.php"><em class="fa fa-user">&nbsp;</em> Personal info</a></li>
			<li><a href="Settings.php"><em class="fa fa-wrench">&nbsp;</em> Settings</a></li>
		    <li><a href="db_logout.php" onclick="signOut();"><em class="fa fa-power-off">&nbsp;</em> Logout</a> </li>
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

        



        <!--/.DAILY INTAKE-->
        
        
<!--
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-default articles">
					<div class="panel-heading">
						Daily intake 

						</div>
					<div class="panel-body articles-container">
						<div class="article border-bottom">
							<div class="col-xs-12">
								<div class="row">
									<div class="col-xs-2 col-md-2 date">
										<div class="large">90</div>
										<div class="text-muted">cal</div>
									</div>
									<div class="col-xs-10 col-md-10">
										<p>Apple</p>
									</div>
								</div>
							</div>
							<div class="clear"></div>
						</div>End .article
						
						<div class="article border-bottom">
							<div class="col-xs-12">
								<div class="row">
									<div class="col-xs-2 col-md-2 date">
										<div class="large">120</div>
										<div class="text-muted">cal</div>
									</div>
									<div class="col-xs-10 col-md-10">
										<p>KitKat</p>
									</div>
								</div>
							</div>
							<div class="clear"></div>
						</div>
						
                    <div class="article">
							<div class="col-xs-12">
								<div class="row">
									<div class="col-xs-2 col-md-2 date">
										<div class="large">450</div>
										<div class="text-muted">cal</div>
									</div>
									<div class="col-xs-10 col-md-10">
										<p>Pasta</p>
									</div>
								</div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
                        </div>
				</div> 
            
        </div>
-->

				<!--/.DAILY INTAKE-->
        
            <!--/.DAILY INTAKE-->
				<div class="panel panel-default">
					<div class="panel-heading">
						Search recipe

					</div>
					<div class="panel-body">
						<form class="form-horizontal" action="" method="post">
							<fieldset>
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Name or ingrëdients</label>
									<div class="col-md-9">
										<input id="name" name="name" type="text" placeholder="Recipe name or ingrëdient" class="form-control">
									</div>
								</div>
                                <div class="form-group">
									<label class="col-md-3 control-label" for="name">Maximum calories</label>
									<div class="col-md-9">
										<input id="maxCalories" name="maxCalories" type="text" placeholder="Maximum amount of calories" class="form-control">
									</div>
								</div>
								
								<!-- Form actions -->
								<div class="form-group">
									<div class="col-md-12 widget-right">
										<button type="submit" class="btn btn-default btn-md pull-right">Play recipe</button>
									</div>
								</div>
							</fieldset>
						</form>
                        
                            <?php
                                  $name = $_POST["name"] ?? 'null'; 
                                   $maxcalories = $_POST["maxCalories"] ?? '0';  
                                require __DIR__ . '/vendor/autoload.php';
                                use RapidApi\RapidApiConnect;
                                $rapid = new RapidApiConnect('default-application_5adf253de4b0b4824e5ac536', 'dc6004e0-4602-4c1c-b599-38838972f5ea');
                              $response = Unirest\Request::get("https://spoonacular-recipe-food-nutrition-v1.p.mashape.com/recipes/searchComplex?query=".($name = $name ?? "")."&maxCalories=".($maxcalories =$maxcalories ?? "0"),                            
                              array(
                                "X-Mashape-Key" => "1kEqiAEoRFmshiBb6AVUoeX6KvFNp1u8cndjsnSFvVG8zg3A1o",
                                "X-Mashape-Host" => "spoonacular-recipe-food-nutrition-v1.p.mashape.com"
                              )
                                                              
                         );
                                $getResponseVal = $response->raw_body;
                                $getDecodeData = json_decode($getResponseVal, true);
                               if(isset($getDecodeData['results'])){ 
                                   $number = 0;                                        
                                 foreach($getDecodeData['results'] as $key=>$value) {
                                    if (empty($value)) {
                                        echo "<div class='panel-heading'>No recipes found </div>";
                                    } else {
                                        $number++;
                                        echo "<div class='panel-heading'>";
                                        echo "Recipe ".$number." : ".$value['title']."<br>Amount of calories: ".$value['calories']. "<br>";
                                        echo "</div>";
                                        }
                                }
                               }
                        ?>
					</div>
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
