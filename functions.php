<?php

function enterWeight() {
    include 'db_connect.php';
    $_email = $_COOKIE["email"];
    $sql = "SELECT weight, length FROM User WHERE user_id IN (SELECT user_id FROM User where email='".$_email."') AND (weight='0' OR length='0')";
    $result = $conn->query($sql);
    
    if($result->num_rows > 0){
        $message = "This is your first time visiting this website, please fill in your weight and length on the next page!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo '<script type="text/javascript"> window.location = "InputNewUser.php" </script>';
    }   
}
?>