<?php
/*
$servername = "oege.ie.hva.nl:3306";
$username = "edep002";
$password = 'oMaIEqzNzZ$Fu/';

// Create connection
$conn = new mysqli($servername, $username, $password);

mysql_select_db('zedep002') or die ("could not open db".mysql_error());
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
*/
$link = mysql_connect('oege.ie.hva.nl:3306', 'edep002', 'oMaIEqzNzZ$Fu/');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}

echo 'Connected successfully';

mysql_select_db('zedep002',$link) or die ("could not open db".mysql_error());

$sql = "SELECT * FROM User"

?>