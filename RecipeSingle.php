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
			<li><a href="nutrition.php"><em class="fa fa-bar-chart">&nbsp;</em> Nutrition</a></li>
            <li class="active"><a href="Recipe.php"><em class="fa fa-utensils"></em>&nbsp; Recipes</a></li>
			<li><a href="goal.php"><em class="fa fa-line-chart">&nbsp;</em> Goals</a></li>
			<li><a href="User.php"><em class="fa fa-user">&nbsp;</em> Personal info</a></li>
			<li><a href="Settings.php"><em class="fa fa-wrench">&nbsp;</em> Settings</a></li>
             <li><a href="db_logout.php" onclick="location.href = db_logout.php;"><em class="fa fa-power-off">&nbsp;</em> Logout</a> </li>
		</ul>
	</div><!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Recipes</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Recipes</h1>
			</div>
		</div><!--/.row-->
		
		                <?php
		             		    require __DIR__ . '/vendor/autoload.php';
                                use RapidApi\RapidApiConnect;             
		                       $id = $_POST['submit'];                            
                                $rapid = new RapidApiConnect('default-application_5adf253de4b0b4824e5ac536', 'dc6004e0-4602-4c1c-b599-38838972f5ea');
                              $response = Unirest\Request::get('https://spoonacular-recipe-food-nutrition-v1.p.mashape.com/recipes/'.($id = $id ?? "").'/information',
										  array(
										    "X-Mashape-Key" => "1kEqiAEoRFmshiBb6AVUoeX6KvFNp1u8cndjsnSFvVG8zg3A1o",
										    "X-Mashape-Host" => "spoonacular-recipe-food-nutrition-v1.p.mashape.com"
										  )
										);                                                         
                         
                                $getResponseVal = $response->raw_body;
                                $getDecodeData = json_decode($getResponseVal, true);
                               if(isset($getDecodeData)){ 
                                   $number = 0;     
                               // foreach($getDecodeData['instructions'] as $key=>$value) {
                                   echo"<div class='panel panel-container'>";
									echo"<div class='panel panel-default '>";
									echo "<h1>".$getDecodeData['title']."</h1>";
									echo"<div class='panel-heading'>";
                                	echo "<div class=panel-body>";
                                	
                                	echo "<br><strong>Instructions:</strong><br> ".$getDecodeData['instructions']."</div>";
                                	echo "<img src='".$getDecodeData['image']."'</div></div>";
                      
                  }
             
		       ?>
    </body>
</html>