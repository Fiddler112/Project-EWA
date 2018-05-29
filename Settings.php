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
            <li><a href="Recipe.php"><em class="fa fa-utensils">&nbsp;</em> Recipes</a></li>
			<li><a href="goal.php"><em class="fa fa-line-chart">&nbsp;</em> Goals</a></li>
			<li><a href="User.php"><em class="fa fa-user">&nbsp;</em> Personal info</a></li>
			<li class="active"><a href="Settings.php"><em class="fa fa-wrench">&nbsp;</em> Settings</a></li>
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
				<li class="active">Details</li>
			</ol>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Settings</h1>
			</div>
		</div>



     <form method="post" action="" name="form">  
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default articles">
					<div class="panel-heading">
						Amount of timestamps
						</div>	
							<div class="panel-body articles-container">
                                <div class="form-group">
                                  <label for="sel1">Home many timestamps do you want shown on your dashboard?</label>
                                  <select class="form-control" id="amountTimestamps" placeholder="4">
                                      <option value="" disabled selected>Select amount of events, current: <?php
                                           $_limitEvents =  $_COOKIE["amountOfEvents"];
                                          echo $_limitEvents;
                                          ?></option>
                                      <option value="1">1</option>
                                      <option value="2">2</option>
                                      <option value="3">3</option>
                                      <option value="4">4</option>
                                      <option value="5">5</option>
                                      <option value="6">6</option>
                                      <option value="7">7</option>
                                      <option value="8">8</option>
                                      <option value="9">9</option>
                                      <option value="10">10</option>                             
                                    </select>
                                </div>
							</div>
                        </div>
				</div> 
        </div>
                    
            <script type="text/javascript">
       
        function setEventValue(){
             var getAmountOfEvents = document.getElementById("amountTimestamps");
             var amountOfEvents = getAmountOfEvents.value;
             createCookie("amountOfEvents", amountOfEvents,"365", "/");      
            }
         
        function createCookie(name,value, days, path){
        var expires = "";
        if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + " path=" + path;
   
       }
            </script>
            
			<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default articles">
					<div class="panel-heading articles-container">
						Personal									
						</div>		
						<div class="panel-body">			                        
						<label class="radio-inline"><input type="radio" name="optradio">Notifications on</label>
                        <label class="radio-inline"><input type="radio" name="optradio">Notifications off</label>	
					</div> 
				</div>			           
        </div>
        
<!--            <button type="submit" class="btn btn-success" onclick="">Submit</button>-->
              <button type="submit" class="btn btn-success" onclick="setEventValue();">Submit</button> 

			</div><!--/.col-->
			<div class="col-sm-12">
				<p class="back-link">Google home Healthy Habits EWA United</p>
			</div>
		<!--/.row-->
	</div>	<!--/.main-->
	  
<script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
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
