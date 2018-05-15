<?php
include 'db_connect.php';
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

if (!$email | !$password)
{
  echo '<script type="text/javascript">';
        echo 'alert("Password or Username Invalid!")';
        echo '</script>';
echo "<script>setTimeout(\"location.href = 'login.php';\",0);</script>";
}
$sql = "SELECT * FROM User WHERE email='$email' AND Password='$password'";
$re = mysqli_query($conn, $sql);

$count=mysqli_num_rows($re);

if($count==1){
	$_SESSION['email'] = $email;
		echo '<script language="javascript">';
			echo 'alert("je wordt nu ingelogd")';
			echo '</script>';
			echo "<script>setTimeout(\"location.href = 'index.php';\",0);</script>";


		}
		else {
			echo '<script type="text/javascript">';
    	    echo 'alert("Password or Username Invalid!")';
     	    echo '</script>';
			echo "<script>setTimeout(\"location.href = 'login.php';\",0);</script>";
		}
	$conn->close();	
?>