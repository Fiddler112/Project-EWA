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
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>Google home</span> healthy hub</a>
				
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
			<li><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li class="active"><a href="nutrition.php"><em class="fa fa-bar-chart">&nbsp;</em> Nutrition</a></li>
			<li><a href="goal.php"><em class="fa fa-line-chart">&nbsp;</em> Goals</a></li>
			<li><a href="Settings.php"><em class="fa fa-wrench">&nbsp;</em> Settings</a></li>
			<li><a href="User.php"><em class="fa fa-user">&nbsp;</em> My details</a></li>
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

				<!--/.DAILY INTAKE-->
        
        <!-- TIMELINE -->	
            <?php
            include_once 'db_connect.php';
            $foodName = array();
            $foodCal = array();
            $timeStamp = array();
            $_email =  $_COOKIE["email"];
            $_limitEvents =  $_COOKIE["eventLimit"];
             $sql = "SELECT name FROM `Food` WHERE user_id IN (SELECT user_id FROM User where email='".$_email."') ORDER BY timestamp DESC LIMIT ".$_limitEvents."";		
            while ($user_row = $site_db->fetch_array($result)) {
            $yourArr[] = $user_row['user_id'];
        }
        echo "<pre>";
        print_r($yourArr);
            ?>
			<div class="panel panel-container">
				<div class="panel panel-default ">
					<div class="panel-heading">
						Intake history
						
						</div>
					<div class="panel-body timeline-container">
						<ul class="timeline">
							<li>
								<div class="timeline-badge"><em class="glyphicon glyphicon-refresh"></em></div>
								<div class="timeline-panel">
									<div class="timeline-heading">
										<h4 class="timeline-title">Los 7 kilo's</h4>
									</div>
									<div class="timeline-body">
										<p>Time:
                                        <?php 
                                                    
                                        ?>
                                        </p>
                                        <p>End date:   04-16</p>
                                        <p>Status: Currently in progress</p>
									</div>
								</div>
							</li>
							<li>
								<div class="timeline-badge primary"><em class="glyphicon glyphicon-ok"></em></div>
								<div class="timeline-panel">
									<div class="timeline-heading">
										<h4 class="timeline-title">Los 5 kilo's </h4>
									</div>
									<div class="timeline-body">
										<p>Time: </p>
                                        <p>End date:   03-27</p>
                                        <p>Status: Completed</p>
									</div>
								</div>
							</li>
                            <li>
								<div class="timeline-badge primary"><em class="glyphicon glyphicon-remove"></em></div>
								<div class="timeline-panel">
									<div class="timeline-heading">
										<h4 class="timeline-title">Los 5 kilo's </h4>
									</div>
									<div class="timeline-body">
										<p>Time: </p>
                                        <p>End date:   03-17</p>
                                        <p>Status: Not completed</p>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div> 
    
        
        <!-- TIMELINE -->
        

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
								
								<!-- Form actions -->
								<div class="form-group">
									<div class="col-md-12 widget-right">
										<button type="submit" class="btn btn-default btn-md pull-right">Play recipe</button>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
            
            
			</div><!--/.col-->
			<div class="col-sm-12">
				<p class="back-link">Google home Healthy Habits  <a href="https://www.medialoot.com">EWA United</a></p>
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
