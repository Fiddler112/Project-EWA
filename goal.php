<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Google Home - Goals</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
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
			
		</div><!-- /.container-fluid -->
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
		<div class="divider"></div>
		<ul class="nav menu">
			<li><a href="index.php"><em class="fa fa-home">&nbsp;</em> Home</a></li>
			<li><a href="nutrition.php"><em class="fa fa-bar-chart">&nbsp;</em>  Nutrition</a></li>
            <li><a href="Recipe.php"><em class="fa fa-utensils">&nbsp;</em> Recipes</a></li>
			<li class="active"><a href="goal.php"><em class="fa fa-line-chart">&nbsp;</em> Goals</a></li>
			<li><a href="User.php"><em class="fa fa-user">&nbsp;</em> Personal info</a></li>
			<li><a href="Settings.php"><em class="fa fa-wrench">&nbsp;</em>  Settings</a></li>
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
				<li class="active">Goals</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Goals</h1>
			</div>
		</div><!--/.row-->
        
        
        
    <form method="post" action="" name="form">  
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default articles">
					<div class="panel-heading">
						Goal history
						</div>	
							<div class="panel-body articles-container">
                                <div class="form-group">

                                              <?php
                        include_once 'db_connect.php';
                        $_email =  $_COOKIE["email"];
                        $sql = "SELECT goal_name, weight_goal, timegoal FROM `Goal` WHERE user_id IN (select User.user_id FROM `User` where User.email = '".$_email."')";
                        $result = $conn->query($sql);
                        if($result == FALSE) {
                        print(mysqli_error($conn));
                        } else {
                        while($row = $result->fetch_array()) {
                            
               echo  "<div class=' col-md-9 col-lg-9 '>";
                       echo  "<table class='table table-user-information'>";                            
                        echo    "<td>".$row["goal_name"]."</td>";
                        echo    "<td>".$row["timegoal"]."</td>";
                        echo    "<tr>";                   
                    echo    "<tbody>";
                    echo    "</table>";
                    echo    "</div>";
                    echo    "</div>";
                     }

}
?>                                            
          
                                </div>
							</div>
                        </div>
				</div> 
        </div>
        </form>
    
        

<!--
				<div class="panel panel-default">
					<div class="panel-heading">Add a new goal</div>
					<div class="panel-body">
						<div class="col-md-6">
-->

                            <?php
//                       include_once 'db_connect.php';
//                            
//                       $_email =  $_COOKIE["email"];
//
//                       $value1 = $_POST['goal_name'];  
//                            
//                        $value2 = $_POST['weight_goal'];
//                            
//                        $value3 = $_POST[ 'timegoal'];
                      
//                       $sql = "INSERT INTO Goal (goal_name, weight_goal, timegoal, user_id)
//                       VALUES($value1, $value2, $value3);";
//                        $result = $conn->query($sql);
//                        if($result == FALSE) {
//                        print(mysqli_error());
//                        } else {
//                        while($row = $result->fetch_array()) {

        
//							echo"<form role='form'>";
//								echo"<div class='form-group'>";
//									echo"<label>   Goal name </label>";
//									echo"<input type='text'name='goal_name' class='form-control' >";
//								echo"</div>";
//
//                                echo"<div class='form-group'  >";
//									echo"<label>    Goal Weight</label>";
//									echo"<input name='weight_goal' class='form-control'placeholder='Desired weight' >";
//								echo"</div>";
//                            
//                                echo"<h3 >select a date </h3>";
//                                echo"<div class='form-group'>";
//									echo"<label>I want to reach my goal by </label>";
//									echo"<input name='timegoal' class='form-control' ";
//                                    echo"placeholder='10/14/2018'>";
//								echo"</div>";

//									echo"<input type='submit' class='btn btn-primary'>Add your goal";
//                                   echo"</input>";
                           
                    
                    $conn->close();
            ?> 
<!--
                        
					  </div>
				</div>
                    </div>
-->
				
     <!-- GOAL INFORMATION -->       
                    
			<div class="col-sm-12">
				<p class="back-link">Google home Healthy Habits EWA United</p>
			</div>
	
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
