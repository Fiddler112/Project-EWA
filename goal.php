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
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
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
			<li class="active"><a href="goal.php"><em class="fa fa-line-chart">&nbsp;</em> Goals</a></li>
			<li><a href="User.php"><em class="fa fa-user">&nbsp;</em> Personal info</a></li>
			<li><a href="Settings.php"><em class="fa fa-wrench">&nbsp;</em>  Settings</a></li>
            <li><a href="#" onclick="signOut()"><em class="fa fa-power-off">&nbsp;</em> Logout</a> </li>
		    <script>
              function signOut() {
                  alert("User will be logged off and redirected to Google");
                var auth2 = gapi.auth2.getAuthInstance();
                auth2.signOut().then(function () {  



                  console.log('User signed out.');
                    window.location = "https://mail.google.com/mail/u/0/?logout&hl=en";;
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
        
<!-- TIMELINE -->	
			<div class="panel panel-container">
				<div class="panel panel-default ">
					<div class="panel-heading">
						Goal history
						
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
										<p>Start date: 04-2</p>
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
										<p>Start date: 03-17</p>
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
										<p>Start date: 03-3</p>
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
        
       <!--ADD NEW USER-->
        <!-- userfull link: https://stackoverflow.com/questions/3479130/how-to-preselect-an-html-dropdown-list-with-php/12273128#12273128->
				<div class="panel panel-default">
					<div class="panel-heading">Add a new goal</div>
					<div class="panel-body">
						<div class="col-md-6">
<!--                            <h3 >Starting information </h3>-->
                            <label for="plan">  Select weight plan: </label>
                                <select id="cmbMake" name="plan" >
                                <option value="0"> Lose weight</option>
                                <option value="1">Stay on the same weight</option>
                                <option value="2">Gain weight</option>
                                <option value="3">Gain muscles</option>
                                </select>
							<form role="form">
								<div class="form-group">
									<label>    Goal name</label>
									<input class="form-control" >
								</div>
<!--
                                <div class="form-group">
									<label>Age</label>
									<input class="form-control" >
								</div>
                                <div class="form-group">
									<label>Height</label>
									<input class="form-control" >
								</div>
                                 <div class="form-group">
									<label>Weight</label>
									<input class="form-control" >
								</div>
								 Message body 
								<div class="form-group">
									<label class="form-group" for="message">Describe your goal</label>
									<div class="form-group">
										<textarea class="form-control" id="message" name="message" placeholder="Please enter your description here..." rows="5"></textarea>
									</div>
								</div>
-->

	<!--							<div class="col-md-6">
									<div class="form-group">
										<label>Checkboxes</label>
										<div class="checkbox">
											<label>
												<input type="checkbox" value="">Checkbox 1
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="checkbox" value="">Checkbox 2
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="checkbox" value="">Checkbox 3
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="checkbox" value="">Checkbox 4
											</label>
										</div>
									</div> -->
<!--                                <h3 >Results </h3>-->
                                <div class="form-group"  >
									<label>    Goal Weight</label>
									<input class="form-control"placeholder="Desired weight" >
								</div>
                                <div class="form-group">
									<label>I want to reach my goal in </label>
									<input class="form-control" placeholder="Amount of days">
								</div>
                                <h3 >OR select a date </h3>
                                <div class="form-group">
									<label>I want to reach my goal by </label>
									<input class="form-control" 
                                    placeholder="10/14/2018">
								</div>
<!--
									<div class="form-group">
										<label>specify goal</label>
										<div class="radio">
											<label>
												<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>loss weight
											</label>
										</div>
										<div class="radio">
											<label>
												<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">stay weight
											</label>
										</div>
										<div class="radio">
											<label>
												<input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">gain weight 
											</label>
										</div>
										<div class="radio">
											<label>
												<input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">gain muscel 
											</label>
										</div>
									</div>
-->
								<!--	<div class="form-group">
										<label>Selects</label>
										<select class="form-control">
											<option>Option 1</option>
											<option>Option 2</option>
											<option>Option 3</option>
											<option>Option 4</option>
										</select>
									</div>
									<div class="form-group">
										<label>Multiple Selects</label>
										<select multiple class="form-control">
											<option>Option 1</option>
											<option>Option 2</option>
											<option>Option 3</option>
											<option>Option 4</option>
										</select> 
									</div> -->
									<button type="Add User" class="btn btn-primary">Add your goal
                                   </button>
                           
                        </form>
					  </div>
				<!--  </div>--> 
				
			<!--  </div>--> <!-- /.col-->
     <!--ADD NEW USER-->
    
			<div class="col-sm-12">
				<p class="back-link">Google home Healthy Habits EWA United</p>
			</div>
		<!--/.row-->
	<!--  </div>--> 	<!--/.main-->
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
