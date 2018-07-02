<!DOCTYPE html>
<?php


include 'db_connect.php';

//Gets variables through URL
 $_numberOfDays = $_GET['numberOfDays'];
 $_email = $_COOKIE['email'];
 $_desiredWeight = $_GET['desiredWeight'];
 $_comboBoxOption = $_GET['comboBoxOption'];
$_timeSpan = date('Y-m-d', strtotime("+$_numberOfDays days")); 
$_sqlGetUserID = "SELECT user_id FROM User WHERE email='".$_email."' LIMIT 1";
//Havent got this working yet
$resultUsername = $conn->query($_sqlGetUserID);
$_userID = mysqli_fetch_array($resultUsername);
$_userIDForSQL = $_userID[0];

$sql = "INSERT INTO `Goal` (`goal_ID`, `goal_name`, `weight_goal`, `timestamp`, `timegoal`, `user_id`) VALUES (NULL, '".$_comboBoxOption."', '".$_desiredWeight."', CURRENT_TIMESTAMP, '".$_timeSpan."', '".$_userIDForSQL."')";
if(mysqli_query($conn, $sql)){
    echo '<script type="text/javascript">
           window.location = "goal.php?goalAdded=yes"
      </script>';
            
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error();
}
     $conn->close();	
?>