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
            <li><a href="#" onclick="signOut()"><em class="fa fa-power-off">&nbsp;</em> Logout</a> </li>
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
    
            <!--/.Recipes-->
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
                                   echo "<form class='form-horizontal' action='RecipeSingle.php' method='post'>";
                                foreach($getDecodeData['results'] as $key=>$value) {
                                    if (empty($value)) {
                                       echo "<div class='panel-heading'>No recipes found </div>";
                                    } else {
                                        $number++;
                                        echo "<div class='panel-body'>";
                                        echo '<strong>Recipe '.$number.' : '.$value['title'].'</strong><br>Amount of calories: '.$value['calories']. '&nbsp;<button type="submit" class="btn btn-info">More Info</button><img src="'.$value['image'].'" align="right"/> <br>';
                                        echo "</div>";
                                        }
                                    }
                                   echo "</form>";
                              }
                        ?>
					</div>
				</div>
        </div>
    </body>
</html>
