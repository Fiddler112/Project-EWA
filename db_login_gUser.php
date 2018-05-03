<!DOCTYPE html>
<?php


define('DB_NAME', 'zedep002');
define('DB_USER', 'edep002');
define('DB_PASSWORD','oMaIEqzNzZ$Fu/');
define('DB_HOST', 'oege.ie.hva.nl:3306');
$conn=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// Check connection
if (!$conn) {
    die('Could not connect: ' . mysql_error());
}


$email = $_GET['email'];
$name = $_GET['name'];
$google_id_token = $_GET['id_token'];



 $sql = "INSERT ignore INTO `User`(`email`,`first_name`,`last_name`) VALUES ('$email','$name','$google_id_token')";
//$re = mysqli_query($conn, $sql);

  
         if(mysqli_query($conn, $sql)){
    echo '<script type="text/javascript">
           window.location = "index.php"
      </script>';
            
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
     $conn->close();	
?>