<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Google Home - Nutrition</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
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
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only" >Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
                </button>
				<a class="navbar-brand" href="#"><span>Google home</span> healthy habits </a>
                
                
				
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
			<li><a href="goal.php"><em class="fa fa-line-chart">&nbsp;</em> Goals</a></li>
			<li class="active"><a href="User.php"><em class="fa fa-user">&nbsp;</em> Personal info</a></li>
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
				<li class="active">Personal info</li>
			</ol>
		</div><!--/.row-->
		
        	<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Personal info</h1>
			</div>
		</div><!--/.row-->
 
        
        <div class="panel panel-info">
            <div class="panel-heading">
               <div class="profile-userpic">
				<img src="  <?php $imgURL =  $_COOKIE["imgURL"];
                echo $imgURL;
                ?> " class="img-responsive" alt="">
			</div> 
              <h1 class="panel-title"><?php $firstName =  $_COOKIE["firstName"];
                echo $firstName;
                  
                  $lastName =  $_COOKIE["lastName"];
                echo $lastName;
                ?> </h1>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-4 col-lg-4 " align="center"> <div class="profile-usertitle-name"> 
     </div> </div>
                
                    <?php
                        include_once 'db_connect.php';
                        $_email =  $_COOKIE["email"]; 
                        $sql = "select BMI.BMI_id,BMI.weight, BMI.BMI,User.length,User.email,User.birthdate,User.user_id, User.profileName, User.gender from `BMI` INNER JOIN  `User` ON BMI.user_id = User.user_id WHERE User.email ='".$_email."'ORDER BY timestamp DESC LIMIT 1";
                        $result = $conn->query($sql);
                        if($result == FALSE) {
                        print(mysqli_error());
                        } else {
                        while($row = $result->fetch_array()) {
                            
                            
                        echo  "<div class=' col-md-9 col-lg-9 '>";
                        echo  "<table class='table table-user-information'>";
                        echo  "<tbody>";
                            
                        echo    "<tr>";
                        echo    "<td>Profile name</td>";
                        echo    "<td>".$row["profileName"]."</td>";
                        echo    "<tr>";
                      
                        echo  "<tr>";
                        echo  "<td>Weight</td>";
                        echo  "<td>".$row["weight"]."</td>";
                        echo  "<tr>";
                     
                        echo  "<tr>";
                        echo  "<td>Length</td>";
                        echo "<td>".$row["length"]."</td>";
                        echo  "<tr>";  
                   
                        echo    "<tr>";
                        echo    "<td>BMI</td>";
                        echo    "<td>".$row["BMI"]."</td>";
                        echo    "<tr>";
                        
                        echo    "<tr>";
                        echo    "<td>Email</td>";
                        echo    "<td>".$row["email"]."</td>";
                        echo    "<tr>";
                     
                        echo  "<tr>";
                        echo  "<td>Gender</td>";
                        echo   "<td>".$row["gender"]."</td>";
                        echo  "<tr>";
                    
                        echo   "<tr>";
                        echo   "<td>Birthdate</td>";
                        echo   "<td>".$row["birthdate"]."</td>";
                        echo  "<tr>";
                      
                            
                    echo    "<tbody>";
                    echo    "</table>";
                    echo    "</div>";
                    echo    "</div>";
                     }
}
$conn->close();
?>      
                           
                   
                </div>
              </div>
            </div>
       
    
        
        
        

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