<?php
  $conn = mysqli_connect("localhost", "root", '', "zedep002");
// Check connection
if (!$conn) {
    die('Could not connect: ' . mysql_error());
}

$server = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'zedep002';
$con = mysql_connect($server, $user, $pass) or die("Can't connect");
mysql_select_db($dbname);
?>