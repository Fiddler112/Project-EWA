<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Google Home - Goals</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="css/font-awesome.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="css/styles.css" rel="stylesheet">
	<link rel="icon" href="img/pic.png">
    
	<!--Custom Font-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <meta name="google-signin-client_id" content="307112913485-5kkslq098hfj65e6l3qngjo1916a7h4i.apps.googleusercontent.com">
    <style>
.buttonAddFirstExercise {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
.hidden-div {
    display:none
}
.wrapper {
    text-align: center;
   
}
.combobox {
text-align: left;
   
}
/* Full-width input fields */
input[type=text], input[type=text] {
    width: 100%;
    padding: 10px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #ffffff;
}
/*
.alert-success{color:#37ba21;
    background-color:#dff0d8;
    border-color:#d6e9c6
}
*/

input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}
.numberInput{
     width: 90%;
    padding: 10px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    width: 50%;
    background: #ffffff;
        }
hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}

button:hover {
    opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
    padding: 16px;
}

/* Clear floats */
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
       width: 100%;
    }
}
        
</style>
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
<!--				<h1 class="page-header">Goals</h1>-->
			</div>
		</div><!--/.row-->
        
        
         <?php 
                        include_once 'db_connect.php';                          
                        $_email =  $_COOKIE["email"];
            $sql = ("SELECT goal_name,weight_goal,timegoal,timestamp FROM `Goal` WHERE `user_id` = (select user_id from User where email = '".$_email."')");
         $result = $conn->query($sql);
        $row_cnt = $result->num_rows;
         
        
         if($row_cnt > 0 && isset($_GET['goalAdded']))  : ?>
        <div class="alert alert-success alert-dismissible fade in">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Goal added!</strong> 
            </div>    
        <div id=addGoalButtonCanvas class=wrapper>
        <button id=addGoalButton onclick=showInsert() class=buttonAddFirstExercise>Add goal</button>
        </div>
        <?php elseif($row_cnt > 0) : ?>
        <div id=addGoalButtonCanvas class=wrapper>
        <button id=addGoalButton onclick=showInsert() class=buttonAddFirstExercise>Add goal</button>
        </div>
        
        <?php else : ?>
        <div id=addFirstGoalButtonCanvas class=wrapper>
        <button id=addFirstGoalButton onclick=hideshow() class=buttonAddFirstExercise>Add your first goal!</button>
        </div>    
        <?php endif; ?>
        
      
        <form id="goalInsert" action="addGoal.php" style="border:1px solid #ccc" >
  <div class="container">
    <label for="email"><b>I want to</b></label>
<!--    <input type="text" placeholder="Under construction" name="email" required>-->
      <div class="combobox">
      <span class="combobox">
        <select name="comboBoxOption">
          <option selected="selected" value="Lose_weight">Lose weight</option>
          <option value="Gain_weight">Gain weight</option>
        </select>
      </span>
<!--      <input type="text" name="Name" class="form-control" placeholder="Full Name" oninput="FullName.value = sal.value +' '+ Name.value">-->
    </div><!-- /input-group -->
    <label class="" for="psw"><b>Desired weight</b></label>
    <input class="numberInput" type="number" min="45" max="130" placeholder="Enter new desired weight" name="desiredWeight" required>
      <br> 
    <label for="psw-repeat"><b>I want to complete my goal in</b></label>
    <input type="number" class="numberInput" min="0" max="90" placeholder="" name="numberOfDays" required>
    <b>days</b>
    <div class="clearfix">
<!--      <button type="button" class="cancelbtn">Cancel</button>-->
      <button type="submit" class="signupbtn">Save</button>
    </div>
  </div>
</form>
        
        
        
<!--
    <form method="post" action="" name="form">  
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default articles">
					<div class="panel-heading">
						Goal history
						</div>	
							<div class="panel-body articles-container">
                                <div class="form-group">
-->

                                              <?php
//                        include_once 'db_connect.php';
//                        $_email =  $_COOKIE["email"];
//                        $sql = "SELECT goal_name, weight_goal, timegoal FROM `Goal` WHERE user_id IN (select User.user_id FROM `User` where User.email = '".$_email."')";
//                        $result = $conn->query($sql);
//                        if($result == FALSE) {
//                        print(mysqli_error($conn));
//                        } else {
//                        while($row = $result->fetch_array()) {
//                            
//               echo  "<div class=' col-md-9 col-lg-9 '>";
//                       echo  "<table class='table table-user-information'>";                            
//                        echo    "<td>".$row["goal_name"]."</td>";
//                        echo    "<td>".$row["timegoal"]."</td>";
//                        echo    "<tr>";                   
//                    echo    "<tbody>";
//                    echo    "</table>";
//                    echo    "</div>";
//                     }

//}
?>                                            
          
<!--
                                </div>
							</div>
                        </div>
				</div> 
        </div>
        </form>
    
        
-->

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
                    
			<div style= "position: fixed;bottom:0;width:50%;"class="col-sm-12">
				<p class="back-link">Google home Healthy Habits EWA United</p>
			</div>
	    <script>
             hideAtStart();
        function addFirstGoal(){
            var addFirstGoalButton = document.getElementById('addFirstGoalButton');
    }
             function hideAtStart() {
        document.getElementById('goalInsert').style.visibility  = 'hidden'; 
    }    
            function hideshow() {
        document.getElementById('addFirstGoalButtonCanvas').style.visibility  = 'hidden'; 
        showInsert();
    }   
           function showInsert() {
        document.getElementById('goalInsert').style.visibility  = 'visible'; 
    }   
            
    //       window.alert("Add goal");
   //     }
        </script>
              
       
        
        
	<script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
<script src="js/jquery-1.11.1.min.js"></script>
        

	
</body>
</html>
