<!DOCTYPE html>
<?php


include 'db_connect.php';

//Gets variables through URL
$profileName = $_GET['profileName'];
$email = $_GET['email'];
$google_id_token = $_GET['id_token'];
$firstName = $_GET['firstName'];
$lastName = $_GET['lastName'];

//$firstName = (isset($_GET['firstName']) ? $_GET['firstName'] : null);
//$lastName = (isset($_GET['lastName']) ? $_GET['lastName'] : null);
$imgURL = $_GET['imgURL'];

//Variable insert statement
 $sql = "INSERT ignore INTO `User`(`email`,`first_name`,`last_name`,`google_id_token`,`img_url`,`profileName`) VALUES ('$email','$firstName','$lastName','$google_id_token','$imgURL','$profileName')";
  
         if(mysqli_query($conn, $sql)){
    echo '<script type="text/javascript">
           window.location = "Settings.php"
      </script>';
            
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
     $conn->close();	
?>