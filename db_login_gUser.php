<!DOCTYPE html>
<?php


include 'db_connect.php';

//Gets variables through URL
$email = $_GET['email'];
$name = $_GET['name'];
$google_id_token = $_GET['id_token'];

//Variable insert statement
 $sql = "INSERT ignore INTO `User`(`email`,`first_name`,`last_name`) VALUES ('$email','$name','$google_id_token')";
  
         if(mysqli_query($conn, $sql)){
    echo '<script type="text/javascript">
           window.location = "index.php"
      </script>';
            
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
     $conn->close();	
?>